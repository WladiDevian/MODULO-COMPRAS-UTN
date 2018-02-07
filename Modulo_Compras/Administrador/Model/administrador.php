<?php

class administrador {

    private $cedula_admin;
    private $nombre_completo;
    private $fecha_nacimiento;
    private $ciudad_nacimiento;
    private $direccion;
    private $telefono;
    private $email;
    private $estado_admin;

    function __construct($cedula_admin, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_admin) {
        $this->cedula_admin = $cedula_admin;
        $this->nombre_completo = $nombre_completo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->ciudad_nacimiento = $ciudad_nacimiento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->estado_admin = $estado_admin;
    }

    function getCedula_admin() {
        return $this->cedula_admin;
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

    function getEstado_admin() {
        return $this->estado_admin;
    }

    function setCedula_admin($cedula_admin) {
        $this->cedula_admin = $cedula_admin;
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

    function setEstado_admin($estado_admin) {
        $this->estado_admin = $estado_admin;
    }

}
