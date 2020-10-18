<?php
//como estamos trabajando com bd
include_once ("php/conexion.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include_once './includes/s1_head.php';
        ?>
    </head>
    <body>
        <header>
            <?php
            include_once './includes/s2_header.php';
            ?>   
        </header>
        <hr>       
        <h2 style="margin-top: 50px; padding-left: 250px">DATOS DEL PRODUCTO   >>   AGREGAR DATOS</h2>
        <hr>
        <section class="container" style="margin-top: 30px" >

            <?php
            if (isset($_POST['add'])) {
                $idproducto = $_POST["InputID"];
                $nomb_pro = $_POST["InputNombre"];
                $desc_pro = $_POST["InputDesc"];
                $pven = $_POST["InputPrecio"];
                $imag_pro = $_POST["img_pro"];
                $stock_pro = $_POST["stock_pro"];
                $freg_pro = date('Y-m-d H:i:s');
                $estd_pro = $_POST["InputEstado"];

                $sql = "insert into tb_marca values(?,?,?,?,?)";
                $statement = $mysqli->prepare($sql);
                $statement->bind_param('isssi', $idmarca, $nomb_mar, $imag_mar, $freg_mar, $estd_mar);
                $statement->execute();
                $mysqli->close();

                if ($statement)
                //mensaje de alerta
                    echo '<div class="alert alert-success alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;'
                    . '</button>Datos guardados con Éxito.' . '</div>';
                else
                    echo '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;'
                    . '</button>Error. No se pudo guardar los cambios.' . '</div>';
            }
            ?>

            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Código</label>
                    <div class="col-sm-2">
                        <input type="text" name="InputID" class="form-control" readonly="readonly">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre del Producto</label>
                    <div class="col-sm-4">
                        <input type="text" name="InputNombre" class="form-control" placeholder="Nombre del producto" required>
                    </div>
                </div>     
                <div class="form-group">
                    <label class="col-sm-3 control-label">Descripción</label>
                    <div class="col-sm-3">
                        <textarea type="text" name="InputDesc" class="form-control" placeholder="Descripción" required></textarea>
                    </div>
                </div> 
                 
                <div class="form-group">
                    <label class="col-sm-3 control-label">Precio de Venta</label>
                    <div class="col-sm-2">
                        <input type="text" name="InputPrecio" class="form-control" placeholder="Precio" required>
                    </div>
                </div>                  
                <div class="form-group">
                    <label class="col-sm-3 control-label">Imagen</label>
                    <div class="col-sm-4">
                        <input type="file" name="image_mar" value="images/marcas/no-disponible.jpg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Stock</label>
                    <div class="col-sm-2">
                        <input type="text" name="InputPrecio" class="form-control" placeholder="Stock" required>
                    </div>
                </div>      
                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-3">
                        <select name="InputEstado" class="form-control">
                            <option select="selected" disabled="disabled" value="">Seleccione</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>                            
                        </select>
                    </div>                        
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <button type="submit" name="add" class="btn btn-primary">
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
