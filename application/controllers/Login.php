<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login_Model');
	}

	public function index()
	{
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$this->load->view('pages/Login_View.php', $data);
	}

  public function login(){
    $user = $this->Login_Model->get_user($_POST['login_username'], $_POST['login_password']);

    if(empty($user)){
      redirect(base_url() . 'Login/?status=gagal');
    }
    else {
      redirect(base_url());
    }
  }
}
