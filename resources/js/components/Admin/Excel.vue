<template>
    <div class="m-l-12 row middle-items">
        <div><input type="date" v-model="date_init"></div>
        <div class="m-l-8"><input type="date" v-model="date_end"></div>
        <div class="fi fi-xlsx" style="margin: 0  0 0 12px">
            <div class="fi-content" @click="sendExcel">xls</div>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';

    export default {
        name: "Excel",
        props: ['token'],
        data: function () {
            return {
                today: new Date(),
                date_init: '',
                date_end: ''
            }
        },
        mounted() {
            this.date_init = this.today.getFullYear() + '-' + (this.today.getMonth() + 1) + '-' + '01';
            this.date_end = this.today.getFullYear() + '-' + (this.today.getMonth() + 1) + '-' + '30'
        },
        methods: {

            sendExcel(admin, index) {
                swal({
                    title: "Estás seguro?",
                    text: "Te enviaremos un correo con el link para descargar el excel",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        axios.post(`/admin/DownloadExcel`, {
                            _token: this.token,
                            date_init: this.date_init,
                            date_end: this.date_end
                        })
                            .then((response) => {
                                console.log(response);
                                if (response.data.success) {
                                    swal("Se esta generando el archivo, se enviará el correo una vez este listo.");
                                    return
                                }
                                swal("Hubo un error! Vuelve a intentarlo", {icon: "error",});
                            });
                    }
                });
            },

        }
    }
</script>
<style lang="scss" scoped>
    input{
        padding: 4px 12px !important;
    }
</style>
