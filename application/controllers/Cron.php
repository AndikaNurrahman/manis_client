<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Cron extends CI_Controller

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



	public function cron()

	{

		date_default_timezone_set("Asia/Jakarta");



	
		$this->db->join('paket', 'pelanggan.paket = paket.paket_id');
		$this->db->where('tempo', date('d'));
		$client = $this->db->get('pelanggan');





		$ipstatic = $this->db->get('pelanggan');

		$i = 0;

		foreach ($client->result_array() as $baris => $in) {

		
			



				$this->db->where('text_id', '1');

				$text = $this->db->get('text');

				$textdb = $text->row();

				$this->db->where('id_pelanggan', $in['idp']);

				$this->db->where('month(tanggal)', date('m'));

				$query  = $this->db->get('tagihan');

				$data[] = array(

					'id_pelanggan' => $in['idp'],

					'no_pelanggan' => $in['nomor'],

					'nama_pelanggan' => $in['nama'],

					'status_code' => 0,

					'paket' => $in['paket'],

					'tarif_inv' => $in['tarif'],

					'pembayaran' => "MANUAL"

				);


				if ($query->num_rows() >  0) {

					unset($client->result_array()[$baris] );
 
				} else {

					var_dump($data);


					$input = $this->db->insert('tagihan', $data);

					$datas = [

						'pesan' => 'Tagihan Baru </span> ' . $in['nama'] . ' telah jatuh tempo',

						'status' => 0

					];

					$input = $this->db->insert('aktifasi', $datas);

					$message = $textdb->text_wa;

					$phone = $in['nomor'];

					$messages = $this->db->get_where('text', ['text_id' => '3'])->row_array();

					$token = $this->db->get_where('api', ['apiwa'])->row_array();

					Apiwa($phone, $message, $token);

					if ($input) {

						echo 'Done';

					} else {



						echo 'Tidak Tersimpan';

					}

				}

			}

			$i++;

		}
		}

	

