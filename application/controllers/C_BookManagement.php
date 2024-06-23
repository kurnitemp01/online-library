<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_BookManagement extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_BookManagement");
        $this->load->model("M_UserManagement");
        $this->load->model("M_BookTypeManagement");
        $this->load->database();
	}

    function check_session(){
		/**
		 * Function to check user session by checking username index on session userdata
		 */

		if(empty($this->session->userdata("user_id"))){
			redirect("login");
		}
	}

    function load_view($view_name, $data){
        $this->load->view("admin/template/V_Header", $data);
        $this->load->view("admin/template/V_Sidebar", $data);
		$this->load->view("admin/template/V_Navbar", $data);
        $this->load->view("admin/".$view_name, $data);
		$this->load->view("admin/template/V_Footer", $data);
    }

    function generate_book_code(){
        $last_book_code = $this->M_BookManagement->get_max_book_code()[0]["max_book_code"];

        $curr_letter = substr($last_book_code, 0, 1);
        $curr_block = intval(substr($last_book_code, 1, 2));
        $curr_row = intval(substr($last_book_code, 3, 2));

        if ($curr_row < 4){
            $curr_row = str_pad($curr_row + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $curr_row = str_pad(1, 2, '0', STR_PAD_LEFT);
        }   

        

        if ($curr_row == "01" and $curr_block = 6){
            $curr_block = str_pad(1, 2, '0', STR_PAD_LEFT);
        } else if ($curr_row == "01" and $curr_block < 6){
            $curr_block = str_pad($curr_block + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $curr_block = str_pad($curr_block, 2, '0', STR_PAD_LEFT);
        }

        if ($curr_block == 1){
            $curr_letter = chr(ord($curr_letter) + 1);
        }

        return $curr_letter . $curr_block . $curr_row;
    }

    public function book_monitoring(){
        $this->check_session();
        $data["page"] = "book-management";
        $data["books"] = $this->M_BookManagement->get_all_book();

        $this->load_view("V_BookMonitoring", $data);
    }

    public function book_create($book_id=null){
        $this->check_session();
        $this->generate_book_code();
        $data["page"] = "book-management";
        $data["authors"] = $this->M_UserManagement->get_all_user("author");
        $data["book_types"] = $this->M_BookTypeManagement->get_all_book_type();

        $country_finder = fn ($data) => $data["country"];
        $country_list = array_map($country_finder, $data["authors"]);
        $data["country_list"] = array_unique($country_list);

        if($_POST){
            $config['upload_path']          = FCPATH.'assets/img/book/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10240;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

            $this->load->library('upload', $config);

            if ($_FILES["files"]["size"] > 0) {
                $file_ext = explode("/", $_FILES["files"]["type"])[1];
                $_FILES["files"]["name"] = date("Ymdhis") . "_" . $_POST["username"] . "." . $file_ext;
                $_POST["cover"] = $_FILES["files"]["name"];
                $this->upload->do_upload("files");
            }

            if ($book_id){
                $this->M_BookManagement->update_book($_POST, $book_id);
                $this->M_BookManagement->delete_book_type_relation("book_id", $book_id);
            } else {                
                $_POST["book_code"] = $this->generate_book_code();
                if (empty($_POST["cover"])){
                    $_POST["cover"] = "";
                }
                $book_id = $this->M_BookManagement->insert_book($_POST)[0]["book_id"];    
            }

            foreach ($_POST["book_types"] as $key => $val) {
                $this->M_BookManagement->insert_book_type_relation($book_id, $val);
            }
            
            redirect("admin/book-management/monitoring");
        }  

        $current_url = explode("/", $_SERVER['REQUEST_URI']);
        $data["process"] = $current_url[4];
        
        $data["book"] = "";
        if ($book_id){
            $data["book"] = $this->M_BookManagement->get_all_book($book_id)[0];
        }

        // echo "<pre>"; print_r($data); die;

        $this->load_view("V_BookCreate", $data);
    }

    public function book_delete($book_id){
        $this->check_session();
        $this->M_BookManagement->delete_book($book_id);
        redirect("admin/book-management/monitoring");
    }

}
?>