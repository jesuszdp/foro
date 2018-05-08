$(document).ready(function () {
// Add button Delete in row
    registros();
});
function registros() {

    var name_fields = obtener_cabeceras();
    grid = $('#jsDashboardInvestigadores').jsGrid({
        height: "600px",
        width: "100%",
//        deleteConfirm: "¿Deseas eliminar este registro?",
        filtering: true,
        inserting: false,
        editing: false,
        sorting: false,
        selecting: false,
        paging: true,
        autoload: true,
        pageSize: 4,
        rowClick: function (args) {
            //console.log(args);
        },
        pageButtonCount: 5,
        pagerFormat: "Páginas: {pageIndex} de {pageCount}    {first} {prev} {pages} {next} {last}   Total: {itemCount}",
        pagePrevText: "Anterior",
        pageNextText: "Siguiente",
        pageFirstText: "Primero",
        pageLastText: "Último",
        pageNavigatorNextText: "...",
        pageNavigatorPrevText: "...",
        noDataContent: "No se encontraron datos",
        invalidMessage: "",
        loadMessage: "Por favor espere",
        onItemUpdating: function (args) {
        },
        onItemEditing: function (args) {
        },
        cancelEdit: function () {
        },
        controller: {
            loadData: function (filter) {
                //console.log(filter);
                var d = $.Deferred();
                //var result = null;

                $.ajax({
                    type: "GET",
                    url: site_url + "/inicio/informacion/lista",
                    dataType: "json"
                })
                        .done(function (result) {
                            console.log(result);
//                            var depuracion = get_depurar_totales(result.data);
//                            update_reporte_indicador(depuracion);
//                            console.log(depuracion);
//                            console.log(result.data);
                            var estado_tmp;
                            var nombre_metodologia_tmp;
                            var contadores = {total_delegacion: 0, total_umae: 0, total_externos: 0, total_internos: 0};
                            var res = $.grep(result.data, function (registro) {
                                try {
                                    estado_tmp = JSON.parse(registro.estado);
                                    registro.estado = estado_tmp[lang_tmp];
                                } catch (e) {
                                }
                                try {
                                    nombre_metodologia_tmp = JSON.parse(registro.nombre_metodologia);
                                    registro.nombre_metodologia = nombre_metodologia_tmp[lang_tmp];
                                } catch (e) {
                                }
                                try {//Contadores
                                    if (registro.es_imss == true) {
                                        contadores.total_internos = contadores.total_internos + 1;//Cuenta internos
                                        registro.es_imss = language_text.dashboard.es_imss_si;
                                        switch (registro.nivel_atencion.toString()) {
                                            case "1":
                                                contadores.total_delegacion = contadores.total_delegacion + 1;//Cuenta nivel 1 y 2 como delegación
                                                break;
                                            case "2":
                                                contadores.total_delegacion = contadores.total_delegacion + 1;//Cuenta nivel 1 y 2 como delegación
                                                break;
                                            case "3":
                                                contadores.total_umae = contadores.total_umae + 1;//Cuenta nivel 3 como umae
                                        }
                                    } else {
                                        contadores.total_externos = contadores.total_externos + 1;//Cuenta externos
                                        registro.es_imss = language_text.dashboard.es_imss_no;
                                    }
                                } catch (e) {
                                }

                                return (!filter.folio || (registro.folio !== null && registro.folio.toLowerCase().indexOf(filter.folio.toString().toLowerCase()) > -1))
                                        && (!filter.titulo || (registro.titulo !== null && registro.titulo.toLowerCase().indexOf(filter.titulo.toString().toLowerCase()) > -1))
                                        && (!filter.nombre_metodologia || (registro.nombre_metodologia !== null && registro.nombre_metodologia.toLowerCase().indexOf(filter.nombre_metodologia.toString().toLowerCase()) > -1))
                                        && (!filter.fecha_registro || (registro.fecha_registro !== null && registro.fecha_registro.toLowerCase().indexOf(filter.fecha_registro.toString().toLowerCase()) > -1))
                                        && (!filter.estado || (registro.estado !== null && registro.estado.toString().indexOf(filter.estado.toString()) > -1))
                                        && (!filter.nombre_investigacor || (registro.nombre_investigacor !== null && registro.nombre_investigacor.toString().indexOf(filter.nombre_investigacor.toString()) > -1))
                                        && (!filter.es_imss || (registro.es_imss !== null && registro.es_imss.toString().indexOf(filter.es_imss.toString()) > -1))
                                        ;
                            });
//                            d.resolve(result['data']);
                            tablero_contador(contadores);
                            d.resolve(res);
//                            calcula_ancho_grid('jsReporteHechos', 'jsgrid-header-cell');
                        });
                return d.promise();
            },
            updateItem: function (item) {
            }
        },
        fields: [
            {name: "nombre_investigador", title: name_fields.nombre_investigador, type: "text", inserting: false, editing: false},
            {name: "folio", title: name_fields.folio, type: "text", inserting: false, editing: false},
            {name: "titulo", title: name_fields.titulo, type: "text", inserting: false, editing: false},
            {name: "nombre_metodologia", title: name_fields.nombre_metodologia, type: "text", inserting: false, editing: false},
            {name: "fecha", title: name_fields.fecha, type: "text", inserting: false, editing: false},
            {name: "estado", title: name_fields.estado, type: "text", inserting: false, editing: false},
            {name: "es_imss", title: name_fields.es_imss, type: "text", inserting: false, editing: false},
//            {type: "control", editButton: false, deleteButton: false,
//                searchModeButtonTooltip: "Cambiar a modo búsqueda", // tooltip of switching filtering/inserting button in inserting mode
//                editButtonTooltip: "Editar", // tooltip of edit item button
//                searchButtonTooltip: "Buscar", // tooltip of search button
//                clearFilterButtonTooltip: "Limpiar filtros de búsqueda", // tooltip of clear filter button
//                updateButtonTooltip: "Actualizar", // tooltip of update item button
//                cancelEditButtonTooltip: "Cancelar", // tooltip of cancel editing button
//            }
        ]
    });
}


function obtener_cabeceras() {
    var arr_header = {
        nombre_investigador: language_text.dashboard.nombre_investigador,
        es_imss: language_text.dashboard.es_imss,
        folio: language_text.listado_trabajo.folio,
        titulo: language_text.listado_trabajo.titulo_ttabla,
        nombre_metodologia: language_text.listado_trabajo.tipo_metodologia_tabla,
        fecha: language_text.listado_trabajo.fecha_registro,
        estado: language_text.listado_trabajo.estado_trabajo
    }

    return arr_header;
}

function cabeceras_no_exportar() {
    var arr_header = {
        acciones: 'Acciones',
    }

    return arr_header;
}


function exportar_investigacion(element) {
    var namegrid = $(element).data('namegrid');
    var headers = remove_headers(obtener_cabeceras(), cabeceras_no_exportar());
//    var headers = obtener_cabeceras_implementaciones();
    export_xlsx_grid(namegrid, headers, 'investigacion', 'investigacion');
}

function tablero_contador(contadores) {
    console.log(contadores);
    $("#externos").html(contadores.total_externos);
    $("#internos").html(contadores.total_internos);
    $("#delegacion").html(contadores.total_delegacion);
    $("#umae").html(contadores.total_umae);
}