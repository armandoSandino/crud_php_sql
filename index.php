<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> CRUD </title>
        <meta name="description" content="CRUD EN PHP Y SQLSERVER">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
<header>
<section class="container">
<h1>CRUD CON PHP Y SQL SERVER</h1>
</section>
</header>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h3>Herramientas</h3>
                    <form name="mi_form" method="POST" action="php/registrar.php">
                    
                    <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" class="form-control" 
                    placeholder="ingrese el codigo" required/><br/>
                    </div>

                    <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" 
                    placeholder="ingrese el nombre" required/><br/>
                    </div>
                    
                    <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" 
                    placeholder="cantidad" required/> <br/>
                    </div>

                    <div class="form-group">
                    <input type="submit" name="insertar" class="btn btn-success" value="INSERTAR" title="insertar esta herramienta"/>
                    </div>
                    </form>
                </div>
            </div>
            <br /><br /><br />

            <div class="row">
                <div class="col-md-6">
                    <table class="table table-condensed table-bordered table-responsive">
                        <thead>
                            <tr>
                                <td> ID </td>
                                <td> CODIGO </td>
                                <td> Nombre</td>
                                <td>Cantidad</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("php/conexion.php");
                            $con = Conexion::Conectar();
                            $sql = "SELECT * FROM dbo.herramientas";
                            $query = sqlsrv_query( $con, $sql );
                            $contador = 0;
                            while( $fil  = sqlsrv_fetch_array( $query) ){
                            ?>
                            <tr>
                                <td><?php echo $fil['Id']; ?></td>
                                <td><?php echo $fil['code']; ?></td>
                                <td><?php echo $fil['nombre'];?></td>
                                <td><?php echo $fil['cantidad'];?></td>
                                <td> <a href="php/operaciones.php?id_edit=<?php echo $fil['Id']; ?>" class="btn btn-success">Editar</a> </td>
                                <td> <a href="php/operaciones.php?id_delete=<?php echo $fil['Id']; ?>" class="btn btn-success">Borrrar</a> </td>
                            </tr>
                            <?php
                            }
                            sqlsrv_free_stmt( $query );
                            Conexion::Desconectar();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
<!-- fin del contenedor -->


<!-- importamos las librerias -->
<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
<!-- mi JS -->
<script src="js/jquery-3.4.1.min.js"> </script>
<script src="js/main.js"> </script> 
<!-- fin de la importacion de librerias -->

    </body>
    <footer>

    </footer>
</html>