// console.log('hola');
Highcharts.chart('container', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Total de trabajos registrados'
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
						['Cartel', parseFloat(data_grafica.exposiciones[0]['count'])],
						['Oratoria', parseFloat(data_grafica.exposiciones[1]['count'])],
						['Rechazados', parseFloat(data_grafica.rechazados[0]['count'])],
						['No son temas de educación', parseFloat(data_grafica.no_trabajo_educacion[0]['count'])],

					]
	    }]
	});
