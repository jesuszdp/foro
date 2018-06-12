jQuery(document).ready(function () {
    console.log(language_text);
});

Highcharts.chart('container', {
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
	        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    },
			plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
									format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
	            },
	            showInLegend: false
	        }
	    },
	    series: [{
	        name: 'Brands',
	        colorByPoint: true,
	        data: [
						[language_text.reportes_generales.lbl_femenino, parseFloat(data_grafica.genero[0]['count'])],
					  [language_text.reportes_generales.lbl_masculino, parseFloat(data_grafica.genero[1]['count'])],
						[language_text.reportes_generales.lbl_otro, parseFloat(data_grafica.genero[2]['count'])],


					]
	    }]
	});
