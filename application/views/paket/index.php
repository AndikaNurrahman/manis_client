   <!--  BEGIN CONTENT AREA  -->
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/datatables.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/tables/table-basic.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/dt-global_style.css">
   <div id="content" class="main-content">
       <div class="layout-px-spacing">

           <div class="row layout-top-spacing">


               <div class="page-header">
                   <div class="page-title">
                       <h3>Paket</h3>
                   </div>
                   <td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Tambah</button> </td>
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
                                       <th>Nama Paket</th>
                                       <th>Harga Paket</th>
                                       <th class="text-center">Data Pembuatan</th>
                                       <th>Edit</th>
                                   </tr>
                               </thead>
                               <tbody>

                                   <?php foreach ($query->result() as $baris) : ?>
                                       <tr>
                                           <td><?php echo $baris->paket_id; ?></td>
                                           <td><?php echo $baris->paket; ?></td>
                                           <td><?php echo $hasil_rupiah = "Rp " . number_format($baris->tarif, 2, ',', '.'); ?></td>

                                           <td class="text-center"><?php echo $baris->date; ?></td>
                                           <td class="text-center">
                                               <ul class="table-controls">

                                                   <li>
                                                       <a href="javascript:();" data-id="<?php echo $baris->paket_id; ?> ?>" data-paket="<?php echo $baris->paket; ?>" data-tarif="<?php echo $baris->tarif; ?>" data-comment="<?php echo $baris->comment; ?>" data-toggle="modal" data-target="#edit-data" data-toggle="modal" data-target="#ubah-data" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary">
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
                                       <?php endforeach; ?>
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
                       <h5 class='modal-title' id='exampleModalLabel'>TAMBAH PAKET</h5>
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

                       <form action="<?= base_url('paket/add'); ?>" method="post">
                           <div class='row mb-4'>
                               <div class='col'>
                                   <h5>Paket</h5>
                                   <input type='text' name='paket' class='form-control' placeholder='1 MBPS' required>
                               </div>
                               <div class='col'>
                                   <h5>Harga</h5>
                                   <input type='text' name='harga' class='form-control' placeholder='RP.100000' required>
                               </div>

                           </div>


                           <div class='form-group mb-4 mt-3'>
                               <label for='exampleFormControlFile1'>Komentar</label>
                               <input type='text' name='comment' placeholder='active' class='form-control' id='exampleFormControlFile1' required>
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


       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
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
                                   <h5>Paket</h5>
                                   <input type='text' name='paket' id='paket' class='form-control' placeholder='1 MBPS' required>
                               </div>
                               <div class='col'>
                                   <h5>Harga</h5>
                                   <input type='text' name='tarif' id='tarif' class='form-control' placeholder='RP.100000' required>
                               </div>
                           </div>

                           <div class='form-group mb-4 mt-3'>
                               <label for='exampleFormControlFile1'>Komentar</label>
                               <input type='text' name='comment' id='comment' placeholder='active' class='form-control' id='exampleFormControlFile1' required>
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
                   modal.find('#comment').attr("value", div.data('comment'));
               });
           });
       </script>