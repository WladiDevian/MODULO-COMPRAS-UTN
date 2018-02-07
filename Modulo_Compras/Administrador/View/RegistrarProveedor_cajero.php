<!DOCTYPE html>

<?php
require_once '../Model/cajero.php';
//session_start();
if (isset($_SESSION['login_cajero']) == FALSE) {
    header("Location: ../../index.php");
    return;
}
?>


<head>
    <meta charset="UTF-8">
    <title>Registro proveedor</title>
    <script src="JS/validaciones.js"></script>

</head>

<form class="form-horizontal" method="POST"  action="../Controller/Controller_Cajero.php">
    <input type="hidden" name="opcion" value="crear_proveedor">

    <div class="form-group">
        <label class="control-label col-sm-2" >Cédula</label>
        <div class="col-sm-9"><input type="text" name="cedula_proveedor" maxlength="10" minlength="10"required="true" class="form-control" id="ciudad" placeholder="Ingrese la cédula sin guión" onkeypress="return SoloNumeros(event);" onchange="ValidarCedula(this.form.cedula_cliente.value, this.form.btnGuardar)">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" >Cédula Cajero</label>
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
    <div class="form-group" >
        <label  class="control-label col-sm-2" >Nombres</label>
        <div class="col-sm-9"><input type="text" name="nombre_completo" maxlength="50" required="true" class="form-control" id="nombres" placeholder="Ingrese los nombres completos" onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.nombre_cliente.value, this.form.btnGuardar)">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Fecha Nac.</label>
        <div class="col-sm-9"><input type="date" name="fecha_nacimiento"  max="<?php echo date('1997-01-01'); ?>"  maxlength="8" required="true" class="form-control" id="apellidos" placeholder="Ingrese la fecha de nac. 19990202"  onkeypress="return SoloNumeros(event);" onchange="SoloLetras(this.form.apellido_cliente.value, this.form.btnGuardar)">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Ciudad Nac.</label>
        <div class="col-sm-9"><input type="text" name="ciudad_nacimiento" maxlength="50" required="true" class="form-control" id="apellidos" placeholder="Ingrese la ciudad de nacimiento"  onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.apellido_cliente.value, this.form.btnGuardar)">
        </div>
    </div>
    <!--    <div class="form-group">
            <label class="control-label col-sm-2" >Tipo Prov.</label>
            <div class="col-sm-9">
                <select name="tipo_prov" >
                    <option value="SE PUEDE OBTENER MERCANCÍA A CRÉDITO">SE PUEDE OBTENER MERCANCÍA A CRÉDITO</option>
                    <option value="NO SE PUEDE OBTENER MERCANCÍA A CRÉDITO">NO SE PUEDE OBTENER MERCANCÍA A CRÉDITO</option>
                </select>
                
            </div>
        </div>  -->

    <div class="form-group">
        <label class="control-label col-sm-2" >Crédito</label>
        <div class="col-sm-9">
            <select name="credito" >
                <option value="S">SI</option>
                <option value="N">NO</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Dirección</label>
        <div class="col-sm-9"><input type="tel" name="direccion" maxlength="100" minlength="10" required="true" class="form-control" id="ciudad" placeholder="Ingrese la dirección"  >
        </div>
    </div>  

    <div class="form-group">
        <label class="control-label col-sm-2" >Teléfono</label>
        <div class="col-sm-9"><input type="tel" name="telefono" maxlength="10" minlength="6" required="true" class="form-control" id="ciudad" placeholder="Ingrese el teléfono"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)">
        </div>
    </div>    
    <div class="form-group">
        <label class="control-label col-sm-2" >E-mail</label>
        <div class="col-sm-9"><input type="email" name="email" maxlength="30" required="true" class="form-control" id="apellidos"   placeholder="Ingrese el e-mail">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Estado</label>
        <div class="col-sm-9">
            <select name="estado_prov" >
                <option value="ACT">Activo</option>
                <option value="INACT">Inactivo</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class=" col-lg-offset-2 col-sm-1"> <button type="submit" class="btn btn-info " id="btnGuardar">Enviar Datos</button></div>
    </div>
</form>

