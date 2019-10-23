<?php
require_once("conexion.php");

function editar(){
    $id = $_GET['id_edit'];
    $sql = "SELECT * FROM dbo.herramientas WHERE dbo.herramientas.Id='$id'";
    $con = Conexion::Conectar();
    $query = sqlsrv_query( $con , $sql );
    $fila = sqlsrv_fetch_array( $query );
    ?>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- importamos las librerias -->
<script src="../js/jquery-3.3.1.slim.min.js" ></script>
<script src="../js/popper.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<!-- mi JS -->
<script src="../js/jquery-3.4.1.min.js"> </script>
<!-- fin de la importacion de librerias -->
<br/> <br/>
<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Editar registro de herramientas</h3>
                    <form name="mi_form_edit" method="POST" action="operaciones.php">
                    
                    <input hidden type="text" name="ID" value="<?php echo $fila['Id']; ?>"/>
                    
                    <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" name="codigo" value="<?php echo $fila['code'];?>" class="form-control" 
                    placeholder="ingrese el codigo" required/><br/>
                    </div>

                    <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $fila['nombre'] ;?>" class="form-control" 
                    placeholder="ingrese el nombre" required/><br/>
                    </div>
                    
                    <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" name="cantidad" value="<?php echo $fila['cantidad']; ?>" class="form-control" 
                    placeholder="cantidad" required/> <br/>
                    </div>

                    <div class="form-group">
                    <input type="submit" name="editar" class="btn btn-success" value="Actualizar" title="insertar esta herramienta"/>
                    </div>
                    </form>
                </div>
            </div>
</div>            
    <?php
sqlsrv_free_stmt( $query );
Conexion::Desconectar();
}

function borrar(){

$id = $_GET['id_delete'];
$con = Conexion::Conectar();
$sql = "DELETE FROM dbo.herramientas WHERE dbo.herramientas.Id='$id' ";
$query = sqlsrv_query($con, $sql );
$res = sqlsrv_rows_affected( $query );

sqlsrv_free_stmt( $query );
Conexion::Desconectar();

if( $query == false or $res == false ){
    echo "<script> window.alert('No eliminado.'); </script>";
    echo "<script> window.open('../index.php','_self'); </script>";
}else{
echo "<script> window.alert('Registro eliminado.');</script>";
echo "<script> window.open('../index.php','_self');</script>";
}

}//end function

if( isset($_GET['id_edit']) ){
editar();
}else if( isset($_GET['id_delete']) ){
borrar();
}

/// sacar datos para editar la informacion
if( isset($_POST['editar'] ) ){
$ID = $_POST['ID'];
$code = $_POST['codigo'];
$nombre = $_POST['nombre'];
$can = $_POST['cantidad'];

$con = Conexion::Conectar();
$sql = "UPDATE dbo.herramientas SET dbo.herramientas.code='$code',dbo.herramientas.nombre='$nombre',dbo.herramientas.cantidad='$can' WHERE dbo.herramientas.Id='$ID'";
$query = sqlsrv_query( $con ,$sql );
$res = sqlsrv_rows_affected( $query );
sqlsrv_free_stmt( $query );
Conexion::Desconectar();
if( $query == false or $res == false ){
    echo "<script >alert('No actualizado correctamente');</script>";
    echo "<script >window.open('../index.php','_self');</script>";
}else{
    echo "<script >alert('Actualizado correctamente');</script>";
    echo "<script >window.open('../index.php','_self');</script>";
}

}//end if

?>