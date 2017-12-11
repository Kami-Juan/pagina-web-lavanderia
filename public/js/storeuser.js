new Vue({
    el: "#app",
    data: {
        host: window.location.protocol + "//" + window.location.hostname,
        hora: "",
        usuario: {
            username: "",
            password: "",
            correo: "",
            tipo: "signup"
        },
        login: {
            username: "",
            password: "",
            tipo: "login"
        }
    },
    methods: {
        postUser(e){
            this.$validator.validateAll().then((result) => {
                if( result ){
                    const usuario = this.convertFormData( this.usuario );
                    return axios.post(this.host +'/pagina-web-lavanderia/app/security/storeUser.php', usuario).then( res => {
                        if( res.data.respuesta === "exito" ){
                            location.href = "../../views/users/panel.php?encrypt="+res.data.id;
                        }else{
                            alert(res.data.respuesta);
                        }
                    });
                }
                alert("Corrija los errores");
            });
        },
        loginUser(){
            this.$validator.validateAll().then((result) => {
                if( result ){
                    const usuario = this.convertFormData( this.login );
                    return axios.post(this.host +'/pagina-web-lavanderia/app/security/storeUser.php', usuario).then(res => {
                        console.log(res.data);

                        if( res.data.tipo === "user" ){
                            location.href = "../../views/users/panel.php?encrypt="+res.data.id;
                            return false;
                        }else if(res.data.tipo === "admin"){
                            location.href = "../../views/users/paneladmin.php?encrypt="+res.data.id;
                            return false;                            
                        }

                        alert(res.data);
                    });
                }

                alert("Por favor corrija los errores señalados");
            });
        },
        convertFormData( obj ){
            var formData = new FormData();
            for( var item in obj ){
                formData.append( item, obj[item] );
            }
            return formData;
        }
    }
});