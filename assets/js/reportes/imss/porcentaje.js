$(document).ready(function () {
    grafica_umae();
    grafica_delegacion();
    grafica_nivel_atencion();
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

function porcentajes_umae() {
//    console.log(language_text);
//    console.log(data_grafica);
    var data_r = new Array();
    var objeto = null;
    var objeto_datos = data_grafica.umae;
    for (var i in objeto_datos) {
        if (objeto_datos.hasOwnProperty(i) && objeto_datos[i].total > 0) {
            objeto = objeto_datos[i];
            data_r.push([objeto.nombre_unidad_principal, parseFloat(objeto.total)]);
        }
    }
    return data_r;
}

function porcentajes_delegacion() {
    var data_r = new Array();
    var objeto = null;
    var objeto_datos = data_grafica.delegacion;
    for (var i in objeto_datos) {
        if (objeto_datos.hasOwnProperty(i) && objeto_datos[i].total > 0) {
            objeto = objeto_datos[i];
            data_r.push([objeto.nombre, parseFloat(objeto.total)]);
        }
    }
//    console.log(language_text);
//    console.log(data_r);
    return data_r;
}
function porcentajes_nivel_atencion() {
    var data_r = new Array();
    var objeto_datos = data_grafica.nivel_atencion;
    if (objeto_datos.length > 0) {

        data_r.push([language_text.reportes_imss.lbl_porcentaje_delegacion, parseFloat(objeto_datos[0]['delegacion'])]);
        data_r.push([language_text.reportes_imss.lbl_porcentaje_umae, parseFloat(objeto_datos[0]['umae'])]);
    }

//    console.log(language_text);
//    console.log(data_r);
    return data_r;
}

function grafica_umae() {
    var umae_graf = porcentajes_umae();
    if (umae_graf.length > 0) {

        Highcharts.chart('grafica_umae', {
            lang: textos_lenguaje(),
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: language_text.reportes_imss.titulo_porcentaje + ' UMAE'
            },
            tooltip: {
                pointFormat: language_text.reportes.total_gral + ' <b>{point.y}</b><br>' +
                        language_text.reportes.porcentaje_lbl + ' <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br> ' +
                                language_text.reportes.total_gral + ': <b>{point.y}</b><br> ' +
                                language_text.reportes.porcentaje_lbl + ': {point.percentage:.1f} % ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
                /*/
                 pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                 enabled: false
                 },
                 showInLegend: true
                 }
                 */
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
//            }, chartOptions: {// specific options for the exported image
//                plotOptions: {
//                    series: {
//                        dataLabels: {
//                            enabled: true
//                        }
//                    }
//                }
//            },
//            fallbackToExportServer: false
//        },
            series: [{
                    name: language_text.reportes.total_gral,
                    colorByPoint: true,
                    data: umae_graf
                }]
        });
    } else {
        $("#pie_porcentaje_umae").html("* " + language_text.reportes.lbl_sin_registros);
        $("#grafica_umae").css("display", "none");
    }
}

function grafica_delegacion() {
    var delegacion_graf = porcentajes_delegacion();
    if (delegacion_graf.length > 0) {
        Highcharts.chart('grafica_delegacion', {
            lang: textos_lenguaje(),
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: language_text.reportes_imss.titulo_porcentaje + ' delegación'
            },
            tooltip: {
                pointFormat: language_text.reportes.total_gral + ' <b>{point.y}</b><br>' +
                        language_text.reportes.porcentaje_lbl + ' <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br> ' +
                                language_text.reportes.total_gral + ': <b>{point.y}</b><br> ' +
                                language_text.reportes.porcentaje_lbl + ': {point.percentage:.1f} % ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
                /*/
                 pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                 enabled: false
                 },
                 showInLegend: true
                 }
                 */
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
                    name: language_text.reportes.total_gral,
                    colorByPoint: true,
                    data: delegacion_graf
                }]
        });
    } else {
        $("#pie_porcentaje_del").html("* " + language_text.reportes.lbl_sin_registros);
        $("#grafica_delegacion").css("display", "none");
    }
}

function grafica_nivel_atencion() {
    var delegacion_umae_graf = porcentajes_nivel_atencion();
    Highcharts.chart('grafica_nivel_atencion', {
        lang: textos_lenguaje(),
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: language_text.reportes_imss.title_nivel_atencion
        },
        tooltip: {
            pointFormat: language_text.reportes.total_gral + ' <b>{point.y}</b><br>' +
                    language_text.reportes.porcentaje_lbl + ' <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br> ' +
                            language_text.reportes.total_gral + ': <b>{point.y}</b><br> ' +
                            language_text.reportes.porcentaje_lbl + ': {point.percentage:.1f} % ',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
            /*/
             pie: {
             allowPointSelect: true,
             cursor: 'pointer',
             dataLabels: {
             enabled: false
             },
             showInLegend: true
             }
             */
        },
        series: [{
                name: language_text.reportes.total_gral,
                colorByPoint: true,
                data: delegacion_umae_graf
            }]
    });
}