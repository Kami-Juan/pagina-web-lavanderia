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
        <h2>ELIGE TU PLAN</h2>
        <div class="planes">
            <div class="col-md-4">
                <div class="plan">
                    <h3>LIMPIEZA BÁSICA</h3>    
                    <div class="precio">
                        <div class="moneda">MX$</div>
                        <div class="costo">149</div>
                        <div class="mes">/mes</div>
                    </div>
                    <hr>
                    <div class="caracteristicas-plan">
                        <p>Este plan te permite ser socio, equipos de última generación a tu disposición, una alta gamma de especialista en el cuidado de tu ropa, sin esperar a ser atendido.</p>
                    </div>
                    <div class="comprar">
                        <button>Empezar</button>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="plan">
                    <h3>LIMPIEZA PREMIUM</h3>    
                    <div class="precio">
                        <div class="moneda">MX$</div>
                        <div class="costo">249</div>
                        <div class="mes">/mes</div>
                    </div>
                    <hr>
                    <div class="caracteristicas-plan">
                        <p>Además de los beneficios del plan básico, el servicio a domicilio es gratuito, se obtiene un descuento del 75% en el café y los restaurantes.</p>
                    </div>
                    <div class="comprar">
                        <button>Empezar</button>
                    </div>
                </div>                    
            </div>
            <div class="col-md-4">
                <div class="plan">
                    <h3>LIMPIEZA DELUXE</h3>    
                    <div class="precio">
                        <div class="moneda">MX$</div>
                        <div class="costo">499</div>
                        <div class="mes">/mes</div>
                    </div>
                    <hr>
                    <div class="caracteristicas-plan">
                        <p>Todos nuestros servicios serán gratuitos sin ningún recargo, tendrá acceso a la sección VIP que ofrece: piscina, comedor, spa, campo de golf entre otros.</p>
                    </div>
                    <div class="comprar">
                        <button>Empezar</button>
                    </div>
                </div>                     
            </div>    
        </div>  
    </div>    
    <?php
        include "layouts/footer.php";
    ?>
</body>
</html>