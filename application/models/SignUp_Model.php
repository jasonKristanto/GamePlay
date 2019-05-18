<?php
	class SignUp_Model extends CI_Model {

		public function insert_user($value){
      $this->db->insert('user', $value);
		}

		public function get_user($values){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('username', $values['username']);
			$this->db->or_where('nama', $values['nama']);
			$this->db->or_where('email', $values['email']);
			$query = $this->db->get();

			return $query->result_array();
		}
	}
?>
