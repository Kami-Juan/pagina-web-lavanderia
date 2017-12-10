<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION["tipoUsuario"] = "invitado";    
    header("Location: ../../views");
    
?>