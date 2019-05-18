<?php
	class User_Model extends CI_Model {

		public function get_products(){
			$query = $this->db->query("SELECT * FROM product");

			return $query->result_array();
		}

		public function get_product($value){
			$this->db->select('*');
      $this->db->from('product');
      $this->db->like('productName', $value);
      $query = $this->db->get();

			return $query->result_array();
		}

		public function get_genre(){
			$query = $this->db->query("SELECT * FROM genre");

			return $query->result_array();
		}
	}
?>
