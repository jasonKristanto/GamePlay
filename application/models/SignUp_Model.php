<?php
	class SignUp_Model extends CI_Controller {

		public function insert_user($value){
      $this->db->insert('user', $value);
		}
	}
?>
