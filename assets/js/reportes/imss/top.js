$(document).ready(function () {
    grafica_delegacion();
    grafica_umae();
    $('.highcharts-container').each(function () {
        $(this).width('100%');
    });
    $('.highcharts-root').each(function () {
        $(this).width('100%');
    });
});

function grafica_umae() {
    var $container = $('#grafica_umae');
    var chart = new Highcharts.Chart({
        lang: textos_lenguaje(),
        chart: {
            type: 'column',
            renderTo: $container[0],
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
                text: yaxis
            },
            scrollbar: {
                enabled: true,
                showFull: true
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: tooltip_grafica + ' <b>{point.y}</b>'
        },
//        exporting: {
//            buttons: {
//                contextButton: {
//                    enabled: false,
//                },
//                exportButton: {
//                    text: language_text.reportes.descarga_lbl,
//                    menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.splice(5)
//                },
//            }
//        },
        series: [{
                name: 'Population',
                data: data_grafica_umae
            }]
    });
}

function grafica_delegacion() {
    var $container = $('#grafica_delegacion');
    var chart = new Highcharts.Chart({
        lang: textos_lenguaje(),
        chart: {
            type: 'column',
            renderTo: $container[0],
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
            },
            scrollbar: {
                enabled: true,
                showFull: true
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: yaxis
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: tooltip_grafica + ' <b>{point.y}</b>'
        },
//        exporting: {
//            buttons: {
//                contextButton: {
//                    enabled: false,
//                },
//                exportButton: {
//                    text: language_text.reportes.descarga_lbl,
//                    menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.splice(5)
//                },
//            }
//        },
        series: [{
                name: 'Population',
                data: data_grafica_delegacion,
            }]
    }
//    , function(chart) { // on complete
//         console.log("chart = ");
//        console.log(chart);
//        //chart.renderer.path(['M', 0, 0, 'L', 100, 100, 200, 50, 300, 100])
//        chart.renderer.path(['M', 75, 223.5,'L', 259, 47])//M 75 223.5 L 593 223.5
//            .attr({
//                'stroke-width': 2,
//                stroke: 'red'
//            })
//            .add();
//        
//    }
    );
}