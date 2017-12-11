<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "layouts/libraries.php";
    ?>
    <title>Lavatronic | Enviar opinión</title>
</head>
<body>
    <?php
        include "layouts/header.php";
    ?>
    <div class="container comment">
        <h2 class="com animated fadeIn">ENVIAR COMENTARIO</h2>
        <div class="comentario animated fadeInDown ">
            <form action="../app/emailinvitado.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre completo"><br>
                <input type="text" name="tel" placeholder="Teléfono"><br>            
                <input type="text" name="email" placeholder="Email"><br>
                <label for="">Asunto:</label>
                <textarea name="asunto" cols="30" rows="10"></textarea>
                <input type="submit" value="Enviar comentario">
            </form>
        </div>
    </div>
    <?php
        include "layouts/footer.php";
    ?>
</body>
</html>