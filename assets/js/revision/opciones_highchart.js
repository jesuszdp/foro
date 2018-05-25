$(document).ready(function () {
    Highcharts.setOptions({
        lang: {
            contextButtonTitle: "Menú contextual",
            downloadJPEG: "Descargar imagen JPEG",
            downloadPDF: "Descargar documento PDF",
            downloadPNG: "Descargar imagen PNG",
            downloadSVG: "Descargar imagen en vectores SVG",
            drillUpText: "Regresar a {series.ranking}",
            loading: "Cargando...",
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            noData: "No hay datos que mostrar",
            printChart: "Imprimir gráfica",
            resetZoom: "Restablecer zoom",
            resetZoomTitle: "Restablecer zoom nivel 1:1",
            shortMonths: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        }
    });
});

function chart(id_chart, tabla, titulo, ytext, color, typeColumn) {
    if(typeColumn == 'column'){
      var g = Highcharts.chart(id_chart, {
          data: {
              table: tabla
          },
          chart: {
              type: typeColumn,
              backgroundColor: '#3e4b5a'
          },
          //colors: color,
          plotOptions: {
            series: {
              colorByPoint: true,
              animation: false
            }
          },
          title: {
              text: titulo
          },
          legend: {
              enabled: false
          },
          yAxis: {
              allowDecimals: false,
              title: {
                  text: ytext
              },
              visible: false
          },
          // xAxis: {
          //   labels: {
          //       rotation: -90
          //   }
          // }
      });
    }
    if(typeColumn == 'solidgauge'){
      var g = Highcharts.chart(id_chart,{
          data: {
              table: tabla
          },
          chart: {
            type: typeColumn
          },
          title: {
              text: titulo
          },
          pane: {
            center: [
              "50%",
              "85%"
            ],
            size: "140%",
            startAngle: "-90",
            endAngle: "90",
            background: {
              backgroundColor: "#EEE",
              innerRadius: "60%",
              outerRadius: "100%",
              shape: "arc"
            }
          },
          tooltip: {
            "enabled": false
          },
          yAxis: {
            title: {
              y: -70
            },
            labels: {
              y: 16
            },
            stops: [
              [
                0.1,
                "#55BF3B"
              ],
              [
                0.25,
                "#55BF3B"
              ],

              [
                0.50,
                "#DDDF0D"
              ],
              [
                0.75,
                "#DF5353"
              ],
              [
                0.9,
                "#DF5353"
              ]
            ],
            min: 0,
            max: 100,
            lineWidth: 0,
            minorTickInterval: null,
            tickPixelInterval: 400,
            tickWidth: 0
          },
          plotOptions: {
            solidgauge: {
              dataLabels: {
                y: 10,
                borderWidth: 0,
                useHTML: true
              }
            },
            series: {
              animation: false,
              dataLabels: {}
            }
          },
          series[0]: {
            dataLabels: {
              format: "<div style=\"text-align:center\"><span style=\"font-size:25px;color:#000000\">{y}</span></div>"
            }
          },
          series: [
            {
              name: "Column 2",
              turboThreshold: 0,
              _symbolIndex: 0,
              _colorIndex: 0,
              marker: {}
            }
          ]
      });
    }
}

Highcharts.setOptions({
 chart: {
   inverted: true,
   marginLeft: 135,
   type: ‘bullet’
 },
 title: {
   text: null
 },
 legend: {
   enabled: false
 },
 yAxis: {
   gridLineWidth: 0
 },
 plotOptions: {
   series: {
     pointPadding: 0.25,
     borderWidth: 0,
     color: ‘#000’,
     targetOptions: {
       width: ‘200%’
     }
   }
 },
 credits: {
   enabled: false
 },
 exporting: {
   enabled: false
 }
});

Highcharts.chart(‘container1’, {
 chart: {
   marginTop: 40
 },
 title: {
   text: ‘2017 YTD’
 },
 xAxis: {
   categories: [‘<span class=“hc-cat-title”>Valoración del trabajo</span><br/>Muy malo’]
 },
 yAxis: {
   plotBands: [{
     from: 0,
     to: 25,
     color: ‘#e43b5f’
   }, {
     from: 25,
     to: 50,
     color: ‘#ffc800’
   }, {
     from: 50,
     to: 75,
     color: ‘#6ac0b1’
   }, {
     from: 75,
     to: 100,
     color: ‘#21908e’
   }],
   title: null
 },
 series: [{
   data: [{
     y: 20,
     target: 100
   }]
 }],
 tooltip: {
   pointFormat: ‘<b>Su trabajo se valoró con {point.y}/{point.target} puntos’
 }
});
