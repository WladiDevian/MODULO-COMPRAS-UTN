<?php

require_once '../Model/Database_Conexion.php';
require_once '../Model/administrador.php';
require_once '../Model/cabeza_factura.php';
require_once '../Model/cajero.php';
require_once '../Model/detalle_factura.php';
require_once '../Model/productos.php';
require_once '../Model/proveedor.php';

class CRUD_Admin {

    //========================CRUD--ADMIN=========================================
    public function Insert_Admin($cedula_admin, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_admin) {
        $pdo = Database_Conexion::Connect();
        $sql = 'insert into tbl_administrador (cedula_admin, nombre_completo, fecha_nacimiento, ciudad_nacimiento, direccion, telefono, email, estado_admin) values (?,?,?,?,?,?,?,?)';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        // $consulta = pg_query($pdo, $sql); 
        try {
            $consulta->execute(array($cedula_admin, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_admin));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
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

    public function Get_Administradores() {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_administrador order by cedula_admin asc';
        $resultado_administradores = $pdo->query($sql);
        $listado_administradores = array();
        foreach ($resultado_administradores as $res) {
            $administradores = new administrador($res['cedula_admin'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_admin']);
            array_push($listado_administradores, $administradores);
        }
        Database_Conexion::Disconnect();

        return $listado_administradores;
    }

    public function Update_Admin($cedula_admin, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_admin) {
        $pdo = Database_Conexion::Connect();
        $sql = 'update tbl_administrador set nombre_completo=?, fecha_nacimiento=?, ciudad_nacimiento=?, direccion=?, telefono=?, email=?, estado_admin=? where cedula_admin=?';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        //$consulta = pg_query($pdo, $sql);
        try {
            $consulta->execute(array($nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_admin, $cedula_admin));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        Database_Conexion::Disconnect();

        //$cedula_admin, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_admin
    }

    public function Delete_Admin($cedula_admin) {
        $pdo = Database_Conexion::Connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_administrador where cedula_admin=?";
        $consulta = $pdo->prepare($sql);
        //PGSQL-LINE
        //$consulta = pg_query($pdo, $sql);
        $consulta->execute(array($cedula_admin));
        Database_Conexion::Disconnect();
        //pg_close(Database_Conexion_::Disconnect());
    }

//------------------------------------------------------------------------------
    //===================CRUD--CAJERO===========================================
    public function Insert_Cajero($cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_cajero) {
        $pdo = Database_Conexion::Connect();
        $sql = 'insert into tbl_cajero (cedula_cajero, nombre_completo, fecha_nacimiento, ciudad_nacimiento, direccion, telefono, email, estado_cajero) values (?,?,?, ?,?,? ,?,?)';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        // $consulta = pg_query($pdo, $sql); 
        try {
            $consulta->execute(array($cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_cajero));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
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

    public function Get_Cajeros() {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_cajero order by cedula_cajero asc';
        $resultado_cajeros = $pdo->query($sql);
        $listado_cajeros = array();
        foreach ($resultado_cajeros as $res) {
            $cajeros = new cajero($res['cedula_cajero'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_cajero']);
            array_push($listado_cajeros, $cajeros);
        }
        Database_Conexion::Disconnect();

        return $listado_cajeros;
    }

    public function Update_Cajero($cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_cajero) {
        $pdo = Database_Conexion::Connect();
        $sql = 'update tbl_cajero set nombre_completo=?, fecha_nacimiento=?, ciudad_nacimiento=?, direccion=?, telefono=?, email=?, estado_cajero=? where cedula_cajero=?';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        //$consulta = pg_query($pdo, $sql);
        try {
            $consulta->execute(array($nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_cajero, $cedula_cajero));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        Database_Conexion::Disconnect();
    }

    public function Delete_Cajero($cedula_cajero) {
        $pdo = Database_Conexion::Connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_cajero where cedula_cajero=?";
        $consulta = $pdo->prepare($sql);
        //PGSQL-LINE
        //$consulta = pg_query($pdo, $sql);
        $consulta->execute(array($cedula_cajero));
        Database_Conexion::Disconnect();
        //pg_close(Database_Conexion_::Disconnect());
    }

    //--------------------------------------------------------------------------
    //==================CRUD--PROVEEDOR=========================================
    public function Insert_Proveedor($cedula_proveedor, $cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $credito, $direccion, $telefono, $email, $estado_prov) {
        $pdo = Database_Conexion::Connect();
        $sql = 'insert into tbl_proveedor (cedula_proveedor, cedula_cajero, nombre_completo, fecha_nacimiento, ciudad_nacimiento, credito,  direccion, telefono, email, estado_prov) values (?,?,?,  ?,?, ?,?,?, ?,?)';
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedula_proveedor, $cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $credito, $direccion, $telefono, $email, $estado_prov));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        Database_Conexion::Disconnect();
    }

    //$cedula_proveedor, $cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $tipo_proveedor, $credito, $direccion, $telefono, $email, $estado_prov

    public function Get_Proveedor($cedula_proveedor) {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_proveedor where cedula_proveedor=?';
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula_proveedor));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $proveedor = new proveedor($res['cedula_proveedor'], $res['cedula_cajero'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['credito'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_prov']);

        Database_Conexion::Disconnect();

        return $proveedor;
    }

    public function Get_Proveedores() {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_proveedor order by cedula_proveedor asc';
        $resultado_proveedores = $pdo->query($sql);
        $listado_proveedores = array();
        foreach ($resultado_proveedores as $res) {
            $proveedores = new proveedor($res['cedula_proveedor'], $res['cedula_cajero'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['credito'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_prov']);
            array_push($listado_proveedores, $proveedores);
        }
        Database_Conexion::Disconnect();
        return $listado_proveedores;
    }

    public function Get_Proveedores_Activos() {
        $pdo = Database_Conexion::Connect();
        $sql = "select * from tbl_proveedor where estado_prov = 'ACT' ";
        $resultado_proveedores = $pdo->query($sql);
        $listado_proveedores = array();
        foreach ($resultado_proveedores as $res) {
            $proveedores = new proveedor($res['cedula_proveedor'], $res['cedula_cajero'], $res['nombre_completo'], $res['fecha_nacimiento'], $res['ciudad_nacimiento'], $res['credito'], $res['direccion'], $res['telefono'], $res['email'], $res['estado_prov']);
            array_push($listado_proveedores, $proveedores);
        }
        Database_Conexion::Disconnect();
        return $listado_proveedores;
    }

    public function Update_Proveedor($cedula_proveedor, $cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $credito, $direccion, $telefono, $email, $estado_prov) {

        $pdo = Database_Conexion::Connect();
        $sql = 'update tbl_proveedor set cedula_cajero=? , nombre_completo=?, fecha_nacimiento=?, ciudad_nacimiento=?,  credito=?, direccion=?, telefono=?, email=?, estado_prov=? where cedula_proveedor=?';
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $credito, $direccion, $telefono, $email, $estado_prov, $cedula_proveedor));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        Database_Conexion::Disconnect();
    }

    public function Delete_Proveedor($cedula_proveedor) {
        $pdo = Database_Conexion::Connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_proveedor where cedula_proveedor=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula_proveedor));
        Database_Conexion::Disconnect();
    }

    //--------------------------------------------------------------------------
    //==================CRUD--PRODUCTOS=========================================
    //$id_pro,
    public function Insert_Product($codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $estado_pro) { //$pvp_pro,
        $pdo = Database_Conexion::Connect(); //id_pro,
        $pvp_pro = $costo_pro + ($costo_pro * $iva_pro / 100);
        $sql = 'insert into productos (  codigo_pro, nombre_pro, descripcion_pro, iva_pro, costo_pro, pvp_pro, estado_pro ) values (?,?,?,  ?,?,?, ?)';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        // $consulta = pg_query($pdo, $sql); 
        try {  //$id_pro,
            $consulta->execute(array($codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $pvp_pro, $estado_pro));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        Database_Conexion::Disconnect();
    }

    public function Get_Product($id_pro) {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from productos where id_pro=?';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        // $consulta = pg_query($pdo, $sql); 
        $consulta->execute(array($id_pro));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);

        $product = new productos($res['id_pro'], $res['codigo_pro'], $res['nombre_pro'], $res['descripcion_pro'], $res['iva_pro'], $res['costo_pro'], $res['pvp_pro'], $res['estado_pro']);

        Database_Conexion::Disconnect();
        return $product;
    }

    public function Get_Products() {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from productos order by id_pro asc';
        $resultado_products = $pdo->query($sql);
        $listado_products = array();
        foreach ($resultado_products as $res) {
            $products = new productos($res['id_pro'], $res['codigo_pro'], $res['nombre_pro'], $res['descripcion_pro'], $res['iva_pro'], $res['costo_pro'], $res['pvp_pro'], $res['estado_pro']);

            array_push($listado_products, $products);
        }
        Database_Conexion::Disconnect();

        return $listado_products;
    }

    public function Update_Product($id_pro, $codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $estado_pro) { //$pvp_pro, 
        $pdo = Database_Conexion::Connect();
         $pvp_pro = $costo_pro + ($costo_pro * $iva_pro / 100);
        $sql = 'update productos set codigo_pro=? , nombre_pro=?, descripcion_pro=?, iva_pro=?, costo_pro=?, pvp_pro=?, estado_pro=? where id_pro=?';
        $consulta = $pdo->prepare($sql);
        //PGSQL LINE
        //$consulta = pg_query($pdo, $sql);
        try {
            $consulta->execute(array($codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $pvp_pro, $estado_pro, $id_pro));
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        Database_Conexion::Disconnect();
    }

    public function Delete_Product($id_pro) {
        $pdo = Database_Conexion::Connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from productos where id_pro=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($id_pro));
        Database_Conexion::Disconnect();
        //pg_close(Database_Conexion_::Disconnect());
    }

//===============METHODS FOR BUY AND GENERATES FACTURES=========================       


    public function Adicionar_Detalle($listaFacturaDet, $id_pro, $cantidad) {

        if ($cantidad <= 0) {
            throw new Exception("La cantidad debe ser mayor a cero.");
        }
        //buscamos el producto:
        // $CRUD_ = new CrudModel();
        $producto = $this->Get_Product($id_pro);
        //creamos un nuevo detalle FacturaDet:
        $facturaDet = new detalle_factura();
        $facturaDet->setId_pro($producto->getId_pro());
        $facturaDet->setNombre_pro($producto->getNombre_pro());
        $facturaDet->setCantidad_product($cantidad);
        $facturaDet->setCosto_pro($producto->getCosto_pro());
        $facturaDet->setPorcentaje_iva($producto->getIva_pro());
        $facturaDet->setSubtotal($cantidad * $producto->getCosto_pro());
        //adicionamos el nuevo detalle al array en memoria:
        if (!isset($listaFacturaDet)) {
            $listaFacturaDet = array();
        }
        array_push($listaFacturaDet, $facturaDet);
        return $listaFacturaDet;
    }

    public function Eliminar_Detalle($listaFacturaDet, $id_pro) {
        //buscamos el producto:
        $cont = 0;
        foreach ($listaFacturaDet as $det) {
            if ($det->getId_pro() == $id_pro) {
                unset($listaFacturaDet[$cont]);
                //reindexamos el array para eliminar el lugar vacio:
                $listaFacturaDet = array_values($listaFacturaDet);
                break;
            }
            $cont++;
        }
        return $listaFacturaDet;
    }

    public function calcularBaseImponible($listaFacturaDet) {
        if (!isset($listaFacturaDet)) {
            return 0;
        }
        $baseImponible = 0;
        foreach ($listaFacturaDet as $facturaDet) {
            if ($facturaDet->getPorcentaje_iva() > 0) {
                $baseImponible += $facturaDet->getSubtotal();
            }
        }
        return $baseImponible;
    }

    public function calcularBaseNoImponible($listaFacturaDet) {
        if (!isset($listaFacturaDet)) {
            return 0;
        }
        $baseNoImponible = 0;
        foreach ($listaFacturaDet as $facturaDet) {
            if ($facturaDet->getPorcentaje_iva() == 0) {
                $baseNoImponible += $facturaDet->getSubtotal();
            }
        }
        return $baseNoImponible;
    }

    public function calcularIva($listaFacturaDet) {
        if (!isset($listaFacturaDet)) {
            return 0;
        }
        $iva = 0;
        foreach ($listaFacturaDet as $facturaDet) {
            if ($facturaDet->getPorcentaje_iva() > 0) {
                $iva += $facturaDet->getSubtotal() * $facturaDet->getPorcentaje_iva() / 100;
            }
        }
        return round($iva, 2);
    }

    public function calcularTotal($listaFacturaDet) {
        if (!isset($listaFacturaDet)) {
            return 0;
        }
        $total = $this->calcularBaseImponible($listaFacturaDet) +
                $this->calcularBaseNoImponible($listaFacturaDet) +
                $this->calcularIva($listaFacturaDet);
        return $total;
    }

    public function ultimoNumeroFactura() {
        //obtenemos la informacion de la bdd:
        $pdo = Database_Conexion::Connect();
        $sql = "select max(numero_fact) numero from tbl_cabeza_factura";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $numero = $res['numero'];
        Database_Conexion::Disconnect();
        //retornamos el numero encontrado:
        if (!isset($numero))
            return 0;
        return $numero;
    }

    public function Guardar_Factura($listaFacturaDet, $cedula_proveedor, $credito, $fecha_fact, $numero_fact) {
        if (!isset($listaFacturaDet)) {
            throw new Exception("Debe por lo menos registrar un producto.");
        }
        if (count($listaFacturaDet) == 0) {
            throw new Exception("Debe por lo menos registrar un producto.");
        }
        if (!isset($cedula_proveedor)) {
            throw new Exception("Debe seleccionar el proveedor");
        }
        //obtenemos los datos completos del cliente:
        //crudModel = new CrudModel();
        $proveedor = $this->Get_Proveedor($cedula_proveedor);
        //creamos la nueva factura:
        $facturaCab = new cabeza_factura();
        $facturaCab->setCedula_proveedor($cedula_proveedor); //*
        $facturaCab->setCedula_cajero($proveedor->getCedula_cajero()); //*

        $facturaCab->setNombres_prov($proveedor->getNombre_completo());
        $facturaCab->setDireccion_prov($proveedor->getDireccion());
        //$facturaCab->setEstado("S");
        $facturaCab->setForma_pago($credito); //*
        $facturaCab->setFecha_fact($fecha_fact); //*
        $facturaCab->setNumero_fact($numero_fact);

        $facturaCab->setBase_Imponible($this->calcularBaseImponible($listaFacturaDet));
        $facturaCab->setBase_No_Imponible($this->calcularBaseNoImponible($listaFacturaDet));

        $facturaCab->setValor_IVA($this->calcularIva($listaFacturaDet));
        $facturaCab->setValor_Total($this->calcularTotal($listaFacturaDet));
        //obtenemos el siguiente numero de factura:
        $facturaCab->setId_cabeza($this->ultimoNumeroFactura() + 1); //*
        //guardar la cabecera:
        $pdo = Database_Conexion::Connect();
        $sql = "insert into tbl_cabeza_factura( id_cabeza, tbl_cedula_proveedor, tbl_cedula_cajero, forma_pago, fecha_fact, base_imponible, base_no_imponible, valor_iva, valor_total, numero_fact) values(?,?,?,  ?,?,?,  ?,?,?, ?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($facturaCab->getId_cabeza(),
                $facturaCab->getCedula_proveedor(),
                $facturaCab->getCedula_cajero(),
                $facturaCab->getForma_pago(),
                $facturaCab->getFecha_fact(),
                //$facturaCab->getNumero_fact(),
                $facturaCab->getBase_Imponible(),
                $facturaCab->getBase_No_Imponible(),
                $facturaCab->getValor_IVA(),
                $facturaCab->getValor_Total(),
                $facturaCab->getNumero_fact()
            ));
            //guardamos los detalles:
            foreach ($listaFacturaDet as $det) {
                $sql = "insert into tbl_detalle_factura( id_cabeza, id_pro, cantidad_product, subtotal, costo_pro, iva_pro) values (?,?,?,  ?,?,?)";
                $consulta = $pdo->prepare($sql);
                //en cada detalle asignamos el numero de factura padre:
                $consulta->execute(array($facturaCab->getId_cabeza(),
                    $det->getId_pro(),
                    $det->getCantidad_product(),
                    $det->getSubtotal(),
                    $det->getCosto_pro(),
                    $det->getPorcentaje_iva()));
            }
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database_Conexion::Disconnect();
        return $facturaCab;
    }

    public function Get_Facturas() {
        //obtenemos la informacion de la bdd:
        $pdo = Database_Conexion::Connect();
        $sql = "select * from tbl_cabeza_factura order by id_cabeza asc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $factura = new cabeza_factura();
            $factura->setId_cabeza($res['id_cabeza']);
            $factura->setCedula_proveedor($res['tbl_cedula_proveedor']);
            $factura->setFecha_fact($res['fecha_fact']);

            //$factura->setEstado($res['estado']);
            $factura->setBase_Imponible($res['base_imponible']);
            $factura->setBase_No_Imponible($res['base_no_imponible']);
            $factura->setValor_IVA($res['valor_iva']);
            $factura->setValor_Total($res['valor_total']);
            array_push($listado, $factura);
        }
        Database_Conexion::Disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function Buscar_Factura($id_cabeza_factura) {
        $pdo = Database_Conexion::Connect();
        $sql = 'select * from tbl_cabeza_factura where id_cabeza=?';
        $resultado = $pdo->prepare($sql);
        //$consulta->execute(array($id_cabeza_factura));
       // $res = $consulta->fetch(PDO::FETCH_ASSOC);

         $listado = array();
        foreach ($resultado as $res) {
        
        $factura = new cabeza_factura();  //$res['id_cabeza'], $res['tbl_cedula_proveedor'], $res['fecha_fact'], $res['base_imponible'], $res['base_no_imponible'], $res['valor_iva'], $res['valor_total']  );
        $factura->setId_cabeza($res['id_cabeza']);
        $factura->setCedula_proveedor($res['tbl_cedula_proveedor']);
        $factura->setFecha_fact($res['fecha_fact']);

        //$factura->setEstado($res['estado']);
        $factura->setBase_Imponible($res['base_imponible']);
        $factura->setBase_No_Imponible($res['base_no_imponible']);
        $factura->setValor_IVA($res['valor_iva']);
        $factura->setValor_Total($res['valor_total']);
        array_push($listado, $factura);
        }
        Database_Conexion::Disconnect();
        return $listado;
    }

}
