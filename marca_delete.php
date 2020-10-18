<?php
if (isset($_GET['action']) == 'delete')
{
    $idmarca=$_GET['idmarca'];
    $sql="DELETE FROM tb_marca WHERE idmarca=?";
    $statement=$mysqli->prepare($sql);
    $statement->bind_param('i',$idmarca);
    $statement->execute();
    $mysqli->close();
    header("Location: marca_index.php");    
}
?>
