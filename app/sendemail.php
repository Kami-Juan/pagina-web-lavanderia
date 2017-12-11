<?php

    $mensaje = $_POST["email"];
    $emailadmin = "juandedioscen@juandediosonline.tk";
    $subject = "Petición de modificación";

    mail($emailadmin, $subject, $mensaje);

    echo json_encode("Mensaje enviado con éxito");
?>