<script src="<?= base_url(); ?>/plugins/flatpickr/flatpickr.js"></script>
<script src="<?= base_url(); ?>/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>

<link href="<?= base_url(); ?>/assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row invoice layout-top-spacing">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></div>
                </div>

                <div class="doc-container">
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>

                                <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                    <?php foreach ($tagihan->result() as $baris) :         $sms = "Dear Customer%0AReminder%0A
                                   Kami dari Balinet-Hotspot%0A
                                   Ingin konfirmasi pembayaran untuk tagihan periode " . date('F/Y') . " 2021 Apakah sudah ditransfer pembayarannya?%0A%0A
                                   Jika sudah membayarkan tagihannya, mohon abaikan konfirmasi ini.%0A
                                   Jika belum, mohon segera melakukan pembayaran untuk menghindari DISABLE (Pemutusan Koneksi) untuk klien yang belum melakukan pembayaran periode " . date('F/Y') . " %0A%0A
                                   Note %0A
                                   Jika belum terima invoice mohon segera konfirmasi ke kami.%0A%0A
                                   Terimakasih%0A
                                   Balinet-Hotspot" ?>
                                        <li class="nav-item">
                                            <div class="nav-link list-actions" id="invoice-<?php echo $baris->tagihan_id; ?>" data-invoice-id="<?php echo $baris->tagihan_id; ?>">
                                                <div class="f-m-body">
                                                    <div class="f-head">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="f-body">
                                                        <p class="invoice-number">Tagihan #<?php echo $baris->tagihan_id; ?></p>
                                                        <p class="invoice-customer-name"><span>Kepada:</span> <?php echo $baris->nama_pelanggan; ?></p>
                                                        <p class="invoice-customer-name"><span>Status:</span> <?php if ($baris->status_code == 0) {
                                                                                                                    echo '<span class="badge badge-danger"> Belum Lunas</span>';
                                                                                                                } else {
                                                                                                                    echo '<span class="badge badge-info"> Sudah Lunas</span';
                                                                                                                } ?></p>
                                                        <p class="invoice-generated-date">Tanggal: <?php echo $baris->tanggal; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>


                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-container">
                        <div class="invoice-inbox">

                            <div class="inv-not-selected">
                                <p>Open an invoice from the list.</p>
                            </div>

                            <div class="invoice-header-section">
                                <h4 class="inv-number"></h4>
                                <div class="invoice-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                        <rect x="6" y="14" width="12" height="8"></rect>
                                    </svg>
                                    <a target="_blank" href='https://api.whatsapp.com/send?phone=<?php echo $baris->nomor; ?>&text=<?php echo $sms; ?>'>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" class="feather feather-printer" data-toggle="tooltip" data-placement="top" data-original-title="whatsapp" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>


                            <div id="ct">
                                <?php foreach ($tagihan->result() as $baris) :   $hasil_rupiah = "Rp " . number_format($baris->tarif_inv, 2, ',', '.'); ?>

                                    <div class="invoice-<?php echo $baris->tagihan_id; ?>">
                                        <div class="content-section  animated animatedFadeInUp fadeInUp">

                                            <div class="row inv--head-section">

                                                <div class="col-sm-6 col-12">
                                                    <h3 class="in-heading">TAGIHAN</h3>
                                                </div>
                                                <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                    <div class="company-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon">
                                                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                                        </svg>
                                                        <h5 class="inv-brand-name">BALINET-HOTSPOT</h5>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row inv--detail-section">

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-to">Invoice To</p>
                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                    <p class="inv-detail-title">From : BALINET-HOTSPOT</p>
                                                </div>

                                                <div class="col-sm-7 align-self-center">
                                                    <p class="inv-customer-name"><?php echo $baris->nama_pelanggan; ?></p>
                                                    <p class="inv-street-addr"><?php echo $baris->no_pelanggan; ?></p>
                                                    <p class="inv-email-address"><?php echo $baris->nama_pelanggan; ?></p>
                                                </div>
                                                <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                    <p class="inv-list-number"><span class="inv-title">Nomor Tagihan : </span> <span class="inv-number">[invoice number]</span></p>
                                                    <p class="inv-created-date"><span class="inv-title">Tanggal Tagihan : </span> <span class="inv-date"><?php echo $baris->tanggal; ?></span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Jatuh Tempo : </span> <span class="inv-date"><?php echo date('Y-m-d', strtotime($baris->tanggal . ' + 10 days')); ?></span></p>
                                                </div>
                                            </div>

                                            <div class="row inv--product-table-section">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">ID</th>
                                                                    <th scope="col">Nama</th>
                                                                    <th class="text-right" scope="col">Paket</th>
                                                                    <th class="text-right" scope="col">Tarif</th>
                                                                    <th class="text-right" scope="col">Tanggal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $baris->id_pelanggan; ?></td>
                                                                    <td><?php echo $baris->nama_pelanggan; ?></td>
                                                                    <td class="text-right"><?php echo $baris->paket; ?></td>
                                                                    <td class="text-right"><?php echo $hasil_rupiah; ?></td>
                                                                    <td class="text-right"><?php echo $baris->tanggal; ?></td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                    <div class="inv--payment-info">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-12">
                                                                <h6 class=" inv-title">Info Pembayaran:</h6>
                                                            </div>
                                                            <div class="col-sm-4 col-12">
                                                                <p class=" inv-subtitle">Nama Bang: </p>
                                                            </div>
                                                            <div class="col-sm-8 col-12">
                                                                <p class="">Bank BCA</p>
                                                            </div>
                                                            <div class="col-sm-4 col-12">
                                                                <p class=" inv-subtitle">Nomor Rekening : </p>
                                                            </div>
                                                            <div class="col-sm-8 col-12">
                                                                <p class="">8730604581</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                    <div class="inv--total-amounts text-sm-right">
                                                        <div class="row">
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Sub Total: </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class=""><?php echo $hasil_rupiah; ?></p>
                                                            </div>

                                                            <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class=""></p>
                                                            </div>
                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                <h4 class="">Grand Total : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                <h4 class="">$14000</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                <?php endforeach; ?>


                            </div>


                        </div>

                        <div class="inv--thankYou">
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <p class="">Thank you for doing Business with us.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        var f1 = flatpickr(document.getElementById('basicFlatpickr'));
    </script>
    <script src="<?= base_url(); ?>/assets/js/apps/invoice.js"></script>