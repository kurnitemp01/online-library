<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Client extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->model("M_Client");
		$this->load->model("M_UserManagement");
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
        $this->load->view("client/template/V_Header", $data);
        $this->load->view("client/template/V_Sidebar", $data);
		$this->load->view("client/template/V_Navbar", $data);
        $this->load->view("client/".$view_name, $data);
		$this->load->view("client/template/V_Footer", $data);
    }

	public function dashboard(){
		$total_book = $this->M_Client->get_count("tb_books")[0]["total"];
		$total_book_type = $this->M_Client->get_count("tb_book_types")[0]["total"];
		$book_types = $this->M_Client->get_recommended_book_types(4);
		$books = $this->M_Client->get_recommended_books(1, 10);

		$data = array(
			"total_book" => $total_book,
			"total_book_type" => $total_book_type,
			"book_types" => $book_types,
			"books" => $books,
			"page" => "dashboard"
		);

		$this->load_view("V_Dashboard", $data);
	}

	public function my_collection(){
		$this->check_session();
		$data["page"] = "my_collection";
		$data["collections"] = $this->M_Client->get_user_collection($this->session->userdata("user_id"));
		
		// echo "<pre>"; print_r($data); die;
		$this->load_view("V_MyCollection", $data);
	}

	public function profile($user_id=null){
		$this->check_session();

		$user_id = $this->session->userdata("user_id");
		$data["user"] = $this->M_Client->get_user_detail($user_id)[0];
		$data["page"] = "profile";

		$data["cities"] = $this->M_UserManagement->get_all_location("tb_cities");
        $data["provinces"] = $this->M_UserManagement->get_all_location("tb_provinces");
        $data["countries"] = $this->M_UserManagement->get_all_location("tb_countries");

		$current_url = explode("/", $_SERVER['REQUEST_URI']);
		if(count($current_url) == 6){
			$data["process"] = $current_url[4];
		} else {
			$data["process"] = $current_url[3];
		}

		if($_POST){
			$this->M_Client->update_user($_POST, $user_id);
			redirect("client/profile");
		}

		$this->load_view("V_Profile", $data);
	}

	public function search($mode){
		$this->check_session();
		if ($mode == "basic"){
			$keyword = $_POST["keyword"];
			$data["books"] = $this->M_Client->get_book_search($keyword);
			$data["keyword"] = array($keyword);
		} else {
			$book_name = $_POST["book_name"];
			$author = $_POST["author"];
			$book_type = $_POST["book_type"];
			$year_start = $_POST["year_start"];
			$year_end = $_POST["year_end"];
			$page = $_POST["page"];

			$data["keyword"] = array($book_name, $author, $book_type, $year_start, $year_end, $page);
			$data["books"] = $this->M_Client->get_book_search($book_name, $author, $book_type, $year_start, $year_end, $page);
		}

		$data["page"] = "search_book";
		$this->load_view("V_SearchResult", $data);
	}

	public function book_detail($book_code){
		$this->check_session();
		$data["book"] = $this->M_Client->get_book_detail($book_code)[0];
		$data["page"] = "book_detail";
		$this->load_view("V_BookDetail", $data);
	}

	public function create_transaction($book_code){
		$this->check_session();
		$user_id = $this->session->userdata("user_id");

		$penalty = $this->M_Client->get_user_penalties($user_id);
		if (empty($penalty)){
			$book_detail = $this->M_Client->get_book_detail($book_code)[0];
			$stock = $book_detail["stock"];
			if ($stock > 0){
				$book_id = $book_detail["book_id"];
				$end_date = date("Y-m-d", strtotime("+7 day"));
				
				$this->M_Client->create_transaction($user_id, $book_id, $end_date);
				$this->session->set_flashdata("notif", "Your transaction successfull, please check My Collection menu for detail !");
				redirect("client/book-detail/" . $book_code);
			} else {
				$this->session->set_flashdata("notif", "I'm aplogize, the book is out of stock. Please choose another book !");
				redirect("client/book-detail/" . $book_code);
			}
		} else {
			$this->session->set_flashdata("notif", "Your account still have a penalty. Pleas check and complete the penalty first !");
			redirect("client/book-detail/" . $book_code);
		}
	}

	public function return_book($transaction_id){
		$this->M_Client->return_book($transaction_id);
		redirect("client/my-collection");
	}

	public function upload_evidence($penalty_id){
		$config['upload_path']          = FCPATH.'assets/img/evidence/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10240;
		$config['max_width']            = 10240;
		$config['max_height']           = 7680;

		$this->load->library('upload', $config);

		if ($_FILES["files"]["size"] > 0) {
			$file_ext = explode("/", $_FILES["files"]["type"])[1];
			$_FILES["files"]["name"] = "evidence-". $penalty_id . "." . $file_ext;
			$_POST["evidence"] = $_FILES["files"]["name"];
			$this->upload->do_upload("files");
		}

		$this->M_Client->upload_evidence($_POST["evidence"], $penalty_id);
		redirect("client/my-collection");
	}
    
}

?>