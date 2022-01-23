<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class PhoneAdmin extends CI_Controller
{
    public function __construct()
	{
		parent::__construct(); // you have missed this line.
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('format_ind');
		$this->load->model('UserModelClient');
	}
	public function loginadmin()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		//$this->db->select('*');
		//$this->db->from('users');
		//$this->db->where('nama', $email);
		//$this->db->where("password", $pass);

		//$dataLogin = $this->db->query("select * from pelanggan where nama = '" . $email . "' and password = '" . $pass . "'");
		$user = $this->UserModel->post($email);
		if (empty($user)) {

			$return["error"] = true;
			$return["message"] = 'email atau password salah.';
			header('Content-Type: application/json');

			echo json_encode($return);
		} else {
			$pass = $user->user_password;
      $verif = password_verify($password, $pass);
      if ($verif) {
				$dataClient = array(
					'success' => true,
					
					'pp' => $user->user_image,
					'aktif' => $user->u_aktif,
					'email' => $user->user_email,
					'nomor' => $user->user_phone,
					'user_name' => $user->user_name,
					'error' => false,
					//'user_image' => $user->user_image,
					'role' => '1'
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
		
		$month = $this->input->post("month");
		$year= $this->input->post("year");
		
		$this->db->where('month(tanggal)', date($month));
		$this->db->where('year(tanggal)', date($year));
		$tgdata = $this->db->get('tagihan');

		$this->db->where('status_code', '1');
		$this->db->where('month(tanggal)', date($month));
		$this->db->where('year(tanggal)', date($year));
		$lunass = $this->db->get('tagihan');
		$lunas = $lunass->num_rows();

		$this->db->where('status_code', '0');
		$this->db->where('month(tanggal)', date($month));
		$this->db->where('year(tanggal)', date($year));
		$belums = $this->db->get('tagihan');
		$belum = $belums->num_rows();
		$datatgh = array();
		$sum = 0;
		foreach ($tgdata->result() as $tg) {
			$sum = $tg->tarif_inv;
			$tgl = $tg->tanggal;
			$tglr = date('Y-m', strtotime($tgl));
			$tgs = format_indo($tglr);
            if($tg->status_code==1){
                $stat = true;
            } elseif($tg->status_code==0){
                $stat = false;
            }
             elseif($tg->status_code==201){
                $stat = false;
            }
	
			$datatgh[] = array(
				'id' => $tg->tagihan_id,
				'success' => true,
				'status' => $stat,
				'nomor' => $tg->no_pelanggan,
				'tanggal' => $tgs,
				'belum' => $belum,
				'lunas' => $lunas,
				'sum' => $sum,
				'paket' => $tg->paket,
				'nama_pelanggan' => $tg->nama_pelanggan,
				'tarif' => $tg->tarif_inv,

			);
		}
		//$return = array_values($tgdata->result_array());
		//$return = $tgdata->result_array();
		$return = $datatgh;


		header('Content-Type: application/json');
		echo json_encode($return, JSON_NUMERIC_CHECK) . "\n";
	}
    public function ambilpelanggan()
	{
		
		$month = $this->input->post("month");
		$year= $this->input->post("year");
		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$tgp = $this->db->get('pelanggan');
		$datatgh = array();
		$sum = 0;
		foreach ($tgp->result_array() as $baris) {
			if($baris['aktif']==1){
                $stat = true;
            } elseif($baris['aktif']==0){
                $stat = false;
            }
			$datatgh[] = array(
				'id' => $baris['idp'],
				'success' => true,
				'password' => $baris['password'],
				'status' => $stat,
				'mode' => $baris['mode'],
				'nomor' => $baris['nomor'] ,
			
			
				'paket' => $baris['paket'],
				'nama_pelanggan' => $baris['nama'],
				'tarif' => $baris['tarif'],

			);
		}
		//$return = array_values($tgdata->result_array());
		//$return = $tgdata->result_array();
		$return = $datatgh;


		header('Content-Type: application/json');
		echo json_encode($return, JSON_NUMERIC_CHECK) . "\n";
	}
    public function ambilpaket()
	{
		
		
	
		$tgp = $this->db->get('paket');
		
		$datatgh = array();
		foreach ($tgp->result_array() as $baris) {
			$datatgh[] = array(
				'success' => true,
				'paket' => $baris['paket'],
				'tarif' => $baris['tarif'],
				'status' => $baris['comment'],

			);
		}
		//$return = array_values($tgdata->result_array());
		//$return = $tgdata->result_array();
		$return = $datatgh;

		header('Content-Type: application/json');
		echo json_encode($return, JSON_NUMERIC_CHECK) . "\n";
	}
    public function hitungtagihan()
	{
		
		$this->db->select_sum('tarif');
			$this->db->where('keterangan', 'Pengeluaran');
			$transaksis = $this->db->get('transaksi');
			$transaksi = $transaksis->result();
			foreach ($transaksi as $rows) {
				$pengeluaran = $rows->tarif;
			}
			$this->db->select_sum('tarif_inv');
			$tagi = $this->db->get('tagihan');
			$tagihanpertahun = 	$tagi->result();
			foreach ($tagihanpertahun as $rows) {
				$tagihanpertahun = $rows->tarif_inv;
			}
			$this->db->select_sum('tarif_inv');
			$this->db->where('month(tanggal)', date('m'));
			$this->db->where('status_code', '1');
			$perbulans = $this->db->get('tagihan');
			$perbulan = $perbulans->result();
			foreach ($perbulan as $rows) {
				$tagihanperbulan = $rows->tarif_inv;
			}
			

			$this->db->select_sum('tarif');
			$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
			$qer = $this->db->get('pelanggan');

			foreach ($qer->result_array() as $rows) {
				$jml = $rows['tarif'];
			}
	
		$this->db->where('status_code', '1');
		$this->db->where('month(tanggal)', date('m'));
		$this->db->where('year(tanggal)', date('Y'));
			$lunass = $this->db->get('tagihan');
			$lunas = $lunass->num_rows();

			$this->db->where('status_code', '0');
			$this->db->where('month(tanggal)', date('m'));
		$this->db->where('year(tanggal)', date('Y'));
			$belums = $this->db->get('tagihan');
			$belum = $belums->num_rows();

			$this->db->where('status_code', '201');
			$pendings = $this->db->get('tagihan');
			$pending = $pendings->num_rows();
			$pelanggan = $this->db->get('pelanggan')->num_rows();
			$paket = $this->db->get('paket')->num_rows();
			
			$datatgh[] = array(

				'pelanggan' => $pelanggan ,
				'paket' => $paket ,
				'pending' => $pending ,
				'Belum' => $belum ,
				'tagihanpertahun' => $tagihanpertahun ,
				'tagihanperbulan' => $tagihanperbulan,
				'pengeluaran' => $pengeluaran,
				'Lunas' => $lunas,
			

			);
		
		//$return = array_values($tgdata->result_array());
		//$return = $tgdata->result_array();
		$return = $datatgh;


		header('Content-Type: application/json');
		echo json_encode($return, JSON_NUMERIC_CHECK) . "\n";
	}
	function bayar()
	{
		

		$user = $this->input->post('user');
		$pembayaran = $this->input->post('pembayaran');
		$phone = $this->input->post('nomor');
		$message = $this->db->get_where('text', ['text_id' => '3'])->row_array();
		$this->db->where('nama_pelanggan', $user);
		$this->db->set('status_code', 1);
		$this->db->set('pembayaran', $pembayaran);
		$test = $this->db->update('tagihan');
		if ($test) {
			//$token = $this->db->get_where('settings', ['apiwa' => '1'])->row_array();
			//Apiwa($phone, $message, $token);
			$return["error"] = false;
			$return["success"] = true;
			$return["message"] = 'Pembayaran Selesai.';
			header('Content-Type: application/json');

			echo json_encode($return);
		}
	}
}