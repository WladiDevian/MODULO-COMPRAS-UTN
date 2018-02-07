<?php

class cabeza_factura {

    private $id_cabeza;
    private $cedula_proveedor;
    private $cedula_cajero;
    private $nombres_prov; //only informative
    private $direccion_prov;  //only informative
    private $forma_pago;
    private $fecha_fact;
    private $numero_fact;
    private $base_Imponible;
    private $base_No_Imponible;
    private $Valor_IVA;
    private $Valor_Total;

//    function __construct($id_cabeza, $cedula_proveedor, $cedula_cajero, $forma_pago, $fecha_fact, $numero_fact) {
//        $this->id_cabeza = $id_cabeza;
//        $this->cedula_proveedor = $cedula_proveedor;
//        $this->cedula_cajero = $cedula_cajero;
//        $this->forma_pago = $forma_pago;
//        $this->fecha_fact = $fecha_fact;
//        $this->numero_fact = $numero_fact;
//    }


    function getNombres_prov() {
        return $this->nombres_prov;
    }

    function getDireccion_prov() {
        return $this->direccion_prov;
    }

    function setNombres_prov($nombres_prov) {
        $this->nombres_prov = $nombres_prov;
    }

    function setDireccion_prov($direccion_prov) {
        $this->direccion_prov = $direccion_prov;
    }

    function getBase_Imponible() {
        return $this->base_Imponible;
    }

    function getBase_No_Imponible() {
        return $this->base_No_Imponible;
    }

    function getValor_IVA() {
        return $this->Valor_IVA;
    }

    function getValor_Total() {
        return $this->Valor_Total;
    }

    function setBase_Imponible($base_Imponible) {
        $this->base_Imponible = $base_Imponible;
    }

    function setBase_No_Imponible($base_No_Imponible) {
        $this->base_No_Imponible = $base_No_Imponible;
    }

    function setValor_IVA($Valor_IVA) {
        $this->Valor_IVA = $Valor_IVA;
    }

    function setValor_Total($Valor_Total) {
        $this->Valor_Total = $Valor_Total;
    }

    function getId_cabeza() {
        return $this->id_cabeza;
    }

    function getCedula_proveedor() {
        return $this->cedula_proveedor;
    }

    function getCedula_cajero() {
        return $this->cedula_cajero;
    }

    function getForma_pago() {
        return $this->forma_pago;
    }

    function getFecha_fact() {
        return $this->fecha_fact;
    }

    function getNumero_fact() {
        return $this->numero_fact;
    }

    function setId_cabeza($id_cabeza) {
        $this->id_cabeza = $id_cabeza;
    }

    function setCedula_proveedor($cedula_proveedor) {
        $this->cedula_proveedor = $cedula_proveedor;
    }

    function setCedula_cajero($cedula_cajero) {
        $this->cedula_cajero = $cedula_cajero;
    }

    function setForma_pago($forma_pago) {
        $this->forma_pago = $forma_pago;
    }

    function setFecha_fact($fecha_fact) {
        $this->fecha_fact = $fecha_fact;
    }

    function setNumero_fact($numero_fact) {
        $this->numero_fact = $numero_fact;
    }

}
