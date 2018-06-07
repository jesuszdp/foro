var data_grafica;

function  obtener_rango_calidad(promedio) {
    var valor = '';
    if (promedio >= 0 && promedio <= 4) {
        valor = "Muy malo"
    } else if (promedio >= 5 && promedio <= 8) {
        valor = "Malo"
    } else if (promedio >= 9 && promedio <= 12) {
        valor = "Regular"
    } else if (promedio >= 13 && promedio <= 16) {
        valor = "Bueno"
    } else if (promedio >= 17 && promedio <= 20) {
        valor = "Muy Bueno"
    }
    return valor;
}

