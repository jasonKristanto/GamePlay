<?php
	class Admin_User_Model extends CI_Controller {
		public function get_users(){
			return $this->db->get('user')->result_array();
		}
	}
?>
