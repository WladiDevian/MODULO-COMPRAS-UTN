<!DOCTYPE html>

<?php
require_once '../Model/productos.php';
session_start();

if (isset($_SESSION['login_cajero']) == FALSE) {
    header("Location: ../../index.php");
    return;
}


if (!isset($_SESSION['producto'])) {
    header('Location: MenuProducto_Cajero.php');
} else {
    $producto = $_SESSION['producto'];
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualización producto</title>
        <meta charset="UTF-8">
        <script src="JS/jquery-3.1.1.js"></script>
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrap-table.js"></script>
        <script src="JS/validaciones.js"></script>
        <link href="CSS/bootstrap.css" rel="stylesheet">
        <link href="CSS/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    </head>
    <body>

        <div class="container">
<!--            <img src="images/banner.jpg">-->
            <center><div class="row">
                    <h4>Actualización de Producto</h4>
                </div>
            </center>
            <br>   
            <div class="panel panel-primary">
                <div class="panel-heading">ACTUALIZAR PRODUCTO: <?php echo "Id Producto: " . $producto->getId_pro(); ?>  </div>
                <div class="panel-body">
                    <form class="form-horizontal"  method="POST" action="../Controller/Controller_Cajero.php">
                        <input type="hidden" name="opcion" value="update_producto">
                        <input type="hidden" name="id_pro" value="<?php echo $producto->getId_pro(); ?>">

                        <div class="form-group">
                            <label class="control-label col-sm-2">Código</label>
                            <div class="col-sm-9"><input type="text" name="codigo_pro" maxlength="100" required="true" class="form-control" placeholder="Ingrese sus nombres" value="<?php echo $producto->getCodigo_pro(); ?>" onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.nombre_cliente.value, this.form.btnGuardar)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Nombre</label>
                            <div class="col-sm-9"><input type="text" name="nombre_pro" maxlength="50" required="true" class="form-control" placeholder="Ingrese sus apellidos" value="<?php echo $producto->getNombre_pro(); ?>"  onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.apellido_cliente.value, this.form.btnGuardar)" >
                            </div>
                        </div>              
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Descripción</label>                          
                            <div class="col-sm-9">
                                <select name="descripcion_pro" >
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >IVA</label>
                            <div class="col-sm-9"><input type="number" name="iva_pro" maxlength="3" required="true" class="form-control" placeholder="Ingrese el IVA" value="<?php echo $producto->getIva_pro(); ?>" onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Costo</label>
                            <div class="col-sm-9"><input type="number" name="costo_pro" maxlength="3" required="true" class="form-control" placeholder="Ingrese el costo" value="<?php echo $producto->getCosto_pro(); ?>"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)"  >
                            </div>
                        </div>  
<!--                        <div class="form-group">
                            <label class="control-label col-sm-2">PVP:</label>
                            <div class="col-sm-9"><input type="number" name="pvp_pro" maxlength="3" required="true" class="form-control" placeholder="Ingrese el PVP" value="<?php echo $producto->getPvp_pro(); ?>" onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)"  >
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Estado:</label>
                            <div class="col-sm-9">
                                <select name="estado_pro" >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-offset-2 col-sm-1"><input type="submit"   id="btnGuardar" class="btn btn-info " value="Actualizar"></div>&nbsp&nbsp&nbsp
                            <div class=" col-md-2"> <a  class="btn btn-info "  href="./MenuProducto_Cajero.php">Cancelar</a></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

