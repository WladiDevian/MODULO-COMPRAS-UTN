<!DOCTYPE html>

<html>

    <?php
    session_start();
    include '../Model/CRUD_Admin.php';

    if (isset($_SESSION['login_admin']) == FALSE) {
        header("Location: ../../index.php");
        return;
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Menú Producto by admin</title>
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
                    <h5 class="text-success">Bienvenido Admin. <?php echo $_SESSION['cedula_admin'] ?></h5>
                    <form method="POST" action="../Controller/Controller_Login.php">
                        <input type="hidden" name="opcion" value="Cerrar_Sesion_Admin">
                        <button type="submit" class="btn-danger" >Cerrar Sesión</button>
                    </form>

                </header></center>
            <BR><div  class="well well-sm">
                <nav>
                    <ul class="nav nav-pills">
                        <li class=""><a href="MenuAdmin.php">INICIO</a></li>
                        <li  class=""><a  href="../Controller/Controller_Admin.php?opcion=listar_administradores">Administradores</a></li>
                        <li  class=""><a  href="../Controller/Controller_Admin.php?opcion=listar_cajeros">Cajeros</a></li>
                        <li  class=""><a  href="../Controller/Controller_Admin.php?opcion=listar_proveedores">Proveedores</a></li>
                        <li class="active"><a href="../Controller/Controller_Admin.php?opcion=listar_productos">Productos</a></li>
                        <li class=""><a href="MenuFactura_Admin.php">Facturas</a></li>

                    </ul>
                </nav></div>

            <section>   
                <center><div class="row">
                        <h4>GESTIÓN DE PRODUCTOS</h4>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ingreso_cajero">Ingresar Producto</button>

                </center>
                <br>   
                <div class="panel panel-primary">
                    <div class="panel-heading">INFORMACIÓN DE PRODUCTOS </div>
                    <div  class="table-responsive">
                        <table class=" table table-bordered table-hover"  data-pagination="true"  >
                            <thead>
                                <tr>
                                    <th>EDITAR</th>
                                    <th>ID </th>
                                    <th>CÓDIGO  </th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>IVA</th>
                                    <th>COSTO</th>
                                    <th>PVP</th>
                                    <th>ESTADO</th>
<!--                                    <th>EDITAR</th>-->
<!--                                    <th>ELIMINAR</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['listado_productos'])) {
                                    $listado_productos = unserialize($_SESSION['listado_productos']);
                                    foreach ($listado_productos as $prods) {
                                        echo "<tr>";
                                        echo "<td><a href='../Controller/Controller_Admin.php?opcion=editar_producto&id_pro=" . $prods->getId_pro() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                                        echo "<td>" . $prods->getId_pro() . "</td>";
                                        echo "<td>" . $prods->getCodigo_pro() . "</td>";
                                        echo "<td>" . $prods->getNombre_pro() . "</td>";
                                        echo "<td>" . $prods->getDescripcion_pro() . "</td>";
                                        echo "<td>" . $prods->getIva_pro() . "</td>";
                                        echo "<td>" . $prods->getCosto_pro() . "</td>";
                                        echo "<td>" . $prods->getPvp_pro() . "</td>";
                                        echo "<td>" . $prods->getEstado_pro() . "</td>";
//                                        echo "<td><a href='../Controller/Controller_Admin.php?opcion=editar_producto&id_pro=" . $prods->getId_pro() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
//                                        echo "<td><a onclick ='return confirmar_eliminar()' href='../Controller/Controller_Admin.php?opcion=delete_producto&id_pro=" . $prods->getId_pro() . "'><span class='glyphicon glyphicon-trash'> Eliminar </span></a></td>";
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
                        <h4 class="modal-title">Registro de Datos Producto</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        include './RegistrarProducto.php';
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
