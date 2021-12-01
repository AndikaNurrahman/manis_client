<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
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
		$this->load->helper('array');
		$this->load->library('curl');
	}

	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");

		$this->db->select_sum('tarif_inv');
			$tagi = $this->db->get('tagihan');
			$pertahun = $tagi->result_array();
			echo $pertahun['0']['tarif_inv'];
            $data = [
                'nama' => 'Pemasukan Wifi',
                'tarif' => $pertahun['0']['tarif_inv'],
                'keterangan' => 'Pemasukan'
	];
            $input = $this->db->insert('transaksi', $data);
            if ($input) {

                $this->session->set_flashdata('message', 'Data Tersimpan');
                redirect('transaksi');
            } else {
                $this->session->set_flashdata('message', 'Data Tidak Tersimpan');
                redirect('transaksi');
            }

        }
	
}

