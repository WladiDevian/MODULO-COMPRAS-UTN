
<!DOCTYPE html>
<?php
require_once '../Model/CRUD_Admin.php';
require_once '../Model/proveedor.php';
require_once '../Model/productos.php';
require_once '../Model/cabeza_factura.php';
require_once '../Model/detalle_factura.php';
//session_destroy();
session_start();
if (isset($_SESSION['login_cajero']) == FALSE) {
    header("Location: ../../index.php");
    return;
}

//if (!isset($_SESSION['cliente'])) {
//    header('Location: menu_gestion_cliente.php');
//} else {
//    $cliente = $_SESSION['cliente'];
//}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MENÚ GESTIÓN FACTURAS</title>
        <script src="JS/jquery-3.1.1.js"></script>
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrap-table.js"></script>
        <link href="CSS/bootstrap.css" rel="stylesheet">
        <link href="CSS/bootstrap-table.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script>
            function confirmar_eliminar() {
                var preg = confirm("¿Esta seguro de eliminar?");
                if (preg)
                    return true;
                else
                    return false;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <center>  <header>
                    <img  class="img-responsive" src="images/banner_compras.png">

                    <h5 class="text-success">Bienvenido Cajero. <?php echo $_SESSION['cedula_cajero'] ?></h5>
                    <form method="POST" action="../Controller/Controller_Login.php">
                        <input type="hidden" name="opcion" value="Cerrar_Sesion_Cajero">
                        <button type="submit" class="btn-danger" >Cerrar Sesión</button>
                    </form>


                </header>
            </center>
            <BR>
            <div  class="well well-sm">
                <nav  ><center>
                        <ul class="nav nav-pills">
                            <li class=""><a href="MenuCajero.php">INICIO</a></li>

                            <li  class=""><a  href="../Controller/Controller_Cajero.php?opcion=listar_cajeros">Cajeros</a></li>
                            <li  class=""><a  href="../Controller/Controller_Cajero.php?opcion=listar_proveedores">Proveedores</a></li>
                            <li class=""><a href="../Controller/Controller_Cajero.php?opcion=listar_productos">Productos</a></li>
                            <li class="active"><a href="MenuFactura_Cajero.php">Facturas</a></li>

                        </ul>
                    </center>
                </nav></div>
            <section>                
                <center><div class="row">
                        <h4>GESTIÓN DE COMPRAS Y FACTURAS</h4>
                    </div>   
                    <div  class="well well-sm">   
                        <a button type="button" class="btn btn-info" href='NuevaCompra_Cajero.php' > Nueva Compra</a>&nbsp;&nbsp;
<!--                        <input type="search" placeholder="Inserte el código de factura" name="busqueda_factura">
                        <a  button type="submit" class="btn btn-info" href="../Controller/Controller_Cajero.php?opcion=buscar_factura">Buscar Factura</a>                    
                    -->
                    </div>
                </center>    

        </div>
        <div class="container">
            <div class="panel panel-default">

                <table data-toggle="table" data-pagination="true" >
                    <thead>
                        <tr>
                            <th>ID FACTURA</th>
                            <th>FECHA</th>
                            <th>CÉDULA PROV.</th>
<!--                            <th>ESTADO</th>-->
                            <th>BASE IMPONIBLE</th>
                            <th>BASE NO IMPONIBLE</th>
                            <th>IVA</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['listaFacturas'])) {
                            $listado_facts = unserialize($_SESSION['listaFacturas']);
                            foreach ($listado_facts as $i) {
                                echo "<tr>";
//                                echo "<td>" . $i->getId_detalle() . "</td>";
                                echo "<td>" . $i->getId_cabeza() . "</td>";
                                echo "<td>" . $i->getFecha_fact() . "</td>";
                                echo "<td>" . $i->getCedula_proveedor() . "</td>";
//                                echo "<td>" . $i->getEstado(). "</td>";
                                echo "<td>" . $i->getBase_Imponible() . "</td>";
                                echo "<td>" . $i->getBase_No_Imponible() . "</td>";
//                                echo "<td>" . $i->getDescuento() . "</td>";
                                echo "<td>" . $i->getValor_IVA() . "</td>";
                                echo "<td>" . $i->getValor_Total() . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se han cargado datos.";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
    </body>
</html>

