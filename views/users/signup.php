<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "../layouts/libraries.php";
    ?>
    <title>Lavatronic | Crear cuenta</title>
</head>
<body>
    <?php
        include "../layouts/header.php";
    ?>
    <div class="container sizesession">
        <h2 class="titulo-h2">CREAR CUENTA</h2>
        <div id="app" class="singup">
            <form @submit.prevent="postUser">
                <label for="">Nombre: </label><br>
                <input type="text" name="usuario" v-validate="'required|alpha_dash|min:5|max:100'" v-model="usuario.username" :class="{'input':true, 'esError': errors.has('usuario') }"><br>
                <span v-show="errors.has('usuario')" class="esErrorWord">{{ errors.first('usuario') }}</span><br>
                <label for="">Contraseña: </label><br>                
                <input type="password" name="password" v-model="usuario.password" v-validate="'required|alpha_dash|min:8|max:100'" :class="{ 'input':true, 'esError': errors.has('password') }"><br>
                <span v-show="errors.has('password')" class="esErrorWord">{{ errors.first('password') }}</span><br>
                <label for="">Correo: </label><br>                
                <input type="text" name="correo" v-model="usuario.correo" v-validate="'required|email|max:100'" :class="{ 'input':true, 'esError': errors.has('correo') }"><br>
                <span v-show="errors.has('correo')" class="esErrorWord">{{ errors.first('correo') }}</span><br>
                <input type="submit" value="Registrarse">
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