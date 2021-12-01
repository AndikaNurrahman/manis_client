   <!--  BEGIN CONTENT AREA  -->
   <link href="<?= base_url(); ?>/assets/css/plugins.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/datatables.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/forms/theme-checkbox-radio.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/dt-global_style.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/custom_dt_custom.css">
   <div id="content" class="main-content">
       <div class="layout-px-spacing">

           <div class="row layout-top-spacing">


               <div class="page-header">
                   <div class="page-title">

                   </div>
                   <h3>Nomor Wa Pengirim </h3>
               


               </div>
           </div>

           <!-- CONTENT AREA -->


           <?php
            // Cek apakah terdapat session nama message
            if ($this->session->flashdata('message')) { // Jika ada
                echo "<script>  swal.fire({
      title: 'Pehatian!',
      text: '" . $_SESSION['message'] . "',
      type: 'success',
      padding: '2em'
    })
</scipt>"; // Tampilkan pesannya
            } ?>


           <div class="row" id="cancel-row">

               <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                   <div class="widget-content widget-content-area br-6">
                       <div class="table-responsive mb-4 mt-4">
                           <table id="default-ordering" class="table table-hover" style="width:100%">
                               <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Nama</th>
                                       <th>Nomor</th>
                                       <th class="text-center">Status</th>
                                       <th class="text-center">Kadaluarsa</th>
                                       <th class="text-center">Edit</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Tambah Nomor</button>

                                   <?php
                                    foreach ($datas as $baris) : if($baris->user_id!=null) { ?>
                                       <tr>
                                           <td><?php echo $baris->user_id; ?></td>
                                           <td><?php echo $baris->project_id; ?></td>
                                           <td><?php echo $baris->sender; ?></td>

                                           <td class="text-center"><?php if ($baris->whatsapp->status == 'disconnected') {
                                                                        echo '<span class="shadow-none badge badge-primary">Tidak Terhubung</span>';
                                                                    } else {
                                                                        echo '<span class="shadow-none badge badge-danger">Terhubung</span>';
                                                                    } ?></td>

                                           <td class="text-center"><?php echo $baris->whatsapp->expired; ?></td>
                                           <td class="text-center">
                                               <ul class="table-controls">

                                                   <li>
                                                       <a href="javascript:();" data-id="<?php echo $baris->user_id; ?> ?>" data-paket="<?php echo $baris->sender; ?>" data-tarif="<?php echo 59000; ?>" data-comment="<?php echo $baris->token; ?>" data-toggle="modal" data-target="#edit-data" data-toggle="modal" data-target="#ubah-data" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary">
                                                               <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                               <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                           </svg></a>
                                                   </li>
                                                   <li>
                                                       <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                                                               <circle cx="12" cy="12" r="10"></circle>
                                                               <line x1="15" y1="9" x2="9" y2="15"></line>
                                                               <line x1="9" y1="9" x2="15" y2="15"></line>
                                                           </svg></a>
                                                   </li>
                                               </ul>
                                           </td>
                                       <?php
                                    }endforeach; ?>
                                       </tr>
                                       </tfoot>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>


       <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
           <div class='modal-dialog' role='document'>
               <div class='modal-content'>
                   <div class='modal-header'>
                       <h5 class='modal-title' id='exampleModalLabel'>TAMBAH TRANSAKSI</h5>
                       <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                           <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'>
                               <rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect>
                               <rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect>
                               <line x1='6' y1='6' x2='6' y2='6'></line>
                               <line x1='6' y1='18' x2='6' y2='18'></line>
                           </svg>
                       </button>
                   </div>
                   <div class='modal-body'>

                       <form action="<?= base_url('transaksi/add'); ?>" method="post">
                           <div class='row mb-4'>
                               <div class='col'>
                                   <h5>Nama</h5>
                                   <input type='text' name='nama' class='form-control' placeholder='Bayar wifi' required>
                               </div>
                               <div class='col'>
                                   <h5>Tarif</h5>
                                   <input type='text' name='tarif' class='form-control' placeholder='100000' required>
                               </div>

                           </div>


                           <div class='form-group mb-4 mt-3'>
                               <label for='exampleFormControlFile1'>Keterangan</label>
                               <select class='custom-select mb-4' name='keterangan' id='pembayaran' data-live-search="true">
                                   <option value="Pemasukan">Pemasukan</option>
                                   <option value="Pengeluaran">Pengeluaran</option>

                               </select>
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
       <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="videoMedia2Label">
            <?php

$image = 'http://www.google.com/doodle4google/images/d4g_logo_global.jpg';
$Data = file_get_contents($qr);
echo $Data;
?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="video-container">
                </div>
            </div>
        </div>
    </div>
</div>

       <div aria-hidden="true" aria-labelledby="myModalLab" role="dialog" tabindex="-1" id="" class="modal fade">
           <div class='modal-dialog' role='document'>
               <div class='modal-content'>
                   <div class='modal-header'>
                       <h5 class='modal-title' id='exampleModalLabel'>Edit Data</h5>
                       <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                           <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-server'>
                               <rect x='2' y='2' width='20' height='8' rx='2' ry='2'></rect>
                               <rect x='2' y='14' width='20' height='8' rx='2' ry='2'></rect>
                               <line x1='6' y1='6' x2='6' y2='6'></line>
                               <line x1='6' y1='18' x2='6' y2='18'></line>
                           </svg>
                       </button>
                   </div>
                   <div class='modal-body'>

                       <form action="<?= base_url('paket/ubah'); ?>" method="post">
                           <div class='row mb-4'>

                               <input type="hidden" id="id" name="paket_id">

                               <div class='col'>
                                   <h5>Nama</h5>
                                   <input type='text' name='paket' id='paket' class='form-control' placeholder='1 MBPS' required>
                               </div>
                               <div class='col'>
                                   <h5>Harga</h5>
                                   <input type='text' name='tarif' id='tarif' class='form-control' placeholder='RP.100000' required>
                               </div>
                           </div>
                           <div class='form-group mb-4 mt-3'>
                               <label for='exampleFormControlFile1'>Keterangan</label>
                               <select class='custom-select mb-4' name='Keterangan' id='pembayaran' data-live-search="true">
                                   <option value="Pemasukan">Pemasukan</option>
                                   <option value="Pengeluaran">Pengeluaran</option>

                               </select>
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
               $('#edit-data').on('show.bs.modal', function(event) {
                   var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                   var modal = $(this)

                   // Isi nilai pada field
                   modal.find('#id').attr("value", div.data('id'));
                   modal.find('#paket').attr("value", div.data('paket'));
                   modal.find('#tarif').attr("value", div.data('tarif'));
                   modal.find('#keterangan').attr("value", div.data('comment'));
               });
           });
       </script>