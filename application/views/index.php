   <!--  BEGIN CONTENT AREA  -->
   <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
   <div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="page-header">
                <div class="page-title">
                    <h3>Pelanggan</h3>
                    <?php
    // Cek apakah terdapat session nama message
    if($this->session->flashdata('error')){ // Jika ada
      echo'<div class="alert alert-danger">'.$_SESSION['message'].'</div>'; // Tampilkan pesannya
  }?>
  <p>Connect
  </div>
  <td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Tambah</button> </td>
</div>
</div>



<!-- CONTENT AREA -->


<div class="row" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <h4>IP STATIC</h4>

            <div class="table-responsive mb-4 mt-4">
                <table id="default-ordering" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Password</th>
                            <th>No. WA</th>
                            <th>ALamat</th>
                            <th>Paket</th>
                            <th>Tarif</th>
                            <th>Service</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tambah Tagihan</th>
                            <th class="text-center" >Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($query1->result_array() as $baris)

                        {
                          $hasil_rupiah = "Rp " . number_format($baris['tarif'],2,',','.');

/*
                                             $sms = "Dear Customer%0AReminder%0A
Kami dari Balinet-Hotspot%0A
Ingin konfirmasi pembayaran untuk tagihan periode ".date('F/Y')." 2021 Apakah sudah ditransfer pembayarannya?%0A%0A
Jika sudah membayarkan tagihannya, mohon abaikan konfirmasi ini.%0A
Jika belum, mohon segera melakukan pembayaran untuk menghindari DISABLE (Pemutusan Koneksi) untuk klien yang belum melakukan pembayaran periode ".date('F/Y')." %0A%0A
Note %0A
Jika belum terima invoice mohon segera konfirmasi ke kami.%0A%0A
Terimakasih%0A
Balinet-Hotspot"; */

echo "<tr>";
echo "<td>" .$baris['idp']. "</td>";
echo "<td>" . $baris['nama']. "</td>";
echo "<td>" . $baris['password'] . "</td>";
echo "<td>" . $baris['nomor'] . "</td>";
echo "<td>" . $baris['alamat'] . "</td>";
echo "<td>" . $baris['paket'] . "</td>";
echo "<td><span class='badge badge-info'> " . $hasil_rupiah. "</span></td>";


echo "<td>" .$baris['mode']. "</td>";
if($baris['tempo']==date('d')){

   echo "<td class='text-center'><span class='badge badge-success'>".$baris['tempo']."  JATUH TEMPO</span></td>"; 
}else {
  echo "<td class='text-center'><span class='badge badge-success'>".$baris['tempo']."  BELUM JATUH TEMPO</span></td>"; 
}
echo ' <td class="text-center"><a 
href="javascript:();"
data-id="'.$baris['idp'].' "
data-paket="'.$baris['paket'].' "
data-tarif="'. $baris['tarif'] .'"

data-toggle="modal" data-target="#tambahtagihan" data-toggle="modal" data-target="#ubah-data"<button class="btn btn-outline-danger mb-2">TAMBAH TAGIHAN</button></a></td>'; 


echo '<td class="text-center"> <ul class="table-controls"> <li>
<a 
href="javascript:();"
data-id="'.$baris['idp'].' ?>"
data-nama="'.  $baris['nama'] .'"
data-password="'.  $baris['password'] .'"
data-paket="'. $baris['paket'] .'"
data-tarif="'. $baris['tarif'] .'"
data-mode="'. $baris['mode'] .'"
data-tempo="'. $baris['tempo'].'"
data-nomor="'. $baris['nomor'] .'"
data-toggle="modal" data-target="#edit-data" data-toggle="modal" data-target="#ubah-data" data-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></td></li>
</ul>';
/*
                              if ($baris['lunas']==FALSE) {
                              echo "<td class='text-center'><button class='btn btn-primary'><a href='https://api.whatsapp.com/send?phone=".$baris['nomor']."&text=".$sms."'>TAGIH</a></button></td>";  
                            }else {
                              echo "<td class='text-center'><span class='shadow-none badge badge-success'>Tidak Ada Tagihan</span></td>";
                            }
                             echo "<td class='text-center'><button class='mr-2 btn btn-primary  warning confirm'  >ISOLIR</button></td>";
                             */
                             echo "</tr>";






                         } ?>
                     </tfoot>
                 </table>
             </div>
         </div>

     </div>

 </div>




 <div class="row" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <h4>PPPOE</h4>
            <div class="table-responsive mb-4 mt-4">
                <table id="default-ordering1" class="table table-hover" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>No. WA</th>
                        <th>Alamat</th>
                        <th>Paket</th>
                        <th>Tarif</th>
                        <th>Service</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tambah Tagihan</th>
                        <th class="text-center" >Edit</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($query->result_array() as $baris)
                    {
                     $hasil_rupiah = "Rp " . number_format($baris['tarif'],2,',','.');
/*
                                             $sms = "Dear Customer%0AReminder%0A
Kami dari Balinet-Hotspot%0A
Ingin konfirmasi pembayaran untuk tagihan periode ".date('F/Y')." 2021 Apakah sudah ditransfer pembayarannya?%0A%0A
Jika sudah membayarkan tagihannya, mohon abaikan konfirmasi ini.%0A
Jika belum, mohon segera melakukan pembayaran untuk menghindari DISABLE (Pemutusan Koneksi) untuk klien yang belum melakukan pembayaran periode ".date('F/Y')." %0A%0A
Note %0A
Jika belum terima invoice mohon segera konfirmasi ke kami.%0A%0A
Terimakasih%0A
Balinet-Hotspot"; */       
echo "<tr id='" .$baris['idp']. "'>";

echo "<td >" .$baris['idp']. "</td>";

echo "<td>" . $baris['nama']. "</td>";
echo "<td>" . $baris['password'] . "</td>";
echo "<td>" . $baris['nomor'] . "</td>";
echo "<td>" . $baris['alamat'] . "</td>";
echo "<td>" . $baris['paket'] . "</td>";
echo "<td><span class='badge badge-info'> " .  $hasil_rupiah  . "</span></td>";

echo "<td>" .$baris['mode']. "</td>";
if($baris['tempo']==date('d')){
 echo "<td class='text-center'><span class='badge badge-success'>".$baris['tempo']."  JATUH TEMPO</span></td>"; 
}else {
  echo "<td class='text-center'><span class='shadow-none badge badge-success'>".$baris['tempo']."  BELUM JATUH TEMPO</span></td>"; 
}
echo ' <td class="text-center"><a 
href="javascript:();"
data-id="'.$baris['idp'].' "
data-paket="'.$baris['paket'].' "
data-tarif="'. $baris['tarif'] .'"

data-toggle="modal" data-target="#tambahtagihan" data-toggle="modal" data-target="#ubah-data"<button class="btn btn-outline-danger mb-2">TAMBAH TAGIHAN</button></a></td>'; 
echo '<td class="text-center"> <ul class="table-controls"> <li>
<a 
href="javascript:();"
data-id="'.$baris['idp'].'"
data-nama="'.  $baris['nama'] .'"
data-password="'.  $baris['password'] .'"
data-paket="'. $baris['paket_id'] .'"
data-tarif="'. $baris['tarif'] .'"
data-nomor="'. $baris['nomor'] .'"
data-mode="'. $baris['mode'] .'"
data-tempo="'. $baris['tempo'].'"
data-toggle="modal" data-target="#edit-data" data-toggle="modal" data-target="#ubah-data" data-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></td></li>
</ul>';
                  /*
                              if ($baris['lunas']==FALSE) {
                              echo "<td class='text-center'><button class='btn btn-primary'><a href='https://api.whatsapp.com/send?phone=".$baris['nomor']."&text=".$sms."'>TAGIH</a></button></td>";  
                            }else {
                              echo "<td class='text-center'><span class='shadow-none badge badge-success'>Tidak Ada Tagihan</span></td>";
                            }
                             echo "<td class='text-center'><button class='mr-2 btn btn-primary  warning confirm'  >ISOLIR</button></td>";
                             */;
                             echo "</tr>";






                         } ?>
                     </tfoot>
                 </table>
             </div>
         </div>

     </div>

 </div>

</div>

<!-- MODEL TAMBAH PELANGGAN -->
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

            <form action="<?= base_url('pelanggan/add');?>" method="post" >
                <div class='row mb-4'>
                    <div class='col'>
                        <input type='text' name='nama' class='form-control' placeholder='...@bali.net' required>
                    </div>
                    <div class='col'>
                        <input type='password' name='password' class='form-control' placeholder='password' required>
                    </div> 

                    <div class='col'>
                        <select name='paket' id='paket' class='custom-select mb-4'>
                          <?php foreach($paket->result() as $baris ) { ?>
                            <option value="<?php echo $baris->paket_id; ?>" ><?php echo $baris->tarif; ?></option>
                        <?php } ?>
                    </select>

                </div> 

                <select class='custom-select mb-4' name="mode" data-live-search="true">
                    <option value="IPSTATIC">IPSTATIC</option>
                    <option value="PPPOE">PPPOE</option>
                </select>

                <div class='col'>
                    <input type='tel' name='nomor' class='form-control' placeholder='6281949849449' required>
                </div>   
                <div class='col'>
                    <input type='text' name='tempo' class='form-control' placeholder='01' required>
                </div>

            </div>


            <div class='modal-footer'>
                <button class='btn' data-dismiss='modal'><i class='flaticon-cancel-12'></i> Discard</button>
                <button type='submit' name='Save' class='btn btn-primary'>Save</button>
            </div>
        </form>
    </div>
</div>
</div>     
</div>     
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('option[value="' + div.data('mode') + '"]').attr("selected", "selected");
            modal.find('option[value="' + div.data('paket') + '"]').attr("selected", "selected");
            modal.find('#tempo').attr("value",div.data('tempo'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#password').attr("value",div.data('password'));
            modal.find('#nomor').attr("value",div.data('nomor'));


        });
    });
</script>


<!-- MODEL EDIT PELANGGAN -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Edit Data</h5>
                <button type='button'class='close' data-dismiss='modal' aria-label='Close'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'><rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect><rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect><line x1='6' y1='6' x2='6' y2='6'></line><line x1='6' y1='18' x2='6' y2='18'></line></svg>
              </button>
          </div>
          <div class='modal-body'>
              <form action="<?= base_url('pelanggan/edit');?>" method="post" >
                <div class='row mb-4'>
                   <input type='hidden' name='id' id='id' class='form-control' required>
                   <div class='col'>

                    <input type='text' name='nama' id='nama' class='form-control' placeholder='...@bali.net' required>
                </div>

                <div class='col'>
                    <input type='text' name='password' id='password' class='form-control' placeholder='password' required>
                </div> 

                <div class='col'>
                    <select name='paket' id='paket' class='custom-select mb-4'>
                      <?php foreach($paket->result() as $baris ) { ?>
                        <option value="<?php echo $baris->paket_id; ?>" ><?php echo $baris->paket; ?></option>
                    <?php } ?>
                </select>

            </div> 

            <select class='custom-select mb-4' name="mode" id="mode" data-live-search="true">
                <option value="IPSTATIC">IPSTATIC</option>
                <option value="PPPOE">PPPOE</option>
            </select>

            <div class='col'>
                <input type='tel' name='nomor' id='nomor' class='form-control' placeholder='6281949849449' required>
            </div>   
            <div class='col'>
                <input type='text' name='tempo' id='tempo' class='form-control' placeholder='01' required>
            </div>

        </div>


        <div class='modal-footer'>
            <button class='btn' data-dismiss='modal'><i class='flaticon-cancel-12'></i> Discard</button>
            <button type='submit' name='Save' class='btn btn-primary'>Save</button>
        </div>
    </form>
</div>
</div>
</div>     
</div>
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#tambahtagihan').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#paket').attr("value",div.data('paket'));
            modal.find('#tarif').attr("value",div.data('tarif'));
            modal.find('#nomor').attr("value",div.data('nomor'));

        });
    });
</script>
<!-- Modal -->


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahtagihan" class="modal fade">
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Tagihan Data</h5>
                <button type='button'class='close' data-dismiss='modal' aria-label='Close'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'><rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect><rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect><line x1='6' y1='6' x2='6' y2='6'></line><line x1='6' y1='18' x2='6' y2='18'></line></svg>
              </button>
          </div>
          <div class='modal-body'>
              <form action="<?= base_url('tagihan/add');?>" method="post" >
                <div class='row mb-4'>

                    <input type='hidden' name='id' id='id' class='form-control' required>

                    <div class='col'>
                        <input type='text' name='paket' id='paket' class='form-control'  required>
                    </div>
                    <div class='col'>
                        <input type='text' name='tarif' id='tarif' class='form-control'  required>
                    </div>

                    <div class='col'>

                        <select class='custom-select mb-4'  name='pembayaran' id='pembayaran' data-live-search="true">
                            <option value="MANUAL">MANUAL</option>
                            <option value="BCA">BCA</option>
                        </select>

                    </div>
                </div>

                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'><i class='flaticon-cancel-12'></i> Discard</button>
                    <button type='submit' name='Save' class='btn btn-primary'>Save</button>
                </div>
            </form>
        </div>
    </div>
</div>     
</div>
<!-- Modal -->
<script>
  $('.widget-content .warning.confirm').on('click', function () {
     var id = $(this).parents("tr").attr("id");
     swal({
         title: "Are you sure?",
         text: "You will not be able to recover this imaginary file!",
         type: "warning",
         showCancelButton: true,
         confirmButtonClass: "btn-danger",
         confirmButtonText: "Yes, delete it!",
         cancelButtonText: "No, cancel plx!",
         closeOnConfirm: false,
         closeOnCancel: false
     }).then(function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?= base_url('');?>/pelanggan/isolir/'+id+paket+pembayaran,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
            },
            success: function(data) {
              $("#"+id).remove();
              swal("Deleted!", "Your imaginary file has been deleted.", "success");
          }
      });
      } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
  });
 })


</script>
<!-- Modal -->



<script >
    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) {
      swal({

          title: 'Perhatian',
          text: flashdata,
          padding: '2em'
      });

  }
</script>