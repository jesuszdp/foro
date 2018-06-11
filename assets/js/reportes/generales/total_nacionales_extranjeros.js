jQuery(document).ready(function () {


Highcharts.chart('container', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Total de trabajos registrados por nacionales y extranjeros'
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
						['trabajos_nacionales', parseFloat(data_grafica.nacionales_extranjeros[0]['trabajos_nacionales'])],
						['trabajos_extranjeros', parseFloat(data_grafica.nacionales_extranjeros[0]['trabajos_extranjeros'])],


					]
	    }]
	});

	});
