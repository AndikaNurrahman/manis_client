<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Phone extends CI_Controller
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
		$this->load->helper('format_ind');
		$this->load->model('UserModelClient');
	}
	public function index($kunci)
	{
		$key = "monsteridiot1928";

		if ($kunci != $key) {
			redirect("dashboard");
			return false;
		}


		$this->db->where('mode', 'ipstatic');
		$query1 = $this->db->get('pelanggan');
		$this->db->where('mode', 'pppoe');
		$query = $this->db->get('pelanggan');
		echo '  SEMUA  ';
		echo $this->db->count_all('pelanggan');
		echo '  user  ';
		echo '||';
		echo '  PPPOE  ';
		echo $query->num_rows();
		echo '  user  ';
		echo '||';
		echo '  IPSTATIC  ';
		echo $query1->num_rows();
		echo '  user  ';

		$this->db->where('paket', '2');
		$query = $this->db->get('pelanggan');
		$jumlah = $query->num_rows();
		$paket2 = 150000 * $jumlah;
		$this->db->where('paket', '1');
		$query = $this->db->get('pelanggan');
		$paket1 = 100000 * $jumlah;
		echo '||';
		echo 'RP. ';
		echo $paket1 + $paket2;
		$this->db->where('lunas', '1');
		$query = $this->db->get('pelanggan');
		echo '||';
		echo $query->num_rows();
		$this->db->where('lunas', '0');
		$query = $this->db->get('pelanggan');
		echo '||';
		echo $query->num_rows();
	}



	public function tambah($kunci)
	{


		// grab values as you would from an ordinary $_GET superglobal array associative index.


		$key = "monsteridiot1928";

		if ($kunci != $key) {
			redirect("dashboard");
			return false;
		}
		$password = $_POST["password"];
		$nama = $_POST["nama"];
		$tempo = $_POST["tempo"];
		$nomor = $_POST["nomor"];
		$mode = $_POST["mode"];
		$paket = $_POST["paket"];


		$this->db->where('nama', $nama);
		$query  = $this->db->get('pelanggan');



		if ($query->num_rows() >  0) {
			echo "Data sudah ada";
		} else {
			$data = array(
				'nama' => $nama,
				'password' => $password,
				'tempo' => $tempo,
				'nomor' => $nomor,
				'mode' => $mode,
				'paket' => $paket,
				'lunas' => 1
			);

			$input = $this->db->insert('pelanggan', $data);
			if ($input) {
				$data = "Data berhasil disimpan";
				$this->output->set_output($data);
			} else {

				$data = "Data gagal disimpan";
				$this->output->set_output($data);
			}
		}
	}

	public function loginhp()
	{
		$email = $this->input->post("email");
		$pass = $this->input->post("password");
		//$this->db->select('*');
		//$this->db->from('users');
		//$this->db->where('nama', $email);
		//$this->db->where("password", $pass);

		//$dataLogin = $this->db->query("select * from pelanggan where nama = '" . $email . "' and password = '" . $pass . "'");
		$user = $this->UserModelClient->post($email);
		if (empty($user)) {

			$return["error"] = true;
			$return["message"] = 'email atau password salah.';
			header('Content-Type: application/json');

			echo json_encode($return);
		} else {
			$passs = $user->password;
			if ($pass == $passs) {
				$dataClient = array(
					'success' => true,
					'paket' => $user->paket,
					'tempo' => $user->tempo,
					'mode' => $user->mode,
					'pp' => $user->user_image,
					'aktif' => $user->aktif,
					'alamat' => $user->alamat,
					'nomor' => $user->nomor,
					'user_name' => $user->nama,
					'error' => false,
					'user_id' => $user->idp,
					'paket' => $user->paket,
					//'user_image' => $user->user_image,
					'role' => '4'
				);
				$return = $dataClient;
			} else {
				$return["error"] = true;
				$return["message"] = 'email atau password salah';
			}
			header('Content-Type: application/json');

			echo json_encode($return);
		}
	}
	public function ambiltagihan()
	{
		$email = $this->input->post("email");
		if ($email == null) {
			$return["error"] = true;
			$return["message"] = 'tidak ada data';
			header('Content-Type: application/json');

			echo json_encode($return);
			return false;
		}
		$this->db->where('nama_pelanggan', $email);
		$this->db->where('status_code', '0');
		$tgdata = $this->db->get('tagihan');
		$datatgh = array();
		$sum = 0;
		foreach ($tgdata->result() as $tg) {
			$sum = $tg->tarif_inv;
			$tgl = $tg->tanggal;
			$tglr = date('Y-m', strtotime($tgl));
			$tgs = format_indo($tglr);
			$datatgh[] = array(
				'id' => $tg->tagihan_id,
				'success' => true,
				'status' => $tg->status_code,
				'tanggal' => $tgs,
				'sum' => $sum,
				'paket' => $tg->paket,
				'tarif' => $tg->tarif_inv,

			);
		}
		//$return = array_values($tgdata->result_array());
		//$return = $tgdata->result_array();
		$return = $datatgh;


		header('Content-Type: application/json');
		echo json_encode($return, JSON_NUMERIC_CHECK) . "\n";
	}
	public function lihat($kunci)
	{

		$key = "monsteridiot1928";

		if ($kunci != $key) {
			redirect("dashboard");
			return false;
		}

		$this->db->from('pelanggan');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			echo "<b style='text-align: right;' >" . $row->id . "</b>";
			echo "<br>";
			echo $row->nama;
			echo "    ";
			echo $row->password;
			echo "<br>";
			echo $row->tempo;
			echo "<br>";
			echo $row->nomor;
			echo "<br>";
			if ($row->paket = '2') {
				echo 'Rp. 150000';
			} elseif ($row->paket = '1') {

				echo 'Rp. 100000';
			}
			echo "<br>";
			echo $row->mode;
			echo '||';
		}
	}
	public function ambilharga()
	{
		$key = $this->input->post('key');
	
		$operator = $this->input->post('provider');
		$result = json_decode(Harga('pulsa'), true);
		if($key!='misro'){
			echo  json_encode('tidak ada akses');
			return false;
		}
		if ($result['result'] == 'success') {

			for ($i = 0; $i < count($result['message']); $i++) {
				if ($result['message'][$i]['provider'] != $operator) {
					continue;
				}
				$data[] = array(

					'code' =>  $result['message'][$i]['code'],
					'provider' =>  $result['message'][$i]['provider'],
					'price' =>  $result['message'][$i]['price'] + 1105,
					'description' =>  $result['message'][$i]['description'],
					'status' => $result['message'][$i]['status']
				);
				$return = $data;
				
			}
			header('Content-Type: application/json');
				echo json_encode($return) . "\n";
			$i++;
		} else {
			echo  $result['message'];
			return false;
		}
	}
	public function ambilhargapln()
	{
		$key = $this->input->post('key');
		
		$result = json_decode(Harga('pln'), true);
		if($key!='oncom'){
			redirect(base_url());
			return false;
		}
		if ($result['result'] == 'success') {

			for ($i = 0; $i < count($result['message']); $i++) {
				
				$data[] = array(
					'id' => $i,
					'code' =>  $result['message'][$i]['code'],
					'price' =>  $result['message'][$i]['price'] + 1105,
					'description' =>  $result['message'][$i]['description'],
					'status' => $result['message'][$i]['status']
				);
				$return = $data;
			
		
			}
			header('Content-Type: application/json');
		echo json_encode($return, JSON_NUMERIC_CHECK) . "\n";
			$i++;
		} else {
			echo  $result['message'];
			return false;
		}
	}
}
