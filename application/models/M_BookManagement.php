<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_BookManagement extends CI_Model {
    
    public function get_all_book($book_id=null){
        $where = "";
        if ($book_id){
            $where = "and tb.book_id = " . $book_id;
        }

        $sql = "select distinct tb.*,
                    concat(tu.first_name,' ',tu.last_name) author_name, 
                    group_concat(tbt.book_type_name separator ', ') book_type,
                    group_concat(tbt.book_type_id separator ',') book_type_id
                from tb_books tb,
                    tb_book_types tbt,
                    tb_book_type_relations tbtr,
                    tb_users tu
            where 1=1
                and tb.book_id = tbtr.book_id 
                and tbtr.book_type_id = tbt.book_type_id 
                and tu.user_id = tb.author_id
                $where
            group by tb.book_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_max_book_code(){
        $sql = "SELECT max(book_code) max_book_code FROM tb_books";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert_book($data){
        $sql = "INSERT INTO tb_books 
                    (book_name, book_code, description, author_id, 
                     book_year, book_language, stock, cover, page)
                VALUES 
                    ('$data[book_name]', '$data[book_code]', '$data[description]', 
                    $data[author], $data[book_year], '$data[book_language]', 
                    $data[stock], '$data[cover]', $data[page])";
        $this->db->query($sql);
        $query = $this->db->query("SELECT LAST_INSERT_ID() AS book_id");
        return $query->result_array();
    }

    public function update_book($data, $id){
        $sql = "UPDATE tb_books
                   SET book_name = '$data[book_name]',
                       description = '$data[description]',
                       author_id = $data[author],
                       book_year = $data[book_year],
                       book_language = '$data[book_language]',
                       stock = $data[stock],
                       page = $data[page]
                 WHERE book_id = $id";
        $this->db->query($sql);
    }

    public function insert_book_type_relation($book_id, $book_type_id){
        $sql = "INSERT INTO tb_book_type_relations (book_type_id, book_id)
                VALUES ($book_type_id, $book_id)";
        $this->db->query($sql);
    }

    public function delete_book($book_id){
        $sql = "DELETE FROM tb_books WHERE book_id = $book_id";
        $this->db->query($sql);
    }

    public function delete_book_type_relation($column, $id){
        $sql = "DELETE FROM tb_book_type_relations WHERE $column = $id";
        $this->db->query($sql);
    }

    public function get_processed_data($limit){
        $sql = "CALL get_datas($limit)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}