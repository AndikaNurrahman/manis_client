<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Text extends MY_Controller
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


		$textdb = $this->db->get('inbox');





		$data['inbox'] = $textdb;

		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Inbox';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/text/index', $data);

		$this->load->view('/_template/footer');
	}
	public function template()
	{
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}
		$API = new Mikweb();
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];


		$textdb = $this->db->get('text');





		$data['textdb'] = $textdb;

		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Template text wa';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/text/template', $data);

		$this->load->view('/_template/footer');
	}
	public function send()
	{
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}
		$API = new Mikweb();
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];


		$textdb = $this->db->get('text');

		$nomor = $this->db->get('pelanggan');

		$data['textdb'] = $textdb;
		$data['nomor'] = $nomor;

		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Kirim Pesan Wa';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/text/send', $data);

		$this->load->view('/_template/footer');
	}
	public function sends()
	{
		if (empty($_POST['phone'])) {
			return redirect('/users');
		}
		$item[] = implode(',', $this->input->post('phone', TRUE));
		$text = $this->input->post('text');
		$token = $this->db->get_where('settings', ['apiwa'])->row_array();
		foreach ($item as $row) {

			$ceks = json_decode(Apiwa($row, $text, $token), true);
		}
		$notif = $ceks['message'];
		$this->session->set_flashdata('message', $notif);
		redirect('text/send');
	}
	function save()
	{
		$id = $this->input->post('id');
		$text = $this->input->post('text');
		if (!isset($_POST['text'])) {
			echo "data tidak ada";
			return false;
		}

		$this->db->where('text_id', $id);
		$this->db->set('text_wa', $text);
		$input = $this->db->insert('text');

		if ($input) {
			redirect('text');
		} else {
			redirect('text');
		}
	}
	public function changedevice()
	{


		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}
		$url = 'https://sawit.wablas.com/api/device/info?token=muv1BiWQEhmMOGGFzG8znFSe5ZvAtCXpkPjJQ9uMaFvywCPlKkkWDbaLmbTDLPAJ';
		$qr = 'https://sawit.wablas.com/generate/qr.php?token=muv1BiWQEhmMOGGFzG8znFSe5ZvAtCXpkPjJQ9uMaFvywCPlKkkWDbaLmbTDLPAJ&url=aHR0cDovLzEzOS4xNjIuMTkuMTkx';
		$dat = file_get_contents($url);
		$datas = json_decode($dat);
		//print_r($datas);
		$API = new Mikweb();
		$user = $_SESSION['user_name'];
		$user_image = $_SESSION['user_image'];
		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['datas'] = $datas;
		$data['qr'] = $qr;
		$data['title'] = 'Ganti Nomor';
		$this->load->view('/_template/header', $data);
		$this->load->view('/_template/navbar', $data);
		$this->load->view('/_template/sidebar', $data);

		$this->load->view('/text/changedevice', $data);

		$this->load->view('/_template/footer');
	}
}
