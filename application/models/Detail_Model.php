<?php
	class Detail_Model extends CI_Controller {

		public function get_product($id){
			$this->db->where('id', $id);
			$query = $this->db->get('product');

			return $query->result_array();
		}

		public function get_genre(){
			$query = $this->db->query("SELECT * FROM genre");

			return $query->result_array();
		}
	}
?>