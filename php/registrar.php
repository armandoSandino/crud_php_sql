<?php
        require_once("conexion.php");
        if( isset($_POST['insertar']) ){
            $code = $_POST['codigo'];
            $nom = $_POST['nombre'];
            $can = $_POST['cantidad'];
            $sql = "INSERT INTO dbo.herramientas(code,nombre,cantidad)VALUES('$code','$nom','$can')";
            
            $con = Conexion::Conectar();
            $query = sqlsrv_query( $con, $sql );
            $res = sqlsrv_rows_affected($query);
            sqlsrv_free_stmt( $query );
            Conexion::Desconectar();

            if($query == false or $res == false ){
                echo "<script>alert('No Insertado correctamente');</script>";
                header("Location:../index.php");
			}else{
                echo "<script>alert('Insertado correctamente');</script>";
                header("Location:../index.php");
            }
        }
?>