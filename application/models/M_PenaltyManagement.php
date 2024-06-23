<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PenaltyManagement extends CI_Model {

    public function get_penalty($penalty_type_id=null){
        $where = "";
        if ($penalty_type_id){
            $where = "where penalty_type_id = " . $penalty_type_id;
        }

        $sql = "SELECT * FROM tb_penalty_types " . $where;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_user_penalty(){
        $sql = "select tup.*, tpt.penalty_type_name, tu.username, tt.transaction_num,
                    tt.creation_date trx_date
                from tb_user_penalties tup 
                    left join tb_penalty_types tpt on tup.penalty_type_id = tpt.penalty_type_id 
                    left join tb_transactions tt on tup.transaction_id = tt.transaction_id 
                    left join tb_users tu on tt.user_id = tu.user_id 
                where approved_date is null";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert_penalty_type($data){
        $sql = "INSERT INTO tb_penalty_types (penalty_type_name, penalty_desc)
                VALUES ('$data[penalty_type_name]', '$data[penalty_desc]')";
        $this->db->query($sql);
        $query = $this->db->query("SELECT LAST_INSERT_ID() AS penalty_type_id");
        return $query->result_array();
    }

    public function update_penalty_type($data, $id){
        $sql = "UPDATE tb_penalty_types
                   SET penalty_type_name = '$data[penalty_type_name]',
                       penalty_desc = '$data[penalty_desc]'
                 WHERE penalty_type_id = $id";
        $this->db->query($sql);
    }

    public function approve_request($penalty_id){
        $sql = "update tb_user_penalties 
                   set approved_date = current_timestamp() 
                 where penalty_id = $penalty_id";
        $this->db->query($sql);
    }

    public function delete_penalty($penalty_type_id){
        $sql = "DELETE FROM tb_penalty_types WHERE penalty_type_id = $penalty_type_id";
        $this->db->query($sql);
    }

}