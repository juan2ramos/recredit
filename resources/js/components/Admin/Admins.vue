<template>
    <section class="m-b-40 m-t-20 is-full-width table-container">
        <table v-if="admins.length">
            <thead>
            <tr>
                <th width="20%">Nombre</th>
                <th width="20%">Cédula</th>
                <th width="25%">Email</th>
                <th width="20%">Rol</th>
                <th width="5%" class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(admin, i) in adminsLocal " :key="admin.id">
                <td width="20%">{{admin.name}}</td>
                <td width="20%">{{admin.document}}</td>
                <td width="25%">{{admin.email}}</td>
                <td width="20%">{{admin.roles[0].name}}</td>
                <td width="5%">
                    <div class="row justify-center middle-items" >
                        <a @click.prevent="deleteAdmin(admin, i)">
                            <img src="../../../images/delete.svg" alt="">
                        </a>
                    </div>

                </td>
            </tr>
            </tbody>
        </table>

    </section>
</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';

    export default {
        name: "Admins",
        props: ['admins', 'token' ],
        data: function () {
            return {
                adminsLocal: this.admins
            }
        },
        methods: {

            deleteAdmin(admin, index) {
                swal({
                    title: "Estás seguro?",
                    text: "Recuerda que no prodrás recuper la información!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {

                        axios.delete(`/admin/usuarios/${admin.document}`)
                            .then((response) => {
                                console.log(response);
                                if (response.data.success) {
                                    this.adminsLocal.splice(index, 1);
                                    swal("El cliente ha sido eliminado", {icon: "success",});
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

<style scoped>
    a {
        cursor: pointer;
        margin-right: 8px;
    }
</style>
