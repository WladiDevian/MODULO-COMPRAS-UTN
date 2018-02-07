<?php

class productos {

    private $id_pro;
    private $codigo_pro;
    private $nombre_pro;
    private $descripcion_pro;
    private $iva_pro;
    private $costo_pro;
    private $pvp_pro;
    private $estado_pro;

    function __construct($id_pro, $codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $pvp_pro, $estado_pro) {
        $this->id_pro = $id_pro;
        $this->codigo_pro = $codigo_pro;
        $this->nombre_pro = $nombre_pro;
        $this->descripcion_pro = $descripcion_pro;
        $this->iva_pro = $iva_pro;
        $this->costo_pro = $costo_pro;
        $this->pvp_pro = $pvp_pro;
        $this->estado_pro = $estado_pro;
    }

    function getId_pro() {
        return $this->id_pro;
    }

    function getCodigo_pro() {
        return $this->codigo_pro;
    }

    function getNombre_pro() {
        return $this->nombre_pro;
    }

    function getDescripcion_pro() {
        return $this->descripcion_pro;
    }

    function getIva_pro() {
        return $this->iva_pro;
    }

    function getCosto_pro() {
        return $this->costo_pro;
    }

    function getPvp_pro() {
        return $this->pvp_pro;
    }

    function getEstado_pro() {
        return $this->estado_pro;
    }

    function setId_pro($id_pro) {
        $this->id_pro = $id_pro;
    }

    function setCodigo_pro($codigo_pro) {
        $this->codigo_pro = $codigo_pro;
    }

    function setNombre_pro($nombre_pro) {
        $this->nombre_pro = $nombre_pro;
    }

    function setDescripcion_pro($descripcion_pro) {
        $this->descripcion_pro = $descripcion_pro;
    }

    function setIva_pro($iva_pro) {
        $this->iva_pro = $iva_pro;
    }

    function setCosto_pro($costo_pro) {
        $this->costo_pro = $costo_pro;
    }

    function setPvp_pro($pvp_pro) {
        $this->pvp_pro = $pvp_pro;
    }

    function setEstado_pro($estado_pro) {
        $this->estado_pro = $estado_pro;
    }

}
