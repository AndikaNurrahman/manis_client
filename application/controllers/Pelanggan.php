<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends MY_Controller
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




		date_default_timezone_set("Asia/Jakarta");


		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$this->db->where('mode', 'pppoe');
		$query = $this->db->get('pelanggan');


		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
	
		$query1 = $this->db->get('pelanggan');

		$paket = $this->db->get('paket');

		$data['query'] = $query;
		$data['query1'] = $query1;
		$data['paket'] = $paket;
		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Pelanggan';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/pelanggan/index', $data);

		$this->load->view('/_template/footer');
	}
	public function tambah()
	{

		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}
		$API = new Mikweb();
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];




		date_default_timezone_set("Asia/Jakarta");


		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$this->db->where('mode', 'pppoe');
		$query = $this->db->get('pelanggan');


		$this->db->select('*');
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$this->db->where('mode', 'ipstatic');
		$query1 = $this->db->get('pelanggan');

		$paket = $this->db->get('paket');

		$data['query'] = $query;
		$data['query1'] = $query1;
		$data['paket'] = $paket;
		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Tambah';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);
		$this->load->view('/pelanggan/tambah', $data);
		$this->load->view('/_template/footer');
	}

	function isolir($idp)
	{
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}


		$this->db->where('id', $idp);
		$this->db->set('aktif', 0);
		$test = $this->db->update('pelanggan');
		if ($test) {
			echo 'Deleted successfully.';
		}
	}

	function add()
	{
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
			
		}

		if (empty($_POST["nama"])) {
			$this->session->set_flashdata('message', 'Tidak ada data!');
			redirect('Pelanggan');
		}
		$password = $_POST["password"];
		$nama = $_POST["nama"];
		$tempo = $_POST["tempo"];
		$nomor = $_POST["nomor"];
		$mode = $_POST["mode"];
		$alamat = $_POST["alamat"];
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
				'alamat' => $alamat,
				'paket' => $paket,
				'aktif' => 1
			);

			$input = $this->db->insert('pelanggan', $data);
			if ($input) {
				$data = "Data berhasil disimpan";
				$this->session->set_flashdata('message', $data);
			} else {

				$data = "Data gagal disimpan";
				$this->session->set_flashdata('message', $data);
			}
		}
	}

	function excel()
	{
		$this->load->library('PHPExcel');
		if (isset($_FILES["file"]["name"])) {
			// upload
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			// move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

			$object = PHPExcel_IOFactory::load($file_tmp);

			foreach ($object->getWorksheetIterator() as $worksheet) {

				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();

				for ($row = 4; $row <= $highestRow; $row++) {

					$nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$password = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$tempo = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$nomor = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$mode = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$paket = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

					$this->db->where('nama', $nama);
					$query  = $this->db->get('pelanggan');



					if ($query->num_rows() >  0) {
						$this->session->set_flashdata('message', 'Data Sudah ada');
						redirect('pelanggan/tambah');
						die;
					} else {

						$data[] = array(
							'nama' => $nama,
							'password' => $password,
							'tempo' => $tempo,
							'nomor' => $nomor,
							'mode' => $mode,
							'alamat' => $alamat,
							'paket' => $paket,
							'aktif' => 1
						);
					}
				}
			}

			$this->db->insert_batch('pelanggan', $data);

			$message = array(
				'message' => 'Import file excel berhasil disimpan di database',
			);

			$this->session->set_flashdata($message);
			redirect('pelanggan/tambah');
		} else {
			$message = array(
				'message' => 'Import file gagal, coba lagi',
			);

			$this->session->set_flashdata($message);
			redirect('pelanggan/tambah');
		}
	}



	function edit()
	{

		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}

		$id = $_POST["id"];
		$password = $_POST["password"];
		$nama = $_POST["nama"];
		$tempo = $_POST["tempo"];
		$nomor = $_POST["nomor"];
		$mode = $_POST["mode"];
		$paket = $_POST["paket"];






		$data = array(
			'nama' => $nama,
			'password' => $password,
			'tempo' => $tempo,
			'nomor' => $nomor,
			'mode' => $mode,
			'paket' => $paket,

		);
		$this->db->where('idp', $id);
		$input = $this->db->update('pelanggan', $data);
		if ($input) {
			$this->session->set_flashdata('message', 'Data Berhasil diubah');
			redirect('Pelanggan');
		} else {

			$this->session->set_flashdata('message', 'Gagal Saat Menyimpan Data!');
			redirect('Pelanggan');
		}
	}
}
