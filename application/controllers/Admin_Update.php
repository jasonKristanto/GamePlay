<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Update extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_Update_Model');
	}

	public function index()
	{
		if(!$this->session->userdata('admin')) redirect(base_url() . 'Admin');

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/Admin_header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/Admin_footer.php', NULL, TRUE);
		$data['sidebar'] = $this->load->view('pages/Admin_sidebar.php', NULL, TRUE);

		$data['product'] = $this->Admin_Update_Model->get_product($_GET['product_id']);
		$data['genre'] = $this->Admin_Update_Model->get_genre();

		$this->load->view('pages/Admin_Update_View.php', $data);
	}

	public function update_action(){
		if($this->input->post('Cancel')){
			$_POST = NULL;
			$_GET= NULL;
			$_FILES = NULL;
			redirect(base_url() . 'Admin');
		}
		else if ($this->input->post('Update')){
			$cek = 0;
			$product = $this->Admin_Update_Model->get_product($_GET['id']);
			$product_validate = $this->Admin_Update_Model->get_products($this->input->post('update_nama'));

      $sizeCheckBox = count($this->input->post('update_genre'));

			$arr = "";

			$nama = addslashes($this->security->xss_clean($this->input->post('update_nama')));
			$price = addslashes($this->security->xss_clean($this->input->post('update_price')));
			$stock = addslashes($this->security->xss_clean($this->input->post('update_stock')));
			$dev = addslashes($this->security->xss_clean($this->input->post('update_dev')));
			$desc = addslashes($this->security->xss_clean($this->input->post('update_desc')));

			if(fnmatch("*[[]removed[]]*", $nama) || fnmatch("*[[]removed[]]*", $price) || fnmatch("*[[]removed[]]*", $stock) || fnmatch("*[[]removed[]]*", $dev) || fnmatch("*[[]removed[]]*", $desc)){
				$this->session->set_userdata('update', 'gagal');
				$_POST = NULL;
				$_GET= NULL;
				redirect(base_url() . "Admin_Update");
			}

			if($product_validate[0]['productName'] != $product[0]['productName']){
				echo $product_validate[$i] . "<br>";
				$this->session->set_userdata('update', 'sama');
				$_POST = NULL;
				redirect(base_url() . "Admin_Update?product_id=" . $_GET['id']);
			}

			for ($i=0; $i < $sizeCheckBox; $i++) {
				if($arr > 0){
					$arr .= ";";
				}

				if($this->input->post('update_genre')[$i] == 'action'){
					$arr .= "1";
				}
				else if($this->input->post('update_genre')[$i] == 'adventure'){
					$arr .= "2";
				}
				else if($this->input->post('update_genre')[$i] == 'music'){
					$arr .= "3";
				}
			}

			if($_FILES['update_file']['name'] == ""){
				$values = array(
					'ID' => $this->input->post('update_id'),
					'productName' => $this->input->post('update_nama'),
					'price' => $this->input->post('update_price'),
					'stock' => $this->input->post('update_stock'),
					'developer' => $this->input->post('update_dev'),
					'description' => $this->input->post('update_desc'),
					'picture' => $product[0]['picture'],
					'genreID' => $arr
				);
			}
			else {
				$config['upload_path']          = './assets/pict_product/';
        $config['allowed_types']        = 'jpg|png|';

        $this->load->library("upload", $config);
        $this->upload->initialize($config);

        $proses = $this->upload->do_upload('update_file');

        if($proses){
        	$values = array(
						'ID' => $this->input->post('update_id'),
						'productName' => $this->input->post('update_nama'),
						'price' => $this->input->post('update_price'),
						'stock' => $this->input->post('update_stock'),
						'developer' => $this->input->post('update_dev'),
						'description' => $this->input->post('update_desc'),
						'picture' => $this->upload->data()['file_name'],
						'genreID' => $arr
					);
					// echo "<pre>";
					// print_r($this->upload->data());
					// echo "</pre>";
        }
        else {
					// echo "<pre>";
					// print_r($this->upload->display_errors());
					// echo "</pre>";
					$this->session->set_userdata('update', 'gagal');
					$_POST = NULL;
					redirect(base_url() . "Admin_Update?product_id =" . $_GET['id']);
        }
			}

			$this->Admin_Update_Model->update($values);

			$_POST = NULL;
			$_GET= NULL;
			$_FILES = NULL;

			redirect(base_url() . 'Admin');
		}
	}
}
