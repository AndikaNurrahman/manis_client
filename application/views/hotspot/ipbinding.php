
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Hotspot </h3>
                    </div>

                </div>


                <!-- CONTENT AREA -->
   

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
               <th>Id</th>
               <th>Nama</th>
     <th class='text-center'>Tangal</th>
    <th class='text-center'>Wa</th>
            </tr>
        </thead>
        <tbody>
 <?php
for ($i = 0; $i < $TotalReg; $i++) {
    $binding = $getbinding[$i];
    $id = $binding['.id'];
   
    $commte = $binding['comment'];
 
       $pieces = explode("|", $commte);
      
                                            $rumahan = $pieces[0];
                                             
                                             if ($rumahan=="RUMAHAN") {
                                                $nama = $pieces[1]; 
                                             $tgl = $pieces[2]; 
                                             $wa = $pieces[3]; 
                                           $sms = "Dear Customer%0AReminder%0A
Kami dari Balinet-Hotspot%0A
Ingin konfirmasi pembayaran untuk tagihan periode Maret 2021 Apakah sudah ditransfer pembayarannya?%0A%0A
Jika sudah membayarkan tagihannya, mohon abaikan konfirmasi ini.%0A
Jika belum, mohon segera melakukan pembayaran untuk menghindari DISABLE (Pemutusan Koneksi) untuk klien yang belum melakukan pembayaran periode ".date('m')."2021%0A%0A
Note %0A
Jika belum terima invoice mohon segera konfirmasi ke kami.%0A%0A
Terimakasih%0A
Balinet-Hotspot";
                                                    echo "<tr>";
echo "<td>". $id ."</td>";
echo "<td>". $nama ."</td>";
 if($tgl==date('d')-5){
                                 echo " <td class='text-center'><span class='badge badge-succes'>JATUH TEMPO</span></td>"; 
                             }else {
                                  echo "<td class='text-center'><span class='badge badge-danger'>BELUM JATUH TEMPO</span></td>"; 
                             }
 echo "<td class='text-center'><button class='btn btn-primary'><a href='https://api.whatsapp.com/send?phone=".$wa."&text=".$sms."'>TAGIH</a></button></td>"; 

   echo "</tr>";
                                             };
 };

?>
        </tbody>
    </table>
</div>