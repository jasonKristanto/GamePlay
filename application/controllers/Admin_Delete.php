<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Delete extends CI_Controller {
	public $id;

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_Delete_Model');
	}

	public function index()
	{
		if(!$this->session->userdata('admin')) redirect(base_url() . 'Admin');

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/Admin_header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/Admin_footer.php', NULL, TRUE);

		$id = $_GET['product_id'];

		$data['product'] = $this->Admin_Delete_Model->get_product($id);

		$this->load->view('pages/Admin_Delete_View.php', $data);
	}

	public function delete_action(){
		if($this->input->post('Cancel')){
			redirect(base_url() . 'Admin');
		}
		else if ($this->input->post('Delete')){
			$this->Admin_Delete_Model->delete($this->input->post('delete_id'));
			
			redirect(base_url() . 'Admin');
		}
	}
}
