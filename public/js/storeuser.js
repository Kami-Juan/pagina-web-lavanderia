new Vue({
    el: "#app",
    data: {
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
                    return axios.post('http://localhost/pagina-web-lavanderia/app/security/storeUser.php', usuario).then( res => {
                        if( res.data.respuesta === "exito" ){
                            location.href = "../../views/users/panel.php?encrypt="+res.data.id;
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
                    return axios.post('http://localhost/pagina-web-lavanderia/app/security/storeUser.php', usuario).then(res => {
                        console.log(res.data);

                        if( res.data.tipo === "user" ){
                            location.href = "../../views/users/panel.php?encrypt="+res.data.id;
                        }else if(res.data.tipo === "admin"){
                            location.href = "../../views/users/paneladmin.php?encrypt="+res.data.id;
                        }
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