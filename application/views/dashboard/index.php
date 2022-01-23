<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<link href="<?= base_url(); ?>/assets/css/components/custom-counter.css" rel="stylesheet" type="text/css">
<script>
    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) {
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            padding: '2em'
        });

        toast({
            type: 'success',
            title: flashdata,
            padding: '2em',
        });


    }
</script>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one">
                    <div class="widget-heading">
                        <h6 class="">Pemasukan Pertahun</h6>
                    </div>
                    <div class="w-chart">
                        <div class="w-chart-section">
                            <div class="w-detail">
                                <p class="w-title">Total Pemasukan</p>
                                <p class="w-stats">RP. <?php $pemasukan = number_format($pertahun['0']['tarif_inv'], 2, ',', '.');
                                                        echo $pemasukan; ?></p>
                            </div>
                            <div class="w-chart-render-one">
                                <div id="total-users"></div>
                            </div>
                        </div>

                        <div class="w-chart-section">
                            <div class="w-detail">
                                <p class="w-title">Total Pengeluaran</p>
                                <p class="w-stats">RP. <?php $pengeluaran = number_format($transaksi['0']['tarif'], 2, ',', '.');
                                                        echo $pengeluaran; ?></p>
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
                                <h5 class="">RP. <?php $bulanini = number_format($tagihan, 2, ',', '.');
                                                            echo $bulanini; ?></h5>
                                <p class="inv-balance">Pendapatan Periode <?php echo format_indo(date('Y-m')); ?>  </p>
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
                                <h6 class="value">RP. <?= number_format($jml, 2, ',', '.');
                                                        ?></h6>
                                <p class=""></p>
                                <p class="">Target Pendapatan Perbulan</p>
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
                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-three">
                    <div class="widget-heading">
                        <div class="w-info">
                            <h5 class="">Pendapatan</h5>
                        </div>
                    </div>

                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent">
                                <div id="s-line" class=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">






                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <div class="w-info">
                            <h5 class="">Jumlah Pelanggan</h5>

                        </div>

                    </div>
                    <div class="widget-content">
                        <div id="charet" class=""></div>
                    </div>

                </div>


            </div>

            <?php if ($apicon == 1) {     ?>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget-four">
                        <div class="widget-heading">
                            <h5 class="">RouterBoard</h5>
                        </div>
                        <div class="widget-content">
                            <div class="vistorsBrowser">
                                <div class="browser-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
                                            <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                            <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                            <line x1="6" y1="6" x2="6" y2="6"></line>
                                            <line x1="6" y1="18" x2="6" y2="18"></line>
                                        </svg>
                                    </div>

                                    <div class="w-browser-details">
                                        <div class="w-browser-info">
                                            <h6>Cpu Load</h6>
                                            <p class="browser-count"><?= $resources['cpu-load'] ?>%</p>
                                        </div>
                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: <?= $resources['cpu-load'] ?>%" aria-valuenow="<?= $resources['cpu-load'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="browser-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
                                            <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                            <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                            <line x1="6" y1="6" x2="6" y2="6"></line>
                                            <line x1="6" y1="18" x2="6" y2="18"></line>
                                        </svg>
                                    </div>
                                    <div class="w-browser-details">

                                        <div class="w-browser-info">
                                            <h6>Free Memory</h6>
                                            <p class="browser-count"><?= formatBytes($resources['free-memory'], 2) ?></p>
                                        </div>

                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: <?= $resources['free-memory'] ?>%" aria-valuenow="650" aria-valuemin="0" aria-valuemax="500000000000000000"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="browser-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server">
                                            <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                            <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                            <line x1="6" y1="6" x2="6" y2="6"></line>
                                            <line x1="6" y1="18" x2="6" y2="18"></line>
                                        </svg>
                                    </div>
                                    <div class="w-browser-details">

                                        <div class="w-browser-info">
                                            <h6>Free HDD</h6>
                                            <p class="browser-count"><?= formatBytes($resources['free-hdd-space'], 2) ?></p>
                                        </div>

                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: <?= $resources['free-hdd-space'] ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="1600000000000000"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="row widget-statistic">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <polyline points="17 11 19 13 23 9"></polyline>
                                        </svg>
                                    </div>
                                    <p class="w-value"><?php $counthotspotactive = $API->comm("/ip/hotspot/active/print", array("count-only" => ""));
                                                        if ($counthotspotactive < 2) {
                                                            $hunit = " item";
                                                        } elseif ($counthotspotactive > 1) {
                                                            $hunit = " items";
                                                        };
                                                        echo  $counthotspotactive, $hunit; ?></p>

                                    <h5 class="">Hotspot Active</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <p class="w-value"><?php $countpppactive = $API->comm("/ppp/active/getall", array("count-only" => ""));
                                                        if ($countpppactive < 2) {
                                                            $hunits = " item";
                                                        } elseif ($countpppactive > 1) {
                                                            $hunits = " items";
                                                        };
                                                        echo  $countpppactive, $hunits; ?></p>

                                    <h5 class="">PPP Active</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-engagement">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                        </svg>
                                    </div>
                                    <p class="w-value"><?= $resources['uptime']; ?></p>

                                    <h5 class="">Uptime</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }  ?>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Belum Lunas</h6>
                                <p class="meta-date">Periode <?php echo format_indo(date('Y-m')); ?> </p>
                            </div>

                        </div>

                        <div class="w-content">
                            <div class="icon--counter-container">

                                <div class="counter-container">

                                    <div class="counter-content">
                                        <h1 class="ico-counter1 ico-counter"><?= $belum; ?></h1>
                                    </div>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather counter-ico feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>

                                    <p class="ico-counter-text">Pelanggan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Lunas</h6>
                                <p class="meta-date">Periode <?php echo format_indo(date('Y-m')); ?> </p>
                            </div>

                        </div>

                        <div class="w-content">
                            <div class="icon--counter-container">

                                <div class="counter-container">

                                    <div class="counter-content">
                                        <h1 class="ico-counter2 ico-counter"><?= $lunas; ?></h1>
                                    </div>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather counter-ico feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>

                                    <p class="ico-counter-text">Pelanggan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-five">
                    <div class="widget-content">

                        <div class="header">
                            <div class="header-body">
                                <h6>Pending</h6>
                                <p class="meta-date">Periode <?php echo format_indo(date('Y-m')); ?></p>
                            </div>

                        </div>

                        <div class="w-content">
                            <div class="icon--counter-container">

                                <div class="counter-container">

                                    <div class="counter-content">
                                        <h1 class="ico-counter3 ico-counter">0</h1>
                                    </div>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather counter-ico feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>

                                    <p class="ico-counter-text">Pelanggan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
</div>
<script src="<?= base_url(); ?>/plugins/counter/jquery.countTo.js"></script>
<script src="<?= base_url(); ?>/assets/js/components/custom-counter.js"></script>
<?php
$label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"] ?>
<script>
    var sline = {
        chart: {
            height: 350,
            type: 'area',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false,
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        series: [{
            name: "Lunas",
            data: <?php echo json_encode($chart); ?>
        }],
        title: {
            text: 'Pendapatan Perbulan',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f1f2f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: <?php echo json_encode($label); ?>,
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#s-line"),
        sline
    );

    chart.render();
</script>
<script>
    /*
    ==================================
        Sales By Category | Options
    ==================================
*/
    var options = {
        chart: {
            type: 'donut',
            width: 380
        },
        colors: ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'],
        dataLabels: {
            enabled: false
        },
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            markers: {
                width: 10,
                height: 10,
            },
            itemMargin: {
                horizontal: 0,
                vertical: 8
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    background: 'transparent',
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '29px',
                            fontFamily: 'Nunito, sans-serif',
                            color: undefined,
                            offsetY: -10
                        },
                        value: {
                            show: true,
                            fontSize: '26px',
                            fontFamily: 'Nunito, sans-serif',
                            color: '#bfc9d4',
                            offsetY: 16,
                            formatter: function(val) {
                                return val
                            }
                        },
                        total: {
                            show: true,
                            showAlways: true,
                            label: 'TOTAL',
                            color: '#888ea8',
                            formatter: function(w) {
                                return w.globals.seriesTotals.reduce(function(a, b) {
                                    return a + b
                                }, 0)
                            }
                        }
                    }
                }
            }
        },
        stroke: {
            show: true,
            width: 25,
            colors: '#0e1726'
        },
        series: [<?php echo json_encode($IPSTATIC); ?>, <?php echo json_encode($PPPOE); ?>],
        labels: ['IPSTATIC', 'PPPOE'],
        responsive: [{
            breakpoint: 1599,
            options: {
                chart: {
                    width: '350px',
                    height: '300px'
                },
                legend: {
                    position: 'bottom'
                }
            },

            breakpoint: 1439,
            options: {
                chart: {
                    width: '150px',
                    height: '290px'
                },
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                        }
                    }
                }
            },
        }]
    }
    var chart = new ApexCharts(
        document.querySelector("#charet"),
        options
    );

    chart.render();
</script>
<script>
    $("#progressbar").progressbar({
        value: 37
    });
</script>
<script src="<?= base_url(); ?>/assets/js/dashboard/dash_1.js"></script>