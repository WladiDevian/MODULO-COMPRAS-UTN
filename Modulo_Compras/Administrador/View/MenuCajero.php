<!DOCTYPE html>

<html>

    <?php
    session_start();

    if (isset($_SESSION['login_cajero']) == FALSE) {
        header("Location: ../../index.php");
        return;
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Menú Cajero</title>
        <script src="JS/jquery-3.1.1.js"></script>
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrap-table.js"></script>
        <link href="CSS/bootstrap.css" rel="stylesheet">
        <link href="CSS/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>

        <div class="container">
            <center>  
                <header>
                    <img  class="img-responsive" src="images/banner_compras.png">
                  
                    <h5 class="text-success">Bienvenido Cajero. <?php echo $_SESSION['cedula_cajero'] ?></h5>
                    <form method="POST" action="../Controller/Controller_Login.php">
                        <input type="hidden" name="opcion" value="Cerrar_Sesion_Cajero">
                        <button type="submit" class="btn-danger" >Cerrar Sesión</button>
                    </form>
                    
                </header>
            </center>
            <BR><div  class="well well-sm">
                <nav>
                    <ul class="nav nav-pills">
                        <li class="active"><a href="MenuCajero.php">INICIO</a></li>
                        <li  class=""><a  href="../Controller/Controller_Cajero.php?opcion=listar_cajeros">Cajeros</a></li>
                        <li  class=""><a  href="../Controller/Controller_Cajero.php?opcion=listar_proveedores">Proveedores</a></li>
                        <li class=""><a href="../Controller/Controller_Cajero.php?opcion=listar_productos">Productos</a></li>
                        <li class=""><a href="MenuFactura_Cajero.php">Facturas</a></li>

                    </ul>
                </nav></div>
            <h2>Módulo de Compras </h2>
            <H3>INICIO CAJERO</H3>

        </div>

    </body>
</html>
