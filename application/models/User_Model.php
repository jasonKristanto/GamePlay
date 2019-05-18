<?php
	class User_Model extends CI_Model {

		public function get_user($value){
			$this->db->select('*');
      $this->db->from('user');
      $this->db->where('username', $value);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function get_user_validate($values){
			$this->db->select('username');
      $this->db->from('user');
      $this->db->where('username', $values['username']);
			$this->db->or_where('nama', $values['nama']);
			$this->db->or_where('email', $values['email']);
			$query = $this->db->get();

			return $query->result_array();
		}

		public function edit_user($data){
			$this->db->replace('user', $data);
		}

		public function get_transaction($value){
			$this->db->select('*');
      $this->db->from('transaction');
      $this->db->where('ID_cust', $value);
			$this->db->join('transaction_detail', 'transaction_detail.ID_trans = transaction.ID_trans');
			$this->db->join('product', 'product.ID = transaction_detail.ID_product');
			$query = $this->db->get();

			return $query->result_array();
		}

		public function get_trans_detail($value){
			$this->db->select('*');
      $this->db->from('transaction');
      $this->db->where('transaction.ID_trans', $value);
			$this->db->join('transaction_detail', 'transaction_detail.ID_trans = transaction.ID_trans');
			$this->db->join('product', 'product.ID = transaction_detail.ID_product');
			$query = $this->db->get();

			return $query->result_array();
		}
	}
?>
