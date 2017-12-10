<?php
    $conexion = new mysqli("mysql.hostinger.mx","u361262437_juan","Watusi04","u361262437_lava");
    
    if( $conexion->connect_errno ){
        echo "conexion fallida :c ".$conexion->connect_errno;
        exit();
    }
?>