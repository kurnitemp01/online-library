<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Client extends CI_Model {

    public function check_user_account($username, $password){
        /**
         * Used to make sure that username and password is correct
         */
        $sql = "SELECT * FROM tb_users WHERE username = '$username' and password = '$password'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_count($table){
        /**
         * Get total data based on table om argument
         */
        $sql = "SELECT count(*) total FROM " . $table;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_user_detail($user_id){
        /**
         * Get detail user based on user id
         */
        $sql = "select tu.*, tc.name city, tp.name province, tc2.name country,
                case 
                    when gender = 'm' then 'Male'
                    when gender = 'f' then 'Female'
                end gender_detail
                from tb_users tu
                    left join tb_cities tc on tu.city_id = tc.city_id
                    left join tb_provinces tp on tc.province_id = tp.province_id 
                    left join tb_countries tc2 on tc2.country_id = tp.country_id 
                where tu.user_id = ".$user_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_recommended_book_types($limit){
        /**
         * Get recomended book types based on 
         * most book types are borrowed by user
         */
        $sql = "select * from tb_book_types tbt 
                 order by (select count(*) 
                             from tb_transactions tt, 
                                  tb_book_type_relations tbtr 
                            where tt.book_id = tbtr.book_id 
                              and tbt.book_type_id = tbtr.book_type_id) desc,
                              tbt.book_type_name 
                limit " . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_recommended_books($user_id, $limit){
        /**
         * Get recommended book based on transaction 
         * are recorded on each user. If the user don't 
         * have a transaction or user is guest, the algorithm 
         * automatically remove user filter
         */
        $sql = "select distinct tb.*,
                        concat(tu.first_name,' ',tu.last_name) author_name, 
                        group_concat(tbt.book_type_name separator ', ') book_type,
                        4 rating
                    from tb_books tb,
                        tb_book_types tbt,
                        tb_book_type_relations tbtr,
                        tb_users tu
                where tb.book_id not in (select tt.book_id from tb_transactions tt where tt.user_id = " . $user_id . ")
                    and tb.book_id = tbtr.book_id 
                    and tbtr.book_type_id = tbt.book_type_id 
                    and tu.user_id = tb.author_id
                group by tb.book_id
                order by (select count(*) 
                            from tb_transactions tt2, 
                                    tb_book_type_relations tbtr2 
                            where tt2.user_id != " . $user_id . "
                                and tbtr2.book_id = tt2.book_id 
                                and tbtr2.book_type_id = tbt.book_type_id) desc
                limit " . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_book_search($book_name, $author=null, $book_type=null, $year_start=null, $year_end=null, $page=null){
        if (!empty($year_start) and !empty($year_end)){
            $year_filter = "AND tb.book_year between $year_start and $year_end";
        } else if (!empty($year_start) and empty($year_end)){
            $year_filter = "AND tb.book_year <= $year_end";
        } else if (empty($year_start) and !empty($year_end)) {
            $year_filter = "AND tb.book_year >= $year_end";
        } else {
            $year_filter = "";
        }

        $page_filter = "";
        if (!empty($page)){
            $page_filter = "AND tb.page >= $page";
        }

        $book_filter = "";
        if (!empty($book_name)){
            $book_name = strtolower($book_name);
            $book_filter = "AND lower(tb.book_name) like '%$book_name%'";
        }

        $author_filter = "";
        if (!empty($author)){
            $author_filter = strtolower($author_filter);
            $author_filter = "AND lower(tu.first_name) like '%$author%' or lower(tu.last_name) like '%$author%'";
        }

        $type_filter = "";
        if (!empty($book_type)){
            $type_filter = strtolower($author_filter);
            $type_filter = "AND lower(tbt.book_type_name) like '%$book_type%'";
        }

        $sql = "select distinct tb.*,
                        concat(tu.first_name,' ',tu.last_name) author_name, 
                        group_concat(tbt.book_type_name separator ', ') book_type,
                        4 rating
                    from tb_books tb,
                        tb_book_types tbt,
                        tb_book_type_relations tbtr,
                        tb_users tu
                where tb.book_id = tbtr.book_id 
                    and tbtr.book_type_id = tbt.book_type_id 
                    and tu.user_id = tb.author_id
                    and (1=1
                        $book_filter
                        $author_filter
                        $type_filter
                        $page_filter
                        $year_filter)
                group by tb.book_id
                order by (select count(*) 
                            from tb_transactions tt2, 
                                    tb_book_type_relations tbtr2 
                            where tbtr2.book_id = tt2.book_id 
                                and tbtr2.book_type_id = tbt.book_type_id) desc
                limit 40";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_book_detail($book_code){
        $sql = "select distinct tb.*,
                        concat(tu.first_name,' ',tu.last_name) author_name, 
                        group_concat(tbt.book_type_name separator ', ') book_type
                    from tb_books tb,
                        tb_book_types tbt,
                        tb_book_type_relations tbtr,
                        tb_users tu
                where 1=1
                    and tb.book_id = tbtr.book_id 
                    and tbtr.book_type_id = tbt.book_type_id 
                    and tu.user_id = tb.author_id
                    and tb.book_code = '$book_code'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_user_penalties($user_id){
        $sql = "select tup.*, tt.*
                from tb_user_penalties tup,
                    tb_transactions tt 
                where 1=1
                and tup.transaction_id = tt.transaction_id 
                and tup.approved_date is null
                and tt.user_id = $user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create_transaction($user_id, $book_id, $end_date){
        $sql = "INSERT INTO tb_transactions (user_id, book_id, end_date)
                values ($user_id, $book_id, '$end_date')";
        $this->db->query($sql);

        $update_trx_num = "update tb_transactions 
                              set transaction_num = concat('TRX', LPAD(transaction_id, 10, 0));";
        $this->db->query($update_trx_num);
    }

    public function get_user_collection($user_id){
        $sql = "select tt.transaction_id,
                    tb.book_id,
                    tt.transaction_num,
                    tb.book_name,
                    tt.start_date,
                    tt.end_date,
                    tt.returned_date,
                    tt.is_submitted,
                    tup.penalty_id,
                    tup.evidence,
                    tup.approved_date,
                    case 
                        when datediff(tt.end_date, current_date()) >= 0 
                            then concat(abs(datediff(tt.end_date, current_date())), ' days left-success')
                        when datediff(tt.end_date, current_date()) < 0 
                            then concat(abs(datediff(tt.end_date, current_date())), ' days ago-danger')
                        when tt.is_submitted = 'y' and tt.returned_date is not null
                            and tup.penalty_id is not null and tup.approved_date is not null
                            then 'done-primary'
                        when tt.is_submitted = 'y' and tt.returned_date is not null
                            and tup.penalty_id is null
                            then 'done-primary'
                    end status,
                    -- action-button        
                    case
                        when tt.is_submitted = 'y' and tt.returned_date is null 
                            then 'review-secondary'
                        when tt.is_submitted = 'y' and tt.returned_date is not null
                            and tup.penalty_id is not null and tup.evidence is null
                            then 'penalty-warning'
                        when tt.is_submitted = 'y' and tt.returned_date is not null
                            and tup.penalty_id is not null and tup.evidence is not null
                            and tup.approved_date is null
                            then 'review-secondary'
                        when tt.is_submitted = 'y' and tt.returned_date is not null
                            and tup.penalty_id is not null and tup.approved_date is not null
                            then 'done-primary'
                        when tt.is_submitted = 'y' and tt.returned_date is not null
                            and tup.penalty_id is null
                            then 'done-primary'
                        when tt.is_submitted is null
                            then 'return-success'
                    end trx_action,
                    tpt.penalty_type_name,
                    tpt.penalty_desc 
            from tb_transactions tt
                left join tb_books tb on tb.book_id = tt.book_id 
                left join tb_user_penalties tup on tup.transaction_id = tt.transaction_id
                left join tb_penalty_types tpt on tup.penalty_type_id = tpt.penalty_type_id 
            where 1=1
                and tt.user_id = " . $user_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function return_book($transaction_id){
        $sql = "UPDATE tb_transactions
                   SET is_submitted = 'y',
                       submitted_date = current_date()
                WHERE transaction_id = $transaction_id";
        $this->db->query($sql);
    }

    public function upload_evidence($evidence, $penalty_id){
        $sql = "UPDATE tb_user_penalties 
                   SET evidence = '$evidence'
                 WHERE penalty_id = $penalty_id";
        $this->db->query($sql);
    }

    public function update_user($data, $user_id){
        $sql = "update tb_users
                set job = '$data[job]',
                    motto = '$data[motto]',
                    first_name = '$data[first_name]',
                    last_name = '$data[last_name]',
                    username = '$data[username]',
                    email = '$data[email]',
                    phone = '$data[phone]',
                    gender = '$data[gender]',
                    street = '$data[street]',
                    city_id = '$data[city_id]',
                    province_id = '$data[province_id]',
                    country_id = '$data[country_id]'
            where user_id = $user_id";
        $this->db->query($sql);
    }
}

?>