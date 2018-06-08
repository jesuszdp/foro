jQuery(document).ready(function () {
//    console.log(data_grafica.data);
//    console.log(get_data_trabajos_calidad());
//    ejecucion_grafica();
});
function get_data_trabajos_calidad() {
    var data_r = new Array();
    var objeto = null;
    var text_sexo = '';
    var objeto_datos = data_grafica.data;
    for (var i in objeto_datos) {
        if (objeto_datos.hasOwnProperty(i)) {
            objeto = objeto_datos[i];
            text_sexo = language_text.reportes['rep_sexo_'+i];
            data_r.push([text_sexo, parseFloat(objeto["promedio"]), parseFloat(objeto["total_trabajos"])]);
        }
    }
    return data_r;
}

    Highcharts.chart('progressBar', {
        chart: {
            type: 'variwide'
        },
        title: {
            text: language_text.reportes_calidad.calidad_genero_t
        },
        subtitle: {
            text: language_text.reportes_calidad.calidad_genero_st_fmo
        },
        xAxis: {
            type: 'category',
            title: {
                text: language_text.reportes_calidad.medicion_x
            },
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
            max: 20,
            title: {
                text: language_text.reportes_calidad.medicion_y
            }
        },
        legend: {
            enabled: false
        },
//    tooltip: {
//        pointFormat: 'Trabajos registrados: <b>{point.y:.1f}%</b>'
//    },
        series: [{
                name: 'Calidad',
                data: get_data_trabajos_calidad(),
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f}',
                    color: '#FFFFFF',
                    align: 'right',
                },
                tooltip: {
                    pointFormat: language_text.reportes.calidad + ': <b> {point.y}</b><br>' +
                            language_text.reportes.total_trabajos + ': <b> {point.z} </b><br>'
                },
                colorByPoint: true
            }]
    });
