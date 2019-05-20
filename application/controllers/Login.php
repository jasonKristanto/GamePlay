<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_Model');
	}

	public function index()
	{
		if(isset($this->session->nama)){
			redirect(base_url());
		}

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$this->load->view('pages/Login_View.php', $data);
	}

  public function login(){
    $login_user = $this->Login_Model->get_user($_POST['login_username'], $_POST['login_password']);
		if(sizeof($login_user) == 0){
			$this->session->set_userdata('login', 'gagal');
			redirect(base_url() . "Login");
		}
		else if(sizeof($login_user) > 0){
			$user = array(
				'nama'  => $login_user[0]['nama'] ,
				'username' => $login_user[0]['username'],
				'email' => $login_user[0]['email'],
				'login' => 'sukses'
			);
			$this->session->set_userdata($user);
			$_POST = NULL;
			$_GET= NULL;
			redirect(base_url());
		}
  }

	public function logout(){
		$this->session->unset_userdata('nama', 'username', 'email', 'login');

		redirect(base_url());
	}
}
