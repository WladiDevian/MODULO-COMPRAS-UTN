<?php

class proveedor {

    private $cedula_proveedor;
    private $cedula_cajero;
    private $nombre_completo;
    private $fecha_nacimiento;
    private $ciudad_nacimiento;
    
//    private $tipo_proveedor;
    private $credito;
    
    private $direccion;
    private $telefono;
    private $email;
    private $estado_prov;

    function __construct($cedula_proveedor, $cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $credito, $direccion, $telefono, $email, $estado_prov) {
        $this->cedula_proveedor = $cedula_proveedor;
        $this->cedula_cajero = $cedula_cajero;
        $this->nombre_completo = $nombre_completo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->ciudad_nacimiento = $ciudad_nacimiento;
//        $this->tipo_proveedor = $tipo_proveedor;
        $this->credito = $credito;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->estado_prov = $estado_prov;
    }

    function getCedula_proveedor() {
        return $this->cedula_proveedor;
    }

    function getCedula_cajero() {
        return $this->cedula_cajero;
    }

    function getNombre_completo() {
        return $this->nombre_completo;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getCiudad_nacimiento() {
        return $this->ciudad_nacimiento;
    }

    function getTipo_proveedor() {
        return $this->tipo_proveedor;
    }

    function getCredito() {
        return $this->credito;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getEstado_prov() {
        return $this->estado_prov;
    }

    function setCedula_proveedor($cedula_proveedor) {
        $this->cedula_proveedor = $cedula_proveedor;
    }

    function setCedula_cajero($cedula_cajero) {
        $this->cedula_cajero = $cedula_cajero;
    }

    function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setCiudad_nacimiento($ciudad_nacimiento) {
        $this->ciudad_nacimiento = $ciudad_nacimiento;
    }

    function setTipo_proveedor($tipo_proveedor) {
        $this->tipo_proveedor = $tipo_proveedor;
    }

    function setCredito($credito) {
        $this->credito = $credito;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEstado_prov($estado_prov) {
        $this->estado_prov = $estado_prov;
    }

}
