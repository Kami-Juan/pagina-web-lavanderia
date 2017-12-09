new Vue({
    el: "#app",
    data: {
        isAgregar: false,
        cobro:{
            pesototal: "",
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
        submitCobro(){
            console.log(this.cobro);
        }
    }
});