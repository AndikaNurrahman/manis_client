   <!--  BEGIN CONTENT AREA  -->
 <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                
                <div class="page-header">
                    <div class="page-title">
                        <h3>PPPOE</h3>
                    </div>
<td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Tambah</button> </td>
                                    </div>
                </div>

                <!-- CONTENT AREA -->
   


                
              
                <div class="row" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Password</th>
                                            <th>Service</th>
                                            <th>Paket</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center" >Edit</th>
                                            <th class="text-center">TAGIH</th>
                                            <th class="text-center">ISOLIR</th>
                                           </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            for($i = 0; $i < $TotalReg; $i++) {
                                          $baris = $ppp[$i];
                                        $pieces = explode("|", $baris['comment']);
                                            $wa = $pieces[0];
                                            $id = str_replace('*', '', $baris['.id']);
                                             $tgl = $pieces[1];
                                             $sms = "Dear Customer%0AReminder%0A
Kami dari Balinet-Hotspot%0A
Ingin konfirmasi pembayaran untuk tagihan periode ".date('F/Y')." 2021 Apakah sudah ditransfer pembayarannya?%0A%0A
Jika sudah membayarkan tagihannya, mohon abaikan konfirmasi ini.%0A
Jika belum, mohon segera melakukan pembayaran untuk menghindari DISABLE (Pemutusan Koneksi) untuk klien yang belum melakukan pembayaran periode ".date('F/Y')." %0A%0A
Note %0A
Jika belum terima invoice mohon segera konfirmasi ke kami.%0A%0A
Terimakasih%0A
Balinet-Hotspot";
                          
                            echo "<tr>";
                             echo "<td>" .$baris['.id']. "</td>";
                            echo "<td>" . $baris['name']. "</td>";
                            echo "<td>" . $baris['password'] . "</td>";
                            echo "<td>" .$baris['service'] . "</td>";
                            echo "<td>" .$baris['profile']. "</td>";
                            if($tgl==date('d')+5){
                                 echo " <td class='text-center'><span class='badge badge-danger'>JATUH TEMPO</span></td>"; 
                             }else {
                                  echo "<td class='text-center'><span class='badge badge-success'>BELUM JATUH TEMPO</span></td>"; 
                             }
                              
                   
                          
                            echo "<td class='text-center'><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Edit</button> </td>";
                            echo "<td class='text-center'><button class='btn btn-primary'><a href='https://api.whatsapp.com/send?phone=".$wa."&text=".$sms."'>TAGIH</a></button></td>";   
                             echo "<td class='text-center'><button class='mr-2 btn btn-primary  warning confirm'  >ISOLIR</button></td>";
                            echo "</tr>";
                           
                               
                                  

                                         
                                       
                      } ?>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                       
                             
                            <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel1' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel1'>TAMBAH CLIENT</h5>
                <button type='button'class='close' data-dismiss='modal' aria-label='Close'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'><rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect><rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect><line x1='6' y1='6' x2='6' y2='6'></line><line x1='6' y1='18' x2='6' y2='18'></line></svg>
                </button>
            </div>
            <div class='modal-body'>
              
<form action="<?= base_url('pppoe/tambahPpp');?>" method="post" >
    <div class='row mb-4'>
        <div class='col'>
            <input type='text' name='name' class='form-control' placeholder='...@beli.net' required>
        </div>
        <div class='col'>
            <input type='password' name='password' class='form-control' placeholder='password' required>
        </div>
      
    </div>
   
 <select name="profile" class='custom-select mb-4'>
    <option name="profile" selected>PAKET</option>
  
                                         <?php 
                                        $API->write('/ppp/profile/getall');
                                        $PROFILE = $API->read();
                                        $p = $PROFILE;
                                        foreach( $p as $index => $baris ) : 
                                            echo "<option name='profile' value='".$baris['name']."'>".$baris['name']."</option>";
                                        endforeach;
                                    ?>
  </select>
<div class='form-group mb-4 mt-3'>
                                            <label for='exampleFormControlFile1'>NOMER WA|tanggal daftar</label>
                                            <input type='tel' name='comment' placeholder='62123456789|1' class='form-control-file' id='exampleFormControlFile1' required>
                                        </div>
            <div class='modal-footer'>
                <button class='btn' data-dismiss='modal'><i class='flaticon-cancel-12'></i> Discard</button>
                <button type='submit' name='Save' class='btn btn-primary'>Save</button>
            </div>
            </form>
        </div>
    </div>
</div>     
   <script src="<?= base_url();?>/plugins/sweetalerts/sweetalert2.min.js"></script>
<!-- Modal -->
<script type="text/javascript">
    $('.widget-content .warning.confirm').on('click', function () {
  swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      padding: '2em'
    }).then(function(result) {
      if (result.value) {
        swal(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
})
</script>
     
   

        