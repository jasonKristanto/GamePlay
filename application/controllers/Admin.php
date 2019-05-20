<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_Home_Model');
	}

	public function index()
	{
		if(!$this->session->userdata('admin')) $this->session->set_userdata('admin', false);
		$admin['login'] = $this->session->userdata('admin');

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/Admin_header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/Admin_footer.php', NULL, TRUE);
		$data['sidebar'] = $this->load->view('pages/Admin_sidebar.php', NULL, TRUE);
		$data['login'] = $this->load->view('pages/Admin_login.php', $admin, TRUE);

		$data['product'] = $this->Admin_Home_Model->get_product();
		$data['genre'] = $this->Admin_Home_Model->get_genre();

		$this->load->view('pages/Admin_Home_View.php', $data);
	}

	public function login(){
		$username = addslashes($this->security->xss_clean($_POST['username']));
		$pass = addslashes($this->security->xss_clean($_POST['password']));

		if(fnmatch("*[[]removed[]]*", $username) || fnmatch("*[[]removed[]]*", $pass)){
			$this->session->set_userdata('loginAdmin', 'gagal');
			$this->session->set_userdata('admin', false);
			redirect(base_url() . "Login");
		}

		$user = $this->Admin_Home_Model->get_admin($_POST['username'], $_POST['password']);

		$_POST = NULL;
		$_GET  = NULL;

		if(sizeof($user) > 0){
			$this->session->set_userdata('admin', true);
		}
		else {
			$this->session->set_userdata('admin', false);
			$this->session->set_userdata('loginAdmin', 'gagal');
		}
		redirect('Admin');
	}

	public function logout(){
		$this->session->set_userdata('admin', false);
		redirect('Admin');
	}
}
