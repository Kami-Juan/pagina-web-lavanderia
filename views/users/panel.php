<?php
    include "./check.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "../layouts/libraries.php";
    ?>
    <title>Panel usuario | Lavatronic </title>
</head>
<body>
    <?php
        include "../layouts/header.php";
    ?>
    <div class="container sizesession">
        <h2 class="titulo-h2">COBROS</h2>
        <div class="panel-admin" id="app">
            <div class="agregar_cotizacion">
                <button @click="newCotizacion" v-show="!isAgregar" class="animated fadeIn">Agregar<i class="ion-plus-circled"></i></button>
                <button @click="newCotizacion" v-show="isAgregar" class="animated fadeIn">Volver<i class="ion-plus-circled"></i></button>
            </div>
            <table class="table_user_data animated fadeIn" v-if="!isAgregar">
                <thead>
                    <th>Costo <i class="ion-cash"></i></th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de Final</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Ejemplo</td>
                        <td>Ejemplo</td>
                        <td>Ejemplo</td>
                        <td>Ejemplo</td>
                    </tr>
                    <tr>
                        <td>Ejemplo</td>
                        <td>Ejemplo</td>
                        <td>Ejemplo</td>
                        <td>Ejemplo</td>
                    </tr>
                </tbody>
            </table>
            <div class="compras" v-if="isAgregar" class="animated fadeIn">
                <form @submit.prevent="submitCobro">
                    <label for="">Peso total de la ropa: </label><input type="text" v-model="cobro.pesototal"><br>
                    <label for="">Tipo de ropas: </label><br>
                    <label for="">Trajes</label><input type="checkbox" value="trajes" v-model="cobro.tiporopa">
                    <label for="">Bebé</label><input type="checkbox" value="bebe" v-model="cobro.tiporopa">
                    <label for="">Casual</label><input type="checkbox" value="casual" v-model="cobro.tiporopa">
                    <label for="">Deportivo</label><input type="checkbox" value="deportivo" v-model="cobro.tiporopa"><br>
                    <label for="">Sexo: </label><br>
                    <label for="">Masculino</label><input type="radio" name="sexo" id="" v-model="cobro.sexo" value="masculino"><label for="">Femenino</label><input type="radio" name="sexo" id="" v-model="cobro.sexo" value="femenino"><br>
                    <label for="">Urgencia: </label>
                    <select name="urgencia" id="" v-model="cobro.urgencia">
                        <option value="0">Selecciona un tipo de urgencia</option>
                        <option value="baja">Baja</option>
                        <option value="media">Media</option>
                        <option value="alta">Alta</option>
                        <option value="extrema">Extrema</option>
                    </select><br>
                    <label for="">Inicio Compra</label><input type="datetime-local" name="" id="" v-model="cobro.iniciocompra"><br>               
                    <label for="">Tiempo aproximado</label><input type="datetime-local" name="" id="" v-model="cobro.tiempoaprox"><br>
                    <label for="">Costo: </label><input type="text" name="costo" id="" readonly v-model="cobro.costo">
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
    <script src="../../public/librerias/vee-validate.js"></script>
    <script src="../../public/librerias/vue-es.js"></script>
    <script src="../../public/librerias/app.js"></script>
    <script src="../../public/librerias/axios.min.js"></script>
    <scrript src="../../public/librerias/moment.min.js"></scrript>
    <script src="../../public/js/paneluser.js"></script>
</html>