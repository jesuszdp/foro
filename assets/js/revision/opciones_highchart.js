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

function chart(id_chart, tabla, titulo, ytext, color) {
    console.log("Tabla: ", tabla);
    console.log("Titulo: ", titulo);
    console.log("Ytext: ", ytext);
    console.log("Color: ", color);
    var g = Highcharts.chart(id_chart, {
        data: {
            table: tabla
        },
        chart: {
            type: 'column'
        },
        colors: color,
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
