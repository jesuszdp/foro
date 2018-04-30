<?php
/**
 * @author Christian Garcia
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('render_menu')) {

    function render_menu($menu = [], $dropdown = null) {
//        pr($menu);
        $html = '';
        ob_start();
        ?>
        <ul class="nav  <?php echo ($dropdown != null ? 'collapse' : ''); ?>" <?php echo ($dropdown != null ? 'id="' . $dropdown . '" style="margin-left: 20px;"' : ''); ?>>
            <?php
            foreach ($menu as $item) {
//                pr($item);
                $enlace = '#';
                if (isset($item['link'])) {
                    if (startsWith($item['link'], 'http://') || startsWith($item['link'], 'https://')) {
                        $enlace = $item['link'];
                    } else if (empty($item['link'])) {
                        $enlace = '#';
                    } else {
                        $enlace = site_url() . $item['link'];
                    }
                }
                ?>
                <li class="<?php echo (isset($item['childs']) ? '' : '') ?>" style="list-style-type: none;">

                    <a href="<?php echo (isset($item['childs']) || $item['id_menu'] == 'CENSO' ? '#' : $enlace); ?>" <?php echo (isset($item['childs']) || $item['id_menu'] == 'CENSO' ? 'data-toggle="collapse" data-target="#menu' . $item['id_menu'] . '"' : ' id="tablero-menu-item-' . $item['id_menu'] . '" class="tablero-menu-item" '); ?>
                    <?php
                    if (isset($item['configurador'])) {
                        switch ($item['configurador']) {
                            case 'EXTERNO':
                                echo ' target="_blank" ';
                                break;
                            case 'MODAL':
                                echo ' data-toggle="modal" data-target="#my_modal" onclick="modal_menu(\'' . $enlace . '\')"';
                                break;
                        }
                    }
                    ?>

                       >
                        <i class="<?php echo ((isset($item['icon']) && !empty($item['icon'])) ? $item['icon'] : 'dashboard'); ?>"></i>
                        <?php
                        if (isset($item['titulo'])) {
                            ?>
                            <?php echo $item['titulo']; ?>
                            <?php
                        }
                        ?>
                    </a>
                    <?php
                    if (isset($item['childs'])) {
                        //pr($item['childs']);
                        echo render_menu($item['childs'], 'menu' . $item['id_menu']);
                    }
                    if ($item['id_menu'] == 'CENSO') {
//                        render_elementos_censo($elementos_censo);
                    }
                    ?>
                </li>
            <?php } ?>
        </ul>
        <?php
        $html = ob_get_contents();
        ob_get_clean();
        return $html;
    }

}

if (!function_exists('update_lenguaje')) {

    /**
     * 
     * @param type $clave_lenguaje
     */
    function update_lenguaje($clave_lenguaje = 'es') {
        $CI = & get_instance();
        if (isset($CI->session->userdata(En_datos_sesion::__INSTANCIA)['usuario'])) {
            $session = $CI->session->userdata(En_datos_sesion::__INSTANCIA);
            $session['language'] = $clave_lenguaje; //Agrega el lenguaje seleccionado
            $CI->session->set_userdata(En_datos_sesion::__INSTANCIA, $session);
            return TRUE;
        }
        return FALSE;
    }

}

if (!function_exists('obtener_lenguaje_actual')) {

    /**
     * @author LEAS
     * @fecha 30/04/2018
     * @param type $clave_lenguaje
     */
    function obtener_lenguaje_actual($clave_lenguaje = 'es') {
        $CI = & get_instance();
        if (isset($CI->session->userdata(En_datos_sesion::__INSTANCIA)[En_datos_sesion::LANGUAGE])) {
            $clave_lenguaje = $CI->session->userdata(En_datos_sesion::__INSTANCIA)[En_datos_sesion::LANGUAGE];
        }
        return $clave_lenguaje;
    }

}