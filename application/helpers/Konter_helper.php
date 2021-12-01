<?php


function Konter($nomor, $kode, $idp)
{
	$url = 'https://portalpulsa.com/api/connect/';
	$header = array(
		'portal-userid: P180062',
		'portal-key: 63d03fac28649e947da0d7f1de3fcd2b', // lihat hasil autogenerate di member area
		'portal-secret: d9d0d28bb5073059cbc162d974c84d0e95d7c76000d54895ef9b32805e07b726', // lihat hasil autogenerate di member area
	);
	$data = array(
		'inquiry' => 'I', // konstan
		'code' => $kode, // kode produk
		'phone' => $nomor, // nohp pembeli
		'idcust' => '', // Diisi jika produk memerlukan IDcust seperti: Unlock/Aktivasi Voucher, Game Online (FF, ML, PUBG, dll)
		'trxid_api' => $idp, // Trxid / Reffid dari sisi client
		'no' => '1', // untuk isi lebih dari 1x dlm sehari, isi urutan 1,2,3,4,dst
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$result = curl_exec($ch);
	return $result;
}

function Token($nomor, $kode, $id)
{
	$url = 'https://portalpulsa.com/api/connect/';

	$header = array(
		'portal-userid: P180062',
		'portal-key: 63d03fac28649e947da0d7f1de3fcd2b', // lihat hasil autogenerate di member area
		'portal-secret: d9d0d28bb5073059cbc162d974c84d0e95d7c76000d54895ef9b32805e07b726', // lihat hasil autogenerate di member area
	);



	$data = array(
		'inquiry' => 'PLN', // konstan
		'code' => $kode, // kode produk
		'phone' => $nomor, // nohp pembeli
		'idcust' => $id, // nomor meter atau id pln
		'trxid_api' => $id, // Trxid / Reffid dari sisi client
		'no' => '1', // untuk isi lebih dari 1x dlm sehari, isi urutan 2,3,4,dst
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$result = curl_exec($ch);
	return $result;
}

function Harga($Code)
{

	$url = 'https://portalpulsa.com/api/connect/';
	$header = array(
		'portal-userid: P180062',
		'portal-key: 63d03fac28649e947da0d7f1de3fcd2b', // lihat hasil autogenerate di member area
		'portal-secret: d9d0d28bb5073059cbc162d974c84d0e95d7c76000d54895ef9b32805e07b726', // lihat hasil autogenerate di member area
	);

	$data = array(
		'inquiry' => 'HARGA', // konstan
		'code' => $Code // pilihan: pln, pulsa, game
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$result = curl_exec($ch);

	return $result;
}
