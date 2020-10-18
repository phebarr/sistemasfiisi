<?php
require_once './php/conexion.php';
$sql = "SELECT * FROM tb_categoria";
$result = mysqli_query($mysqli, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        include ("includes/s1_head.php");  
    ?>
    <title>Listado de Categorías</title>
</head>
<body>
<header>
    <?php
         include ("includes/s2_header.php");
    ?>
</header>
        <section class="container" style="margin-top: 70px" >
            <div class="row">
                <div class="col-md-8">
                    <h3 style="margin:0">Listado de la Tabla Categoría</h3>
                </div>                
                <div class="col-md-4 text-right">
                    <a href="prod_add.php" class="btn btn-success">
                        <i class="fa fa-newspaper-o"></i> Agregar</a>
                </div>                
            </div>
            <br>
            <div class="row">
                <?php
                    require_once './marca_delete.php';
                ?>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="10%" style="text-align: center">CODIGO</th>
                            <th width="10%" style="text-align: center">NOMBRE</th>
                            <!-- <th width="10%" style="text-align: center">DESCRIPCIÓN</th> -->
                            <th width="10%" style="text-align: center">DESCRIPCIÓN</th>
                            <th width="10%" style="text-align: center">IMAGEN</th>
                            <th width="10%" style="text-align: center">ESTADO</th>
                            <th width="10%" style="text-align: center">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row["idcategoria"]; ?></td>
                                <td><?php echo $row["nomb_cat"]; ?></td>
                                <td><?php echo $row["desc_cat"]; ?></td>
                                <td><img  width="100%" src="<?php echo $row["imag_cat"]; ?>" alt=""/></td>
                                <td><?php echo $row["estd_cat"]; ?></td>
                                <td>
                                    <a href="marca_edit.php?idmarca=<?php echo $row['idmarca']?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="marca_index.php?action=delete&idmarca=<?php echo $row['idmarca']?>"
                                       onclick="return confirm('Seguro de eliminar a: <?php echo $row['nomb_mar']?>')" class="btn btn-info"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

<footer>
    <?php
         include ("includes/s3_footer.php");
    ?>
</footer>
</body>
<?php
    include_once './includes/s4_js.php';
?> 

</html>