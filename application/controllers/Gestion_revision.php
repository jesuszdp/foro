<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase que contiene la gestion de catálogos
 * @version 	: 1.0.0
 * @author      : LEAS
 * */
class Gestion_revision extends General_revision {

    const SN_COMITE = 1, REQ_ATENCION = 2, EN_REVISION = 3,
            REVISADOS = 4, ACEPTADOS = 5, RECHAZADOS = 6;

    /**
     * @author LEAS
     * @Fecha 21/05/2018
     * @param type $folio
     * @description genera el espacio de la evaluación
     *
     */
    public function listado_control($tipo = null) {

        switch ($tipo) {
            case Gestion_revision::SN_COMITE:
                $this->sn_comite();
                $main_content = $this->load->view('trabajo/listas_gestor.tpl.php', $output, true);
                $this->template->setMainContent($main_content);
                $this->template->getTemplate();
                break;
            case Gestion_revision::REQ_ATENCION:
                $this->requiere_atencion();
                break;
            case Gestion_revision::EN_REVISION:
                $this->en_revision();
                break;
            case Gestion_revision::REVISADOS:
                $this->revisados();
                break;
            case Gestion_revision::ACEPTADOS:
                $this->aceptados();
                break;
            case Gestion_revision::RECHAZADOS:
                $this->rechazados();
                break;
            default :
        }
    }

    private function sn_comite() {
      return [];
    }

    private function requiere_atencion() {
        return [];
    }

    private function en_revision() {
        return [];
    }

    private function revisados() {
        return [];
    }

    private function aceptados() {
        return [];
    }

    private function rechazados() {
        return [];
    }

}
