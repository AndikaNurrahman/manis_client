         <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Fg-Yz_s-TgIWTsJ9"></script>
         <div id="content" class="main-content">
             <div class="layout-px-spacing">

                 <div class="page-header">
                     <div class="page-title">
                         <h3>Data User</h3>
                     </div>
                 </div>
                 <div class="row layout-top-spacing">

                     <?php if ($apicon == 1) {

                            foreach ($dbdata->result_array() as $baris) : ?>
                             <?php
                                $bytes = explode('/', $pemakaian[0]['bytes']);
                                $upload = $bytes[0];
                                $download = $bytes[1];

                                ?>
                             <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                 <div class="widget widget-one">
                                     <div class="widget-heading">
                                         <h6 class="">Pemakaian</h6>
                                     </div>
                                     <div class="w-chart">
                                         <div class="w-chart-section">
                                             <div class="w-detail">
                                                 <p class="w-title">Upload</p>
                                                 <p class="w-stats"> <?= formatBytes2($upload); ?></p>
                                             </div>
                                             <div class="w-chart-render-one">
                                                 <div id="total-users"></div>
                                             </div>
                                         </div>

                                         <div class="w-chart-section">
                                             <div class="w-detail">
                                                 <p class="w-title">Download</p>
                                                 <p class="w-stats"><?= formatBytes2($download); ?></p>
                                             </div>
                                             <div class="w-chart-render-one">
                                                 <div id="paid-visits"></div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>


                             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                 <div class="widget widget-account-invoice-two">
                                     <div class="widget-content">
                                         <div class="account-box">
                                             <div class="info">
                                                 <h5 class="">Paket</h5>
                                                 <p class="inv-balance"><?= $baris['paket']; ?></p>
                                                 <h5 class="">Mode</h5>
                                                 <p class="inv-balance"><?= $baris['mode']; ?></p>
                                             </div>
                                             <div class="acc-action">
                                                 <div class="">
                                                     <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                             <line x1="12" y1="5" x2="12" y2="19"></line>
                                                             <line x1="5" y1="12" x2="19" y2="12"></line>
                                                         </svg></a>
                                                     <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                             <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                             <line x1="1" y1="10" x2="23" y2="10"></line>
                                                         </svg></a>
                                                 </div>
                                                 <a href="javascript:void(0);">Upgrade</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                 <div class="widget widget-card-four">
                                     <div class="widget-content">
                                         <div class="w-content">
                                             <div class="w-info">
                                                 <h6 class="value">Jatuh Tempo</h6>
                                                 <h1 class="">Tanggal : <?php echo $baris['tempo']; ?></h1>
                                             </div>
                                             <div class="">
                                                 <div class="w-icon">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                                         <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                         <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                                     </svg>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="progress">
                                             <div class="progress-bar bg-gradient-secondary" role="progressbar" style="<?php if ($baris['tempo'] == date('d')) {
                                                                                                                            echo 'width: 100%';
                                                                                                                        } else {
                                                                                                                            echo 'width: 57%';
                                                                                                                        }  ?>" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                 </div>
             </div>

         <?php endforeach;
                        } ?>



         <div class="row sales">

             <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                 <div class="widget widget-table-one">
                     <div class="widget-heading">
                         <h5 class="">Tagihan</h5>
                     </div>

                     <div class="widget-content">

                         <?php foreach ($tgh->result() as $tg) : ?>
                             <div class="transactions-list">
                                 <div class="t-item">
                                     <div class="t-company-name">
                                         <div class="t-icon">
                                             <div class="icon">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                                     <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                     <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                                 </svg>
                                             </div>
                                         </div>
                                         <div class="t-name">
                                             <h4><?php echo $tg->paket; ?></h4>
                                             <p class="meta-date"><?php echo $tg->tanggal; ?></p>
                                         </div>

                                     </div>
                                     <div class="t-rate rate-inc">
                                         <p><span><?php if ($tg->status_code != 1) {
                                                        echo "Belum Dibayar";
                                                    } else {
                                                        echo "Sudah Dibayar";
                                                    } ?></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
                                                 <line x1="12" y1="5" x2="12" y2="19"></line>
                                                 <polyline points="19 12 12 19 5 12"></polyline>
                                             </svg></p>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; ?>

                     </div>
                 </div>
             </div>

             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                 <div class="widget widget-activity-four">

                     <div class="widget-heading">
                         <h5 class="">Recent Activities</h5>
                     </div>

                     <div class="widget-content">

                         <div class="mt-container mx-auto">
                             <div class="timeline-line">

                                 <div class="item-timeline timeline-primary">
                                     <div class="t-dot" data-original-title="" title="">
                                     </div>
                                     <div class="t-text">
                                         <p><span>Updated</span> Server Logs</p>
                                         <span class="badge badge-danger">Pending</span>
                                         <p class="t-time">Just Now</p>
                                     </div>
                                 </div>

                                 <div class="item-timeline timeline-success">
                                     <div class="t-dot" data-original-title="" title="">
                                     </div>
                                     <div class="t-text">
                                         <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                         <span class="badge badge-success">Completed</span>
                                         <p class="t-time">2 min ago</p>
                                     </div>
                                 </div>


                             </div>
                         </div>

                         <div class="tm-action-btn">
                             <button class="btn">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                     <polyline points="6 9 12 15 18 9"></polyline>
                                 </svg></button>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                 <?php foreach ($tgh->result() as $tg) : ?>
                     <?php if ($tg->status_code == 0) :

                        ?>
                         <div class="widget widget-account-invoice-one">
                             <div class="widget-heading">
                                 <h5 class="">Tagihan id #<?php echo $tg->tagihan_id; ?></h5>
                                 <h5 class="">Periode #<?php $sec = strtotime($tg->tanggal);
                                                        //converts seconds into a specific format  
                                                        echo $newdate = date("M", $sec);  ?></h5>


                             </div>

                             <div class="widget-content">
                                 <div class="invoice-box">

                                     <div class="acc-total-info">
                                         <h5>Balance</h5>
                                         <p class="acc-amount">RP. <?php echo $tg->tarif_inv; ?> </p>
                                     </div>

                                     <div class="inv-detail">
                                         <div class="info-detail-1">
                                             <p><?php echo $tg->paket; ?></p>
                                             <p><?php echo $tg->tarif_inv; ?></p>
                                         </div>
                                         <div class="info-detail-2">
                                             <p>Pajak</p>
                                             <p>0</p>
                                         </div>
                                         <div class="info-detail-3 info-sub">
                                             <div class="info-detail">
                                                 <p>Bulan Kemarin</p>
                                                 <p>0</p>
                                             </div>

                                             <div class="info-detail-sub">
                                                 <p>dll</p>
                                                 <p>00</p>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="inv-action">

                                         <form id="payment-form" method="post" action="<?= base_url(); ?>/snap/finish">

                                             <input type="hidden" id="id" name="id" value="<?php echo $tg->id_pelanggan; ?>">
                                             <input type="hidden" id="paket" name="paket" value="<?php echo $tg->paket; ?>">
                                             <input type="hidden" id="tarif" name="tarif" value="<?php echo $tg->tarif_inv; ?>">
                                             <input type="hidden" id="no" name="no" value="<?php echo $tg->no_pelanggan; ?>">
                                             <input type="hidden" name="result_type" id="result-type" value="">
                                             <input type="hidden" name="result_data" id="result-data" value="">
                                             <input type="hidden" id="nama" name="nama" value="<?php echo $tg->nama_pelanggan; ?>">
                                             <submit id="pay-button" class="btn btn-danger">Pay!</submit>
                                         </form>

                                     </div>
                                 </div>
                             </div>
                         <?php endif; ?>

                     <?php endforeach; ?>
                         </div>
             </div>


         </div>




         </div>

         </div>
         </div>
         <script src="<?= base_url(); ?>/assets/js/widgets/modules-widgets.js"></script>

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