
<?php
$_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
$_PERINTAH = "arp -a $_IP_ADDRESS";
ob_start();
system($_PERINTAH);
$_HASIL = ob_get_contents();
ob_clean();
$_PECAH = strstr($_HASIL, $_IP_ADDRESS);
$_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
$_HASIL = substr($_PECAH_STRING[1], 0, 17);
if ($_IP_ADDRESS == "51.79.205.89" ){
	
$proses = $_GET['proses'];
if (isset($proses)) {
$cuser = "";
for($i=1; $i<=10; $i++){
    if (strpos($proses, '2jam') === 0) {
    $user ='2' . rand(12,99).rand(11,99).rand(1,9);
	$wkt = '2h';
    }elseif (strpos($proses, '12jam') === 0) {
    $user ='5' . rand(13,99).rand(23,99).rand(1,9);
	$wkt = '5h';
    }elseif (strpos($proses, '1minggu') === 0) {
    $user ='7' . rand(14,99).rand(16,99).rand(1,9);
    }
include_once('routeros_api.class.php');
$API = new RouterosAPI();
$API->debug = false;
$API->connect( '51.79.205.89:22', 'admin','Meipamei');
	$getname = $API->comm("/ip/hotspot/user/add", array(
      "server" => "all",
      "name" => "$user",
      "password" => "$user",
      "profile" => "$proses",
      "limit-uptime" => "$wkt",
      "disabled" => "no",
    ));
    $cuser = $cuser . " " . $user;
}
include_once('printbt.php');
echo $cuser;
}
$auth = $_GET['auth'];
if ($auth == "meirwan"){
    include_once('html/cetaktukar.html');
}else{
    include_once('html/cetak.html');
}
    
}else{
    echo "access denied";
}
?>

