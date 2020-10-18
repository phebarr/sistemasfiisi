<?php
include_once ("php/conexion.php");
?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        //incluid el head.php
        include_once './includes/s1_head.php';
    ?>
</head>
<body>
<?php
        include_once './includes/s1_head.php';
        ?>

    <head>
        
    </head>
    <body>
        <header>
            <?php
            include_once './includes/s2_header.php';
            ?>   
        </header>
        <hr>       
        <h2 style="margin-top: 50px; padding-left: 250px">DATOS DE LA CATEGORIA   >>   AGREGAR DATOS</h2>
        <hr>
        <section class="container" style="margin-top: 30px" >

            <?php
            //recuperar el valor del parametro que llega a traves de la url
            $idmarca=$_GET["idmarca"];
            $sql="SELECT * FROM tb_marca WHERE idmarca='$idmarca'";
            //Ejecutar la sentencia y recepcionar
            $result= mysqli_query($mysqli,$sql);  
            //si no hay resultado redirecciona
            if(mysqli_num_rows($result)==0)
              header("Location:index.php");  
            else
                //recupera los datos de la fila
              $row= mysqli_fetch_assoc($result);
                //isset verifica si tiene contenido o no 
            //add si presionastes el boton edit datos 
            if (isset($_POST['edit'])) 
            {
                //leer los datos del formulario
                $idmarca = $_POST["InputID"];
                $nomb_mar = $_POST["InputNombre"];
                $imag_mar = $_POST["InputImagen"];
                $estd_mar = $_POST["InputEstado"];
                //sentencia para insertar a la tabla
                $sql = "update tb_marca set nomb_mar=?,imag_mar=?,estd_mar=? where idmarca=?";
                //preparar su sentencia
                $statement = $mysqli->prepare($sql); //-> llamadas a metodos
                //establecer parametros: i=integer s=string
                $statement->bind_param('ssii', $nomb_mar, $imag_mar, $estd_mar, $idmarca);
                //ejecutar la sentencia
                $statement->execute();
                //cierra la conexion
                $mysqli->close();
                //si la inserción fue satisfactoria
                if ($statement)
                //mensaje de alerta
                    header ("Location: marca_edit.php?idmarca=".$idmarca."&resp=OK");    
                else
                    echo '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;'
                    . '</button>Error. No se pudo guardar los cambios.' . '</div>';
            }
            if(isset($_GET['resp'])=='OK')
            {
                echo '<div class="alert alert-success alert-dismissable"'
                    .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    .'Los datos han sido guardados con éxito';
                
            }
            ?>

            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Código</label>
                    <div class="col-sm-2">
                        <input type="text" name="InputID" value="<?php echo $row['idmarca']?>" class="form-control" readonly="readonly">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-4">
                        <input type="text" name="InputNombre" value="<?php echo $row['nomb_mar']?>" class="form-control" placeholder="Nombres" required>
                    </div>
                </div>                  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Imagen</label>
                    <div class="col-sm-4">
                        <input type="text" name="InputImagen" value="<?php echo $row['imag_mar']?>">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-3">
                        <select name="InputEstado" class="form-control">
                            <option select="selected" disabled="disabled" value="">Seleccione</option>
                            <option value="1"<?php if($row['estd_mar']==1){echo "selected";}?>>Activo</option>
                            <option value="2"><?php if($row['estd_mar']==2){echo "selected";}?>>Inactivo</option>
                        </select>
                    </div>                        
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <button type="submit" name="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"> Guardar Datos</i>
                        </button>
                        <a href="index.php" class="btn btn-danger">
                            <i class="fa fa-ban" aria-hidden="true"></i> Cancelar
                        </a>
                    </div>
                </div>             
            </form>
        </section>
        <footer>
            <?php
            //incluid el footer.php
            include_once './includes/s3_footer.php';
            ?> 
        </footer>   
    </body>
    <?php
    //incluid el head.php
    include_once './includes/s4_js.php';
    ?> 
    
</html>


