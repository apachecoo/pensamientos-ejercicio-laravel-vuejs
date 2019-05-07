<template>

     <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publicado en : </div>

                <div class="card-body">
                    <input v-if="modoEdicion" type="text" class="form-control" v-model="pensamientox.descripcion">
                    <p v-else>{{ pensamientox.descripcion}}</p>
                </div>
                <div class="card-footer">
                    <button v-if="modoEdicion" class="btn btn-primary" v-on:click="onClickActualizar()">
                        Guardar Cambios
                    </button>
                    <button  v-else class="btn btn-primary" v-on:click="onClickEditar()">
                        Editar
                    </button>
                    <button class="btn btn-danger" v-on:click="onClickDelete()">
                        Eliminar
                    </button>
                </div>   

            </div>
        </div>

</template>component

<script>
    export default {
        props:['pensamientox'],
        data(){
            return {
                modoEdicion: false
            };
            
        },
        mounted() {
            console.log('=============pensamiento================');
            console.log(this.pensamientox);
        },
        methods:{
            onClickDelete(){
                //alert('eliminando');
                

                axios.delete(`/pensamientos/${this.pensamientox.id}`).then(()=>{
                this.modoEdicion=false;
                //se emite el evento actualizar y pasamos como informacion la descripcion que acabamos de actualizar           
                this.$emit('delete');
                });
            },
            onClickEditar(){
                this.modoEdicion=true;
            },
            onClickActualizar(){
                const parametros = {
                    descripcion: this.pensamientox.descripcion
                };

                axios.put(`/pensamientos/${this.pensamientox.id}`,parametros).then((response)=>{
                this.modoEdicion=false;
                //se emite el evento actualizar y pasamos como informacion la descripcion que acabamos de actualizar           
                const pensamientox = response.data();
                this.$emit('actualizar',this.pensamientox); 
                });
                
            }
        }
    }
</script>
