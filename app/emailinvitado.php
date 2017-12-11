<?php

    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $tel = $_POST["tel"];
    $asunto = $_POST["asunto"];

    $emailadmin = "juandedioscen@juandediosonline.tk";
    $subject = "Del correo: '$email'";
    
    mail($emailadmin, $subject,$nombre." ".$tel." ".$asunto);

    header("Location: ../views/comentario.php");
?>