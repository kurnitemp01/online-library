<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UserManagement extends CI_Model {

    public function delete_data($table, $column, $id){
        $sql = "DELETE FROM $table WHERE $column = '$id'";
        $this->db->query($sql);
    }

    public function get_all_user($level){
        $where = "";
        if ($level == "all"){
            $where = "where user_type != 'author'";
        } else if ($level == "admin_only") {
            $where = "where user_type='admin'";
        } else if ($level == "client_only") {
            $where = "where user_type='client'";
        } else if ($level == "client_admin") {
            $where = "where user_type in ('client', 'admin')";
        } else if ($level == "author"){
            $where = "where user_type='author'";
        }

        $sql = "select tu.*, tc.name city, 
                       tp.name province, tc2.name country
                  from tb_users tu
             left join tb_cities tc on tu.city_id = tc.city_id 
             left join tb_provinces tp on tu.province_id = tp.province_id 
             left join tb_countries tc2 on tc2.country_id = tu.country_id
             $where";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_all_location($table, $pk=null, $id=null){
        $where = "";
        if (!empty($pk) and !empty($id)){
            $where = " WHERE $pk = $id";
        }
        $sql = "SELECT * FROM $table" . $where;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert_user($data){
        $sql = "INSERT INTO tb_users 
                    (username, password, user_type, first_name, last_name, 
                    gender, profile_pict, email, phone, job, motto, street, 
                    city_id, province_id, country_id) 
                values 
                    ('$data[username]', '$data[password]', '$data[user_type]',
                    '$data[first_name]', '$data[last_name]', '$data[gender]',
                    '$data[profile_pict]', '$data[email]', '$data[phone]', '$data[job]', 
                    '$data[motto]', '$data[street]', $data[city_id], 
                    $data[province_id], $data[country_id])";
        $this->db->query($sql);
    }

    public function update_user($data, $user_id){
        $sql = "UPDATE tb_users SET
                    username = '$data[username]', 
                    user_type = '$data[user_type]',
                    first_name = '$data[first_name]', 
                    last_name = '$data[last_name]', 
                    gender = '$data[gender]',
                    email = '$data[email]', 
                    phone = '$data[phone]', 
                    job = '$data[job]', 
                    motto = '$data[motto]', 
                    street = '$data[street]', 
                    city_id = $data[city_id],         
                    province_id = $data[province_id], 
                    country_id = $data[country_id]
                WHERE user_id = $user_id;";
        $this->db->query($sql);
    }

}