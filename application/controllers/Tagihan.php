<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends MY_Controller
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
		$this->load->database();
	}
	public function index()
	{
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}
		$API = new Mikweb();
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];


		$query = $this->db->get('tagihan');
		$textdb = $this->db->get('text');





		$data['textdb'] = $textdb;


		$data['tagihan'] = $query;

		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Tagihan';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/tagihan/index', $data);

		$this->load->view('/_template/footer');
	}
	public function generate()
	{

		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$this->db->where('mode', 'pppoe');
		$query = $this->db->get('pelanggan');


		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$this->db->where('mode', 'ipstatic');
		$query1 = $this->db->get('pelanggan');

		$data['query'] = $query;
		$data['query1'] = $query1;
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];

		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Tambah Invoice';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/tagihan/generate', $data);

		$this->load->view('/_template/footer');
	}

	function add()
	{

		if ($this->input->post('id') == "") {
			redirect('tagihan');
		}
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nomor = $this->input->post('nomor');
		$paket = $this->input->post('paket');
		$tarif = $this->input->post('tarif');
		$pembayaran = $this->input->post('pembayaran');
		$this->db->where('id_pelanggan', $id);
		$this->db->where('month(tanggal)', date('m'));
		$query  = $this->db->get('tagihan');
		if ($query->num_rows() >  0) {
			$this->session->set_flashdata('error', 'Data sudah ada!');
			redirect('pelanggan');
			return false;
		} else {
			$data = [
				'id_pelanggan' => $id,
				'no_pelanggan' => $nomor,
				'nama_pelanggan' => $nama,
				'paket' => $paket,
				'status_code' => 0,
				'tarif_inv' => $tarif,
				'pembayaran' => $pembayaran
			];
			$input = $this->db->insert('tagihan', $data);

			if ($input) {
				$datas = [
					'pesan' => 'Tagihan Baru </span> ' . $nama . ' telah jatuh tempo',
					'status' => 0
				];
				$input = $this->db->insert('aktifasi', $datas);
				$this->session->set_flashdata('message', 'Data Tersimpan');
				redirect('tagihan');
			} else {
				$this->session->set_flashdata('message', 'Data Tidak Tersimpan');
				redirect('tagihan');
			}
		}
	}
}
