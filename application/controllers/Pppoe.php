<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pppoe extends MY_Controller {

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
$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];

$user_image = $_SESSION['user_image'];


    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
    	redirect('dashboard/settings');
    	    }
	$API->debug = false;
	 $getppp = $API->comm('/ppp/secret/getall');
	 $getprofile = $API->comm('/ppp/profile/print');
	 $TotalReg = count($getppp);

		$this->db->where('mode','pppoe');
$query = $this->db->get('pelanggan');
		$data['TotalReg'] = $TotalReg;
		$data['ppp'] = $getppp;
		$data['query'] = $query;
		$data['profile'] = $getprofile;
		$data['API'] = $API;
$data['user'] = $user;
		$data['user_image'] = $user_image;
		$data['title'] = 'PPPOE';
		$this->load->view('/_template/header',$data);
		$this->load->view('/_template/navbar',$data);
		$this->load->view('/_template/sidebar',$data);

		$this->load->view('/pppoe/index',$data);

		$this->load->view('/_template/footer');


	}
	public function profile()
	{

 		$API = new Mikweb();
	
$user = $_SESSION['user_name'];
$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];



    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
    	redirect('dashboard/settings');
    	    }
	$API->debug = false;
	 $getppp = $API->comm('/ppp/secret/getall');
	 $getprofile = $API->comm('/ppp/profile/print');
	 $TotalReg = count($getppp);

		$data['title'] = 'PPPOE';
		$data['TotalReg'] = $TotalReg;
		$data['ppp'] = $getppp;
		$data['profiles'] = $getprofile;
		$data['API'] = $API;
		$data['session'] =  $_SESSION;
		$data['username'] = $user;
		$this->load->view('/_template/header',$data);
		$this->load->view('/_template/navbar',$data);
		$this->load->view('/_template/sidebar',$data);

		$this->load->view('/pppoe/profile',$data);

		$this->load->view('/_template/footer');


	}
	public function active()
	{

 		$API = new Mikweb();
	
$user = $_SESSION['user_name'];
$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];



    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
    	redirect('dashboard/settings');
    	    }
	$API->debug = false;
	 $getppp = $API->comm('/ppp/active/getall');
	 $getprofile = $API->comm('/ppp/profile/print');
	 $TotalReg = count($getppp);

		$data['title'] = 'PPPOE';
		$data['TotalReg'] = $TotalReg;
		$data['ppp'] = $getppp;
		$data['profiles'] = $getprofile;
		$data['API'] = $API;
		$data['session'] =  $_SESSION;
		$data['username'] = $user;
		$this->load->view('/_template/header',$data);
		$this->load->view('/_template/navbar',$data);
		$this->load->view('/_template/sidebar',$data);

		$this->load->view('/pppoe/active',$data);

		$this->load->view('/_template/footer');


	}

	//TAMBAH PPP
		public function tambahPpp()
		{
			$API = new Mikweb();
	
$user = $_SESSION['user_name'];
$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];



    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
    	redirect('dashboard/settings');
    	    }
	$API->debug = false;
  $name = ($_POST['name']);
    $password = ($_POST['password']);
    $profile = ($_POST['profile']);
     $comment = ($_POST['comment']);

    $API->comm("/ppp/secret/add", array(
          "name" => "$name",
      "password" => "$password",
      "profile" => "$profile",
      "comment" => "$comment",
		));
  return redirect()->route('pppoe'); 
}	


//ISOLIR
public function isolir($id)
		{
			$API = new Mikweb();
	
$user = $_SESSION['user_name'];
$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];
$id = $this->input->post('id');


    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
    	redirect('dashboard/settings');
    	    }

    $API->connect($ip, $mkuser, $mkpass);
 

	$API->debug = false;
 

$API->comm("/ppp/secret/set",
		  array(
			   ".id" =>  $id,
			   "profile"  => "ISOLIR",
			   )
		  );
	return true;
	
}



}
