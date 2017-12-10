<?php
    include "conexion.php";

    $id = $_GET['id'];
    $usuario = base64_encode($_GET["user"]);

    $query = "DELETE FROM compras WHERE id = '$id'";
    $res = mysqli_query($conexion, $query);

    if( $res ){
        mysqli_close($conexion);
        header("Location: ../views/users/paneladmin.php?encrypt=".$usuario); 
    }else{
        header("Location: ../views/list.php?borrado=NO"); 
    }

?>