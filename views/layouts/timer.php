<script src="../public/librerias/vue.min.js"></script>
<script src="../public/librerias/moment.min.js"></script>
    <script>
        new Vue({
            el:"#time",
            data: {
                hora: ""
            },
            created: function() {
                moment.updateLocale('en', {
                    months : [
                        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    ],
                    weekdays : [
                        "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"
                    ]
                });


                setInterval( () => {
                    this.hora = moment().format('dddd DD MMMM YYYY HH:mm:ss'); 
                    //console.log(this.hora);
                }, 1000);
            }
        });
    </script>