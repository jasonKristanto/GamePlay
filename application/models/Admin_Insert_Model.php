<?php
	class Admin_Insert_Model extends CI_Model {
		public function insert($values){
			$this->db->insert('product', $values);
		}

		public function get_genre(){
			$query = $this->db->query("SELECT genre FROM genre");

			return $query->result_array();
		}

		public function get_products($values){
			$this->db->select('*');
			$this->db->from('product');
			$this->db->where('productName', $values);
			$query = $this->db->get();

			return $query->result_array();
		}
	}
?>
