<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Ingrese Número de DNI</div>

                    <div class="card-body">
                            <input v-model="dni" type="text" name="dni" id="dni" class="form-control">
                            <button @click="obtener_datos()" class="btn btn-success form-control mt-1">Consultar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Resultados de la búsqueda</div>

                    <div class="card-body">
                        <div>DNI: <span v-text="rdni"></span></div>
                        <div>APELIDO PATERNO: <span v-text="rapaterno"></span></div>
                        <div>APELIDO MATERNO: <span v-text="ramaterno"></span></div>
                        <div>NOMBRES COMPLETOS: <span v-text="rnombres"></span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                dni:'',
                rdni:'',
                rapaterno:'',
                ramaterno:'',
                rnombres:''
            }
        },
        methods:{
            obtener_datos(){
                let me=this;
                var url=process.env.MIX_APP_URL+"/reniec";

                //console.log(url);


                axios.post(url,{dni:me.dni})
                    .then(function(response){
                        //console.log(response.data);
                        me.rdni=response.data.dni;
                        me.rapaterno=response.data.apat;
                        me.ramaterno=response.data.amat;
                        me.rnombres=response.data.nombres;
                    })
                    .catch(function(error){
                        console.log(error);
                    });

            }
        }
    }
</script>
