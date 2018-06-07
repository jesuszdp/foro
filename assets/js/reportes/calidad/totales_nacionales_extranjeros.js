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
                ['trabajos_nacionales', parseFloat(data_grafica.data.trabajos_nacionales)],
                ['trabajos_extranjeros', parseFloat(data_grafica.data.trabajos_extranjeros)],
//                ['total_trabajos', parseFloat(data_grafica.data.total_trabajos)],
                {
                    name: 'total_trabajos',
                    y: parseFloat(data_grafica.data.total_trabajos),
                    sliced: true,
                    selected: true
                },
            ]
        }]
});

