<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_AdminDashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->helper("processing_book");
        $this->load->model("M_AdminDashboard");
        $this->load->model("M_BookManagement");
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

    public function dashboard(){
        $this->check_session();

        $data["total_book"] = $this->M_Client->get_count("tb_books")[0]["total"];
        $data["total_user"] = $this->M_Client->get_count("tb_users")[0]["total"];

        $transaction = $this->M_AdminDashboard->get_total_trx("active")[0];

        $data["total_trx"] = $transaction["total_trx"];
        $data["total_trx_due"] = $transaction["total_due"];
        $data["due_percentage"] = $transaction["due_percentage"];

        $data["books"] = $this->M_AdminDashboard->get_top_book(10);
        $data["page"] = "dashboard";

        // echo "<pre>"; print_r($data); die;

        $this->load_view("V_Dashboard", $data);
    }

    public function show_book_rate_calculation(){
        // get variable
        $variables = get_all_variable();

        // get calculated weight
        $weight = setup_priority_vector(define_weight(), "merged");
        $weight = setup_pev($weight);
        $weight = setup_ci_cr(setup_ci_cr($weight, "ci"), "cr");

        // get and process book
        $raw_books = $this->M_BookManagement->get_processed_data(10);

        // get compared variable from each book
        $compared_variable = setup_variable_comparision($raw_books);
        $raw_priority_vector = [];
        foreach ($compared_variable as $key => $value) {
            $temp = setup_priority_vector($value, "merged");
            $temp = setup_pev($temp);
            $temp = setup_ci_cr(setup_ci_cr($temp, "ci"), "cr");

            $compared_variable[$key] = $temp;
            $raw_priority_vector[$key] = setup_priority_vector($value, "unmerged");
        }

        // get calculated score from each book
        $parsed_weight_pv = array_map(function($val){
            return end($val);
        }, $weight["data"]);

        $parsed_object_pv = array_map(function($outer_value, $outer_key){
            return [$outer_key => array_map(function($inner_value){
                return end($inner_value);
            }, $outer_value)];
        }, $raw_priority_vector, array_keys($raw_priority_vector));

        $parsed_object_pv = call_user_func_array("array_merge", $parsed_object_pv);

        $book_code_list = array_map(function($data) {
            return $data["book_code"];
        }, $raw_books);

        $calculated_book = setup_object_score($parsed_object_pv, $parsed_weight_pv, $book_code_list);
        $ordered_data = ordering_object($calculated_book, $raw_books);

        $data = [
            "variables" => $variables,
            "weight" => $weight,
            "raw_books" => $raw_books,
            "page" => "ahp",
            "custom_js" => "custom_ahp.js",
            "compared_variable" => $compared_variable,
            "calculated_book" => $calculated_book,
            "ordered_data" => $ordered_data
        ];

        $this->load_view("V_CalculatedBook", $data);
    }

}

?>
