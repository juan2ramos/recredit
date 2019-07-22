<template>
    <div >
        <p v-if="user">Estás editando el usuario {{user.name}} puedes
            <a class="link-show" @click="deleteUser('deleteUserProcess')">Eliminar el usuario</a> o
            <a class="link-show" @click="deleteUser('deleteSession')">Continuar editando después</a>
        </p>
    </div>
</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';

    export default {
        name: "LinksHeader",
        props: ['user'],
        methods: {
            deleteUser: function (action) {
                swal({title: "Estas seguro?", icon: "warning", buttons: true, dangerMode: true,})
                    .then((willDelete) => {
                        if (willDelete) {
                            axios.get(`/delete-user/${action}`).then(() =>window.location = "/");
                        }
                    });
            }
        }
    }
</script>
<style scoped>
    a{
        cursor: pointer;
    }
</style>

