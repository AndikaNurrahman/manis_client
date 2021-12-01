<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends MY_Controller {

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
    parent::__construct();// you have missed this line.
 $this->load->library('session');
$this->load->database();

}   
	public function index()
	{

 		$API = new Mikweb();
	$user = $_SESSION['user_name'];
$user_image = $_SESSION['user_image'];


		
$query = $this->db->get('paket');

	

		$data['query'] = $query;
	
		$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'Paket';
		$this->load->view('/_template/header',$data);
		$this->load->view('/_template/navbar',$data);
		$this->load->view('/_template/sidebar',$data);
		$this->load->view('/paket/index',$data);
		$this->load->view('/_template/footer');



	}
	function add(){
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}

		if ($this->input->post('paket')=="") {
			redirect('Paket');
		}
		  $paket = $this->input->post('paket');
        $harga = $this->input->post('harga');
        $comment = $this->input->post('comment');
   
       
     
        $data = [
            'paket' => $paket,
            'tarif' => $harga,
            'comment' => $comment,
        ];
       $input = $this->db->insert( 'paket', $data);
        if($input){
            $this->session->set_flashdata('message', 'Data Tersimpan');
            redirect('paket');
        } else {
        	$this->session->set_flashdata('message', 'Data Tidak Tersimpan');
        	 redirect('paket');
        }

	}

	function ubah(){
		if ($_SESSION['role'] != 1) {
			return redirect('/users');
		}

 $id = $this->input->post('id');
    $data = array(
        'paket'  => $this->input->post('paket'),
        'tarif' => $this->input->post('tarif'),
        'comment' => $this->input->post('comment')
    );
    $this->db->set($data);
    $this->db->where('paket_id', $id);
    $this->db->update('paket');
     $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('admin');
}

	}
