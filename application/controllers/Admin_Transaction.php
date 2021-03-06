<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Transaction extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_Transaction_Model');
	}

	public function index()
	{
		if(!$this->session->userdata('admin')) redirect(base_url() . 'Admin');

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/Admin_header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/Admin_footer.php', NULL, TRUE);
		$data['sidebar'] = $this->load->view('pages/Admin_sidebar.php', NULL, TRUE);

		$data['transaction'] = $this->Admin_Transaction_Model->get_trans();


		$this->load->view('pages/Admin_Transaction_View.php', $data);
	}

	public function trans_detail(){
		if(!$this->session->userdata('admin')) $this->session->set_userdata('admin', false);
		$admin['login'] = $this->session->userdata('admin');

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/Admin_header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/Admin_footer.php', NULL, TRUE);
		$data['sidebar'] = $this->load->view('pages/Admin_sidebar.php', NULL, TRUE);
		$data['login'] = $this->load->view('pages/Admin_login.php', $admin, TRUE);

		$data['trans_detail'] = $this->Admin_Transaction_Model->get_trans_detail($_GET['id']);

		$this->load->view('pages/Admin_Trans_Detail_View.php', $data);
	}
}
