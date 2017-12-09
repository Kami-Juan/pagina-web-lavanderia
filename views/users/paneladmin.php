<?php
    session_start();
    if($_SESSION["tipoUsuario"] != "admin" ){
        header("Location: index.php");
        exit();
    }
?>
<p>admin</p>