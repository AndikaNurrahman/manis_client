<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
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
		$this->load->model('chart_model');
		$this->load->database();
	}
	public function index()
	{

		$API = new Mikweb();
		$id = $_SESSION['user_id'];
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];
		$user = $_SESSION['user_name'];
		$apicon = $_SESSION['api'];
		$ip = $_SESSION['mkipadd'];
		$mkuser = $_SESSION['mkuser'];
		$mkpass = $_SESSION['mkpassword'];


		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$this->db->where('idp', $id);
		$dbdata = $this->db->get('pelanggan');
		$nama = $user;
		foreach ($dbdata->result() as $row) {

			if ($row->mode == "PPPOE") {
				$nama = "<pppoe-" . $user . ">";
			}
		}

		if ($apicon == 1) {
			$API->connect($ip, $mkuser, $mkpass);
			if (!$API->connected) {
				$this->session->set_flashdata('message', 'Mikrotik tidak tersambung coba cek ip,user dan password anda');
				redirect('settings');
				return false;
			}
			$API->debug = false;
			$gtpemakaian = $API->comm("/queue/simple/print", array(
				"?name" => "$nama",
			));
			$data['pemakaian'] = $gtpemakaian;
		}



		$this->db->where('id_pelanggan', $id);
		$tgdata = $this->db->get('tagihan');

		$data['apicon'] = $apicon;
		$data['tgh'] = $tgdata;
		$data['user'] = $user;
		$data['user_image'] = $user_image;

		$data['session'] =  $_SESSION;
		$data['dbdata'] =  $dbdata;
		$data['title'] = 'Dashboard';


		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/users/index', $data);

		$this->load->view('/_template/footer');
	}


	public function tagihan()
	{

		$id = $_SESSION['user_id'];
		$id = $_SESSION['user_id'];
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];
		$user = $_SESSION['user_name'];


		$this->db->select('*');
		$this->db->join('pelanggan', 'pelanggan.idp = tagihan.id_pelanggan');
		$this->db->join('paket', 'tagihan.paket = paket.paket_id');
		$this->db->where('id_pelanggan', $id);
		$tgdata = $this->db->get('tagihan');

		$this->db->select('*');
		$this->db->join('pelanggan', 'pelanggan.idp = konter.idp_konter');
		$this->db->where('idp_konter', $id);
		$tgkonter = $this->db->get('konter');





		$data['id'] = $id;
		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['tgh'] = $tgdata;
		$data['tgk'] = $tgkonter;
		$data['title'] = 'Tagihan Anda';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);
		$this->load->view('/users/tagihan', $data);
		$this->load->view('/_template/footer');
	}
}
