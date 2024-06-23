<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_BookTypeManagement extends CI_Model {
    
    public function get_all_book_type($book_type_id=null){
        $where = "";
        if ($book_type_id){
            $where = "WHERE book_type_id = " . $book_type_id;
        }
        $sql = "SELECT * FROM tb_book_types $where ORDER BY 1 DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert_book_type($data){
        $sql = "INSERT INTO tb_book_types (book_type_name, description)
                VALUES ('$data[book_type_name]', '$data[description]')";
        $this->db->query($sql);
    }

    public function update_book_type($data, $book_type_id){
        $sql = "UPDATE tb_book_types 
                   set book_type_name = '$data[book_type_name]', 
                       description = '$data[description]'
                WHERE book_type_id = $book_type_id";
        $this->db->query($sql);
    }

    public function delete_book_type($id){
        $sql = "DELETE FROM tb_book_types WHERE book_type_id = $id";
        $this->db->query($sql);
    }



}