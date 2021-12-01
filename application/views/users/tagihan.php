   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
       <div class="layout-px-spacing">

           <div class="row layout-top-spacing">


               <div class="page-header">
                   <div class="page-title">
                       <h3>Tagihan Anda</h3>
                   </div>

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
                                       <th>Nama</th>
                                       <th>Status</th>
                                       <th>Paket</th>
                                       <th>Tarif</th>
                                       <th class="text-center">Tanggal Jatuh Tempo</th>
                                       <th>Edit</th>
                                   </tr>
                               </thead>
                               <tbody>

                                   <?php foreach ($tgh->result() as $baris) : ?>
                                       <tr>
                                           <td><?php echo $baris->nama; ?></td>

                                           <td> <?php if ($baris->status == 0) {
                                                    echo '<span class="badge badge-danger"> Belum Lunas</span>';
                                                } else {
                                                    echo '<span class="badge badge-info"> Sudah Lunas</span';
                                                } ?></td>
                                           <td><?php echo $baris->paket; ?></td>
                                           <td><?php echo $hasil_rupiah = "Rp " . number_format($baris->tarif_inv, 2, ',', '.'); ?></td>

                                           <td class="text-center"><?php echo $baris->tanggal; ?></td>

                                           <td class="text-center">
                                               <ul class="table-controls">

                                                   <li>
                                                       <?php if ($tgh->status == 0) :

                                                        ?>
                                                           <form id="payment-form" method="post" action="<?= base_url(); ?>/snap/finish">

                                                               <input type="hidden" id="id" name="id" value="<?php echo $baris->tagihan_id; ?>">
                                                               <input type="hidden" id="paket" name="paket" value="<?php echo $baris->paket; ?>">
                                                               <input type="hidden" id="tarif" name="tarif" value="<?php echo $baris->tarif; ?>">
                                                               <input type="hidden" id="no" name="no" value="<?php echo $baris->nomor; ?>">
                                                               <input type="hidden" name="result_type" id="result-type" value="">
                                                               <input type="hidden" name="result_data" id="result-data" value="">
                                                               <input type="hidden" id="nama" name="name" value="<?php echo $baris->nama; ?>">
                                                               <submit id="pay-button" class="btn btn-danger">Bayar!</submit>
                                                           </form>
                                                       <?php endif; ?>
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
                       <h5 class='modal-title' id='exampleModalLabel'>Pembayaran</h5>
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

                       <form action="<?= base_url('pembayaran/bayar'); ?>" method="post">
                           <div class='row mb-4'>

                               <input type="hidden" id="id" name="id">

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
                               <label for='exampleFormControlFile1'>Pembayaran</label>

                               <select class='custom-select mb-4' name='pembayaran' id='pembayaran' data-live-search="true">
                                   <option value="MANUAL">MANUAL</option>
                                   <option value="BCA">BCA</option>
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
                   modal.find('#comment').attr("value", div.data('comment'));
               });
           });
       </script>
       <script type="text/javascript">
           $('#pay-button').click(function(event) {
               event.preventDefault();
               $(this).attr("disabled", "disabled");

               var id = $("#id").val();
               var nama = $("#nama").val();
               var paket = $("#paket").val();
               var no = $("#no").val();
               var tarif = $("#tarif").val();

               $.ajax({
                   type: 'POST',
                   url: '<?= site_url() ?>snap/token',
                   data: {
                       id: id,
                       nama: nama,
                       paket: paket,
                       no: no,
                       tarif: tarif
                   },
                   cache: false,

                   success: function(data) {
                       //location = data;

                       console.log('token = ' + data);

                       var resultType = document.getElementById('result-type');
                       var resultData = document.getElementById('result-data');

                       function changeResult(type, data) {
                           $("#result-type").val(type);
                           $("#result-data").val(JSON.stringify(data));
                           //resultType.innerHTML = type;
                           //resultData.innerHTML = JSON.stringify(data);
                       }

                       snap.pay(data, {

                           onSuccess: function(result) {
                               changeResult('success', result);
                               console.log(result.status_message);
                               console.log(result);
                               $("#payment-form").submit();
                           },
                           onPending: function(result) {
                               changeResult('pending', result);
                               console.log(result.status_message);
                               $("#payment-form").submit();
                           },
                           onError: function(result) {
                               changeResult('error', result);
                               console.log(result.status_message);
                               $("#payment-form").submit();
                           }
                       });
                   }
               });
           });
       </script>