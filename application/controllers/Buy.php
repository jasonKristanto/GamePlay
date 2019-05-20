<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Buy_Model');
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

		$data['user'] = $this->Buy_Model->get_user($this->session->username);
		$data['product'] = $this->Buy_Model->get_products($data['user'][0]['id']);

		if(sizeof($data['product']) <= 0){
			redirect(base_url());
		}

    $this->load->view('pages/Buy_View.php', $data);
	}

	public function checkout(){
		$nama = addslashes($this->security->xss_clean($this->input->post('checkout_nama')));
		$noHP = addslashes($this->security->xss_clean($this->input->post('checkout_HP')));
		$alamat = addslashes($this->security->xss_clean($this->input->post('checkout_alamat')));
		$kirim = addslashes($this->security->xss_clean($this->input->post('checkout_kirim')));
		$bayar = addslashes($this->security->xss_clean($this->input->post('checkout_bayar')));
		$total_bayar = addslashes($this->security->xss_clean($this->input->post('checkout_total_bayar')));
		$total = addslashes($this->security->xss_clean($this->input->post('checkout_total')));

		echo $nama . "<br>";
		echo $noHP . "<br>";
		echo $alamat . "<br>";
		echo $kirim . "<br>";
		echo $bayar . "<br>";
		echo $total_bayar . "<br>";
		echo $total . "<br>";

		if (strpos($nama, "[removed]") !== false || strpos($noHP, "[removed]") !== false || strpos($alamat, "[removed]") !== false || strpos($kirim, "[removed]") !== false || strpos($bayar, "[removed]") !== false || strpos($total_bayar, "[removed]") !== false || strpos($total, "[removed]") !== false) {
			$this->session->set_userdata('checkout', 'gagal');
			redirect(base_url() . "Buy");
		}

		if(!is_numeric($noHP) || !(strlen($noHP) != 0 && strlen($noHP) >= 10 && strlen($noHP) <= 12)){
			$this->session->set_userdata('checkout', 'gagal');
			redirect(base_url() . "Buy");
		}

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		date_default_timezone_set("Asia/Jakarta");
		$timestamp = time();

		echo date("F d, h:i A", $timestamp);

		if(!isset($this->session->nama)){
			redirect(base_url() . "Login");
		}

		$ID_Cust = $this->Buy_Model->get_ID_cust($this->session->username);
		$last_ID_trans = $this->Buy_Model->get_ID_trans();
		$checkout_product = $this->Buy_Model->get_products($ID_Cust[0]['id']);

		echo "<pre>";
		print_r($checkout_product);
		echo "</pre>";

		if(sizeof($checkout_product) <= 0){
			$this->session->set_userdata('checkout', 'gagal');
			redirect(base_url());
		}

		for ($i=0; $i < sizeof($checkout_product); $i++) {
			if($checkout_product[$i]['qty'] <= 0 && $checkout_product[$i]['qty'] > $checkout_product[$i]['stock']){
				$this->session->set_userdata('checkout', 'gagal');
				redirect(base_url());
			}
		}

		$trans_detail = array();
		$update_stock = array();

		$grand_total = $total + $kirim;
		$last_ID_trans = (int)$last_ID_trans[0]['ID_trans'] + 1;

		if($kirim == 10000){
			$jenis_kirim = "Reguler";
		}
		else if($kirim == 20000){
			$jenis_kirim = "Express";
		}

		$trans = array(
			'ID_Cust' => $ID_Cust[0]['id'],
			'nama_penerima' => $nama,
			'noHP_penerima' => $noHP,
			'alamat_penerima' => $alamat,
			'tanggalTransaksi' => $timestamp,
			'total' => $total,
			'jenis_kirim' => $jenis_kirim,
			'biaya_kirim' => $kirim,
			'jenis_pembayaran' => $bayar,
			'grand_total' => $grand_total
		);

		echo "<pre>";
		print_r($trans);
		echo "</pre>";

		for ($i=0; $i < sizeof($checkout_product); $i++) {
			$temp = array(
				'ID_trans' => $last_ID_trans,
				'ID_product' => $checkout_product[$i]['ID_product'],
				'qty' => $checkout_product[$i]['qty'],
				'harga' => $checkout_product[$i]['price']
			);

			$temp2 = array(
				'ID' => $checkout_product[$i]['ID_product'],
				'stock' => $checkout_product[$i]['stock'] - $checkout_product[$i]['qty']
			);

			array_push($trans_detail, $temp);
			array_push($update_stock, $temp2);

			echo $checkout_product[$i]['stock'] - $checkout_product[$i]['qty'];
		}

		$_POST = NULL;
		$_GET= NULL;

		$this->Buy_Model->update_product($update_stock);
		$this->Buy_Model->checkout($trans, $trans_detail);
		$this->Buy_Model->clearCart($ID_Cust[0]['id']);

		$this->session->set_userdata('checkout', 'sukses');

		redirect(base_url());
	}
}
