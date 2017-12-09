<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "layouts/libraries.php";
    ?>
    <title>Lavatronic | Ubicación</title>
</head>
<body>
    <?php
        include "layouts/header.php";
    ?>
        <div class="container">
            <div class="seccion-map">
                <h2>UBICACION</h2> 
                <div id="mapa"></div>   
                <div class="descripcion-map"></div>
            </div>   
        </div>
    <?php
        include "layouts/footer.php";
    ?>
    <script>

      function initMap() {
        var uluru = {lat: 20.9680349, lng: -89.6090337};
        var map = new google.maps.Map(document.getElementById('mapa'), {
          zoom: 16,
          center: uluru,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          title: "LAVANDERIA LAVATRONIC!"
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMtgo5GU4JUqKFVOim0lEnz46O4GbiXKI&callback=initMap"
    type="text/javascript"></script>
</body>
</html>