<?php

    include "./cors.php";
    cors();

    $hola = $_POST['hola'];    
    
    echo json_encode($hola);

?>