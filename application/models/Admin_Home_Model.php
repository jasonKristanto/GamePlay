<?php
	class Admin_Home_Model extends CI_Model {

		public function get_product(){
			$query = $this->db->query("SELECT * FROM product");

			return $query->result_array();
		}

		public function get_genre(){
			$query = $this->db->query("SELECT * FROM genre");

			return $query->result_array();
		}
	}
?>