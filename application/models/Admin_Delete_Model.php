<?php
	class Admin_Delete_Model extends CI_Model {
		public function delete($id){
			$this->db->where('ID', $id);
			$this->db->delete('product');
		}

		public function get_product($data){
			$query = $this->db->query("SELECT * FROM product WHERE ID=" . $data);

			return $query->result_array();
		}
	}
?>