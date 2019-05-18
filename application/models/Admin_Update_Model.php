<?php
	class Admin_Update_Model extends CI_Model {
		public function update($data){
			$this->db->replace('product', $data);
		}

		public function get_product($data){
			$query = $this->db->query("SELECT * FROM product WHERE ID=" . $data);

			return $query->result_array();
		}

		public function get_genre(){
			$query = $this->db->query("SELECT * FROM genre");

			return $query->result_array();
		}

		public function get_products($values){
			$this->db->select('productName');
			$this->db->from('product');
			$this->db->where('productName', $values);
			$query = $this->db->get();

			return $query->result_array();
		}
	}
?>
