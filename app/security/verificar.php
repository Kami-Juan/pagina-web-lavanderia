<?php

    require '../../vendor/autoload.php';

    $password = "ok1234";
    $hash = PHPassLib\Hash\BCrypt::hash($password, array ('rounds' => 12));

    if (PHPassLib\Hash\BCrypt::verify($password, $hash)) {
        echo "yeah<br>";
    }

    echo $hash;

?>
