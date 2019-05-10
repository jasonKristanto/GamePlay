<?php
	class Admin_User_Model extends CI_Model {
		public function get_users(){
			return $this->db->get('user')->result_array();
		}
	}
?>
