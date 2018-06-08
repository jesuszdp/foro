$(document).ready(function() {
    grafica_umae();
    grafica_delegacion();
});

function grafica_umae() {
  Highcharts.chart('grafica_umae', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Porcentaje de trabajos registrados por UMAE'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -60,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'UMAE'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Trabajos registrados: <b>{point.y:.1f}%</b>'
    },
    series: [{
        name: 'Population',
        data: data_grafica_umae,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });
}

function grafica_delegacion() {
  Highcharts.chart('grafica_delegacion', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Porcentaje de trabajos registrados por delegación'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -60,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'UMAE'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>{point.y:.1f}%</b>'
    },
    series: [{
        name: 'Population',
        data: data_grafica_delegacion,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });
}