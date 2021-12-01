<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konter extends MY_Controller
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
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('html');
	}
	public function index()
	{


		$user = $_SESSION['user_name'];
		$apicon = $_SESSION['api'];
		$ip = $_SESSION['mkipadd'];
		$mkuser = $_SESSION['mkuser'];
		$mkpass = $_SESSION['mkpassword'];
		$user_image = $_SESSION['user_image'];
		$user_id = $_SESSION['user_id'];

		$data['user'] = $user;
		$data['user_id'] = $user_id;
		$data['user_image'] = $user_image;
		$data['apicon'] = $apicon;
		$data['title'] = 'Pulsa Token';


		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);
		$this->load->view('/Konter/index', $data);
		$this->load->view('/_template/footer');
	}

	function update()
	{


		$ip = (@$_SERVER['HTTP_X_FORWARDED_FOR'] == '') ? $_SERVER['REMOTE_ADDR'] : @$_SERVER['HTTP_X_FORWARDED_FOR'];
		if ($ip == '172.104.161.223') { // memastikan data terikirim dari server portalpulsa

			file_put_contents('save.txt', json_encode($_POST['content'])); // menyimpan dalam file save.txt
			$result = json_encode($_POST['content'], true);
			$id = $result['trxid_api'];
			$status = $result['status'];
			$this->db->set('statuss', $status);
			$this->db->where('idp_konter', $id);
			$this->db->update('konter');
		}
	}
	function getcontent($keys)
	{
		$key = $keys;
		$result = json_encode(Harga('pulsa'), true);

		$data['key'] = $key;
		$data['result'] = $result;

		$this->load->view('/Konter/get', $data);
	}

	function beli()
	{
		if (empty($_POST['nomor'])) {
			$this->session->set_flashdata('message', 'Harap Masukan nomor anda!');
			redirect('/konter');
		}
		$result = $_POST['code'];
		$pembayaran = $_POST['pay'];
		$result_explode = explode('|', $result);
		$nomor = $_POST['nomor'];
		$code = $result_explode[0];
		$price = $result_explode[1];
		$deskripsi = $result_explode[2];
		$idp = $_POST['idp'];
		$data = [
			'id_pelanggan' => $idp,
			'no' => $nomor,
			'code' => $code,
			'status' => '0',
			'price' => $price,
			'pembayaran' => $pembayaran,
			'deskripsi' => $deskripsi

		];
		$input = $this->db->insert('konter', $data);
		if ($input) {

			$ceks = json_decode(Konter($nomor, $code, $idp), true);
			$notif = $ceks['message'];

			$this->session->set_flashdata('message', $notif);
			redirect('/konter');
		} else {
			$this->session->set_flashdata('message', 'Maaf ada kesalahan teknis!');
			redirect('/konter');
		}
	}
}
