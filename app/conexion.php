<?php
    $conexion = new mysqli("localhost","root","Watusi04","lavatronic_itm");
    
    if( $conexion->connect_errno ){
        echo "conexion fallida :c ".$conexion->connect_errno;
        exit();
    }
?>