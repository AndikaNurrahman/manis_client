<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MY_Controller
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
		$this->load->helper('date');
		$this->load->database();
		$this->load->library('upload');
	}
	public function index()
	{
		$user_image = $_SESSION['user_image'];
		$user = $_SESSION['user_name'];
		$id = $_SESSION['user_id'];
		$apicon = $_SESSION['api'];
		$role  = $_SESSION['role'];
		$ip = $_SESSION['mkipadd'];
		$mkuser = $_SESSION['mkuser'];
		$mkpass = $_SESSION['mkpassword'];
		$apiwa = $this->db->get_where('settings', ['apiwa' => '1'])->row();

		if ($role  == 1) {
			$this->db->where('user_name', $user);
			$query1 = $this->db->get('users
			');
		}
		$this->db->where('nama', $user);
		$query1 = $this->db->get('pelanggan
			');
		$data['title'] = 'Settings';
		$data['user'] = $user;
		$data['apicon'] = $apicon;
		$data['ip'] = $ip;
		$data['apiwa'] = $apiwa;
		$data['mkuser'] = $mkuser;
		$data['mkpass'] = $mkpass;
		$data['user_image'] = $user_image;
		$data['users'] = $query1;

		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/settings/index', $data);

		$this->load->view('/_template/footer');
	}
	function connect()
	{

		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}

		if (isset($_POST['val'])) {

			$status = $this->input->post('val');


			$data = array(
				'status'  =>  $status,
			);
			$this->db->where('id', 1);
			$this->db->update('mikrotik', $data);
			$this->session->set_userdata('api', $status);
		}
	}
	function saveIP()
	{
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}


		$API = new Mikweb();
		$ipa = $this->input->post('ipaddres');
		$usernamea = $this->input->post('username');
		$passworda = $this->input->post('password');
		$API->connect($ipa, $usernamea, $passworda);

		if ($API->connected) {
			$newdata = array(
				'mkipadd'  => $ipa,
				'mkuser'     => $usernamea,
				'mkpassword' => $passworda
			);

			$this->session->set_userdata($newdata);


			$data = array(
				'mkipadd' => $ipa,
				'mkuser'  => $usernamea,
				'mkpassword'  => $passworda

			);

			$this->db->where('id', 1);
			$this->db->update('mikrotik', $data);

			$this->session->set_flashdata('message', 'Sudah terhubung dengan mikrotik!');
			redirect('/dashboard');
		} else {
			$this->session->set_flashdata('message', 'Mikrotik tidak tersambung coba cek ip,user dan password anda');
			redirect('/settings');
		}
	}


	function changePassword()
	{
		
		if (empty($_POST('chgpassword'))) {
			$this->session->set_flashdata('message', 'tidak ada data !');
		}
		$chgpass = $this->input->post('chgpassword');
		$userpass = password_hash($chgpass, PASSWORD_DEFAULT);
		$this->db->set('user_password', $userpass);
		$this->db->where('user_id', 1);
		$this->db->update('users');


		redirect('/dashboard');
	}

	function changeImage()
	{
		$ids = $_SESSION['user_id'];
		$role  = $_SESSION['role'];

		$config['upload_path'] = './assets/img/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->upload->initialize($config);

		if (empty($_FILES['filefoto']['name'])) {
			$this->session->set_flashdata('message', 'Gagal, gambar belum di pilih');
			redirect('/settings');
		}
		if ($this->upload->do_upload('filefoto')) {

			$gbr = $this->upload->data();
			$gambar = $this->upload->data('file_name');


			if ($role  == 1) {
				$this->db->set('user_image', $gambar);
				$this->db->where('user_id', $ids);
				$input = $this->db->update('users');
			} else {
				$this->db->set('user_image', $gambar);
				$this->db->where('idp', $ids);
				$input = $this->db->update('pelanggan');
			}
			$newdata = array(
				'user_image'  => $gambar,
			);
			$this->session->set_userdata($newdata);
			if ($input) {
				$this->session->set_flashdata('message', 'success');
				redirect('/settings');
			} else {
				$this->session->set_flashdata('message', 'gambar terlalu besar!');

				redirect('/settings');
			}
		} else {
			echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp";
		}
	}
}
