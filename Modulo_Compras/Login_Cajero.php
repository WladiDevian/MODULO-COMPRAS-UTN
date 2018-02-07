<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Cajero</title>
        <link rel="stylesheet" href="Administrador/View/CSS/estilos_login.css">
        <link rel="stylesheet"  href="Administrador/View/CSS/fonts/fonts.css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="Administrador/View/JS/main.js"></script>
        <script src="Administrador/View/JS/jquery-3.1.1"></script>
        <script src="Administrador/View/JS/bootstrap.js"></script>
        <script src=""></script>
        <link href="Administrador/View/CSS/bootstrap.css" rel="stylesheet">
        <link href="Administrador/View/CSS/bootstrap-table.css" rel="stylesheet">
        <script src="Administrador/View/JS/validaciones.js"></script>
    </head>
    <body> <br><br>  
        <form action="Administrador/Controller/Controller_Login.php">
            <h1>CAJERO</h1>
            <center><br><br><br><br><br><br>
                <div class="container">
                    <img src="Administrador/View/images/admin.png">
                    <input type="hidden" name="opcion" value="iniciar_sesion_cajero"><br>

                    <input type="email" name="email_cajero" placeholder="Ingrese el email" required="true" onkeypress="return validaCorreoElectronico(event);"maxlength="30" onchange="validaCorreoElectronico(this.form.email_cajero, this.form.btng)" ><br>
                    <input type="password" name="cedula_cajero" placeholder="Ingrese la contraseña" required="true"  onkeypress="return SoloNumeros(event);"maxlength="10" onchange="SoloNumeros(this.form.cedula_cajero, this.form.btng)" ><br>
                    <input type="submit" value="INGRESAR" onclick="$('#capa').css('display', 'block')" class="btn btn btn-outline-primary"><br>                
                   
                    
<!--                    <a href="#" onmouseDown="alert('Por favor comuniquese con el Administrador, para restablecer su contraseña.')" class="alert-link">¿Olvido su contraseña?</a><br>
                   -->
                    <a href="index.php" class="alert-link">Regresar</a>
                </div>
            </center>
        </form>

    </body>
</html>

