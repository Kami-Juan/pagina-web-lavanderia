<?php
    if( $_SERVER["HTTP_HOST"] == "localhost" ){
        $conexion = new mysqli("localhost","root","","lavatronic_itm");        
    }else{
        $conexion = new mysqli("mysql.hostinger.mx","u361262437_juan","Watusi04","u361262437_lava");            
    }
    
    if( $conexion->connect_errno ){
        //echo "conexion fallida :c ".$conexion->connect_errno;
        exit();
    }
    
?>