jQuery(document).ready(function () {
    $(".export2pdf").click(function () {
        var chart = $('#container').highcharts();
        chart.exportChartLocal({
            type: 'application/pdf',
            filename: 'my_pdf'
        });
    });
    console.log(language_text);
});

Highcharts.chart('container', {
    lang: textos_lenguaje(),
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: language_text.reportes_generales.t_genero
    },
    tooltip: {
        pointFormat: '<br>' + language_text.reportes.total_gral + '<b>{point.y}</b><br>' +
                '{series.name}: <b>{point.percentage:.1f}%'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>' +
                        language_text.reportes.total_gral + ': <b>{point.y}</b><br> ' +
                        language_text.reportes.porcentaje_lbl + ': {point.percentage:.1f} % ',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
            showInLegend: false
        }
    },
    exporting: {
        buttons: {
            contextButton: {
                enabled: false,
            },
            exportButton: {
                text: language_text.reportes.descarga_lbl,
                menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.splice(5)
            },
        }
    },
    series: [{
            name: language_text.reportes.porcentaje_lbl,
            colorByPoint: true,
            data: [
                [language_text.reportes_generales.lbl_femenino, parseFloat(data_grafica.genero[0]['count'])],
                [language_text.reportes_generales.lbl_masculino, parseFloat(data_grafica.genero[1]['count'])],
                [language_text.reportes_generales.lbl_otro, parseFloat(data_grafica.genero[2]['count'])],
            ]
        }]
});
