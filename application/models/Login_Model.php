<?php
	class Login_Model extends CI_Controller {

		public function get_user($user, $pass){
      $this->db->where('username', $user);
      $this->db->where('password', $pass);
			$query = $this->db->get('user');

			return $query->result_array();
		}
	}
?>
