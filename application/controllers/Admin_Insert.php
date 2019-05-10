<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Insert extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_Insert_Model');
	}

	public function index()
	{
		if(!$this->session->userdata('admin')) redirect(base_url() . 'Admin');

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/Admin_header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/Admin_footer.php', NULL, TRUE);
		$data['sidebar'] = $this->load->view('pages/Admin_sidebar.php', NULL, TRUE);

		$data['genre'] = $this->Admin_Insert_Model->get_genre();

		$this->load->view('pages/Admin_Insert_View.php', $data);
	}


	public function insert_action(){
		if($this->input->post('Cancel')){
			redirect(base_url() . 'Admin');
		}
		else if ($this->input->post('Submit')){
			redirect(base_url() . 'Admin');
			$sizeCheckBox = count($this->input->post('insert_genre'));

			$config['upload_path']          = './assets/pict_product/';
	    $config['allowed_types']        = 'jpg|png|';

      $this->load->library("upload", $config);
      $this->upload->initialize($config);

      $proses = $this->upload->do_upload('insert_file');

      $arr = "";

	    if($proses){
				for ($i=0; $i < $sizeCheckBox; $i++) {
					if($arr > 0){
						$arr .= ";";
					}

					if($this->input->post('insert_genre')[$i] == 'action'){
						$arr .= "1";
					}
					else if($this->input->post('insert_genre')[$i] == 'adventure'){
						$arr .= "2";
					}
					else if($this->input->post('insert_genre')[$i] == 'music'){
						$arr .= "3";
					}
				}

				$values = array(
					'productName' => $this->input->post('insert_nama'),
					'price' => $this->input->post('insert_price'),
					'stock' => $this->input->post('insert_stock'),
					'developer' => $this->input->post('insert_dev'),
					'description' => $this->input->post('insert_desc'),
					'picture' => $this->upload->data()['file_name'],
					'genreID' => $arr
				);

				$this->Admin_Insert_Model->insert($values);

				redirect(base_url() . 'Admin');
			}
			else {
				redirect(base_url() . 'Admin');
			}
		}
	}
}
