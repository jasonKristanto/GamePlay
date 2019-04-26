<?php
	class Admin_Insert_Model extends CI_Controller {
		public function insert($values){
			echo $this->db->insert('product', $values);
		}
 
		public function get_genre(){
			$query = $this->db->query("SELECT genre FROM genre");

			return $query->result_array();
		}
	}
?>