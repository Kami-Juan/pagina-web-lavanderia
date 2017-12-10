<?php
    session_start();
    if($_SESSION["tipoUsuario"] != "admin" ){
        header("Location: index.php");
        exit();
    }
?>
<html lang="es">
<head>
    <?php
        include "../layouts/libraries.php";
    ?>
    <title>Panel usuario | Lavatronic </title>
</head>
<body>
    <?php
        include "../layouts/headeruser.php";
    ?>
    <?php
        require '../../vendor/autoload.php';
        include "../../app/conexion.php";

        use Carbon\Carbon;

        setlocale(LC_TIME, 'es');

        $variable = $_GET["editarpedido"];
        $username = base64_decode($variable);

        $idCompra = $_GET["id"];

        $query = "SELECT * FROM compras WHERE id = '$idCompra' AND username = '$username'";
        $res = $conexion->query($query);
        $compra = $res->fetch_array(MYSQLI_BOTH);
        //
    ?>
    <div class="container usersession">
        <div class="panel-admin" id="app">
        <h2 class="titulo-h2">EDITAR COBRO - <?php echo $username ?> </h2>
            <div class="compras" class="animated fadeIn">
                <form class="form_compra" id="form_update" method="POST" action="../../app/editcobro.php" @submit.prevent = "updateCosto">
                    <input type="hidden" id="editar">
                    <input type="hidden" id="peso_ropa" value="<?php echo $compra["peso_ropa"]; ?>">
                    <input type="hidden" id="tipo_ropa" value="<?php echo $compra["tipo_ropa"]; ?>">
                    <input type="hidden" id="sexo" value="<?php echo $compra["sexo"]; ?>">
                    <input type="hidden" id="urgencia" value="<?php echo $compra["urgencia"]; ?>">
                    <input type="hidden" id="inicio_compra" value="<?php  echo $compra["inicio_compra"]; ?>">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $variable; ?>">
                    <input type="hidden" name="idCompra" value="<?php echo $idCompra; ?>">
                    <input type="hidden" name="encrypt" value="<?php echo $_GET["encrypt"]  ?>">                    
                    
                    <label for="">Inicio Compra</label><input type="datetime-local" name="iniciocompra" id="" v-model="cobro.iniciocompra" class="input"><br>
                    <label for="">Tiempo aproximado</label><input type="datetime-local" name="tiempoaprox" id="" :value="tiempoEstimado" readonly  class="input costo_total"><br>
                    <label for="">Peso total de la ropa: </label>
                    <select name="pesototal" id=""v-model="cobro.pesototal" class="input">
                        <option value="0" selected>Seleccione un peso de ropa</option>
                        <option :value="i*5" v-for="i in 6">Menor a {{ i*5 }} kg</option>
                    </select>
                    <br>
                    <label for="">Tipo de ropa: </label><br>
                    <label for="">Trajes: </label><input name="tiporopa[]" class="check-ropa" type="checkbox" value="trajes" v-model="cobro.tiporopa" >
                    <label for="">Bebé: </label><input name="tiporopa[]" class="check-ropa" type="checkbox" value="bebe" v-model="cobro.tiporopa">
                    <label for="">Casual: </label><input name="tiporopa[]" class="check-ropa" type="checkbox" value="casual" v-model="cobro.tiporopa">
                    <label for="">Deportivo: </label><input name="tiporopa[]" class="check-ropa" type="checkbox" value="deportivo" v-model="cobro.tiporopa"><br>
                    <label for="">Sexo: </label><br>
                    <label for="">Masculino</label><input type="radio" name="sexo" class="check-ropa" v-model="cobro.sexo" value="masculino"><label for="">Femenino</label><input type="radio" name="sexo" class="check-ropa" v-model="cobro.sexo" value="femenino"><br>
                    <label for="">Urgencia: </label>
                    <select name="urgencia" v-model="cobro.urgencia" class="input">
                        <option value="0">Selecciona un tipo de urgencia</option>
                        <option value="baja">Baja</option>
                        <option value="media">Media</option>
                        <option value="alta">Alta</option>
                        <option value="extrema">Extrema</option>
                    </select><br>
                    <label for="">Costo: </label><input type="text" name="costo" class="input costo_total" readonly  :value="cotizarcosto"><br>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
        <?php
            include "../layouts/footer.php";
        ?>
</body>
    <script src="../../public/librerias/vue.min.js"></script>
    <script src="../../public/librerias/axios.min.js"></script>
    <script src="../../public/librerias/moment.min.js"></script>
    <script src="../../public/js/paneluser.js"></script>
</html>