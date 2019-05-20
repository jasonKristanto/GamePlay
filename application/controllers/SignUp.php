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

		$data['error'] = "Password doesn't match";
		$data['errorNum'] = "Phone number must contain numbers and have minimal length of 10 and maximal length of 12";

		$this->load->view('pages/SignUp_View.php', $data);
	}

  public function signUp(){
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		$username = addslashes($this->security->xss_clean($this->input->post('signup_username')));
		$password = addslashes($this->security->xss_clean($this->input->post('signup_password')));
		$conf_pass = addslashes($this->security->xss_clean($this->input->post('signup_confpassword')));
		$nama = addslashes($this->security->xss_clean($this->input->post('signup_nama')));
		$email = addslashes($this->security->xss_clean($this->input->post('signup_email')));
		$noHP = addslashes($this->security->xss_clean($this->input->post('signup_HP')));
		$alamat = addslashes($this->security->xss_clean($this->input->post('signup_alamat')));

		echo $username . "<br>";
		echo $password . "<br>";
		echo $conf_pass . "<br>";
		echo $nama . "<br>";
		echo $email . "<br>";
		echo $noHP . "<br>";
		echo $alamat . "<br>";

		if (strpos($username, "[removed]") !== false || strpos($password, "[removed]") !== false || strpos($conf_pass, "[removed]") !== false || strpos($nama, "[removed]") !== false || strpos($email, "[removed]") !== false || strpos($noHP, "[removed]") !== false || strpos($alamat, "[removed]") !== false) {
			$this->session->set_userdata('signUp', 'gagal');
			redirect(base_url() . "SignUp");
		}

		if(!is_numeric($noHP)){
			$this->session->set_userdata('signUp', 'gagal');
			redirect(base_url() . "SignUp");
		}

		if($this->input->post('Submit') && $password == $conf_pass) {
			if(strlen($username) != 0 && strlen($password) != 0 && strlen($conf_pass) != 0 && strlen($nama) != 0 && strlen($email) != 0 && (strlen($noHP) != 0 && strlen($noHP) >= 10 && strlen($noHP) <= 12) && strlen($alamat) != 0){
				$values = array(
	        'username' => $username,
	        'password' => $password,
	        'nama' => $conf_pass,
					'nomor_handphone' => $noHP,
	        'email' => $email,
	        'alamat' => $alamat,
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
		else if($this->input->post('Cancel')){
			$_POST = NULL;
			$_GET= NULL;
			redirect(base_url());
		}
    else {
			$this->session->set_userdata('signUp', 'gagal');
			$_POST = NULL;
			$_GET= NULL;
			if($password != $conf_pass){
				$this->session->set_userdata('signUp_password', 'gagal');
			}
			if(!is_numeric($noHP)){
				$this->session->set_userdata('signUp_HP', 'gagal');
			}
			redirect(base_url() . "SignUp");
    }
  }
}
