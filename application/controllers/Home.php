<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Home_Model');
	}

	public function index()
	{
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		$data['product'] = $this->Home_Model->get_products();
		$data['genre'] = $this->Home_Model->get_genre();

		$data2['product'] = $data['product'];
		$data['carousel'] = $this->load->view('pages/Home_Carousel.php', $data2, TRUE);

		$this->load->view('pages/Home_View.php', $data);
	}

	public function search(){
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

		if(strlen($_POST['search']) <= 0){
			redirect(base_url());
		}

		$data['product'] = $this->Home_Model->get_product($_POST['search']);

		$_POST = NULL;
		$_GET= NULL;

		$this->load->view('pages/Home_View.php', $data);
	}
}
