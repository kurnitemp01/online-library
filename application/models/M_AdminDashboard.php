<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AdminDashboard extends CI_Model {

    public function get_total_trx(){
        $sql = "with 
                total_trx as 
                    (select count(*) total_trx
                    from tb_transactions tt ),
                trx_due_not_retur as
                    (select count(*) trx_due
                        from tb_transactions
                    where returned_date is null 
                        and end_date < current_date() 
                        and returned_date is null 
                        and submitted_date is null),
                trx_due_with_retur as 
                    (select count(*) penalty_due
                        from tb_transactions
                    where returned_date is null 
                        and end_date < current_date() 
                        and submitted_date is not null)
                select *, round((penalty_due + trx_due) / total_trx * 100) due_percentage,
                     trx_due + penalty_due total_due
                from total_trx, trx_due_not_retur, trx_due_with_retur";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_top_book($limit){
        $sql = "select distinct tb.*,
                        concat(tu.first_name,' ',tu.last_name) author_name, 
                        group_concat(tbt.book_type_name separator ', ') book_type,
                        4 rating
                    from tb_books tb,
                        tb_book_types tbt,
                        tb_book_type_relations tbtr,
                        tb_users tu
                where 1=1
                    and tb.book_id = tbtr.book_id 
                    and tbtr.book_type_id = tbt.book_type_id 
                    and tu.user_id = tb.author_id
                group by tb.book_id
                order by (select count(*) from tb_transactions tt where tt.book_id = tb.book_id) desc
                limit " . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}