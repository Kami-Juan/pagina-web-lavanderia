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
                    return axios.post('http://localhost/proyecto_lavanderia/app/security/storeUser.php', usuario).then( res => {
                        console.log(res.data);
                        if( res.data.respuesta === "exito" ){
                            location.href = "../../views/users/panel.php";
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
                    return axios.post('http://localhost/proyecto_lavanderia/app/security/storeUser.php', usuario).then( res => {
                        console.log(res.data);
                        if( res.data === "user" ){
                            location.href = "../../views/users/panel.php";
                        }else if(res.data === "admin"){
                            location.href = "../../views/users/paneladmin.php";                            
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