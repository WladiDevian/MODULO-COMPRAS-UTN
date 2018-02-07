<?php
require_once '../Model/CRUD_Admin.php';
//session_start();
$CRUD_Admin = new CRUD_Admin();
$opcion = $_REQUEST['opcion'];
$mensaje = $_REQUEST['mensaje'];



switch ($opcion) {
   
   //=====================CAJEROS==============================================

    case "crear_cajero":
        $cedula_cajero = $_REQUEST['cedula_cajero'];
        $nombre_completo = $_REQUEST['nombre_completo'];
        $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $ciudad_nacimiento = $_REQUEST['ciudad_nacimiento'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $estado_cajero = $_REQUEST['estado_cajero'];
        $CRUD_Admin->Insert_Cajero($cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_cajero);
        $listado_cajeros = $CRUD_Admin->Get_Cajeros();
        $_SESSION['listado_cajeros'] = serialize($listado_cajeros);
        header('Location: ../View/MenuCajero_Cajero.php');
        break;

    case "listar_cajeros":
        $listado_cajeros = $CRUD_Admin->Get_Cajeros();
        $_SESSION['listado_cajeros'] = serialize($listado_cajeros);
        header('Location: ../View/MenuCajero_Cajero.php');
        break;

    case "editar_cajero":
        $cedula_cajero = $_REQUEST['cedula_cajero'];
        $cajero = $CRUD_Admin->Get_Cajero($cedula_cajero);
        $_SESSION['cajero'] = $cajero;
        header('Location: ../View/editar_cajero_cajero.php');
        break;

    case "update_cajero":
        $cedula_cajero = $_REQUEST['cedula_cajero'];
        $nombre_completo = $_REQUEST['nombre_completo'];
        $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $ciudad_nacimiento = $_REQUEST['ciudad_nacimiento'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $estado_cajero = $_REQUEST['estado_cajero'];
        $CRUD_Admin->Update_Cajero($cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $direccion, $telefono, $email, $estado_cajero);
        $listado_cajeros = $CRUD_Admin->Get_Cajeros();
        $_SESSION['listado_cajeros'] = serialize($listado_cajeros);
        header('Location: ../View/MenuCajero_Cajero.php');
        break;

    case "delete_cajero":
        $cedula_cajero = $_REQUEST['cedula_cajero'];
        $CRUD_Admin->Delete_Cajero($cedula_cajero);
        $listado_cajeros = $CRUD_Admin->Get_Cajeros();
        $_SESSION['listado_cajeros'] = serialize($listado_cajeros);
        header('Location: ../View/MenuCajero_Cajero.php');
        break;

    //=====================PROVEEDORES==============================================

    case "crear_proveedor":
        $cedula_proveedor = $_REQUEST['cedula_proveedor'];
        $cedula_cajero = $_REQUEST['cedula_cajero'];
        $nombre_completo = $_REQUEST['nombre_completo'];
        $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $ciudad_nacimiento = $_REQUEST['ciudad_nacimiento'];
//        $tipo_proveedor = $_REQUEST['tipo_prov'];
        $credito = $_REQUEST['credito'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $estado_prov = $_REQUEST['estado_prov'];
        $CRUD_Admin->Insert_Proveedor($cedula_proveedor, $cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $credito, $direccion, $telefono, $email, $estado_prov);
        $listado_proveedores = $CRUD_Admin->Get_Proveedores();
        $_SESSION['listado_proveedores'] = serialize($listado_proveedores);
        header('Location: ../View/MenuProveedor_Cajero.php');
        break;

    case "listar_proveedores":
        $listado_proveedores = $CRUD_Admin->Get_Proveedores();
        $_SESSION['listado_proveedores'] = serialize($listado_proveedores);
        header('Location: ../View/MenuProveedor_Cajero.php');
        break;
    
//    case "listar_proveedores_activos":
//        $listado_proveedores_activos = $CRUD_Admin->Get_Proveedores_Activos();
//        $_SESSION['listado_proveedores_activos'] = serialize($listado_proveedores_activos);
//        header('Location: ../View/NuevaCompra_Admin.php');
//        break;

    
    case "editar_proveedor":
        $cedula_proveedor = $_REQUEST['cedula_proveedor'];
        $proveedor = $CRUD_Admin->Get_Proveedor($cedula_proveedor);
        $_SESSION['proveedor'] = $proveedor;
        //-----------------------------------------------------
        $listado_cajeros = $CRUD_Admin->Get_Cajeros();
        $_SESSION['listado_cajeros'] = serialize($listado_cajeros);
        //-----------------------------------------------------   
        //require '../View/editar_proveedor_cajero.php';
        header('Location: ../View/editar_proveedor_cajero.php');
        break;
    
//      case "editar_proveedor":
//        $cedula_proveedor = $_REQUEST['cedula_proveedor'];
//        $proveedor = $CRUD_Admin->Get_Proveedor($cedula_proveedor);
//        $_SESSION['proveedor'] = $proveedor;
//        //-----------------------------------------------------
//        $listado_cajeros = $CRUD_Admin->Get_Cajeros();
//        $_SESSION['listado_cajeros'] = serialize($listado_cajeros);
//        //-----------------------------------------------------      
//        header('Location: ../View/editar_proveedor.php');
//        break;
    

    case "update_proveedor":
        $cedula_proveedor = $_REQUEST['cedula_proveedor'];
        $cedula_cajero = $_REQUEST['cedula_cajero'];
        $nombre_completo = $_REQUEST['nombre_completo'];
        $fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
        $ciudad_nacimiento = $_REQUEST['ciudad_nacimiento'];
//        $tipo_proveedor = $_REQUEST['tipo_prov'];
        $credito = $_REQUEST['credito'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $estado_prov = $_REQUEST['estado_prov'];
        $CRUD_Admin->Update_Proveedor($cedula_proveedor, $cedula_cajero, $nombre_completo, $fecha_nacimiento, $ciudad_nacimiento, $credito, $direccion, $telefono, $email, $estado_prov);
        $listado_proveedores = $CRUD_Admin->Get_Proveedores();
        $_SESSION['listado_proveedores'] = serialize($listado_proveedores);
        header('Location: ../View/MenuProveedor_Cajero.php');
        break;

    case "delete_proveedor":
        $cedula_proveedor = $_REQUEST['cedula_proveedor'];
        $CRUD_Admin->Delete_Proveedor($cedula_proveedor);
        $listado_proveedores = $CRUD_Admin->Get_Proveedores();
        $_SESSION['listado_proveedores'] = serialize($listado_proveedores);
        header('Location: ../View/MenuProveedor_Cajero.php');
        break;
    //--------------------------------------------------------------------------
    //========================PRODUCTOS=========================================
    //$id_pro, $codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $pvp_pro, $estado_pro
    case "crear_producto":
      //  $id_pro = $_REQUEST['id_pro'];
        $codigo_pro = $_REQUEST['codigo_pro'];
        $nombre_pro = $_REQUEST['nombre_pro'];
        $descripcion_pro = $_REQUEST['descripcion_pro'];
        $iva_pro = $_REQUEST['iva_pro'];
        $costo_pro = $_REQUEST['costo_pro'];
      //  $pvp_pro = $_REQUEST['pvp_pro'];
        $estado_pro = $_REQUEST['estado_pro']; //$id_pro,
        $CRUD_Admin->Insert_Product( $codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $estado_pro); // $pvp_pro, 
        $listado_productos = $CRUD_Admin->Get_Products();
        $_SESSION['listado_productos'] = serialize($listado_productos);
        header('Location: ../View/MenuProducto_Cajero.php');
        break;

    case "listar_productos":
        $listado_productos = $CRUD_Admin->Get_Products();
        $_SESSION['listado_productos'] = serialize($listado_productos);
        header('Location: ../View/MenuProducto_Cajero.php');
        break;

    case "editar_producto":
        $id_pro = $_REQUEST['id_pro'];
        $producto = $CRUD_Admin->Get_Product($id_pro);
        $_SESSION['producto'] = $producto;
        header('Location: ../View/editar_producto_cajero.php');
        break;

    case "update_producto":
        $id_pro = $_REQUEST['id_pro'];
        $codigo_pro = $_REQUEST['codigo_pro'];
        $nombre_pro = $_REQUEST['nombre_pro'];
        $descripcion_pro = $_REQUEST['descripcion_pro'];
        $iva_pro = $_REQUEST['iva_pro'];
        $costo_pro = $_REQUEST['costo_pro'];
       // $pvp_pro = $_REQUEST['pvp_pro'];
        $estado_pro = $_REQUEST['estado_pro'];
        $CRUD_Admin->Update_Product($id_pro, $codigo_pro, $nombre_pro, $descripcion_pro, $iva_pro, $costo_pro, $estado_pro);
        $listado_productos = $CRUD_Admin->Get_Products();
        $_SESSION['listado_productos'] = serialize($listado_productos);
        header('Location: ../View/MenuProducto_Cajero.php');
        break;

    case "delete_producto":
        $id_pro = $_REQUEST['id_pro'];
        $CRUD_Admin->Delete_Product($id_pro);
        $listado_productos = $CRUD_Admin->Get_Products();
        $_SESSION['listado_productos'] = serialize($listado_productos);
        header('Location: ../View/MenuProducto_Cajero.php');
        break;

    //------------------------------------------------------------------------
    
    
    //=================================ADDING--DETAILS=====================================================

    case "adicionar_detalle":
        //obtenemos los parametros del formulario:
        $id_pro = $_REQUEST['id_pro'];
        $cantidad = $_REQUEST['cantidad'];
        if (!isset($_SESSION['listaFacturaDet'])) {
            $listaFacturaDet = array();
        } else {
            $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
        }
        try {
            $listaFacturaDet = $CRUD_Admin->Adicionar_Detalle($listaFacturaDet, $id_pro, $cantidad);
            $_SESSION['listaFacturaDet'] = serialize($listaFacturaDet);
        } catch (Exception $e) {
            $mensajeError = $e->getMessage();
            $_SESSION['mensajeError'] = $mensajeError;
        }
        // require_once '../View/NuevaCompra_Admin.php';
        header('Location: ../View/NuevaCompra_Cajero.php');
        break;

    case "eliminar_detalle_factura":
        $id_pro = $_REQUEST['id_pro'];
        $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
        $listaFacturaDet = $CRUD_Admin->Eliminar_Detalle($listaFacturaDet, $id_pro);
        $_SESSION['listaFacturaDet'] = serialize($listaFacturaDet);
        header('Location: ../View/NuevaCompra_Cajero.php');
        break;


    case "guardar_factura":
        //obtenemos los parametros del formulario:
        $cedula_proveedor = $_REQUEST['cedula_proveedor'];
        $credito = $_REQUEST['credito'];
        $fecha_fact = $_REQUEST['fecha_fact'];
        $numero_fact = $_REQUEST['numero_fact'];
        if (isset($_SESSION['listaFacturaDet'])) {
            $listaFacturaDet = unserialize($_SESSION['listaFacturaDet']);
            try {
                $facturaCab = $CRUD_Admin->Guardar_Factura($listaFacturaDet, $cedula_proveedor, $credito, $fecha_fact, $numero_fact);
                $_SESSION['facturaCab'] = $facturaCab;
                header('Location: ../View/ReporteFactura_Cajero.php');
                break;
            } catch (Exception $e) {
                $mensajeError = $e->getMessage();
                $_SESSION['mensajeError'] = $mensajeError;
            }
        }
        //actualizamos lista de facturas:
        //$listado = $gastosModel->getFacturas();
        //$_SESSION['listado'] = serialize($listado);
        header('Location: ../View/NuevaCompra_Cajero.php');
        break;

    case "listar_facturas":
        //obtenemos la lista de facturas y subimos a sesion:
        $_SESSION['listaFacturas'] = serialize($CRUD_Admin->Get_Facturas());
        header('Location: ../View/MenuFactura_Cajero.php');
        break;


    //=====================================================================================


    default:
        session_destroy();
        header('Location: ../../index.php');
        break;
}




