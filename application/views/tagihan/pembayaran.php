   <!--  BEGIN CONTENT AREA  -->

   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/plugins/table/datatable/dt-global_style.css">

   <div id="content" class="main-content">
       <div class="layout-px-spacing">

           <div class="row layout-top-spacing">

               <div class="page-header">
                   <div class="page-title">
                       <h3>Pelanggan</h3>
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
                                       <th>Nomor</th>
                                       <th class="text-center">Status</th>
                                       <th class="text-center">Edit</th>

                                   </tr>
                               </thead>
                               <tbody>
                                   <?php
                                    foreach ($tagihan->result_array() as $baris) {




                                        echo "<tr>";
                                        echo "<td>" . $baris['tagihan_id'] . "</td>";
                                        echo "<td>" . $baris['nama'] . "</td>";
                                        echo "<td>" . $baris['nomor'] . "</td>";



                                        echo "<td>" . $baris['mode'] . "</td>";
                                        if ($baris['tempo'] == date('d')) {
                                            echo ' <td class="text-center"><a 
                            href="javascript:();"
                            data-id="' . $baris['idp'] . ' "
                            data-paket="' . $baris['paket'] . ' "
                         
                            data-toggle="modal" data-target="#tambahtagihan" data-toggle="modal" data-target="#ubah-data"<button class="btn btn-outline-danger mb-2">TAMBAH TAGIHAN</button></a></td>';
                                        } else {
                                            echo "<td class='text-center'><span class='badge badge-success'>" . $baris['tempo'] . "  BELUM JATUH TEMPO</span></td>";
                                        }



                                        echo '<td class="text-center"> <ul class="table-controls"> <li>
   <a 
                            href="javascript:();"
                            data-id="' . $baris['idp'] . ' ?>"
                            data-nama="' .  $baris['nama'] . '"
                            data-password="' .  $baris['password'] . '"
                            data-paket="' . $baris['paket'] . '"
                            data-tempo="' . $baris['tempo'] . '"
                            data-toggle="modal" data-target="#edit-data" data-toggle="modal" data-target="#ubah-data" data-placement="top" title="Edit" data-original-title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" class="feather feather-printer" data-toggle="tooltip" data-placement="top" data-original-title="whatsapp"  viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg></a></td></li>
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





       </div>


       <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel1' aria-hidden='true'>
           <div class='modal-dialog' role='document'>
               <div class='modal-content'>
                   <div class='modal-header'>
                       <h5 class='modal-title' id='exampleModalLabel1'>TAMBAH CLIENT</h5>
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

                       <form action="<?= base_url('pelanggan/add'); ?>" method="post">
                           <div class='row mb-4'>
                               <div class='col'>
                                   <input type='text' name='nama' class='form-control' placeholder='...@bali.net' required>
                               </div>
                               <div class='col'>
                                   <input type='password' name='password' class='form-control' placeholder='password' required>
                               </div>

                               <div class='col'>
                                   <select name='paket' id='paket' class='custom-select mb-4'>
                                       <?php foreach ($paket->result() as $baris) { ?>
                                           <option value="<?php echo $baris->paket; ?>" title="<?php echo $baris->paket; ?>"><?php echo $baris->tarif; ?></option>
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
               $('#edit-data').on('show.bs.modal', function(event) {
                   var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                   var modal = $(this)

                   // Isi nilai pada field
                   modal.find('#id').attr("value", div.data('id'));
                   modal.find('#paket').attr("value", div.data('paket'));
                   modal.find('#tempo').attr("value", div.data('tempo'));
                   modal.find('#nama').attr("value", div.data('nama'));
                   modal.find('#password').attr("value", div.data('password'));
               });
           });
       </script>
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
                       <form action="<?= base_url('pelanggan/edit'); ?>" method="post">
                           <div class='row mb-4'>
                               <div class='col'>
                                   <input type='text' name='nama' id='nama' class='form-control' placeholder='...@bali.net' required>
                               </div>
                               <div class='col'>
                                   <input type='password' name='password' id='password' class='form-control' placeholder='password' required>
                               </div>

                               <div class='col'>
                                   <select name='paket' id='paket' class='custom-select mb-4'>
                                       <?php foreach ($paket->result() as $baris) { ?>
                                           <option value="<?php echo $baris->paket; ?>" title="<?php echo $baris->paket; ?>"><?php echo $baris->tarif; ?></option>
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
               $('#tambahtagihan').on('show.bs.modal', function(event) {
                   var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                   var modal = $(this)

                   // Isi nilai pada field
                   modal.find('#id').attr("value", div.data('id'));
                   modal.find('#paket').attr("value", div.data('paket'));

               });
           });
       </script>
       <!-- Modal -->


       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahtagihan" class="modal fade">
           <div class='modal-dialog' role='document'>
               <div class='modal-content'>
                   <div class='modal-header'>
                       <h5 class='modal-title' id='exampleModalLabel'>Tagihan Data</h5>
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
                       <form action="<?= base_url('tagihan/add'); ?>" method="post">
                           <div class='row mb-4'>
                               <div class='col'>
                                   <input type='text' name='id' id='id' class='form-control' placeholder='...@bali.net' required>
                               </div>
                               <div class='col'>
                                   <input type='text' name='paket' id='paket' class='form-control' placeholder='...@bali.net' required>
                               </div>

                               <div class='col'>

                                   <select class='custom-select mb-4' name='pembayaran' id='pembayaran' data-live-search="true">
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
           $('.widget-content .warning.confirm').on('click', function() {
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
                           url: '<?= base_url(''); ?>/pelanggan/isolir/' + id + paket + pembayaran,
                           type: 'DELETE',
                           error: function() {
                               alert('Something is wrong');
                           },
                           success: function(data) {
                               $("#" + id).remove();
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