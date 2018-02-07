<!DOCTYPE html>

<?php
//session_start();
if (isset($_SESSION['login_admin']) == FALSE) {
        header("Location: ../../index.php");
        return;
    }
?>


<head>
    <meta charset="UTF-8">
    <title>Registro producto</title>
    <script src="JS/validaciones.js"></script>

</head>

<form class="form-horizontal" method="POST"  action="../Controller/Controller_Admin.php">
    <input type="hidden" name="opcion" value="crear_producto">

<!--    <div class="form-group">
        <label class="control-label col-sm-2" >Id:</label>
        <div class="col-sm-9"><input type="text" name="id_pro" value="10000" maxlength="10" minlength="3" required="true" class="form-control" id="ciudad" placeholder="Ingrese el ID tipo 100001" onkeypress="return SoloNumeros(event);" onchange="ValidarCedula(this.form.cedula_cliente.value, this.form.btnGuardar)">
        </div>
    </div>-->
    <div class="form-group" >
        <label  class="control-label col-sm-2" >Código:</label>
        <div class="col-sm-9"><input type="text" name="codigo_pro" maxlength="50" required="true" class="form-control" id="nombres" placeholder="Ingrese el codigo" >
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Nombre:</label>
        <div class="col-sm-9"><input type="text" name="nombre_pro" maxlength="50" required="true" class="form-control" id="apellidos" placeholder="Ingrese el nombre del producto"  onkeypress="return SoloLetras(event);" onchange="SoloLetras(this.form.apellido_cliente.value, this.form.btnGuardar)">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Descripción:</label>
        <div class="col-sm-9">
            <select name="descripcion_pro" >
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Iva</label>
        <div class="col-sm-9"><input type="text" name="iva_pro" value="1" maxlength="2" minlength="1" required="true" class="form-control" id="ciudad" placeholder="Ingrese el IVA"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)">
        </div>
    </div>  
    <div class="form-group">
        <label class="control-label col-sm-2" >Costo</label>
        <div class="col-sm-9"><input type="text" name="costo_pro" value="1" maxlength="5" minlength="1" required="true" class="form-control" id="ciudad" placeholder="Ingrese el costo"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)">
        </div>
    </div> 
<!--    <div class="form-group">
        <label class="control-label col-sm-2" >PVP</label>
        <div class="col-sm-9"><input type="text" name="pvp_pro" value="1" maxlength="5" minlength="1" required="true" class="form-control" id="ciudad" placeholder="Ingrese el PVP"  onkeypress="return SoloNumeros(event);" onchange="SoloNumeros(this.form.telefono_cliente.value, this.form.btnGuardar)">
        </div>
    </div> -->
    <div class="form-group">
        <label class="control-label col-sm-2" >Estado</label>
        <div class="col-sm-9">
            <select name="estado_pro" >
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class=" col-lg-offset-2 col-sm-1"> <button type="submit" class="btn btn-info " id="btnGuardar">Enviar Datos</button></div>
    </div>
</form>
