<?php
if (isset($_GET['action']) == 'delete')
{
    $idproducto=$_GET['idproducto'];
    $sql="DELETE FROM tb_producto WHERE idproducto=?";
    $statement=$mysqli->prepare($sql);
    $statement->bind_param('i',$idproducto);
    $statement->execute();
    $mysqli->close();
    header("Location: producto.php");    
}
?>
