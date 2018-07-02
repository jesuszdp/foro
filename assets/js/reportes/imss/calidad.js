$(document).ready(function () {
    grafica_umae();
    grafica_delegacion();
    $('.highcharts-container').each(function () {
        $(this).width('100%');
    });
    $('.highcharts-root').each(function () {
        $(this).width('100%');
    });
    $('.highcharts-credits').each(function () {
        $(this).css('display', 'none');
    });
});

function grafica_umae() {
    if (data_grafica_umae.length > 0) {
        Highcharts.chart('grafica_umae', {
            lang: textos_lenguaje(),
            chart: {
                type: 'column'
            },
            title: {
                text: titulo + ' UMAE'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -60,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: yaxis
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: tooltip_grafica + ' <b>{point.y:.1f}</b>'
            },
//        exporting: {
//            buttons: {
//                contextButton: {
//                    enabled: false,
//                },
//                exportButton: {
//                    text: language_text.reportes.descarga_lbl,
//                    menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.splice(5)
//                },
//            }
//        },
            series: [{
                    name: 'Population',
                    data: data_grafica_umae
                }]
        });
    } else {
        $("#pie_porcentaje_umae").html("* " + language_text.reportes.lbl_sin_registros);
        $("#grafica_umae").css("display", "none");
    }
}

function grafica_delegacion() {
  console.log("CHIDA: ", data_grafica_delegacion)
    Highcharts.chart('grafica_delegacion', {
        lang: textos_lenguaje(),
        chart: {
            type: 'column'
        },
        title: {
            text: titulo + ' delegación'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -60,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: yaxis
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: tooltip_grafica + ' <b>{point.y:.1f}</b>'
        },
//        exporting: {
//            buttons: {
//                contextButton: {
//                    enabled: false,
//                },
//                exportButton: {
//                    text: language_text.reportes.descarga_lbl,
//                    menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.splice(5)
//                },
//            }
//        },
        series: [{
                name: 'Population',
                data: data_grafica_delegacion
            }]
    });
}
