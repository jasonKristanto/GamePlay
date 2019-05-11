<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Detail_Model');
	}

	public function index()
	{
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$data['product'] = $this->Detail_Model->get_product($_GET['id']);
		$data['genre'] = $this->Detail_Model->get_genre();

		$this->load->view('pages/Detail_View.php', $data);
	}

	public function detail(){
		if($this->input->post('Cancel')){
			$_POST = NULL;
			$_GET= NULL;
			redirect(base_url());
		}
		else if($this->input->post('Buy')){
			if(!isset($this->session->nama)){
				redirect(base_url() . "Login");
			}
			redirect(base_url() . "Cart/insert_cart?id=" . $_POST['detail_ID'] . "&qty=" . $_POST['detail_qty'] . "&cart=1");
		}
		else if($this->input->post('Cart')){
			if(!isset($this->session->nama)){
				redirect(base_url() . "Login");
			}
			redirect(base_url() . "Cart/insert_cart?id=" . $_POST['detail_ID'] . "&qty=" . $_POST['detail_qty'] . "&cart=0");
		}
	}
}
