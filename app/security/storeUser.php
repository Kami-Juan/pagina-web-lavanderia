<?php

    require '../../vendor/autoload.php';
    include "../conexion.php";
    include "../cors.php";
    cors();
    $phpassHash = new \Phpass\Hash;

    if( $_POST["tipo"] == "signup" ){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $correo = $_POST["correo"];


        
        if( $username != "" && $password != "" && $correo != "" ){

            $hash = $phpassHash->hashPassword($password);

            if( verificarUsername( $username, $conexion ) > 0 ){
                $informacion["respuesta"] = "El username ".$username." ya está en uso. Por favor utiliza otro";
                echo json_encode($informacion);
            }else{
                auth(base64_encode($username));
                guardarDatos( $username, $hash, $correo, $conexion );
            }
        }
    }else if( $_POST["tipo"] == "login" ){
        

        $username = $_POST["username"];
        $password = $_POST["password"];

        if( $username != "" && $password != "" ){
            if( verificarUsername( $username, $conexion ) > 0 ){
                $pass = obtenerPassword( $username, $conexion );
                if ($phpassHash->checkPassword($password, $pass['password'])) {
                    if( $pass['tipo'] == "admin" ){

                        $respuesta["id"] = base64_encode($username);

                        //$respuesta["id"] = $pass["username"];
                        $respuesta["tipo"] = $pass["tipo"];
                        echo json_encode($respuesta);
                        authadmin(base64_encode($username));
                    }else{
                        $respuesta["id"] = base64_encode($username);                        
                        //$respuesta["id"] = $pass["username"];
                        $respuesta["tipo"] = $pass["tipo"];
                        echo json_encode($respuesta);
                        auth(base64_encode($username));
                    }  
                }else{
                    echo json_encode("Las credenciales no coinciden");                    
                }
            }else {
                echo json_encode("no existe un usuario registrado con ese nombre");                                    
            }
        }
    }

    

    function auth($user){
        session_start();
        $_SESSION["username"] = $user;
        $_SESSION["tipoUsuario"] = "user";
    }

    function authadmin($user){
        session_start();
        $_SESSION["username"] = $user;
        $_SESSION["tipoUsuario"] = "admin";
    }

    function guardarDatos( $username, $pass, $correo, $conexion ){
        $query = "INSERT INTO usuario (username, correo, password, tipo) VALUES('$username', '$correo','$pass','user');";
        $resultado = mysqli_query($conexion, $query);
        verificar_resultado( $resultado, $username );   
        cerrar( $conexion);
    }

    function verificarUsername( $user, $con ){
        $query = "SELECT username FROM usuario WHERE username = '$user'";
        $resultado = mysqli_query($con, $query);
		$row_mat = mysqli_num_rows( $resultado );
		return $row_mat;
    }

    function obtenerPassword( $user, $con ){
        $query = "SELECT password,tipo,username FROM usuario WHERE username = '$user'";
        $pass = mysqli_query($con, $query);
        $data =  mysqli_fetch_assoc($pass);
        return $data;        
    }

    function verificar_resultado($resultado, $user){
		if( !$resultado ){
            $informacion["respuesta"] = "ERROR DEL SERVIDOR";
			echo json_encode($informacion);
		}
		else{
            $informacion["id"] = base64_encode($user);
            $informacion["respuesta"] = "exito";
			echo json_encode($informacion);
		}
    }
    
    function cerrar( $conexion){
		mysqli_close( $conexion);
	}

?>