<?php
        include "./conexion.php";

        $pesototal = $_POST["pesototal"];
        $tiporopa = $_POST[ "tiporopa"];
        $sexo = $_POST["sexo"];
        $urgencia = $_POST["urgencia"];
        $iniciocompra = $_POST["iniciocompra"];
        $tiempoaprox = $_POST["tiempoaprox"];
        $costo = $_POST["costo"];
        $username = base64_decode($_POST["idUsuario"]);
        
        guardarDatos( $pesototal, $tiporopa, $sexo, $urgencia, $iniciocompra, $tiempoaprox, $costo, $username, $conexion );

        function guardarDatos( $pr, $tp, $sex, $urgencia, $inicom, $tiempoaprx, $costo, $user ,$conexion ){
            $query = "INSERT INTO compras (peso_ropa, tipo_ropa, sexo, urgencia, inicio_compra, tiempo_aprox, costo, username) VALUES('$pr', '$tp','$sex','$urgencia','$inicom','$tiempoaprx','$costo','$user');";
            $resultado = mysqli_query($conexion, $query);
            verificar_resultado( $resultado );   
            cerrar( $conexion);
        }

        function verificar_resultado($resultado){
            if( !$resultado ){
                $informacion["respuesta"] = "ERROR DEL SERVIDOR";
                echo json_encode($informacion);
            }
            else{
                $informacion["respuesta"] = "exito";
                echo json_encode($informacion);
            }
        }
        
        function cerrar( $conexion){
            mysqli_close( $conexion);
        }

        /* echo json_encode($username); */
        
?>
