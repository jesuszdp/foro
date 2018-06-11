// console.log('hola');
Highcharts.chart('container', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Total de trabajos registrados por género'
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
						['Femenino', parseFloat(data_grafica.genero[0]['count'])],
					  ['Masculino', parseFloat(data_grafica.genero[1]['count'])],
						//['Otro', parseFloat(data_grafica.genero[2]['count'])],


					]
	    }]
	});
