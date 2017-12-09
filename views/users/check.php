<?php
    session_start();
    if($_SESSION["tipoUsuario"] != "user" ){
        header("Location: index.php");
        exit();
    }
?>