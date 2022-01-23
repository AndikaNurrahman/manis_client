	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Dashboard extends MY_Controller
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
		}
		public function index()
		{
			if ($_SESSION['role'] != 1) {
				return redirect('/users');
			}

			$API = new Mikweb();

			$user = $_SESSION['user_name'];
			$apicon = $_SESSION['api'];
			$ip = $_SESSION['mkipadd'];
			$mkuser = $_SESSION['mkuser'];
			$mkpass = $_SESSION['mkpassword'];
			$user_image = $_SESSION['user_image'];


			// if connec api mikrotik
			if ($apicon == 1) {
				$API->connect($ip, $mkuser, $mkpass);
				if (!$API->connected) {
					$this->session->set_flashdata('message', 'Mikrotik tidak tersambung coba cek ip,user dan password anda');
					redirect('settings');
					return false;
				}
				$API->debug = false;
				$gethotspotactive = $API->comm("/ip/hotspot/active/print");
				$TotalReg = count($gethotspotactive);
				$clock =  $API->comm("/system/clock/print");

				// get system resource MikroTik
				$gethotspotactive = $API->comm("/ip/hotspot/active/print");
				$TotalReg = count($gethotspotactive);

				$counthotspotactive = $API->comm("/ip/hotspot/active/print", array(
					"count-only" => "",
				));
				$getppp = $API->comm('/ppp/secret/getall');
				$getresource = $API->comm("/system/resource/print");
				$resource = json_encode($getresource);
				$resources = json_decode($resource, true);
				// get routeboard info
				$interface = "ether1-Berat";
				$routerboards = $API->comm("/system/routerboard/print");
				$routerboard = $routerboards[0];

				$getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
					"interface" => $interface,
					"once" => "",
				));
				$data['counthotspotactive'] = $counthotspotactive;
				$data['resources'] = $resources['0'];
				$data['routerboard'] =  $routerboard;
				$data['clock'] = $clock;
				$data['API'] = $API;
			}


			for ($bulan = 1; $bulan < 13; $bulan++) {
				$this->db->select_sum('tarif_inv');
				$this->db->where('month(tanggal)', $bulan);
				$this->db->where('year(tanggal)', date('y'));
				$this->db->where('status_code', '1');
				$ch = $this->db->get('tagihan');
				foreach ($ch->result_array() as $row) {
					$chartdata[] = $row['tarif_inv'];
				}
			}

			$this->db->select_sum('tarif_inv');
			$this->db->where('month(tanggal)', date('m'));
			$this->db->where('status_code', '1');
			$tgh = $this->db->get('tagihan');
			foreach ($tgh->result() as $rows) {
				$tagihan = $rows->tarif_inv;
			}

			$this->db->where('status_code', '1');
			$this->db->where('year(tanggal)', date('y'));
			$this->db->where('month(tanggal)', date('m'));
			$lunass = $this->db->get('tagihan');
			$lunas = $lunass->num_rows();

			$this->db->where('status_code', '0');
			$this->db->where('year(tanggal)', date('y'));
			$this->db->where('month(tanggal)', date('m'));
			$belums = $this->db->get('tagihan');
			$belum = $belums->num_rows();

			$this->db->where('status_code', '201');
			$this->db->where('year(tanggal)', date('y'));
			$this->db->where('month(tanggal)', date('m'));
			$pendings = $this->db->get('tagihan');
			$pending = $pendings->num_rows();

			$this->db->select('tanggal');
			$tanggal = $this->db->get('tagihan');


			$this->db->select_sum('tarif');
			$this->db->where('keterangan', 'Pengeluaran');
			$this->db->where('year(tanggal)', date('y'));
			$transaksis = $this->db->get('transaksi');
			$transaksi = $transaksis->result_array();
			$this->db->select_sum('tarif_inv');
			$this->db->where('year(tanggal)', date('y'));
			$tagi = $this->db->get('tagihan');
			$tagihanpertahun = 	$tagi->result_array();


			$this->db->select_sum('tarif');
			$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
			$qer = $this->db->get('pelanggan');

			foreach ($qer->result_array() as $rows) {
				$jml = $rows['tarif'];
			}

			$this->db->where('mode', 'pppoe');
			$PPPOE = $this->db->get('pelanggan')->num_rows();



			$this->db->where('mode', 'ipstatic');
			$IPSTATIC = $this->db->get('pelanggan')->num_rows();

			$this->db->where('paket', '2');
			$query = $this->db->get('pelanggan');
			$jumlah = $query->num_rows();
			$paket2 = 150000 * $jumlah;
			$this->db->where('paket', '1');
			$query = $this->db->get('pelanggan');
			$paket1 = 100000 * $jumlah;


			$data['user'] = $user;
			$data['PPPOE'] = json_decode($PPPOE);
			$data['IPSTATIC'] = json_decode($IPSTATIC);
			$data['jml'] = $jml;
			$data['user_image'] = $user_image;
			$data['apicon'] = $apicon;
			$data['chart'] = $chartdata;
			$data['tagihan'] = $tagihan;
			$data['pending'] = $pending;
			$data['transaksi'] = $transaksi;
			$data['pertahun'] = $tagihanpertahun;
			$data['tanggal'] = $tanggal;
			$data['lunas'] = $lunas;
			$data['belum'] = $belum;
			$data['paket1'] = $paket1;
			$data['paket2'] = $paket2;



			$data['session'] =  $_SESSION;
			$data['title'] = 'Dashboard';


			$this->load->view('/_template/header', $data);
			$this->load->view('/_template/navbar', $data);
			$this->load->view('/_template/sidebar', $data);

			$this->load->view('/dashboard/index', $data);

			$this->load->view('/_template/footer');
		}
	}
