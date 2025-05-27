<template>
    <div class="card">
        <div class="card-header">Publicado el: {{pensamiento.created_at}} - Actualizado el: {{pensamiento.updated_at}}</div>

        <div class="card-body">
            <input v-if="editMode" type="text" class="form-control" v-model="pensamiento.descripcion">
            <p v-else>{{pensamiento.descripcion}}</p>
        </div>

        <div class="card-footer">
            <button v-if="editMode" class="btn btn-success" @click="actualizarPensamiento()">Guardar Cambios</button>
            <button v-else class="btn btn-secondary" @click="editarPensamiento()">Editar</button>
            <button class="btn btn-danger" @click="eliminarPensamiento()">Eliminar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props:['pensamiento'],

        data(){
            return{
                editMode:false
            }
        },

        mounted() {
            
        },

        methods: {
            editarPensamiento(){
                this.editMode=true
            },
            actualizarPensamiento(){
                this.editMode=false
                const params = {
                    'descripcion' : this.pensamiento.descripcion
                }
                axios.put('/pensamientos/'+this.pensamiento.id,params).then((response)=>{
                    const pensamiento = response.data
                    this.$emit('actualizar',pensamiento)
                })
            },
            eliminarPensamiento(){
                axios.delete('/pensamientos/'+this.pensamiento.id).then((response)=>{
                    this.$emit('eliminar')
                })
            }
        }
    }
</script>
