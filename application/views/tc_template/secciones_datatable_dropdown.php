<?php

//Deprecado  por LEAS 16032018
//if (!empty($catalogo_secciones_actividad_docente)) {
  //  $optiones = dropdown_options($catalogo_secciones_actividad_docente, 'id_elemento_seccion', 'label');
//} else {
//}
  //  $optiones = null;
//    $controlador = '/' . $this->uri->rsegment(1) . '/actualiza_tabla/';
echo $this->form_complete->create_element(
        array('id' => 'secciones_datatable', 'type' => 'dropdown',
            'options' => null,
            'first' => array('' => 'Selecciona opción'),
            'value' => (isset($value_secciones)) ? $value_secciones : '',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => '',
                'data-toggle' => '',
//                    'onchange' => 'recarga_datatable(this);',
                'onchange' => 'recarga_grid(this);',
                'data-placement' => 'top',
                'title' => '',
//                    'data-ruta' => $controlador,
            ),
        )
);
?>

