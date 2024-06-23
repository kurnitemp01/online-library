<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_UserManagement extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_UserManagement");
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

    public function user_monitoring(){
        $this->check_session();
        $user_type = $this->session->userdata("user_type");
        if ($user_type == "superuser"){
            $limit = "all";
        } else {
            $limit = "client_only";
        }

        $data["users"] = $this->M_UserManagement->get_all_user($limit);
        $data["page"] = "user-management";
        $this->load_view("V_UserMonitoring", $data);
    }

    public function user_create($user_id=null){
        $this->check_session();
        $data["page"] = "user-management";
        $data["cities"] = $this->M_UserManagement->get_all_location("tb_cities");
        $data["provinces"] = $this->M_UserManagement->get_all_location("tb_provinces");
        $data["countries"] = $this->M_UserManagement->get_all_location("tb_countries");

        if($_POST){
            $config['upload_path']          = FCPATH.'assets/img/user-profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10240;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

            $this->load->library('upload', $config);

            if ($_FILES["files"]["size"] > 0) {
                $file_ext = explode("/", $_FILES["files"]["type"])[1];
                $_FILES["files"]["name"] = date("Ymdhis") . "_" . $_POST["username"] . "." . $file_ext;
                $_POST["profile_pict"] = $_FILES["files"]["name"];
                $this->upload->do_upload("files");
            }

            if ($user_id){
                $this->M_UserManagement->update_user($_POST, $user_id);
            } else {
                $_POST["password"] = md5($_POST["password"]);
                $this->M_UserManagement->insert_user($_POST);
            }
            
            redirect("admin/user-management/monitoring");

        }

        $data["user_detail"] = "";
        if ($user_id){
            $data["user_detail"] = $this->M_Client->get_user_detail($user_id)[0];
        }

        $current_url = explode("/", $_SERVER['REQUEST_URI']);
        $data["process"] = $current_url[4];

        $this->load_view("V_UserCreate", $data);
    }

    public function user_delete($user_id){
        $this->check_session();
        $this->M_UserManagement->delete_data("tb_users", "user_id", $user_id);
        redirect("admin/user-management/monitoring");
    }

}

?>
