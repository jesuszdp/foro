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
        text: titulo + ' UMAE'
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
        pointFormat: tooltip_grafica + ' <b>{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: data_grafica_umae
    }]
  });
}

function grafica_delegacion() {
  Highcharts.chart('grafica_delegacion', {
    chart: {
        type: 'column'
    },
    title: {
        text: titulo + ' delegación'
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
        pointFormat: tooltip_grafica + ' <b>{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: data_grafica_delegacion
    }]
  });
}