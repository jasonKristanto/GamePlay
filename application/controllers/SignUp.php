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
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
		
		if($this->input->post('Submit') && $this->input->post('signup_password') == $this->input->post('signup_confpassword') && is_numeric($this->input->post('signup_HP'))){
			if(strlen($this->input->post('signup_username')) != 0 && strlen($this->input->post('signup_password')) != 0 && strlen($this->input->post('signup_nama')) != 0 && strlen($this->input->post('signup_email')) != 0 && strlen($this->input->post('signup_HP')) != 0 && strlen($this->input->post('signup_alamat')) != 0){
				$values = array(
	        'username' => $this->input->post('signup_username'),
	        'password' => $this->input->post('signup_password'),
	        'nama' => $this->input->post('signup_nama'),
					'nomor_handphone' =>$this->input->post('signup_HP'),
	        'email' => $this->input->post('signup_email'),
	        'alamat' => $this->input->post('signup_alamat'),
					'picture' => "profilePict.png"
	      );

				$user = $this->SignUp_Model->get_user($values);

				if(sizeof($user) >= 1){
					$this->session->set_userdata('signUp', 'sama');
					$_POST = NULL;
					$_GET= NULL;
					redirect(base_url() . "SignUp");
				}

	      $this->SignUp_Model->insert_user($values);

				$_POST = NULL;
				$_GET= NULL;
				$this->session->unset_userdata('signUp');
	      redirect(base_url() . "Login");
			}
			else {
				$this->session->set_userdata('signUp', 'gagal');
				$_POST = NULL;
				$_GET= NULL;
	      redirect(base_url() . "SignUp");
			}
    }
    else {
			$this->session->set_userdata('signUp', 'gagal');
			$_POST = NULL;
			$_GET= NULL;
			if($this->input->post('signup_password') != $this->input->post('signup_confpassword')){
				$data['error'] = "Password doesn't match";
			}
			if(!is_numeric($this->input->post('signup_HP'))){
				$data['errorNum'] = "Phone number must contain numbers";
			}
			$this->load->view('pages/SignUp_View.php', $data);
      //redirect(base_url() . "SignUp");
    }
  }
}
