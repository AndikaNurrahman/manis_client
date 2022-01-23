<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-2wjOYsW0Kd_CmesBp_Y_5v-I', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->library('Curl');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{

		$nama = $this->input->post('nama');
		$id = $this->input->post('id');
		$paket = $this->input->post('paket');
		$tarif = $this->input->post('tarif');
		$no = $this->input->post('no');
		// Required
		$transaction_details = array(
			'order_id' => $id,
			'gross_amount' => $tarif, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => $id,
			'price' => $tarif,
			'quantity' => '1',
			'name' => $paket
		);

		// Optional
		//$item2_details = array(
		//'id' => 'a2',
		//'price' => 20000,
		//'quantity' => 2,
		//'name' => "Orange"
		//);

		// Optional
		$item_details = array($item1_details);

		// Optional
		///	$billing_address = array(
		//  'first_name'    => "Andri",
		//  'last_name'     => "Litani",
		//  'address'       => "Mangga 20",
		//  'city'          => "Jakarta",
		//  'postal_code'   => "16602",
		//  'phone'         => "081122334455",
		//  'country_code'  => 'IDN'
		//);

		// Optional
		//$shipping_address = array(
		//  'first_name'    => "Obet",
		//  'last_name'     => "Supriadi",
		// 'address'       => "Manggis 90",
		// 'city'          => "Jakarta",
		//  'postal_code'   => "16601",
		//  'phone'         => "08113366345",
		//  'country_code'  => 'IDN'
		//	);

		// Optional
		$customer_details = array(
			'first_name'    => $nama,
			'last_name'     => "",
			'email'         => $nama,
			'phone'         => $no
			// 'billing_address'  => $billing_address,
			//'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);
		echo print_r($result);
		return false;
		$id = $result['order_id'];
		$data = array(
			'va_number' => $result['bank_transfer'][0]["va_number"],
			'bank' => $result['bank_transfer'][0]["bank"],
			'tanggal' => $result['transaction_time'],
			'pembayaran' => $result['payment_type'],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code'],
			'status' => $result['status_message'],
			'tarif_inv' => $result['gross_amount'],

		);

		$this->db->where('id_pelanggan', $id);
		$input = $this->db->update('tagihan', $data);
		if ($input) {
			$this->session->set_flashdata('message', 'Done!');
			redirect('/users');
		} else {
			$this->session->set_flashdata('message', 'Gagal menyimpan data!');
			redirect('/users');
		}
		//echo 'RESULT <br><pre>';
		//var_dump($result);
		//echo '</pre>' ;

	}
}
