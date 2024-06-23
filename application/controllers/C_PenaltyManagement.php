<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PenaltyManagement extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_PenaltyManagement");
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

    public function penalty_monitoring(){
        $this->check_session();
        $data["page"] = "penalty-management";
        $data["penalties"] = $this->M_PenaltyManagement->get_user_penalty();
        
        $this->load_view("V_PenaltyMonitoring", $data);
    }

    public function penalty_create($penalty_type_id=null){
        $this->check_session();
        $data["page"] = "penalty-management";
        $data["penalty_types"] = $this->M_PenaltyManagement->get_penalty();
        
        if ($_POST){
            if($penalty_type_id){
                $new_id = $this->M_PenaltyManagement->update_penalty_type($_POST, $penalty_type_id);
            } else {
                $this->M_PenaltyManagement->insert_penalty_type($_POST);
            }
            redirect("admin/penalty-management/create");
        }

        $current_url = explode("/", $_SERVER['REQUEST_URI']);
        $data["process"] = $current_url[4];
        
        $data["detail_penalty"] = "";
        if($penalty_type_id){
            $data["detail_penalty"] = $this->M_PenaltyManagement->get_penalty($penalty_type_id)[0];
        }

        // echo "<pre>"; print_r($data); die;

        $this->load_view("V_PenaltyCreate", $data);
    }

    public function approve_request($penalty_id){
        $this->check_session();
        $this->M_PenaltyManagement->approve_request($penalty_id);
        redirect("admin/penalty-management/monitoring");
    }

    public function delete_penalty($penalty_type_id){
        $this->check_session();
        $this->M_PenaltyManagement->delete_penalty($penalty_type_id);
        redirect("admin/penalty-management/create");
    }

}
?>