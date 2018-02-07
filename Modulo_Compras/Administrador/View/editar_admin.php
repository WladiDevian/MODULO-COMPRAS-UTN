<!DOCTYPE html>

<?php
require_once '../Model/administrador.php';
session_start();
if (isset($_SESSION['login_admin']) == FALSE) {
        header("Location: ../../index.php");
        return;
    }


//if (!isset($_SESSION['cajero'])) {
//    header('Location: MenuCajero_Admin.php');
//} else {
$administrador = $_SESSION['administrador'];
//}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualización administrador</title>
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
            <center><div class="row"><br>
                    <h4>Actualización de Administrador</h4>
                </div>
            </center>
            <br>   
            <div class="panel panel-primary">
                <div class="panel-heading">ACTUALIZAR ADMINISTRADOR: <?php echo "Cédula Admin: " . $administrador->getCedula_admin(); ?>  </div>
                <div class="panel-body">
                    <form class="form-horizontal"  method="POST" action="../Controller/Controller_Admin.php">
                        <input type="hidden" name="opcion" value="update_admin">
                        <input type="hidden" name="cedula_admin" value="<?php echo $administrador->getCedula_admin(); ?>">

                        <div class="form-group">
                            <label class="control-label col-sm-2">Nombres</label>
                            <div class="col-sm-9"><input type="text" name="nombre_completo" maxlength="100" required="true" class="form-control" placeholder="Ingrese los nombres completos" value="<?php echo $administrador->getNombre_completo(); ?>" onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.nombre_cliente.value, this.form.btnGuardar)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Fecha Nac.</label>
                            <div class="col-sm-9"><input type="date" name="fecha_nacimiento" max="<?php echo date('1997-01-01'); ?>"  required="true" class="form-control" placeholder="Ingrese la fecha de nacimiento" value="<?php echo $administrador->getFecha_nacimiento(); ?>"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.apellido_cliente.value, this.form.btnGuardar)" >
                            </div>
                        </div>              
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Ciudad Nac.</label>
                            <div class="col-sm-9"><input type="text" name="ciudad_nacimiento" maxlength="50" required="true" class="form-control" placeholder="Ingrese la ciudad de nacimiento" value="<?php echo $administrador->getCiudad_nacimiento(); ?>"  onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.apellido_cliente.value, this.form.btnGuardar)" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Dirección</label>
                            <div class="col-sm-9"><input type="text" name="direccion" maxlength="50" required="true" class="form-control" placeholder="Ingrese la dirección" value="<?php echo $administrador->getDireccion(); ?>"   >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Teléfono</label>
                            <div class="col-sm-9"><input type="text" name="telefono" maxlength="10" required="true" class="form-control" placeholder="Ingrese el teléfono" value="<?php echo $administrador->getTelefono(); ?>"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)"  >
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-sm-2">E-mail</label>
                            <div class="col-sm-9"><input type="email" name="email" maxlength="50" required="true" class="form-control" placeholder="Ingrese el e-mail" value="<?php echo $administrador->getEmail(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Estado</label>
                            <div class="col-sm-9">
                                <select name="estado_admin" >
                                    <option value="ACT">Activo</option>
                                    <option value="INACT">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-lg-offset-2 col-sm-1"><input type="submit"   id="btnGuardar" class="btn btn-info " value="Actualizar"></div>&nbsp&nbsp&nbsp
                            <div class=" col-md-2"> <a  class="btn btn-info "  href="./MenuAdmin_Admin.php">Cancelar</a></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

