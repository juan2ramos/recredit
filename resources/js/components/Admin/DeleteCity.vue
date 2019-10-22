<template>

    <a href="">
        <img src="../../../images/delete.svg" alt="">
    </a>

</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';

    export default {
        props: ['city', 'token', 'route'],
        name: "DeleteCity",
        methods: {
            delete: function () {
                swal({title: "Estas seguro de eleminar la ciudad?", icon: "warning", buttons: true, dangerMode: true,})
                    .then((willDelete) => {
                        if (willDelete) {
                            this.send()
                        }
                    });
                },
                send: function () {
                    axios.delete(this.route, {_token: this.token})
                        .then(({data}) => {
                        console.log(data)
                        swal(message, {icon: "success"});
                        setTimeout(() => window.location = "/admin/creditos", 3000)
                    });
            }
        }
    }
</script>q
<style>
    .swal-reasons .swal-button-container {
        min-width: 100% !important;
    }
</style>
