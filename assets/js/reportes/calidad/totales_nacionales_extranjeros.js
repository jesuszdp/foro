jQuery(document).ready(function () {
    console.log(data_grafica.data);
});


Highcharts.chart('progressBar', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: data_grafica.title
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                [language_text.reportes_calidad.nac_inst, parseFloat(data_grafica.data.trabajos_nacionales_imss)],
                [language_text.reportes_calidad.ext_inst, parseFloat(data_grafica.data.trabajos_extranjeros_imss)],
                [language_text.reportes_calidad.nac_no_inst, parseFloat(data_grafica.data.trabajos_nacionales_no_imss)],
                [language_text.reportes_calidad.ext_no_inst, parseFloat(data_grafica.data.trabajos_extranjeros_no_imss)],
//                ['total_trabajos', parseFloat(data_grafica.data.total_trabajos)],
//                {
//                    name: 'total_trabajos',
//                    y: parseFloat(data_grafica.data.total_trabajos),
//                    sliced: true,
//                    selected: true
//                },
            ]
        }]
});

