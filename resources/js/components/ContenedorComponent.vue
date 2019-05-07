<template>
    
		<div class="row justify-content-center">
            <form-component @nuevoEvento="adicionarPensamiento"></form-component>
           
            <thought-component 
            v-for="(pensamiento,index) in pensamientos"
            :key="pensamiento.id" 
            :pensamientox="pensamiento"
             @actualizar="actualizarPensamiento(index,...arguments)"
             @delete="deleteThought(index)">
            </thought-component>
        </div>

</template>

<script>
    export default {
    	data(){
    		return{
    			 pensamientos: [],

    		}
   		
    	},
        mounted() {
            axios.get('/pensamientos').then((response)=>{
                this.pensamientos = response.data;
            });
            
        },
        methods: {
        	adicionarPensamiento(pensamiento){
               
                this.pensamientos.push(pensamiento);
                console.log('=====array pensamientos al adicionar pensamientos===')
                console.log(this.pensamientos)
        		
        	},
            deleteThought(index){
                //alert('aca entra despues de transmitir el evento Indice= '+index);
                this.pensamientos.splice(index,1);
            },
            actualizarPensamiento(index,pensamientox){
                this.pensamientos[index] = pensamientox;  
            }
        }
    }
</script>
