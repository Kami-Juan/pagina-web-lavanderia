<?php
    include "./check.php";
?>
<!DOCTYPE html>
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
    <div class="container usersession">
        <h2 class="titulo-h2">COBROS</h2>
        <div class="panel-admin" id="app">
            <div class="agregar_cotizacion">
                <button @click="newCotizacion" v-show="!isAgregar && !isPeticion" class="animated fadeIn"><i class="ion-plus-circled"></i>Agregar cobro</button>
                <button @click="newCotizacion" v-show="isAgregar && !isPeticion " class="animated fadeIn"><i class="ion-arrow-left-a"></i>Volver</button>
                <button @click="newPeticion" class="animated fadeIn" v-show="!isAgregar && !isPeticion"><i class="ion-edit"></i>Enviar petición de editar o cancelar</button>
                <button @click="newPeticion" v-show="!isAgregar && isPeticion " class="animated fadeIn"><i class="ion-arrow-left-a"></i>Volver</button>
            </div>
            <table class="table_user_data animated fadeIn" v-show="!isAgregar && !isPeticion">
                <thead>
                    <th>Costo <i class="ion-cash"></i></th>
                    <th>Fecha de pedido</th>
                    <th>Hora de pedido</th>
                    <th>Fecha de estimada</th>                    
                    <th>Hora estimada</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                <?php
                    require '../../vendor/autoload.php';
                    include "../../app/conexion.php";

                    use Carbon\Carbon;

                    setlocale(LC_TIME, 'es');

                    $variable = $_GET["encrypt"];


                    if( isset($_GET["pagina"]) ){
                        $pagina =  $_GET["pagina"];
                    }else{
                        $pagina = 1;
                    }

                    $size_pagina = 5;
                    $start_in = ( $pagina-1 )*$size_pagina;

                    $username = base64_decode($variable);
                    $cobros = "SELECT * FROM compras WHERE username = '$username' order by id asc";
                    $res = $conexion->query($cobros);

                    $num_rows = mysqli_num_rows($res);
                    $total_paginas = ceil($num_rows/$size_pagina);

                    $sql_limite = "SELECT * FROM compras WHERE username = '$username' order by id asc LIMIT $start_in, $size_pagina";
                    $res = $conexion->query($sql_limite);

                    while( $registro = $res->fetch_array(MYSQLI_BOTH) ){
                        echo "<tr>";
                        echo "<td>".$registro['costo']."</td>";   

                        $fechainicio = new Carbon($registro['inicio_compra']);
                        $tiempo_aprox = new Carbon($registro['tiempo_aprox']);

                        echo "<td>".$fechainicio->formatLocalized('%d %B %Y')."</td>";   
                        echo "<td>".$fechainicio->formatLocalized('%r')."</td>";                           
                        echo "<td>".$tiempo_aprox->formatLocalized('%d %B %Y')."</td>";      
                        echo "<td>".$tiempo_aprox->formatLocalized('%r')."</td>"; 
                        echo '<td><a class="btn btn-edit" href="verpedido.php?mostrarpedido='.$variable.'&id='.$registro["id"].'"><i class="ion-eye"></i></a></td>';      
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
            <div class="rows_tabla" v-show="!isAgregar && !isPeticion">
                <?php
                    for( $i = 1; $i <= $total_paginas; $i++ ){
                        echo "<a href='?pagina=".$i."&encrypt=".$variable."'>".$i."</a>";
                    }
                ?>
            </div>
            <div class="compras" v-show="isAgregar" class="animated fadeIn">
                <form @submit.prevent="submitCobro" class="form_compra">
                    <input type="hidden" id="idUsuario" value="<?php echo $variable; ?>">
                    <label for="">Inicio Compra</label><input type="datetime-local" name="iniciocompra" id="" v-model="cobro.iniciocompra" :class="{ 'input': true }"><br>
                    <label for="">Tiempo aproximado</label><input type="datetime-local" name="tiempoaprox" id="" :value="tiempoEstimado" readonly :class="{ 'input': true }" class="costo_total"><br>
                    <label for="">Peso total de la ropa: </label>
                    <select name="pesototal" id=""v-model="cobro.pesototal" :class="{ 'input': true }">
                        <option value="0" selected>Seleccione un peso de ropa</option>
                        <option :value="i*5" v-for="i in 6">Menor a {{ i*5 }} kg</option>
                    </select>
                    <br>
                    <label for="">Tipo de ropa: </label><br>
                    <label for="">Trajes: </label><input name="tiporopa[0]" class="check-ropa" type="checkbox" value="trajes" v-model="cobro.tiporopa" >
                    <label for="">Bebé: </label><input name="tiporopa[1]" class="check-ropa" type="checkbox" value="bebe" v-model="cobro.tiporopa">
                    <label for="">Casual: </label><input name="tiporopa[2]" class="check-ropa" type="checkbox" value="casual" v-model="cobro.tiporopa">
                    <label for="">Deportivo: </label><input name="tiporopa[3]" class="check-ropa" type="checkbox" value="deportivo" v-model="cobro.tiporopa"><br>
                    <label for="">Sexo: </label><br>
                    <label for="">Masculino</label><input type="radio" name="sexo" class="check-ropa" v-model="cobro.sexo" value="masculino"><label for="">Femenino</label><input type="radio" name="sexo" class="check-ropa" v-model="cobro.sexo" value="femenino"><br>
                    <label for="">Urgencia: </label>
                    <select name="urgencia" v-model="cobro.urgencia" :class="{ 'input': true }">
                        <option value="0">Selecciona un tipo de urgencia</option>
                        <option value="baja">Baja</option>
                        <option value="media">Media</option>
                        <option value="alta">Alta</option>
                        <option value="extrema">Extrema</option>
                    </select><br>
                    <label for="">Costo: </label><input type="text" name="costo" class="costo_total" readonly  :value="cotizarcosto" :class="{ 'input': true }"><br>
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <div class="compras" v-show="isPeticion">
                <form class="enviar_peticion" @submit.prevent="enviarEmail">
                    <label for="">Envia tu petición: </label><br>
                    <textarea name="email" cols="30" rows="10" v-model="mensajeEmail"></textarea><br>  
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
    <script src="../../public/librerias/moment.min.js"></script>
    <script src="../../public/js/paneluser.js"></script>
</html>