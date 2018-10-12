<template>
    <div>
        <button v-if="suscrito=='0'" @click="suscribirse()" type="button" class="btn btn-info btn-sm">suscribirse</button>
        <button v-else type="button" @click="quitarSuscripcion()" class="btn btn-info btn-sm">quitar suscripcion</button>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
       props: ['suscrito','categoria'],
       methods:{
           suscribirse(){
               axios.post('/category-suscription/'+this.categoria)
                .then((respuesta)=>{
                                this.suscrito='1';
                });
           },
           quitarSuscripcion(){
                axios.post('/category-unsuscription/'+this.categoria)
                .then((respuesta)=>{
                                this.suscrito='0';
                });
           }
       }
    }
</script>
