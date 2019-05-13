<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Cart_Model');
	}

	public function index()
	{
		if(!isset($this->session->nama)){
			redirect(base_url() . "Login");
		}

		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);

    $data['product'] = $this->Cart_Model->get_products();

		$this->load->view('pages/Cart_View.php', $data);
	}

  public function insert_cart(){
		if(!isset($this->session->nama)){
			redirect(base_url() . "Login");
		}

		$product = $this->Cart_Model->get_product($_GET['id']);
		$product_cart = $this->Cart_Model->get_product_cart($_GET['id']);

		$qty = $_GET['qty'];

		$ID_Cust = $this->Cart_Model->get_ID_cust($this->session->username);

		if(sizeof($product_cart) > 0){
			$qty += $product_cart[0]['qty'];

			$values = array(
				'ID_cust' => $ID_Cust[0]['id'],
				'ID_product' => $product_cart[0]['ID_product'],
				'productName' => $product[0]['productName'],
				'qty' => $qty
			);

			$this->Cart_Model->replace_product($values);
		}
		else {
			$values = array(
				'ID_cust' => $ID_Cust[0]['id'],
	      'ID_product' => $product[0]['ID'],
	      'productName' => $product[0]['productName'],
	      'qty' => $qty
	    );

			$this->Cart_Model->insert_cart($values);
		}

		if($_GET['cart'] == 1){
			$_POST = NULL;
			$_GET= NULL;
			redirect(base_url() . "Cart");
		}

		else if($_GET['cart'] == 0){
			$_POST = NULL;
			$_GET= NULL;
			redirect(base_url());
		}
  }

	public function remove(){
		if(!isset($this->session->nama)){
			redirect(base_url() . "Login");
		}

		$this->Cart_Model->remove_product($_GET['id']);

		$_POST = NULL;
		$_GET= NULL;

		redirect(base_url() . "Cart");
	}

	public function update_qty(){
		if(!isset($this->session->nama)){
			redirect(base_url() . "Login");
		}

		$product_cart = $this->Cart_Model->get_product_cart($_GET['id']);

		if(sizeof($product_cart) > 0){
			$values = array(
				'ID_product' => $product_cart[0]['ID_product'],
				'productName' => $product_cart[0]['productName'],
				'qty' => $_POST['cart_qty']
			);

			$this->Cart_Model->replace_product($values);
		}

		$_POST = NULL;
		$_GET= NULL;

		redirect(base_url() . "Cart");
	}
}
