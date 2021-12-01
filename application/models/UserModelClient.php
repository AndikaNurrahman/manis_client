<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class UserModelClient extends CI_Model
{

    public function post($email)
    {
        $this->db->where('nomor', $email); // Untuk menambahkan Where Clause : username='$username'
        $this->db->or_where('nama', $email);
        $this->db->join('paket', 'pelanggan.paket = paket.paket_id');
        $result = $this->db->get('pelanggan')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
}
