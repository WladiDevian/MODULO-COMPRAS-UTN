<?php

require_once '../Model/Database_Conexion.php';
require_once '../Model/administrador.php';
require_once '../Model/cajero.php';

class Model_Login {

    public function Get_Administrador_by_Cedula_Email($cedula_admin, $email) {

        $validacion = false;
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_administrador where cedula_admin=? and email=?';
        //SELECT * FROM COMPANY WHERE AGE >= 25 AND SALARY >= 65000;
        $consulta = $pdo->prepare($sql);

        $consulta->execute(array($cedula_admin, $email));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);

        $administrador = new administrador($res['cedula_admin'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_admin']);
        if ($administrador->getCedula_admin() == $cedula_admin && $administrador->getEmail() == $email && $administrador->getEstado_admin() == 'ACT') {
            return $validacion = true;
        } else {
            return $validacion = FALSE;
        }
        Database_Conexion::Disconnect();
    }

    public function Get_Administrador($cedula_admin) {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_administrador where cedula_admin=?';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        // $consulta = pg_query($pdo, $sql); 
        $consulta->execute(array($cedula_admin));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        //PG-SQL LINE

        $administrador = new administrador($res['cedula_admin'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_admin']);
        Database_Conexion::Disconnect();

        return $administrador;
    }

    public function Get_Cajero_by_Cedula_Email($cedula_cajero, $email) {

        $validacion = false;
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_cajero where cedula_cajero=?  and email=? ';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula_cajero, $email));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $cajero = new cajero($res['cedula_cajero'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_cajero']);
        if ($cajero->getCedula_cajero() == $cedula_cajero && $cajero->getEmail() == $email  && $cajero->getEstado_cajero() == 'ACT'  ) {
            return $validacion = true;
        } else {
            return $validacion = FALSE;
        }
        Database_Conexion::Disconnect();
    }

    public function Get_Cajero($cedula_cajero) {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_cajero where cedula_cajero=?';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula_cajero));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $cajero = new cajero($res['cedula_cajero'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_cajero']);
        Database_Conexion::Disconnect();

        return $cajero;
    }

}
