<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends MY_Controller
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct(); // you have missed this line.
		$this->load->library('session');
		$this->load->helper('format_ind');
		$this->load->database();
		$this->load->helper('date');
	}

	public function index()
	{
		
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}

		$API = new Mikweb();
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];

		$this->db->where('status_code', '1');
		$query = $this->db->get('tagihan');

		$data['tagihan'] = $query;


		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Sudah Lunas';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);
		$this->load->view('/pembayaran/index', $data);
		$this->load->view('/_template/footer');
	}
	public function belum()
	{
		
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}

		$API = new Mikweb();
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];

		$this->db->where('status_code', '0');
		$query = $this->db->get('tagihan');

		$data['tagihan'] = $query;


		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Belum Lunas';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);
		$this->load->view('/pembayaran/belum', $data);
		$this->load->view('/_template/footer');
	}

	function bayar()
	{
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}

		$id = $this->input->post('id');
		$pembayaran = $this->input->post('pembayaran');
		$periode = date('F Y');
		$paket = $this->input->post('paket');
		$user = $this->input->post('admin');
		$tarif = $this->input->post('tarif');
		$phone = $this->input->post('nomor');
		$message = $this->db->get_where('text', ['text_id' => '3'])->row_array();
		$this->db->where('tagihan_id', $id);
		$this->db->set('status_code', 1);
		$this->db->set('pembayaran', $pembayaran);
		$test = $this->db->update('tagihan');
		if ($test) {
			//$token = $this->db->get_where('settings', ['apiwa' => '1'])->row_array();
			//Apiwa($phone, $message, $token);
			$data = [
                'nama' => 'Pemasukan Tagihan Wifi  '.$paket.' periode '.$periode.' melalui admin '.$user.'',
                'tarif' => $tarif,
                'keterangan' => 'Pemasukan'
	];
            $input = $this->db->insert('transaksi', $data);
			$this->session->set_flashdata('message', 'Sudah Terbayar Melalui Admin '.$user.'');
			redirect('pembayaran', 'refresh');
		}
	}
}
