<?php

    //require '../../vendor/autoload.php';
    include "../conexion.php";
    include "../cors.php";
    cors();

    if( $_POST["tipo"] == "signup" ){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $correo = $_POST["correo"];


        
        if( $username != "" && $password != "" && $correo != "" ){
            if( verificarUsername( $username, $conexion ) > 0 ){
                $informacion["respuesta"] = "El username ".$username." ya está en uso. Por favor utiliza otro";
                echo json_encode($informacion);
            }else{
                auth();
                guardarDatos( $username, $hash, $correo, $conexion );
            }
        }
    }else if( $_POST["tipo"] == "login" ){
        

        $username = $_POST["username"];
        $password = $_POST["password"];

        if( $username != "" && $password != "" ){
            if( verificarUsername( $username, $conexion ) > 0 ){
                $pass = obtenerPassword( $username, $conexion );

                // if ($context->verify($password, $pass)) {
                //     echo json_encode("yeah");
                // }else{
                //     echo json_encode("buhhh");                    
                // }
            }
        }
    }

    

    function auth(){
        session_start();
        $_SESSION["tipoUsuario"] = "user";
    }

    function guardarDatos( $username, $pass, $correo, $conexion ){
        $query = "INSERT INTO usuario (username, correo, password, tipo) VALUES('$username', '$correo','$pass','user');";
        $resultado = mysqli_query($conexion, $query);
        verificar_resultado( $resultado );   
        cerrar( $conexion);
    }

    function verificarUsername( $user, $con ){
        $query = "SELECT username FROM usuario WHERE username = '$user'";
        $resultado = mysqli_query($con, $query);
		$row_mat = mysqli_num_rows( $resultado );
		return $row_mat;
    }

    function obtenerPassword( $user, $con ){
        $query = "SELECT password FROM usuario WHERE username = '$user'";
        $pass = mysqli_query($con, $query);
        $data =  mysqli_fetch_assoc($pass);
        return $data;        
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

?>