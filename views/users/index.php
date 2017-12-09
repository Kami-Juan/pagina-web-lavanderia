<?php
    // session_start();
    // if($_SESSION["tipoUsuario"] == "user" ){
    //     header("Location: panel.php");
    //     exit();
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "../layouts/libraries.php";
    ?>
    <title>Lavatronic | Inicio Sesión</title>
</head>
<body>
    <?php
        include "../layouts/header.php";
    ?>
    <div class="container sizesession">
        <h2 class="titulo-h2">INICIAR SESIÓN</h2>
        <div id="app" class="singup">
            <form @submit.prevent="loginUser">
                <label for="">Usuario</label><br>
                <input type="text" name="usuario" :class="{'input':true, 'esError': errors.has('usuario') }" v-validate="'required|alpha_dash|min:5|max:100'" v-model="login.username"><br>
                <span v-show="errors.has('usuario')" class="esErrorWord">{{ errors.first('usuario') }}</span><br>
                <label for="">Password</label>
                <input type="password" name="password" :class="{'input':true, 'esError': errors.has('password') }" v-validate="'required|alpha_dash|min:8|max:100'" v-model="login.password"><br>
                <span v-show="errors.has('password')" class="esErrorWord">{{ errors.first('password') }}</span><br>       <input type="submit" value="Login"> 
                <a href="signup.php">¿Aún no tienes cuenta? Regístrate aquí!</a>
            </form>
        </div>
    </div>
    <?php
        include "../layouts/footer.php";
    ?>
</body>
    <script src="../../public/librerias/vue.min.js"></script>
    <script src="../../public/librerias/vee-validate.js"></script>
    <script src="../../public/librerias/vue-es.js"></script>
    <script src="../../public/librerias/app.js"></script>
    <script src="../../public/librerias/axios.min.js"></script>
    <script src="../../public/js/storeuser.js"></script> 
</html>  