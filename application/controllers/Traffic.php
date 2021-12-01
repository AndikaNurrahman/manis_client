<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traffic extends MY_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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
// Check input data

if (isset($_GET['id']) and is_numeric($_GET['id'])) {
  //get device info
$this->db->get('device');
$iddevice = $this->input->get('id');
  $this->db->where('id', $iddevice);


  #print_r($device->fetchArray(SQLITE3_ASSOC));



  //get data for chart
  $gets = $this->input->get('id');
  $chartData = '';


$query = $db->query("SELECT timestamp, tx, rx FROM traffic WHERE device_id = $gets ORDER BY timestamp DESC LIMIT ");

$row = $query->getRowArray();

if (isset($row))
{
    echo $row['timestamp'];
    echo $row['tx'];
    echo $row['rx'];
    echo $row[' rx'];
}
}

      //set to Google Chart data format
      //$chartData .= "['".date('d M H:i', strtotime($res['timestamp']))."',".round(($res['tx']/1024/1024),2).",".round(($res['rx']/1024/1024),2)."],";


 // $results->finalize();
    $API = new Mikweb();
  
$user = $_SESSION['user_name'];
$ip = $_SESSION['mkipadd'];
$mkuser =$_SESSION['mkuser'];
$mkpass =$_SESSION['mkpassword'];
$interface = "ether1-Berat";
   $API->connect($ip, $mkuser, $mkpass);
    if (!$API->connected) {
       redirect('setting');
      return false;
    }
    $getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
      "interface" => $interface,
      "once" => "",
      ));

    $rows = array(); $rows2 = array();

    $ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
    $frx = $getinterfacetraffic[0]['rx-bits-per-second'];

      $rows['name'] = 'Tx';
      $rows['data'][] = $ftx;
      $rows2['name'] = 'Rx';
      $rows2['data'][] = $frx;
 
  

  $result = array();

  array_push($result,$rows);
  array_push($result,$rows2);
  json_encode($result);


    $API->connect($ip, $mkuser, $mkpass);
      if (!$API->connected) {
      redirect('dashboard/settings');
          }
  $API->debug = false;
   $getppp = $API->comm('/ppp/secret/getall');
   $getprofile = $API->comm('/ppp/profile/print');
   $TotalReg = count($getppp);


    $data['API'] = $API;
  //  $data['session'] =  $session;
    $data['title'] = 'Traffic';
    $this->load->view('/_template/header',$data);
    $this->load->view('/_template/navbar',$data);
    $this->load->view('/_template/sidebar',$data);

    $this->load->view('/traffic/index',$data);

    $this->load->view('/_template/footer');


  }

   public function show($id) {
           
      $query = $this->db->query("SELECT * FROM device WHERE id = $id");;
$row = $query->row();

if (isset($row))
{
  $sn = $row->sn;
       $last_check = $row->last_check;
        $last_tx = $row->last_tx;
        $last_rx = $row->last_rx;
        $comment = $row->comment;
}

}
  public function update()
  {
    

       if (isset($_GET['sn'])
  and isset($_GET['tx']) and is_numeric($_GET['tx'])
  and isset($_GET['rx']) and is_numeric($_GET['rx'])) {
  $device_serial = substr($_GET['sn'], 0, 12);
} else {
  echo 'fail';
  exit;
}

// Check if device exists

 $this->db->where('sn',$device_serial);

  
 $sql = $this->db->query('SELECT id, sn, comment, last_check, last_tx, last_rx FROM device WHERE sn="'.$device_serial.'"');
 if ($sql->num_rows() > 0) {
  //Add new device

 $data = array(
        'sn' => $device_serial,
              'last_check' => date('Y-m-d H:i:s'),
       'last_tx'   => $_GET['tx'],
        'last_rx'   => $_GET['rx']
);

$this->db->insert('device', $data);


}
else {
  //Update last received data

 $updateData  = array(
        'sn' => $device_serial,
         'last_check' => date('Y-m-d H:i:s'),
       'last_tx'   => $_GET['tx'],
        'last_rx'   => $_GET['rx']
);

$this->db->replace('device', $updateData);


 }



   $updateTraffic = array(
        'device_id' => $device_serial,
            'timestamp' => date('Y-m-d H:i:s'),
       'tx'   => $_GET['tx'],
        'rx'   => $_GET['rx']
);

$this->db->insert('traffic', $updateTraffic);


  redirect('traffic');


  
 



}
}

