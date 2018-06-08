jQuery(document).ready(function () {
//    console.log(data_grafica.data);
//    console.log(get_data_trabajos_calidad());
});

function get_data_trabajos_calidad() {
    var data_r = new Array();
    var objeto = null;
    var objeto_datos = data_grafica.data;

    for (var i in objeto_datos) {
        if (objeto_datos.hasOwnProperty(i)) {
            objeto = objeto_datos[i];
            data_r.push([language_text.reportes_calidad[i], parseFloat(objeto["promedio"]), parseFloat(objeto["total_trabajos"])]);
        }
    }
    return data_r;
}

Highcharts.chart('progressBar', {
    chart: {
        type: 'variwide'
    },
    title: {
        text: language_text.reportes_calidad.calidad_ext_nac_t
    },
    subtitle: {
        text: language_text.reportes_calidad.calidad_ext_nac_ins_st
    },
    xAxis: {
        type: 'category',
        title: {
            text: language_text.reportes_calidad.medicion_x
        }
    },
    legend: {
        enabled: false
    },
    series: [{
            name: 'Calidad',
            data: get_data_trabajos_calidad(),
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}'
            },
            tooltip: {
                pointFormat: language_text.reportes.calidad + ': <b> {point.y}</b><br>' +
                        language_text.reportes.total_trabajos + ': <b> {point.z} </b><br>'
            },
            colorByPoint: true
        }]
});

