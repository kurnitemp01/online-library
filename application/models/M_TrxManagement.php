<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TrxManagement extends CI_Model {
    
    public function get_transaction_list($filter){
        $where = "";

        if ($filter["state"] == "need-approval"){
            $where = "and tt.is_submitted = 'y' and tt.returned_date is null";
        }

        if (strlen($filter["search"]) > 0){
            $value = $filter["search"];
            $where = $where . " and (lower(tt.transaction_num) like lower('%$value%') 
                                or lower(tt.start_date) like lower('%$value%')
                                or lower(tt.end_date) like lower('%$value%')
                                or lower(tt.submitted_date) like lower('%$value%')
                                or lower(tu.username) like lower('%$value%')
                                or lower(tb.book_name) like lower('%$value%')
                                or lower(case 
                                        when tt.returned_date is not null and tup.approved_date is not null 
                                            then 'done|primary'
                                        when tt.submitted_date is not null and tt.returned_date is null 
                                            then 'waiting approval|warning'
                                        when tt.returned_date is not null and tup.approved_date is null
                                            and tup.evidence is not null
                                            then 'waiting penalty approval|warning'
                                        when tt.returned_date is not null and tup.approved_date is null
                                            and tup.evidence is null
                                            then 'waiting penalty evidence|danger'
                                        else 'on going|success'
                                    end) like lower('%$value%')
                                )";
        }

        $order = "";
        if (strlen($filter["order_column"]) > 0){
            $order = " order by " . $filter["order_column"] . " " . $filter["order_direction"];
        }

        $limit = $filter["limit"];
        $offset = $filter["offset"];

        $total_datas = "select count(tt.transaction_id) total_transaction
                        from tb_transactions tt 
                            left join tb_books tb on tt.book_id = tb.book_id 
                            left join tb_users tu on tt.user_id = tu.user_id 
                            left join tb_user_penalties tup on tt.transaction_id = tup.transaction_id 
                        where 1=1 and tt.trx_type = 'trx'";
        $query_total = $this->db->query($total_datas);
        
        $filtered_datas = "select count(tt.transaction_id) total_transaction 
                            from tb_transactions tt 
                                left join tb_books tb on tt.book_id = tb.book_id 
                                left join tb_users tu on tt.user_id = tu.user_id 
                                left join tb_user_penalties tup on tt.transaction_id = tup.transaction_id 
                            where 1=1 and tt.trx_type = 'trx'
                            $where";
        $query_filtered = $this->db->query($filtered_datas);

        $paginated_sql = "select tt.*, tu.username, tb.book_name, 
                    datediff(tt.end_date, current_date()) difference,
                    tup.penalty_id, tup.approved_date,
                    case 
                        when tt.returned_date is not null and tup.approved_date is not null 
                            then 'done|primary'
                        when tt.submitted_date is not null and tt.returned_date is null 
                            then 'waiting approval|warning'
                        when tt.returned_date is not null and tup.approved_date is null
                            and tup.evidence is not null
                            then 'waiting penalty approval|warning'
                        when tt.returned_date is not null and tup.approved_date is null
                            and tup.evidence is null
                            then 'waiting penalty evidence|danger'
                        else 'on going|success'
                    end status
                from tb_transactions tt 
                    left join tb_books tb on tt.book_id = tb.book_id 
                    left join tb_users tu on tt.user_id = tu.user_id 
                    left join tb_user_penalties tup on tt.transaction_id = tup.transaction_id 
                where 1=1 and tt.trx_type = 'trx'
                $where
            group by tt.transaction_id, tb.book_id $order
            limit $limit offset $offset";
        $query_paginated = $this->db->query($paginated_sql);

        $result = [
            "recordsTotal" => intval($query_total->result_array()[0]["total_transaction"]),
            "recordsFiltered" => intval($query_filtered->result_array()[0]["total_transaction"]),
            "data" => $query_paginated->result_array()
        ];

        return $result;
    }

    public function approve_transaction($transaction_id){
        $sql = "UPDATE tb_transactions 
                   SET returned_date = submitted_date
                 WHERE transaction_id = $transaction_id";
        $this->db->query($sql);
    }

    public function assign_penalty($transaction_id, $penalty_type_id){
        $sql = "INSERT INTO tb_user_penalties (transaction_id, penalty_type_id)
                     VALUES ($transaction_id, $penalty_type_id)";
        $this->db->query($sql);
    }

}