<?php
	class Cart_Model extends CI_Model {
		public function get_products(){
      $this->db->select('*');
      $this->db->from('cart');
      $this->db->join('product', 'product.ID = cart.ID_product');
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

		public function get_product_cart($id){
      $this->db->select('*');
      $this->db->from('cart');
      $this->db->where('ID_product', $id);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function replace_product($values){
      $this->db->replace('cart', $values);
		}

		public function remove_product($id){
			$this->db->where('ID_product', $id);
			$this->db->delete('cart');
		}

		public function insert_cart($values){
      $this->db->insert('cart', $values);
		}
	}
?>
