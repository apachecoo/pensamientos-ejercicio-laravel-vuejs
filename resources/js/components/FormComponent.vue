<template>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">¿Que estas pensando ahora? </div>

                <div class="card-body">

                    <form action="" v-on:submit.prevent="nuevoPensamiento()">
                        <div class="form-group">
                            <label for="thought">Ahora estoy pensando en:</label>
                            <input type="text" name="thought" class="form-control"
                            v-model="descripcion" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Enviar Pensamiento
                        </button>
                    </form>

                </div>
            </div>
        </div>


</template>

<script>
    export default {
        data(){
            return {
                descripcion: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            nuevoPensamiento(){

                const parametros = {
                    descripcion: this.descripcion
                }

                this.descripcion = '';

                axios.post('/pensamientos',parametros).then((response)=>{
                    const pensamiento = response.data;
                    this.$emit('nuevoEvento',pensamiento);
                });

            }
        }
    }
</script>
