<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chart_model extends CI_Model{
 
  //get data from database
  function get_data(){
 
  $this->db->select('*');
$this->db->join('pelanggan', 'pelanggan.idp = tagihan.id_pelanggan');
$this->db->join('paket', 'tagihan.paket = paket.paket_id');
  $result = $this->db->get('tagihan');
      return $result;
  }
 
}