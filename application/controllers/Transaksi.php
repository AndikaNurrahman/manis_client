<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends MY_Controller
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


        $qy = $this->db->get('tagihan');
        $query = $this->db->get('transaksi');
        $textdb = $this->db->get('text');





        $data['textdb'] = $textdb;


        $data['query'] = $query;

        $data['user'] = $user;
        $data['user_image'] = $user_image;
        $data['title'] = 'Transaksi';
        $this->load->view('/_template/header', $data);
        $this->load->view('/_template/navbar', $data);
        $this->load->view('/_template/sidebar', $data);

        $this->load->view('/transaksi/index', $data);

        $this->load->view('/_template/footer');
    }


    function add()
    {
        if ($_SESSION['role'] != 1) {
            return redirect('/users');
        }


        if ($this->input->post('nama') == "") {
            $this->session->set_flashdata('message', 'Data Tidak Tersimpan');

            redirect('transaksi');
        }
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $tarif = $this->input->post('tarif');
        $keterangan = $this->input->post('keterangan');
        $this->db->where('id_pelanggan', $id);
        $this->db->where('month(tanggal)', date('m'));
        $query  = $this->db->get('tagihan');
        if ($query->num_rows() >  0) {
            $this->session->set_flashdata('error', 'Data sudah ada!');
            redirect('pelanggan');
            return false;
        } else {
            $data = [

                'nama' => $nama,
                'tarif' => $tarif,
                'keterangan' => $keterangan
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
}
