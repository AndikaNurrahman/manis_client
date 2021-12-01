<?php


function Apiwa($nomor, $text, $token)
{

    $curl = curl_init();
    $data = [
        'phone' => $nomor,
        'message' => $text,
        'secret' => false, // or true
        'priority' => false, // or true
    ];

    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        array(
            "Authorization: $token",
        )
    );
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_URL, "https://sawit.wablas.com/api/send-message");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}


function Apiwa2($data)
{
    $curl = curl_init();
    $token = "muv1BiWQEhmMOGGFzG8znFSe5ZvAtCXpkPjJQ9uMaFvywCPlKkkWDbaLmbTDLPAJ";
    $payload = $data;

    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        array(
            "Authorization: $token",
            "Content-Type: application/json"
        )
    );
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($curl, CURLOPT_URL, "https://sawit.wablas.com/api/v2/send-bulk/text");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
}
