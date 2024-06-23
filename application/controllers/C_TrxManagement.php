<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TrxManagement extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_TrxManagement");
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

    public function trx_monitoring(){
        $this->check_session();
        $data["page"] = "trx-management";
        // $data["transactions"] = $this->M_TrxManagement->get_transaction_list("all");
        $data["penalties"] = $this->M_PenaltyManagement->get_penalty();

        $this->load_view("V_TrxMonitoring", $data);
    }

    public function need_approval(){
        $this->check_session();
        $data["page"] = "trx-management";
        $data["transactions"] = $this->M_TrxManagement->get_transaction_list("need-approval");
        $data["penalties"] = $this->M_PenaltyManagement->get_penalty();

        $this->load_view("V_TrxNeedApproval", $data);
    }

    public function transaction_approve($transaction_id){
        $this->check_session();
        $this->M_TrxManagement->approve_transaction($transaction_id);
        redirect("admin/trx-management/need-approval");
    }

    public function assign_penalty($transaction_id){
        $this->check_session();
        $this->M_TrxManagement->assign_penalty($transaction_id, $_POST["penalty_type_id"]);
        redirect("admin/trx-management/need-approval");
    }

    public function get_transaction_for_datatable($mode){
        $selected_column = array_map(function($value){
            return $value["data"];
        }, $this->input->get("columns"));

        $filter = [
            "search" => $this->input->get(["search"])["search"]["value"],
            "limit" => $this->input->get("length"),
            "offset" => $this->input->get("start"),
            "order_column" => $selected_column[$this->input->get("order")[0]["column"]],
            "order_direction" => $this->input->get("order")[0]["dir"],
            "state" => $mode
        ];

        $transactions = $this->M_TrxManagement->get_transaction_list($filter);

        header('Content-Type: application/json');
        echo json_encode($transactions);
    }

}
?>