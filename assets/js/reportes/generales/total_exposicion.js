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
						['cartel', parseFloat(data_grafica.exposiciones[0]['count'])],
						['oratoria', parseFloat(data_grafica.exposiciones[1]['count'])],
						['rechazados', parseFloat(data_grafica.rechazados[0]['count'])],
						['no_trabajo_educacion', parseFloat(data_grafica.no_trabajo_educacion[0]['count'])],

					]
	    }]
	});
