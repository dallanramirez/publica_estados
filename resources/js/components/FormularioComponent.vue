<template>
    <div class="card">
        <div class="card-header">Que estas pensando ahora?</div>

        <div class="card-body">
            <form action="" @submit.prevent="guardarPensamiento()">
                <input type="text" class="form-control" v-model="descripcion">
                <br>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
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
           
        },

        methods:{
            guardarPensamiento(){
                const params = {
                    'descripcion' : this.descripcion
                }
                axios.post('/pensamientos',params).then((response)=>{
                    const pensamiento = response.data
                    this.$emit('nuevo',pensamiento)
                    this.descripcion=''
                })
            }
        }
    }
</script>
