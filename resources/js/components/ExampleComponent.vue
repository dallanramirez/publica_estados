<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <formulario-component @nuevo="nuevoPensamiento"></formulario-component>
                <br>
                <pensamiento-component
                    v-for="(pensamiento,index) in pensamientos"
                    :key="pensamiento.id"
                    :pensamiento="pensamiento"
                    @actualizar="actualizarPensamiento(index, ...arguments)"
                    @eliminar="eliminarPensamiento(index)"></pensamiento-component>
                <br>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                pensamientos : []
            }
        },

        mounted() {
          axios.get('/pensamientos').then((response)=>{
              this.pensamientos = response.data
          })
        },

        methods: {
            nuevoPensamiento(pensamiento){
                this.pensamientos.push(pensamiento)
            },
            actualizarPensamiento(index,pensamiento){
                this.pensamientos[index]=pensamiento
            },
            eliminarPensamiento(index){
                this.pensamientos.splice(index,1)
            }
        }
    }
</script>
