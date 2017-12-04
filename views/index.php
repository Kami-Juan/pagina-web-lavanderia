<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "layouts/libraries.php";
    ?>
    <title>Lavatronic | Nunca había sido tan divertido lavar!</title>
</head>
<body>
    <header>
        <?php
            include "layouts/header.php";
        ?>
        <div class="inicio-titulo">
            <h1 class="animated fadeIn">LAVATRONIC<br>Nosotros nos preocupamos por tu ropa sucia</h1>
            <a class="btn-header animated fadeIn" href="#">Más detalles</a>
        </div>
    </header>
    <div class="container">
        <div class="como-funciona">
            <h2>CARACTERÍSTICAS</h2>
            <div class="col-md-4">
                <i class="ion-tshirt-outline big-icon"></i>                
                <h3>LAVAMOS DE TODO!</h3>
                <p class="parrafo">No discriminamos ninguna prenda, ya sea un traje de negocios muy costoso hasta un babero para un bebé.</p>
            </div>
            <div class="col-md-4">
                <i class="ion-card big-icon"></i>                
                <h3>ELIGES TU FORMA DE PAGO</h3>
                <p class="parrafo">Tu decides pagarnos con efectivo o con alguna tarjeta de crédito o débito. Nuestro sistema soporta cualquier forma de pago.</p>
            </div>
            <div class="col-md-4">
                <i class="ion-ios-fastforward big-icon"></i>                
                <h3>SOMOS LOS MÁS EFICIENTES!</h3>
                <p class="parrafo">Nuestra sucursal cuenta con varias lavadoras y secadoras, así como un sistema de lavado por encargo. Nosostros le avisamos lo más pronto posible cuando su ropa esté lista.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>COMENTARIOS</h2>
        <marquee behavior="scroll" direction="left">
            <div class="comentario">
                <img src="https://randomuser.me/api/portraits/med/women/59.jpg" alt="">
                <article>
                <p><span>"</span>El mejor servicios<span>"</span></p>
                </article>
            </div>
            <div class="comentario">
                <img src="https://randomuser.me/api/portraits/med/women/59.jpg" alt="">
                <article>
                    El mejor servicios
                </article>
            </div>
            <div class="comentario">
                <img src="https://randomuser.me/api/portraits/med/women/59.jpg" alt="">
                <article>
                    El mejor servicios
                </article>
            </div>
            <div class="comentario">
                <img src="https://randomuser.me/api/portraits/med/women/59.jpg" alt="">
                <article>
                    El mejor servicios
                </article>
            </div>
        </marquee>    
    </div>    
    <?php
        include "layouts/footer.php";
    ?>
</body>
</html>