<?php

class detalle_factura {

    private $id_detalle;
    private $id_cabeza;
    private $id_pro;
    private $nombre_pro;
    private $cantidad_product;
    private $costo_pro;
    private $porcentaje_iva;
    private $subtotal;
    private $descuento;
    private $valor_total;

//    function __construct($id_detalle, $id_cabeza, $id_pro, $cantidad_product, $descuento, $valor_total) {
//        $this->id_detalle = $id_detalle;
//        $this->id_cabeza = $id_cabeza;
//        $this->id_pro = $id_pro;
//        $this->cantidad_product = $cantidad_product;
//        $this->descuento = $descuento;
//        $this->valor_total = $valor_total;
//    }

    function getSubtotal() {
        return $this->subtotal;
    }

    function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    function getPorcentaje_iva() {
        return $this->porcentaje_iva;
    }

    function setPorcentaje_iva($porcentaje_iva) {
        $this->porcentaje_iva = $porcentaje_iva;
    }

    function getCosto_pro() {
        return $this->costo_pro;
    }

    function setCosto_pro($costo_pro) {
        $this->costo_pro = $costo_pro;
    }

    function getNombre_pro() {
        return $this->nombre_pro;
    }

    function setNombre_pro($nombre_pro) {
        $this->nombre_pro = $nombre_pro;
    }

    function getId_detalle() {
        return $this->id_detalle;
    }

    function getId_cabeza() {
        return $this->id_cabeza;
    }

    function getId_pro() {
        return $this->id_pro;
    }

    function getCantidad_product() {
        return $this->cantidad_product;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getValor_total() {
        return $this->valor_total;
    }

    function setId_detalle($id_detalle) {
        $this->id_detalle = $id_detalle;
    }

    function setId_cabeza($id_cabeza) {
        $this->id_cabeza = $id_cabeza;
    }

    function setId_pro($id_pro) {
        $this->id_pro = $id_pro;
    }

    function setCantidad_product($cantidad_product) {
        $this->cantidad_product = $cantidad_product;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setValor_total($valor_total) {
        $this->valor_total = $valor_total;
    }

}
