<!DOCTYPE html>

<html>

    <?php
    session_start();
    include '../Model/CRUD_Admin.php';

    if (isset($_SESSION['login_cajero']) == FALSE) {
        header("Location: ../../index.php");
        return;
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Menú Proveedor by cajero</title>
        <script src="JS/jquery-3.1.1.js"></script>
        <script src="JS/bootstrap.js"></script>
        <script src="JS/bootstrap-table.js"></script>
        <link href="CSS/bootstrap.css" rel="stylesheet">
        <link href="CSS/bootstrap-table.css" rel="stylesheet">

        <script>
            function confirmar_eliminar()
            {
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
            <BR><div  class="well well-sm">
                <nav>
                    <ul class="nav nav-pills">
                       <li class=""><a href="MenuCajero.php">INICIO</a></li>
                        <li  class=""><a  href="../Controller/Controller_Cajero.php?opcion=listar_cajeros">Cajeros</a></li>
                        <li  class="active"><a  href="../Controller/Controller_Cajero.php?opcion=listar_proveedores">Proveedores</a></li>
                        <li class=""><a href="../Controller/Controller_Cajero.php?opcion=listar_productos">Productos</a></li>
                        <li class=""><a href="MenuFactura_Cajero.php">Facturas</a></li>

                    </ul>
                </nav></div>

            <section>   
                <center><div class="row">
                        <h4>GESTIÓN DE PROVEEDORES</h4>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ingreso_cajero">Ingresar Proveedor</button>
                </center>
                <br>   
                <div class="panel panel-primary">
                    <div class="panel-heading">INFORMACIÓN DE PROVEEDORES </div>
                    <div  class="table-responsive">
                        <table class=" table table-bordered table-hover" data-pagination="true"   >
                            <thead>
                                <tr>
                                    <th>EDITAR</th>
                                    <th>CÉDULA</th>
                                    <th>CÉDULA CAJERO</th>
                                    <th>NOMBRES</th>
                                    <th>FECHA NAC.</th>
                                    <th>CIUDAD NAC.</th>
<!--                                    <th>TIPO</th>-->
                                    <th>CRÉDITO</th>
                                    <th>DIRECCIÓN</th>
                                    <th>TELÉFONO</th>
                                    <th>EMAIL</th>
                                    <th>ESTADO</th>
<!--                                    <th>EDITAR</th>-->
<!--                                    <th>ELIMINAR</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['listado_proveedores'])) {
                                    $listado_proveedores = unserialize($_SESSION['listado_proveedores']);
                                    foreach ($listado_proveedores as $provs) {
                                        echo "<tr>";
                                       
                                        echo "<td><a href='../Controller/Controller_Cajero.php?opcion=editar_proveedor&cedula_proveedor=" . $provs->getCedula_proveedor() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                                        echo "<td>" . $provs->getCedula_proveedor() . "</td>";
                                        echo "<td>" . $provs->getCedula_cajero() . "</td>";
                                        echo "<td>" . $provs->getNombre_completo() . "</td>";
                                        echo "<td>" . $provs->getFecha_nacimiento() . "</td>";
                                        echo "<td>" . $provs->getCiudad_nacimiento() . "</td>";
//                                        echo "<td>" . $provs->getTipo_proveedor() . "</td>";
                                        echo "<td>" . $provs->getCredito() . "</td>";
                                        echo "<td>" . $provs->getDireccion() . "</td>";
                                        echo "<td>" . $provs->getTelefono() . "</td>";
                                        echo "<td>" . $provs->getEmail() . "</td>";
                                        echo "<td>" . $provs->getEstado_prov() . "</td>";
//                                        echo "<td><a href='../Controller/Controller_Admin.php?opcion=editar_proveedor&cedula_proveedor=" . $provs->getCedula_proveedor() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
//                                        echo "<td><a onclick ='return confirmar_eliminar()' href='../Controller/Controller_Admin.php?opcion=delete_proveedor&cedula_proveedor=" . $provs->getCedula_proveedor() . "'><span class='glyphicon glyphicon-trash'> Eliminar </span></a></td>";
//                                      
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "No se han cargado datos.";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>       

                </div>
            </section>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ingreso_cajero" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registro de Datos Proveedor</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        include './RegistrarProveedor_cajero.php';
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo "<br>MENSAJE DEL SISTEMA: <font color='red'>" . $_SESSION['mensaje'] . "</font><br>";
        }
        ?>

    </body>
</html>

