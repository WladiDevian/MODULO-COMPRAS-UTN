<!DOCTYPE html>

<?php
require_once '../Model/proveedor.php';
require_once '../Model/cajero.php';
session_start();
if (isset($_SESSION['login_admin']) == FALSE) {
        header("Location: ../../index.php");
        return;
    }
//if (!isset($_SESSION['cajero'])) {
//    header('Location: MenuCajero_Admin.php');
//} else {
$proveedor = $_SESSION['proveedor'];
//}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualización proveedor</title>
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
                    <h4>Actualización de Proveedor</h4>
                </div>
            </center>
            <br>   
            <div class="panel panel-primary">
                <div class="panel-heading">ACTUALIZAR PROVEEDOR: <?php echo "Cedula Proveedor: " . $proveedor->getCedula_proveedor(); ?>  </div>
                <div class="panel-body">
                    <form class="form-horizontal"  method="POST"  action="../Controller/Controller_Admin.php">
                        <input type="hidden" name="opcion" value="update_proveedor">
                        <input type="hidden" name="cedula_proveedor" value="<?php echo $proveedor->getCedula_proveedor(); ?>">

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Cédula cajero:</label>
                            <div class="col-sm-9">  <select name="cedula_cajero">
                                    <?php
                                    if (isset($_SESSION['listado_cajeros'])) {
                                        $listado_cajeros = unserialize($_SESSION['listado_cajeros']);
                                        foreach ($listado_cajeros as $caj) {
                                            echo "<option value='" . $caj->getCedula_cajero() . "'>" . $caj->getCedula_cajero() . " -- " . $caj->getNombre_completo() . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2">Nombres:</label>
                            <div class="col-sm-9"><input type="text" name="nombre_completo" maxlength="100" required="true" class="form-control" placeholder="Ingrese sus nombres" value="<?php echo $proveedor->getNombre_completo(); ?>" onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.nombre_cliente.value, this.form.btnGuardar)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Fecha Nac. :</label>
                            <div class="col-sm-9"><input type="date" name="fecha_nacimiento" max="<?php echo date('1997-01-01'); ?>"  required="true" class="form-control" placeholder="Ingrese sus apellidos" value="<?php echo $proveedor->getFecha_nacimiento(); ?>"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.apellido_cliente.value, this.form.btnGuardar)" >
                            </div>
                        </div>              
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Ciudad Nac. :</label>
                            <div class="col-sm-9"><input type="text" name="ciudad_nacimiento" maxlength="50" required="true" class="form-control" placeholder="Ingrese sus apellidos" value="<?php echo $proveedor->getCiudad_nacimiento(); ?>"  onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.apellido_cliente.value, this.form.btnGuardar)" >
                            </div>
                        </div>

<!--                        <div class="form-group">
                            <label class="control-label col-sm-2">Tipo:</label>
                            <div class="col-sm-9"><input type="text" name="tipo_prov" maxlength="100" required="true" class="form-control" value="<?php echo $proveedor->getTipo_proveedor(); ?>" onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.nombre_cliente.value, this.form.btnGuardar)">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="control-label col-sm-2">Crédito:</label>
                            <div class="col-sm-9">
                                <select name="credito" >
                                    <option value="S">SI</option>
                                    <option value="N">NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Dirección :</label>
                            <div class="col-sm-9"><input type="text" name="direccion" maxlength="50" required="true" class="form-control" placeholder="Ingrese su dirección" value="<?php echo $proveedor->getDireccion(); ?>"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Teléfono:</label>
                            <div class="col-sm-9"><input type="text" name="telefono" maxlength="10" required="true" class="form-control" placeholder="Ingrese su telefono" value="<?php echo $proveedor->getTelefono(); ?>"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)"  >
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-sm-2">E-mail:</label>
                            <div class="col-sm-9"><input type="email" name="email" maxlength="50" required="true" class="form-control" placeholder="Ingrese su e-mail" value="<?php echo $proveedor->getEmail(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Estado:</label>
                            <div class="col-sm-9">
                                <select name="estado_prov" >
                                    <option value="ACT">Activo</option>
                                    <option value="INACT">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-offset-2 col-sm-1"><input type="submit"   id="btnGuardar" class="btn btn-info " value="Actualizar"></div>&nbsp&nbsp&nbsp
                            <div class=" col-md-2"> <a  class="btn btn-info "  href="./MenuProveedor_Admin.php">Cancelar</a></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

