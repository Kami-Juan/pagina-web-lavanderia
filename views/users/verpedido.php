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
    <div class="container sizesession">
        <div class="compras" class="animated fadeIn">
            <h2>DATOS</h2>
            <?php
                require '../../vendor/autoload.php';
                include "../../app/conexion.php";

                use Carbon\Carbon;

                setlocale(LC_TIME, 'es');

                $variable = $_GET["mostrarpedido"];
                $username = base64_decode($variable);

                $idCompra = $_GET["id"];

                $query = "SELECT * FROM compras WHERE id = '$idCompra' AND username = '$username'";
                $res = $conexion->query($query);
                $compra = $res->fetch_array(MYSQLI_BOTH);

                $fechainicio = new Carbon($compra['inicio_compra']);
                $tiempo_aprox = new Carbon($compra['tiempo_aprox']);
            ?>

            <div class="mostrar">
                <label for="">Peso ropa: <?php echo $compra["peso_ropa"] ?> </label><br>
                <label for="">Tipo ropa: <?php echo $compra["tipo_ropa"] ?></label><br>
                <label for="">Sexo: <?php echo $compra["sexo"] ?></label><br>
                <label for="">Urgencia: <?php echo $compra["urgencia"] ?></label><br>
                <label for="">Inicio de la compra: <?php echo $fechainicio->formatLocalized('%d %B %Y %r') ?></label><br>
                <label for="">Fecha estimada de la compra: <?php echo $tiempo_aprox->formatLocalized('%d %B %Y %r') ?></label><br>
                <label for="">Costo: <?php echo $compra["costo"] ?></label><br>
            </div>
        </div>
    </div>
    <?php
        include "../layouts/footer.php";
    ?>
</body>
</html>