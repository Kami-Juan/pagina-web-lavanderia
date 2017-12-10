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
    <div class="container usersession">
        <h2 class="titulo-h2">COBROS - ADMIN</h2>
        <div class="panel-admin" id="app">
            <table class="table_user_data animated fadeIn" v-show="!isAgregar && !isPeticion">
                <thead>
                    <th>Usuario</th>
                    <th>Costo <i class="ion-cash"></i></th>
                    <th>Fecha de pedido</th>
                    <th>Hora de pedido</th>
                    <th>Fecha de estimada</th>                    
                    <th>Hora estimada</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                <input type="hidden" id="idUsuario" value="<?php echo $_GET['encrypt']; ?>">
                <?php
                    require '../../vendor/autoload.php';
                    include "../../app/conexion.php";

                    use Carbon\Carbon;

                    setlocale(LC_TIME, 'es');

                    $cobros = "SELECT * FROM compras order by id asc";
                    $res = $conexion->query($cobros);
                    if( isset($_GET['encrypt']) ){
                        $admin = $_GET['encrypt'];    
                    }
                    
                    while( $registro = $res->fetch_array(MYSQLI_BOTH) ){
                        echo "<tr>";
                        echo "<td>".$registro["username"]."</td>";
                        echo "<td>".$registro['costo']."</td>";   

                        $fechainicio = new Carbon($registro['inicio_compra']);
                        $tiempo_aprox = new Carbon($registro['tiempo_aprox']);

                        echo "<td>".$fechainicio->formatLocalized('%d %B %Y')."</td>";   
                        echo "<td>".$fechainicio->formatLocalized('%r')."</td>";                           
                        echo "<td>".$tiempo_aprox->formatLocalized('%d %B %Y')."</td>";      
                        echo "<td>".$tiempo_aprox->formatLocalized('%r')."</td>";
                        
                        $variable = base64_encode($registro["username"]); 

                        echo '<td><a href="editarCobro.php?editarpedido='.$variable.'&id='.$registro["id"].'&encrypt='.$admin.'"><i class="ion-edit"></i></a></td>';
                        echo '<td><a onClick="validar('.$registro['id'].')" href="#" >Eliminar</a></td>';;      
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        include "../layouts/footer.php";
    ?>
</body>
    <script>
        function validar( url ){
           var eliminar = confirm("¿Desea eliminar el registro?");

           if( eliminar ){
               const user = document.getElementById("idUsuario").value;
               window.location = "../../app/borrarcobro.php?id="+url+"&user="+user;
           }else{
               return false;
           }
        }
    </script>
</html>