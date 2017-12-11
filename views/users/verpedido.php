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

            <div class="form_compra show">
                <label for="">Peso ropa: <span><?php echo $compra["peso_ropa"] ?></span> </label><br>
                <label for="">Tipo ropa: <span><?php echo $compra["tipo_ropa"] ?></span></label><br>
                <label for="">Sexo: <span><?php echo $compra["sexo"] ?></span></label><br>
                <label for="">Urgencia: <span><?php echo $compra["urgencia"] ?></span></label><br>
                <label for="">Inicio de la compra: <span><?php echo $fechainicio->formatLocalized('%d %B %Y %r') ?></span></label><br>
                <label for="">Fecha estimada de la compra: <span><?php echo $tiempo_aprox->formatLocalized('%d %B %Y %r') ?></span></label><br>
                <label for="">Costo: <span><?php echo $compra["costo"] ?></span></label><br>
            </div>
        </div>
    </div>
    <?php
        include "../layouts/footer.php";
    ?>
</body>
</html>