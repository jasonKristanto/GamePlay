<?php
	class Cart_Model extends CI_Model {
		public function get_products($id){
      $this->db->select('*');
      $this->db->from('cart');
			$this->db->where('ID_cust', $id);
      $this->db->join('product', 'product.ID = cart.ID_product');
      $query = $this->db->get();

			return $query->result_array();
		}

		public function get_ID_cust($value){
			$this->db->select('id');
      $this->db->from('user');
      $this->db->where('username', $value);
      $query = $this->db->get();

			return $query->result_array();
		}

    public function get_product($id){
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('ID', $id);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function get_product_cart($id, $id_cust){
      $this->db->select('*');
      $this->db->from('cart');
      $this->db->where('ID_product', $id);
			$this->db->where('ID_Cust', $id_cust);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function replace_product($values){
			$this->db->set('qty', $values['qty'], FALSE);
			$this->db->where('ID_cust', $values['ID_cust']);
			$this->db->where('ID_product', $values['ID_product']);
			$this->db->update('cart');
		}

		public function remove_product($id, $id_cust){
			$this->db->where('ID_product', $id);
			$this->db->where('ID_Cust', $id_cust);
			$this->db->delete('cart');
		}

		public function insert_cart($values){
      $this->db->insert('cart', $values);
		}
	}
?>
