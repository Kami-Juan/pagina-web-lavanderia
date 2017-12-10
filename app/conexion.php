<?php
    $conexion = new mysqli("localhost","root","","lavatronic_itm");
    
    if( $conexion->connect_errno ){
        echo "conexion fallida :c ".$conexion->connect_errno;
        exit();
    }
?>