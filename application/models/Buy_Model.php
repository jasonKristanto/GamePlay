<?php
	class Buy_Model extends CI_Model {
		public function get_products(){
      $this->db->select('*');
      $this->db->from('cart');
      $this->db->join('product', 'product.ID = cart.ID_product');
      $query = $this->db->get();

			return $query->result_array();
		}

		public function checkout($trans, $trans_detail){
			$this->db->insert('transaction', $trans);

			for ($i=0; $i < sizeof($trans_detail); $i++) {
				$this->db->insert('transaction_detail', $trans_detail[$i]);
			}
		}

		public function update_product($values){
			for ($i=0; $i < sizeof($values); $i++) {
				$this->db->set('stock', $values[$i]['stock'], FALSE);
				$this->db->where('ID', $values[$i]['ID']);
				$this->db->update('product');
			}
		}

		public function get_ID_cust($value){
			$this->db->select('id');
      $this->db->from('user');
      $this->db->where('username', $value);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function get_user($values){
			$this->db->select('*');
      $this->db->from('user');
      $this->db->where('username', $values);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function get_ID_trans(){
			$this->db->select('ID_trans');
      $this->db->from('transaction');
      $this->db->order_by('ID_trans', 'DESC');
			$this->db->limit(1);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function clearCart($value){
			$query = $this->db->delete('cart', array('ID_cust' => $value));
			print_r($query);
		}
	}
?>
