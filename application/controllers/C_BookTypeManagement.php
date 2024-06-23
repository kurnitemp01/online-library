<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_BookTypeManagement extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_BookTypeManagement");
        $this->load->model("M_Client");
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

	public function book_type_create($book_type_id=null){
		$this->check_session();
        $data["page"] = "book-type-management";
		$data["book_types"] = $this->M_BookTypeManagement->get_all_book_type();
		$data["book_type"] = "";

		if($_POST){
			if($book_type_id){
				$this->M_BookTypeManagement->update_book_type($_POST, $book_type_id);
			} else {
				$this->M_BookTypeManagement->insert_book_type($_POST);				
			}
			redirect("admin/book-type-management/create");
		}

		if($book_type_id){
			$data["book_type"] = $this->M_BookTypeManagement->get_all_book_type($book_type_id)[0];
		}

        $this->load_view("V_BookType", $data);
    }

	public function book_type_delete($book_type_id){
		$this->check_session();
		$this->M_BookTypeManagement->delete_book_type($book_type_id);
		redirect("admin/book-type-management/create");
	}

}
?>