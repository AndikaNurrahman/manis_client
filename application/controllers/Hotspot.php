<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotspot extends MY_Controller {

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
	public function index()
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
  	$gethotspotactive = $API->comm("/ip/hotspot/active/print");
	$TotalReg = count($gethotspotactive);

		$counthotspotactive = $API->comm("/ip/hotspot/active/print", array(
			"count-only" => "",
		));
	
	
		$data['title'] = 'Hotspot Active';
		
	
		$data['TotalReg'] = $TotalReg;
		$data['counthotspotactive'] = $counthotspotactive;
		$data['gethotspotactive'] = $gethotspotactive;
$data['username'] = $user;
$data['user_image'] = $user_image;

	$data['session'] =  $_SESSION;

				$this->load->view('/_template/header',$data);
		$this->load->view('/_template/navbar',$data);
		$this->load->view('/_template/sidebar',$data);

		$this->load->view('/hotspot/index',$data);

		$this->load->view('/_template/footer');

	}
		public function ipbinding()
	{

 		$API = new Mikweb();
	
$user = $_SESSION['user_name'];
$user_image = $_SESSION['user_image'];
$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];



    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
    	redirect('dashboard/settings');
    	     }
	$API->debug = false;
	$getbinding = $API->comm("/ip/hotspot/ip-binding/print");
	$TotalReg = count($getbinding);

	$countbinding = $API->comm("/ip/hotspot/ip-binding/print", array(
		"count-only" => "",
	));
	
	

	
	 	$data['username'] = $user;
	$data['session'] =  $_SESSION;
		$data['title'] = 'Hotspot Active';
		
	$data['user_image'] = $user_image;
		$data['TotalReg'] = $TotalReg;
		$data['getbinding'] = $getbinding;
	
		


				$this->load->view('/_template/header',$data);
		$this->load->view('/_template/navbar');
		$this->load->view('/_template/sidebar');

		$this->load->view('/hotspot/ipbinding',$data);

		$this->load->view('/_template/footer');

	}
	}
