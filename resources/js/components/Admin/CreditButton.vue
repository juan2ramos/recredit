<template>
   <div class="row is-full-width">
       <div class="is-full-width">
           <select style="margin: 0 !important; " v-model="typing">
               <option value="">NINGUNA</option>

               <option v-for="typing in typings"  v-bind:value="typing.id">
                   {{typing.analyst_name}}
               </option>

           </select>
       </div>
       <div class="row col-16 justify-center middle-items">
           <a @click="success" class="Link-primary">Aprobar crédito</a>
           <a @click="fail" class="Link-secondary">Reprobar crédito</a>
       </div>
   </div>

</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';

    export default {
        props: ['reasons', 'route', 'token', 'credit', 'typings'],
        name: "CreditButton",
        data: function () {
            return {
                typing: ''
            }
        },
        methods: {
            fail: function () {
                const buttons = {};
                this.reasons.map((reason) => {
                    buttons[reason.id] = {text: reason.name, value: reason.id};
                });

                swal("¿Para denegar el crédito de click en la causal?", {buttons, className:'swal-reasons'})
                    .then((value) => {
                        this.send('Credito denegado', 0, value);
                    });
            },
            success: function () {
                swal({title: "Estas seguro de aprobar el crédito?", icon: "warning", buttons: true, dangerMode: true,})
                    .then((willDelete) => {
                        if (willDelete) {
                            this.send('Credito aprobado', 1)
                        }
                    });
            },
            send: function (message, approved, reason = 0) {

                axios.put(this.route, {_token: this.token, reason, approved, typing: this.typing})
                    .then(({data}) => {
                        console.log(data)
                        swal(message, {icon: "success"});
                        setTimeout(() => window.location = "/admin/creditos", 3000)
                    });
            }
        }
    }
</script>
<style>
    .swal-reasons .swal-button-container {
        min-width: 100% !important;
    }
</style>
