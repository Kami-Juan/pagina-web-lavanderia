new Vue({
    el: "#app",
    data: {
        host: window.location.protocol+"//"+window.location.hostname,
        isAgregar: false,
        isPeticion: false,
        mensajeEmail: "",
        cobro:{
            idUsuario:"",
            pesototal: 0,
            tiporopa:[],
            sexo: "",
            urgencia: 0,
            iniciocompra: "",
            tiempoaprox: "",
            costo:0
        }
    },
    methods: {
        newCotizacion(){
            if( this.isAgregar ){
                this.isAgregar = false;            
            }else{
                this.isAgregar = true;                            
            }
        },
        enviarEmail(){

            const email = document.getElementsByName("email")[0];

            if( this.mensajeEmail.split("").length > 100 ){
                alert("El mensaje no puede sobrepasar los 100 dígitos");
                email.focus();
                return false;
            }

            var formData = new FormData();
            formData.append("email", this.mensajeEmail);

            axios.post(this.host +"/pagina-web-lavanderia/app/sendemail.php", formData).then( res => {
                console.log(res);
                alert("Mensaje enviado!");
            });
        },
        submitCobro(){

            /* let type_ropas = this.cobro.tiporopa.join(", "); 
            console.log(type_ropas);
            this.cobro.tiporopa = type_ropas; */
            const pesototal = document.getElementsByName("pesototal")[0];
            const sexo = document.getElementsByName("sexo")[0];
            const urgencia = document.getElementsByName("urgencia")[0];
            const iniciocompra = document.getElementsByName("iniciocompra")[0];
            const username = document.querySelector("#idUsuario").value;

            if (this.cobro.iniciocompra == "") {
                alert("Por favor selecciona una fecha");
                iniciocompra.focus();
                return false;
            } else if (moment(this.cobro.iniciocompra).isSameOrBefore(moment())) {
                alert("Por favor selecciona una fecha mayor a la actual");
                iniciocompra.focus();
                return false;
            }else if( this.cobro.pesototal == 0 ){
                alert("Por favor selecciona un peso");
                pesototal.focus();
                return false;
            } else if (this.cobro.tiporopa.length == 0) {
                alert("Por favor selecciona al menor un tipo de ropa");
                return false;
            } else if (this.cobro.sexo == "") {
                alert("Por favor selecciona un sexo");
                sexo.focus();
                return false;                
            } else if (this.cobro.urgencia == 0) {
                alert("Por favor selecciona una urgencia");
                urgencia.focus();
                return false;
            }

            let type_ropas = this.cobro.tiporopa.join(", "); 
            this.cobro.tiporopa = type_ropas;
            this.cobro.idUsuario = username;

            const cobro = this.convertFormData( this.cobro );
            axios.post(this.host+'/pagina-web-lavanderia/app/storecobro.php', cobro).then(res => {
                console.log(res);

                this.cobro.tiporopa = [];
            });


        },
        convertFormData(obj) {
            var formData = new FormData();
            for (var item in obj) {
                formData.append(item, obj[item]);
            }
            return formData;
        },
        newPeticion(){
            if( this.isPeticion ){
                this.isPeticion = false;
            }else{
                this.isPeticion = true;                
            }
        },
        updateCosto(e){
            const pesototal = document.getElementsByName("pesototal")[0];
            const sexo = document.getElementsByName("sexo")[0];
            const urgencia = document.getElementsByName("urgencia")[0];
            const iniciocompra = document.getElementsByName("iniciocompra")[0];

            if (this.cobro.iniciocompra == "") {
                alert("Por favor selecciona una fecha");
                iniciocompra.focus();
                return false;
            } else if (moment(this.cobro.iniciocompra).isSameOrBefore(moment())) {
                alert("Por favor selecciona una fecha mayor a la actual");
                iniciocompra.focus();
                return false;
            }else if( this.cobro.pesototal == 0 ){
                alert("Por favor selecciona un peso");
                pesototal.focus();
                return false;
            } else if (this.cobro.tiporopa.length == 0) {
                alert("Por favor selecciona al menor un tipo de ropa");
                return false;
            } else if (this.cobro.sexo == "") {
                alert("Por favor selecciona un sexo");
                sexo.focus();
                return false;                
            } else if (this.cobro.urgencia == 0) {
                alert("Por favor selecciona una urgencia");
                urgencia.focus();
                return false;
            }

            document.getElementById("form_update").submit();
        }
    },
    computed: {
        cotizarcosto(){
            let costototal = 0;

            if( this.cobro.pesototal == 0 ){
                costototal += 0;
            }else if(this.cobro.pesototal == 5 ){
                costototal += 30;
            } else if (this.cobro.pesototal == 10) {
                costototal += 60;
            } else if (this.cobro.pesototal == 15) {
                costototal += 90;
            } else if (this.cobro.pesototal == 20) {
                costototal += 120;
            } else if (this.cobro.pesototal == 25) {
                costototal += 150;
            } else if (this.cobro.pesototal == 30) {
                costototal += 200;
            }

            for( let x = 0; x < this.cobro.tiporopa.length; x++ ){
                if (this.cobro.tiporopa[x] == "trajes"){
                    costototal += 100;
                } else if (this.cobro.tiporopa[x] == "bebe" ){
                    costototal += 50;
                } else if (this.cobro.tiporopa[x] == "casual") {
                    costototal += 0;
                } else if (this.cobro.tiporopa[x] == "deportivo") {
                    costototal += 0;                    
                }
            }

            if (this.cobro.urgencia == "0") {
                costototal += 0;
            }else if( this.cobro.urgencia == "baja"){
                costototal += 0;
            }else if( this.cobro.urgencia == "media" ){
                costototal += 0;
            } else if (this.cobro.urgencia == "alta") {
                costototal += 50;
            } else if (this.cobro.urgencia == "extrema") {
                costototal += 100;
            }
            
            this.cobro.costo = costototal;
            return costototal;
        },
        tiempoEstimado(){

            let tiempodeseado = moment(this.cobro.iniciocompra);

            if (this.cobro.pesototal == 5) {
                tiempodeseado.add(30,'minutes');
            } else if (this.cobro.pesototal == 10) {
                tiempodeseado.add(60, 'minutes');                
            } else if (this.cobro.pesototal == 15) {
                tiempodeseado.add(90, 'minutes');
            } else if (this.cobro.pesototal == 20) {
                tiempodeseado.add(120, 'minutes');
            } else if (this.cobro.pesototal == 25) {
                tiempodeseado.add(150, 'minutes');                
            } else if (this.cobro.pesototal == 30) {
                tiempodeseado.add(180, 'minutes');                
            }

            for (let x = 0; x < this.cobro.tiporopa.length; x++) {
                if (this.cobro.tiporopa[x] == "trajes") {
                    tiempodeseado.add(24,'hours');
                } else if (this.cobro.tiporopa[x] == "bebe") {
                    tiempodeseado.add(12,'hours');
                }
            }
            
            this.cobro.tiempoaprox = tiempodeseado.format("YYYY-MM-DDTHH:mm");
            return tiempodeseado.format("YYYY-MM-DDTHH:mm");
        }
    },
    created: function(){
        if( document.getElementById("editar") ){

            const peso_ropa = document.getElementById("peso_ropa").value;
            const tipo_ropa = document.getElementById("tipo_ropa").value;
            const sexo = document.getElementById("sexo").value;
            const urgencia = document.getElementById("urgencia").value;
            const inicio_compra = document.getElementById("inicio_compra").value;

            let ropas = tipo_ropa.split(", ");

            this.cobro.pesototal = parseInt(peso_ropa);
            for( let x = 0; x < ropas.length; x++ ){
                this.cobro.tiporopa.push(ropas[x]);
            }

            this.cobro.sexo = sexo;
            this.cobro.urgencia = urgencia;
            this.cobro.iniciocompra = moment(inicio_compra).format("YYYY-MM-DDTHH:mm");

        }
    }
});