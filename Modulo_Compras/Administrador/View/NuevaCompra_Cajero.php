<!DOCTYPE html>
<?php
require_once '../Model/CRUD_Admin.php';
require_once '../Model/proveedor.php';
require_once '../Model/productos.php';
require_once '../Model/cabeza_factura.php';
require_once '../Model/detalle_factura.php';

$CRUD_Admin = new CRUD_Admin();
//session_destroy();
session_start();

if (isset($_SESSION['login_cajero']) == FALSE) {
    header("Location: ../../index.php");
    return;
}
//
//
//if (!isset($_SESSION['cliente'])) {
//    header('Location: menu_gestion_cliente.php');
//} else {
// $proveedor = $_SESSION['proveedor'];
// $listado_proveedores = $_SESSION['listado_proveedores']; listado_productos
// $listado_productos = $_SESSION['listado_productos'];
//}
//
//$facturaCab = $_SESSION['facturaCab'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MENÚ GESTIÓN COMPRAS</title>
        <script src="JS/jquery-3.1.1.js"></script>
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrap-table.js"></script>
        <script src="JS/validaciones.js"></script>
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

                </header></center>
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
                        <h4>GESTIÓN DE COMPRAS</h4>
                    </div>   
                    <div  class="well well-sm">   
                        <a button type="button" class="btn btn-info" href='NuevaCompra_Cajero.php' > Nueva Compra</a>&nbsp;&nbsp;
                        <!--                        <a  button type="button" class="btn btn-info" href="../Controller/Controller_Admin.php?opcion=listar_detalle_facturas">Ver Facturas</a>                    -->


                    </div>                 
                </center>    

        </div>

        <div class="container">
            <div class="panel panel-default">
                <?php
//                if (isset($_SESSION['mensajeError'])) {
//                    echo "<div class='alert alert-danger'>" . $_SESSION['mensajeError'] . "</div>";
//                }
                ?>
                <center> <h4>Seleccione Proveedor y Producto a Comprar</h4></center>
<!--                <center> <h4>Cabeza Factura</h4></center>-->
                <form  class="form-horizontal" method="POST" action="../Controller/Controller_Cajero.php">
                    <input type="hidden" name="opcion" value="guardar_factura">
                    <div class="form-group"  >
                        <label  class="control-label col-sm-3" >Proveedor</label>
                        <div class="col-sm-3"><select name="cedula_proveedor">
                                <?php
                                //$listado_proveedores = $_SESSION['listado_proveedores'];
                                // listar_proveedores_activos     listado_proveedores_activos
                                if (isset($_SESSION['listado_proveedores'])) {
                                    $listado = unserialize($_SESSION['listado_proveedores']);
                                    foreach ($listado as $provs) {
                                        echo "<option value='" . $provs->getCedula_proveedor() . "'>" . $provs->getCedula_proveedor() . " -- " . $provs->getNombre_completo() . " -- " . $provs->getCredito() . "  -- " . $provs->getDireccion() . " -- " . $provs->getTelefono() . " -- " . $provs->getEmail() . " </option>";
                                    }
                                }
                                ?>
                            </select>
                        </div><br>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-1" >Tipo pago</label>
                        <div class="col-sm-2">
                            <select name="credito" >
                                <option value="Efectivo">Efectivo</option>
                                <option value="Credito">Crédito</option>
                            </select>
                        </div>
                        <label  class="control-label col-sm-1" >Fecha</label> 
                        <div class="col-sm-2"> <input  type="date" name="fecha_fact"  required="true" max="<?php echo date('Y-m-d'); ?>"  min="<?php echo date('Y-m-d'); ?>"  ><br></div>
                        <label  class="control-label col-sm-1" >Número Fact.</label>
                        <div class="col-sm-2"> <input type="text" name="numero_fact"  value="<?php echo $CRUD_Admin->ultimoNumeroFactura() + 1; ?>"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)"  ><br></div>

                        <center> <input type="submit" class="btn btn-info"  value="Guardar Factura"></center>
                    </div>


                </form> 

                <form  class="form-horizontal"  action="../Controller/Controller_Cajero.php">
                    <input type="hidden" name="opcion" value="adicionar_detalle">
                    <div class="form-group"  >
                        <label  class="control-label col-sm-3" >Producto</label>
                        <div class="col-sm-3"><select name="id_pro">
                                <?php
                                //$listado_proveedores = $_SESSION['listado_proveedores'];

                                if (isset($_SESSION['listado_productos'])) {
                                    $listado_productos = unserialize($_SESSION['listado_productos']);
                                    foreach ($listado_productos as $prod) {
                                        echo "<option value='" . $prod->getId_pro() . "'>" . $prod->getNombre_pro() . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <label class="control-label col-sm-1" >Cantidad</label>
                        <div class="col-sm-2"><input type="text" name="cantidad" maxlength="5" required="true" value="1"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)" ></div>
                        <center><input type="submit"  class="btn btn-info"  value="Adicionar"></center>

                    </div>
                </form>

                <br>
            </div>

            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>OPCIÓN</th>
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
                    if (isset($_SESSION['listaFacturaDet'])) {
                        $lista_detalles = unserialize($_SESSION['listaFacturaDet']);
                        foreach ($lista_detalles as $Factura_Det) {
                            echo "<tr>";
//                            echo "<td>" . $i->getId_detalle() . "</td>";
//                            echo "<td>" . $i->getId_cabeza() . "</td>";
                            echo "<td><a href='../Controller/Controller_Cajero.php?opcion=eliminar_detalle_factura&id_pro=" . $Factura_Det->getId_pro() . "'>Eliminar</a></td>";
                            echo "<td>" . $Factura_Det->getId_pro() . "</td>";
                            echo "<td>" . $Factura_Det->getNombre_pro() . "</td>";
                            echo "<td>" . $Factura_Det->getCosto_pro() . "</td>";
                            echo "<td>" . $Factura_Det->getCantidad_product() . "</td>";
                            echo "<td>" . $Factura_Det->getPorcentaje_iva() . "</td>";
                            echo "<td>" . $Factura_Det->getSubtotal() . "</td>";
                            echo "</tr>";
                        }

                        echo "<tr>";
                        echo "<td> </td>";
                        echo "<td>BASE IMPONIBLE</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>" . $CRUD_Admin->calcularBaseImponible($lista_detalles) . "</td>";
                        echo "<td></td>";
                        echo "</tr>";


                        echo "<tr>";
                        echo "<td> </td>";
                        echo "<td>BASE NO IMPONIBLE</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>" . $CRUD_Admin->calcularBaseNoImponible($lista_detalles) . "</td>";
                        echo "<td></td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td> </td>";
                        echo "<td>IVA</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>" . $CRUD_Admin->calcularIva($lista_detalles) . "</td>";
                        echo "<td></td>";
                        echo "</tr>";


                        echo "<tr>";
                        echo "<td> </td>";
                        echo "<td>TOTAL</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td>" . $CRUD_Admin->calcularTotal($lista_detalles) . "</td>";
                        echo "<td></td>";
                        echo "</tr>";
                    } else {
                        echo "No se ha añadido items.";
                    }
                    ?>
                </tbody>
            </table>

            <?php // echo "<h4> Valor Iva :   " .$iva."</h4>";    echo "<h4> Valor Total:   " .$total."</h4>";           ?>
        </div>   
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo "<br>MENSAJE DEL SISTEMA: <font color='red'>" . $_SESSION['mensaje'] . "</font><br>";
        }
        ?>
    </body>


</html>

