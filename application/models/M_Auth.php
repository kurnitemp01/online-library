<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

    public function check_user_account($username, $password=null){
        $and_password = "";
        if ($password) {
            $and_password = " AND password = '$password'";
        } 

        $sql = "SELECT * FROM tb_users WHERE username = '$username'" . $and_password;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function register($username, $password, $first_name, $last_name){
        $sql = "INSERT INTO tb_users (username, password, first_name, last_name, user_type)
                values ('$username', '$password', '$first_name', '$last_name', 'client')";
        $this->db->query($sql);
    }

}

?>