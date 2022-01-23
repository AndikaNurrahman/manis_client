   <!--  BEGIN CONTENT AREA  -->
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/datatables.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/dt-global_style.css">
   <link href="<?= base_url(); ?>/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
   <link href="<?= base_url(); ?>/assets/css/elements/tooltip.css" rel="stylesheet" type="text/css">

   <div class=" flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>">
   </div>

   <div id="content" class="main-content">

       <div class="layout-px-spacing">



           <div class="row layout-top-spacing">





               <div class="page-header">

                   <div class="page-title">

                       <h3>Tagihan</h3>

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

                                       <th>Nama</th>

                                       <th>Status</th>

                                       <th>Paket</th>

                                       <th>Tarif</th>

                                       <th class="text-center">Periode</th>

                                       <th class="text-center">Bayar/Tagih/Isolir</th>

                                 

                                   </tr>

                               </thead>

                               <tbody>



                                   <?php foreach ($tagihan->result() as $baris) : ?>

                                       <tr>

                                           <td><?php echo $baris->nama_pelanggan; ?></td>


                                           <td> <?php if ($baris->status_code == 0) {

                                                    echo '<span class="badge badge-danger"> Belum Lunas</span>';
                                                } else {

                                                    echo '<span class="badge badge-info"> Sudah Lunas</span';
                                                } ?></td>

                                           <td><?php echo $baris->paket; ?></td>

                                           <td><?php echo $hasil_rupiah = "Rp " . number_format($baris->tarif_inv, 2, ',', '.'); ?></td>



                                           <td class="text-center"><?php $tgl = $baris->tanggal;

                                                                    $tglr = date('Y-m', strtotime($tgl));

                                                                    echo format_indo($tglr); ?></td>



                                           <td class="text-center">

                                               <ul class="table-controls">



                                                   <li>

                                                       <a href="javascript:();" data-id="<?php echo $baris->tagihan_id; ?> ?>" data-admin="<?= substr($user, 0, 6); ?>" data-paket="<?php echo $baris->nama_pelanggan; ?>" data-tarif="<?php echo $baris->tarif_inv; ?>" data-nomor="<?php echo $baris->no_pelanggan; ?>" data-toggle="modal" data-target="#edit-data" data-toggle="modal" data-target="#ubah-data" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary">

                                                               <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                               <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                           </svg></a>
                                                   </li>
                                                   <li>
                                                       <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $baris->no_pelanggan; ?>&text=<?php  $sms = "Dear Customer%0AReminder%0A
Kami dari Balinet-Hotspot%0A
Ingin konfirmasi pembayaran untuk tagihan periode " . date('F/Y/')  . " Apakah sudah ditransfer pembayarannya?%0A%0A
Jika sudah membayarkan tagihannya, mohon abaikan konfirmasi ini.%0A

Terimakasih%0A
Balinet-Hotspot"; echo $sms; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="whatsapp"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" class="feather feather-check-circle text-success" data-toggle="tooltip" data-placement="top" data-original-title="whatsapp" viewBox="0 0 24 24">
                                                               <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                                           </svg></a>
                                                   </li>
                                                   <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Isolir" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
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



                               <input type="hidden" id="id" name="id" value="id">
                               <input type="hidden" id="admin" name="admin">



                               <div class='col'>
                                   <h5>Nama</h5>
                                   <input type='text' name='paket' id='paket' class='form-control' placeholder='1 MBPS' readonly>
                               </div>
                               <div class='col'>
                                   <h5>Harga</h5>
                                   <input type='text' name='tarif' id='tarif' class='form-control' placeholder='RP.100000' readonly>
                               </div>
                               <div class='col'>
                                   <h5>Nomor</h5>
                                   <input type='text' name='nomor' id='nomor' class='form-control' readonly>
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
                   modal.find('#admin').attr("value", div.data('admin'));
                   modal.find('#paket').attr("value", div.data('paket'));
                   modal.find('#tarif').attr("value", div.data('tarif'));
                   modal.find('#nomor').attr("value", div.data('nomor'));
                   modal.find('#comment').attr("value", div.data('comment'));

               });

           });
       </script>

       <script>
           const flashdata = $('.flash-data').data('flashdata');

           if (flashdata) {

               swal({



                   title: 'Perhatian',

                   text: flashdata,

                   padding: '2em'

               });



           }
       </script>

       <script>
           $('.widget-content .message').on('click', function() {

               swal({

                   title: 'Saved succesfully',

                   padding: '2em'

               })

           })
           
       </script>
          <script src="<?= base_url(); ?>/plugins/highlight/highlight.pack.js"></script>
       <script src="<?= base_url(); ?>/bootstrap/js/popper.min.js"></script>
       <script src="<?= base_url(); ?>/assets/js/elements/tooltip.js"></script>