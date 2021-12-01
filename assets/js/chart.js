
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
    document.querySelector("#chart-2"),
    options
);

chart.render();
