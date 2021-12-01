<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipbinding extends CI_Controller {

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
   
}   
	public function ipbinding()
	{

 		$API = new Mikweb();
	

$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];
$user = $_SESSION['user_name'];
$user_image = $_SESSION['user_image'];


    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
    	redirect('dashboard/settings');
    	     }
	$API->debug = false;
  	$gethotspotactive = $API->comm("/ip/hotspot/ipbinding/print");
	

		$counthotspotactive = $API->comm("/ip/hotspot/active/print", array(
			"count-only" => "",
		));
	
	 $potong = explode("|", $gethotspotactive['comment']);

	 $totalr=count($potong[0]=='RUMAHAN');
	 	
		$data['title'] = 'Hotspot Active';
		
	
		$data['TotalReg'] = $totalr;
		$data['counthotspotactive'] = $counthotspotactive;
	$data['username'] = $user;
		$data['gethotspotactive'] = $gethotspotactive;


				$this->load->view('/_template/header',$data);
		$this->load->view('/_template/navbar');
		$this->load->view('/_template/sidebar');

		$this->load->view('/hotspot/ipbinding',$data);

		$this->load->view('/_template/footer');

	}
	}
