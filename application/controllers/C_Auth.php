<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_Auth");
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
    

    public function login(){
        /**
         * Function to handle login process
         */
        
        $data["error"] = "";
        if (!empty($this->session->userdata("user_id"))){
            $type = $this->session->userdata("user_type");
            if ($type == "client"){
                redirect("client/dashboard");
            }
            redirect("admin/dashboard");
        }

        if ($_POST){
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
            $validate = $this->M_Auth->check_user_account($username, $password);

            if($validate){
                $this->session->set_userdata("user_id", $validate[0]["user_id"]);
                $this->session->set_userdata("user_type", $validate[0]["user_type"]);
                $this->session->set_userdata("first_name", $validate[0]["first_name"]);
                $this->session->set_userdata("last_name", $validate[0]["last_name"]);
                $this->session->set_userdata("profile", $validate[0]["profile_pict"]);

                if($validate[0]["user_type"] == "client"){
                    redirect("client/dashboard");
                } else {
                    redirect("admin/dashboard");
                }
            } else {
                $this->session->set_flashdata("error", "Username/password not matched");
                redirect("login");
            }
        } 

        $this->load->view("auth/V_Login.php");
    }


    public function logout(){
        /**
         * Function to handle logout process
         */

        $this->session->sess_destroy();
		redirect("client/dashboard");
    }


    public function register(){
        /**
         * Function to handle register user
         * this function only make a user with client role only
         */
        
        $data["error"] = "";

        if ($_POST){
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];

            // echo "<pre>"; print_r($_POST); die;

            $validate = $this->M_Auth->check_user_account($username);
 
            if($validate){
                $this->session->set_flashdata("error", "Username already taken. Please input others username !");
                redirect("register");
            } else { 
                $this->M_Auth->register($username, $password, $first_name, $last_name);
                redirect("login");
            }
        } 
 
        $this->load->view("auth/V_Register.php");

    }

}

?>