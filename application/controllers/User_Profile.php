<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Profile extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
	}

	public function index()
	{
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$data['user'] = $this->User_Model->get_user($this->session->username);
		$data['transaction'] = $this->User_Model->get_transaction($data['user'][0]['id']);

		$this->load->view('pages/Profile_View.php', $data);
	}

	public function trans_detail(){
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$data['user'] = $this->User_Model->get_user($this->session->username);
		$data['transaction'] = $this->User_Model->get_trans_detail($_GET['id']);

		// echo "<pre>";
		// print_r($data['transaction']);
		// echo "</pre>";

		$this->load->view('pages/Transaction_View.php', $data);
	}
	public function edit_profile(){
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$data['error'] = "Password doesn't match";
		$data['errorNum'] = "Phone number must contain numbers and have minimal length of 10 and maximal length of 12";

		$data['user'] = $this->User_Model->get_user($this->session->username);

		$this->load->view('pages/Edit_Profile_View.php', $data);
	}

	public function edit_action(){
		$user = $this->User_Model->get_user($this->session->username);

		$username = addslashes($this->security->xss_clean($this->input->post('edit_username')));
		$password = addslashes($this->security->xss_clean($this->input->post('edit_password')));
		$repas =  addslashes($this->security->xss_clean($this->input->post('edit_retypepassword')));
		$nama = addslashes($this->security->xss_clean($this->input->post('edit_nama')));
		$nomor_handphone = addslashes($this->security->xss_clean($this->input->post('edit_HP')));
		$email = addslashes($this->security->xss_clean($this->input->post('edit_email')));
		$alamat = addslashes($this->security->xss_clean($this->input->post('edit_alamat')));

		if (strpos($username, "[removed]") !== false || strpos($password, "[removed]") !== false || strpos($repas, "[removed]") !== false || strpos($nama, "[removed]") !== false || strpos($email, "[removed]") !== false || strpos($nomor_handphone, "[removed]") !== false || strpos($alamat, "[removed]") !== false) {
			$this->session->set_userdata('edit', 'gagal');
			redirect(base_url() . "User_Profile/edit_profile");
		}

		if(!is_numeric($nomor_handphone) || !(strlen($nomor_handphone) != 0 && strlen($nomor_handphone) >= 10 && strlen($nomor_handphone) <= 12)){
			$this->session->set_userdata('edit', 'gagal');
			$this->session->set_userdata('editHP', 'gagal');
			redirect(base_url() . "User_Profile/edit_profile");
		}

		if(strlen($this->input->post('edit_retypepassword')) <= 0){
			$repas = $user[0]['password'];
		}

		if($this->input->post('Submit') && $password == $repas){
			if(strlen($this->input->post('edit_username')) <= 0){
				$username = $user[0]['username'];
			}
			if(strlen($this->input->post('edit_password')) <= 0){
				$password = $user[0]['password'];
			}
			if(strlen($this->input->post('edit_nama')) <= 0){
				$nama = $user[0]['nama'];
			}
			if(strlen($this->input->post('edit_HP')) <= 0){
				$nomor_handphone = $user[0]['nomor_handphone'];
			}
			if(strlen($this->input->post('edit_email')) <= 0){
				$email = $user[0]['email'];
			}
			if(strlen($this->input->post('edit_alamat')) <= 0){
				$alamat = $user[0]['alamat'];
			}
			if($_FILES['edit_file']['name'] == ""){
				$picture = $user[0]['picture'];

				$values = array(
					'id' => $this->input->post('edit_id'),
	        'username' => $username,
	        'password' => $password,
	        'nama' => $nama,
					'nomor_handphone' => $nomor_handphone,
	        'email' => $email,
	        'alamat' => $alamat,
					'picture' => $picture
	      );
			}

			if($_FILES['edit_file']['name'] != ""){
				$config['upload_path']          = './assets/pict_user/';
        $config['allowed_types']        = 'jpg|png|';

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        $proses = $this->upload->do_upload('edit_file');

				$values = array(
					'id' => $this->input->post('edit_id'),
	        'username' => $username,
	        'password' => $password,
	        'nama' => $nama,
					'nomor_handphone' => $nomor_handphone,
	        'email' => $email,
	        'alamat' => $alamat,
					'picture' => $this->upload->data()['file_name']
	      );
			}
			echo "<pre>";
			print_r( $values);
			echo "</pre>";

			$user_validate = $this->User_Model->get_user_validate($values);

			if(sizeof($user_validate) >= 2){
				for ($i=0; $i < sizeof($user_validate); $i++) {
					echo $user_validate[$i]['username'] . "<br>";
					echo $values['username'] . "<br>";
					echo $values['username'] . "<br>";
					echo $user[0]['username'] . "<br>";
					if($user_validate[$i]['username'] == $values['username'] && $values['username'] != $user[0]['username']){
						$this->session->set_userdata('edit', 'sama');
						$_POST = NULL;
						$_GET= NULL;
						redirect(base_url() . "User_Profile/edit_profile");
						echo "masuk";
					}
					echo "<br>";
				}
			}

      $this->User_Model->edit_user($values);

			$_POST = NULL;
			$_GET= NULL;
			$this->session->unset_userdata('edit');
      redirect(base_url() . "User_Profile");
    }
		else if($this->input->post('Cancel')){
			$_POST = NULL;
			$_GET= NULL;
			$this->session->unset_userdata('edit');
      redirect(base_url() . "User_Profile");
		}
    else {
			$this->session->set_userdata('edit', 'gagal');

			$_POST = NULL;
			$_GET= NULL;

			if($password != $repas){
				$this->session->set_userdata('editPass', 'gagal');
			}

			if(!is_numeric($nomor_handphone)){
				$this->session->set_userdata('editHP', 'gagal');
			}

			redirect(base_url() . "User_Profile/edit_profile");
  	}
	}
}
