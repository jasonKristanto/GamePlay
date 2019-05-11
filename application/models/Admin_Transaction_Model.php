<?php
	class Admin_Transaction_Model extends CI_Model {
		public function get_trans(){
			$this->db->select('*');
      $this->db->from('transaction');
			$this->db->where('ID_trans !=', 1);
      $query = $this->db->get();

			return $query->result_array();
		}
		public function get_trans_detail($id){
			$this->db->select('*');
      $this->db->from('transaction_detail');
			$this->db->where('transaction_detail.ID_trans', $id);
			$this->db->join('product', 'product.ID = transaction_detail.ID_product');
			$this->db->join('transaction', 'transaction.ID_trans = transaction_detail.ID_trans');
			$this->db->join('user', 'user.id = transaction.ID_cust');
      $query = $this->db->get();

			return $query->result_array();
		}
	}
?>
