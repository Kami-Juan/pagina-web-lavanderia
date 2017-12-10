new Vue({
   el: "#app",
   methods: {
       getAlgo(){

            let obj = this.convertFormData({hola: "hola"});

           axios.post('http://localhost/pagina-web-lavanderia/app/testcors.php', obj).then(res => {
                console.log(res);
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