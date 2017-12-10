<?php

    include "./conexion.php";

    $pesototal = $_POST["pesototal"];
    $tiporopa = $_POST[ "tiporopa"];
    $sexo = $_POST["sexo"];
    $urgencia = $_POST["urgencia"];
    $iniciocompra = $_POST["iniciocompra"];
    $tiempoaprox = $_POST["tiempoaprox"];
    $costo = $_POST["costo"];
    $username = base64_decode($_POST["idUsuario"]);
    $idCompra = $_POST["idCompra"];

    $admin = $_POST["encrypt"];

    $ropas = implode(', ', $tiporopa);

    //peso_ropa, tipo_ropa, sexo, urgencia, inicio_compra, tiempo_aprox, costo, username
    $query = "UPDATE compras SET peso_ropa='$pesototal', tipo_ropa='$ropas', sexo='$sexo', urgencia='$urgencia', inicio_compra='$iniciocompra', tiempo_aprox='$tiempoaprox', costo='$costo' WHERE id = '$idCompra' AND username = '$username'";

    $res = $conexion->query($query);


    if( $res ){
        echo "Exito";
        
        header("Location: ../views/users/paneladmin.php?encrypt=".$admin);
    }else{
        echo "Error";
    } 

?>