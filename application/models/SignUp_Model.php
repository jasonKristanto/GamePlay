<?php
	class SignUp_Model extends CI_Model {

		public function insert_user($value){
      $this->db->insert('user', $value);
		}
	}
?>
