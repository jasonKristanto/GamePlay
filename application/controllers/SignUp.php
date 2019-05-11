<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('SignUp_Model');
	}

	public function index()
	{
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$this->load->view('pages/SignUp_View.php', $data);
	}

  public function signUp(){
		if($this->input->post('Submit')){
			if(strlen($this->input->post('signup_username')) != 0 && strlen($this->input->post('signup_password')) != 0 && strlen($this->input->post('signup_nama')) != 0 && strlen($this->input->post('signup_email')) != 0 && strlen($this->input->post('signup_alamat')) != 0){
				$values = array(
	        'username' => $this->input->post('signup_username'),
	        'password' => $this->input->post('signup_password'),
	        'nama' => $this->input->post('signup_nama'),
	        'email' => $this->input->post('signup_email'),
	        'alamat' => $this->input->post('signup_alamat')
	      );

	      $this->SignUp_Model->insert_user($values);
			}
			$_POST = NULL;
			$_GET= NULL;
      redirect(base_url());
    }
    else {
			$_POST = NULL;
			$_GET= NULL;
      redirect(base_url());
    }
  }
}
