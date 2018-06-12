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
	        text: language_text.reportes_generales.t_exposiciones
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
						[language_text.reportes_generales.lbl_cartel, parseFloat(data_grafica.exposiciones[0]['count'])],
						[language_text.reportes_generales.lbl_oratoria, parseFloat(data_grafica.exposiciones[1]['count'])],
						[language_text.reportes_generales.lbl_rechazados, parseFloat(data_grafica.rechazados[0]['count'])],
						[language_text.reportes_generales.lbl_rechazados_nte, parseFloat(data_grafica.no_trabajo_educacion[0]['count'])],

					]
	    }]
	});
