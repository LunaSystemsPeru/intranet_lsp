// Dashboard.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -


$(document).on('nifty.ready', function () {


    // NETWORK CHART
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    $.getJSON("../data/tables/ingresos_egresos.php", function (result) {
        console.log(result);
        var array_ingresos = [];
        var array_egresos = [];
        for (let i in result) {
            var indice = parseInt(result[i]["mes"]);
            var numero = parseFloat(result[i]["ingresos"]);
            var egresos = parseFloat(result[i]["egresos"]);
            array_ingresos.push([indice, numero]);
            array_egresos.push([indice, egresos]);
        }
        //console.log(array_ingresos);

        var dwData = [[1, 500], [2, 3900], [3, 1250], [4, 1600], [5, 200], [6, 800], [7, 1500], [8, 0], [9, 0], [10, 0], [11, 0], [12, 0]],
            upData = [[1, 550], [2, 1000], [3, 0], [4, 0], [5, 1200], [6, 0], [7, 1600], [8, 0], [9, 0], [10, 0], [11, 0], [12, 0]];

        var plot = $.plot('#demo-chart-network', [
            {
                label: 'Ingresos',
                data: array_ingresos,
                lines: {
                    show: true,
                    lineWidth: 0,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.8
                        }, {
                            opacity: 0.8
                        }]
                    }
                },
                points: {
                    show: false
                }
            },
            {
                label: 'Egresos',
                data: array_egresos,
                lines: {
                    show: true,
                    lineWidth: 0,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.4
                        }, {
                            opacity: 0.4
                        }]
                    }
                },
                points: {
                    show: false
                }
            }
        ], {
            series: {
                lines: {
                    show: true
                },
                points: {
                    show: true
                },
                shadowSize: 0 // Drawing is faster without shadows
            },
            colors: ['#b5bfc5', '#25476a'],
            legend: {
                show: true,
                position: 'nw',
                margin: [0, 0]
            },
            grid: {
                borderWidth: 0,
                hoverable: true,
                clickable: true
            },
            yaxis: {
                show: false,
                ticks: 5,
                tickColor: 'rgba(0,0,0,.1)'
            },
            xaxis: {
                show: true,
                ticks: 10,
                tickColor: 'transparent'
            },
            tooltip: {
                show: true,
                content: "<div class='flot-tooltip text-center'><h5 class='text-main'>%s</h5>%y.0 Soles</div>"
            }
        });

    });

    // HDD USAGE - SPARKLINE LINE AREA CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================
    var hddSparkline = function () {

        var array = new Array();
        $.getJSON("../data/dashboard/ordenes_internas.php?tipo=2", function (result) {
            //  console.log(result);
            for (let i in result) {
                array.push(parseInt(result[i]['cantidad']));
            }
            $("#demo-sparkline-area").sparkline(array, {
                type: 'line',
                width: '100%',
                height: '60',
                spotRadius: 4,
                lineWidth: 2,
                lineColor: 'rgba(255,255,255,.85)',
                fillColor: 'rgba(0,0,0,0.1)',
                spotColor: 'rgba(255,255,255,.5)',
                minSpotColor: 'rgba(255,255,255,.5)',
                maxSpotColor: 'rgba(255,255,255,.5)',
                highlightLineColor: '#ffffff',
                highlightSpotColor: '#ffffff',
                tooltipChartTitle: 'Servicios',
                tooltipSuffix: ' ordenes'

            });
        });
    }


    $.getJSON("../data/dashboard/ordenes_internas.php?tipo=1", function (result) {
        for (let i in result) {
            //  console.log(result[i]['total']);
            $("#total_ordenes").html(result[i]['total']);
            $("#cantidad_ordenes").html(result[i]['cantidad']);
        }
    });

    $.getJSON("../data/dashboard/ordenes_internas.php?tipo=3", function (result) {
        for (let i in result) {
            //  console.log(result[i]['total']);
            $("#monto_porfacturar").html(result[i]['total']);
        }
    });

    $.getJSON("../data/dashboard/alquiler.php?tipo=1", function (result) {
        for (let i in result) {
            //  console.log(result[i]['total']);
            $("#total_cobrar_alquiler").html(result[i]['total_porcobrar']);
            $("#total_pagado_alquiler").html(result[i]['total_pagado']);
        }
    });

    $.getJSON("../data/dashboard/ventas_cobros.php", function (result) {
        for (let i in result) {
            //  console.log(result[i]['total']);
            $("#monto_venta_promedio").html(Number.parseFloat(result[i]['promedio']).toFixed(2));
            $("#monto_venta_minimo").html(result[i]['minimo']);
            $("#monto_venta_maximo").html(result[i]['maximo']);
        }
    });

    $.getJSON("../data/dashboard/banco.php", function (result) {
        for (let i in result) {
            //  console.log(result[i]['total']);
            $("#monto_saldo_actual").html(Number.parseFloat(result[i]['saldo']).toFixed(2));
        }
    });

    // EARNING - SPARKLINE LINE CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================
    var earningSparkline = function () {

        $.getJSON("../data/dashboard/alquiler.php?tipo=2", function (result) {
            var a_meses = Array();
            for (let i in result) {
                a_meses[i] = result[i]['contar'];
            }
            //console.log(a_meses);

            $("#demo-sparkline-line").sparkline(
            a_meses,
                {
                    type: 'line',
                    width: '100%',
                    height: '60',
                    spotRadius: 0,
                    lineWidth: 2,
                    lineColor: '#ffffff',
                    fillColor: false,
                    minSpotColor: false,
                    maxSpotColor: false,
                    highlightLineColor: '#ffffff',
                    highlightSpotColor: '#ffffff',
                    tooltipChartTitle: 'en el Mes',
                    tooltipPrefix: '# ',
                    spotColor: '#ffffff',
                    valueSpots: {
                        '0:': '#ffffff'
                    }
                }
        )
            ;
        });
    }

    //datos de venta dle mes
    $.getJSON("../data/dashboard/ventas.php?tipo=2", function (result) {
      //  console.log(result);
        for (let i in result) {
            //  console.log(result[i]['total']);
            $("#total_soles_venta_mes").html(result[i]['cobrado']);
            $("#total_doc_venta_mes").html(result[i]['cant_doc']);
        }
    });


    // SALES - SPARKLINE BAR CHART
    // =================================================================
    // Require sparkline
    // -----------------------------------------------------------------
    // http://omnipotent.net/jquery.sparkline/#s-about
    // =================================================================
    var salesSparkline = function () {

        var array = new Array();

        $.getJSON("../data/dashboard/ventas.php?tipo=1", function (result) {
            for (let i in result) {
                //array.push(parseInt(result[i]['total']));
                array[result[i]['dia'] - 1] = result[i]['total'];
            }

            var now = new Date();
            var diasmes = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();

            for (var x = 0; x < diasmes; x++) {
                if (array[x] == null) {
                    array[x] = 0;
                }
            }
            // console.log(array);

            var barEl = $("#demo-sparkline-bar");
            var barValues = array;
            var barValueCount = barValues.length;
            var barSpacing = 1;

            barEl.sparkline(barValues, {
                type: 'bar',
                height: 78,
                barWidth: Math.round((barEl.parent().width() - (barValueCount - 1) * barSpacing) / barValueCount),
                barSpacing: barSpacing,
                zeroAxis: false,
                tooltipChartTitle: 'Ventas Diarias',
                tooltipSuffix: ' S/',
                barColor: 'rgba(0,0,0,.15)'
            })
        });
    };

    $(window).on('resizeEnd', function () {
        hddSparkline();
        earningSparkline();
        salesSparkline();
    })
    hddSparkline();
    earningSparkline();
    salesSparkline();


    // PANEL OVERLAY
    // =================================================================
    // Require Nifty js
    // -----------------------------------------------------------------
    // http://www.themeon.net
    // =================================================================
    $('#demo-panel-network-refresh').niftyOverlay({
        iconClass: 'demo-psi-repeat-2 spin-anim icon-2x'
    }).on('click', function () {
        var $el = $(this), relTime;

        $el.niftyOverlay('show');


        relTime = setInterval(function () {
            $el.niftyOverlay('hide');
            clearInterval(relTime);
        }, 2000);
    });

});
