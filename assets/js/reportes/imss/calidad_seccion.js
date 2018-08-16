$(document).ready(function () {

    $('#select_umae').change(function(event) {
        $("#select_umae option[value='0']").remove();
        top_evaluados_umae($(this).val(),$('#select_umae option:selected').text());
    });

    $('#select_delegacion').change(function(event) {
        $("#select_delegacion option[value='0']").remove();
        top_evaluados_delegacion($(this).val(),$('#select_delegacion option:selected').text());
    });

    $('#select_externo').change(function(event) {
        $("#select_externo option[value='0']").remove();
        top_evaluados_externo($(this).val(),$('#select_externo option:selected').text());
    });
    
});

function top_evaluados_umae(id_tm,texto) {
    console.log(id_tm);
    $.ajax({
        url: site_url + '/reportes_institucion/calidad_seccion/umae/' + id_tm,
        dataType: 'json',
    })
    .done(function(data) {
        console.log("success");
        //console.log(data);
        grafica(data,texto,'UMAE','#grafica_umae');
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
}

function top_evaluados_delegacion(id_tm,texto) {
    console.log(id_tm);
    $.ajax({
        url: site_url + '/reportes_institucion/calidad_seccion/delegacion/' + id_tm,
        dataType: 'json',
    })
    .done(function(data) {
        console.log("success");
        //console.log(data);
        grafica(data,texto,'Delegacion','#grafica_delegacion');
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
}

function top_evaluados_externo(id_tm,texto) {
    console.log(id_tm);
    $.ajax({
        url: site_url + '/reportes_institucion/calidad_seccion/externo/' + id_tm,
        dataType: 'json',
    })
    .done(function(data) {
        console.log("success");
        console.log(data);
        grafica(data,texto,'pais','#grafica_externo');
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
}

function grafica(data_grafica,texto,tipo,div) {
    var $container = $(div);
    console.log(div);
    if (data_grafica.length > 0) {
        var chart = new Highcharts.Chart({
            lang: textos_lenguaje(),
            chart: {
                type: 'column',
                renderTo: $container[0],
            },
            title: {
                text: 'Calidad de trabajos evaluados por su '+texto+' en '+tipo+'.'
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
                    text: 'Promedio de trabajos'
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
                pointFormat: 'Trabajos evaluados:  <b>{point.y:.2f}</b>'
            },
            series: [{
                    name: 'Population',
                    data: data_grafica
                }]
        });
    } else {
        $(div).css("display", "none");
    }
}


