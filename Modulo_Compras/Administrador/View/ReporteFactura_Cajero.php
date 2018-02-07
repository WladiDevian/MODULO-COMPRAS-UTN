<!DOCTYPE html>

<?php
require_once '../Model/proveedor.php';
require_once '../Model/productos.php';
require_once '../Model/detalle_factura.php';
require_once '../Model/CRUD_Admin.php';



session_start();
if (isset($_SESSION['login_cajero']) == FALSE) {
    header("Location: ../../index.php");
    return;
}


//if (!isset($_SESSION['facturaCab'])) {
//   header('Location: NuevaCompra_Admin.php');
//} else {
$Factura_Cab = $_SESSION['facturaCab'];
//}
//
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>Compras - Factura</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

<!--            <img src="images/banner-facturacion.jpg">-->

            <div class="row">
                <h3>Factura</h3>
            </div>

            <div class="row">

                <a class="btn btn-success" href="../View/MenuCajero.php">Inicio</a>
                <a class="btn btn-success" href="javascript:window.print()">Imprimir</a>

                <!--                <a class="btn btn-success" href="Generar_Reporte_Factura.php">Imprimir</a>-->

            </div>

            <p>
            <table>
                <tr>
                    <td>Nro. Factura: </td>
                    <td><?php echo $Factura_Cab->getNumero_fact(); ?></td>
                </tr>
                <tr>
                    <td>Fecha: </td>
                    <td><?php echo $Factura_Cab->getFecha_fact(); ?></td>
                </tr>
<!--                <tr>
                    <td>Estado de la factura</td>
                    <td><?php //echo $Factura_Cab->getEstado();     ?></td>
                </tr>-->
                <tr>
                    <td>Cédula: </td>
                    <td><?php echo $Factura_Cab->getCedula_proveedor(); ?></td>
                </tr>
                <tr>
                    <td>Nombres:</td>
                    <td><?php echo $Factura_Cab->getNombres_prov(); ?></td>
                </tr>
                <tr>
                    <td>Dirección:</td>
                    <td><?php echo $Factura_Cab->getDireccion_prov(); ?></td>
                </tr>
            </table>

        </p>
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>ID PRODUCTO</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>IVA</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //verificamos si existe en sesion el listado de clientes:
                if (isset($_SESSION['listaFacturaDet'])) {
                    $listado = unserialize($_SESSION['listaFacturaDet']);
                    foreach ($listado as $facturaDet) {
                        echo "<tr>";
                        echo "<td>" . $facturaDet->getId_pro() . "</td>";
                        echo "<td>" . $facturaDet->getNombre_pro() . "</td>";
                        echo "<td>" . $facturaDet->getCosto_pro() . "</td>";
                        echo "<td>" . $facturaDet->getCantidad_product() . "</td>";
                        echo "<td>" . $facturaDet->getPorcentaje_iva() . "</td>";
                        echo "<td>" . $facturaDet->getSubtotal() . "</td>";
                        echo "</tr>";
                    }
                    echo "<tr>";
                    echo "<td> </td>";
                    echo "<td>BASE IMPONIBLE</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>" . $Factura_Cab->getBase_Imponible() . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> </td>";
                    echo "<td>BASE NO IMPONIBLE</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>" . $Factura_Cab->getBase_No_Imponible() . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> </td>";
                    echo "<td>IVA</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>" . $Factura_Cab->getValor_IVA() . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> </td>";
                    echo "<td>TOTAL</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>" . $Factura_Cab->getValor_Total() . "</td>";
                    echo "</tr>";
                } else {
                    echo "No se han cargado datos.";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>'

