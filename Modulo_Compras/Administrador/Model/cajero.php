<?php

class cajero {

    private $cedula_cajero;
    private $nombre_completo;
    private $fecha_nacimiento;
    private $ciudad_nacimiento;
    private $direccion;
    private $telefono;
    private $email;
    private $estado_cajero;

    function __construct($cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_cajero) {
        $this->cedula_cajero = $cedula_cajero;
        $this->nombre_completo = $nombre_completo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->ciudad_nacimiento = $ciudad_nacimiento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->estado_cajero = $estado_cajero;
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

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getEstado_cajero() {
        return $this->estado_cajero;
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

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEstado_cajero($estado_cajero) {
        $this->estado_cajero = $estado_cajero;
    }

}
