<template>
    <section class="m-b-40 m-t-20 is-full-width table-container">
        <table v-if="clients.length">
            <thead>
            <tr>
                <th width="20%">Nombre</th>
                <th width="20%">Cédula</th>
                <th width="25%">Email</th>
                <th width="20%">Estado</th>
                <th width="5%" class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(client, i) in clientsLocal ">
                <td width="20%">{{client.name}}</td>
                <td width="20%">{{client.document}}</td>
                <td width="25%">{{client.email}}</td>
                <td width="20%">
                    <span>
                        {{!client.credit? 'En proceso ' :
                            (client.credit && client.credit.typing? client.credit.typing.point_name:stateCredit(client.credit))
                        }}


                    </span>
                </td>
                <td width="5%">
                    <div class="row justify-center middle-items" v-if="isAnalysts">
                        <a v-if="!client.credit" :href="`/admin/usuario-sesion/${client.document}`">
                            <img v-if="!isDocumentary" src="../../../images/settings.svg" alt="">
                        </a>
                        <a :href="`/admin/usuarios/${client.document}`"
                           v-else-if="client.credit.state === 1 || client.credit.state === 2 ">
                            <img src="../../../images/edit.svg" alt="">
                        </a>
                        <a :href="`/admin/creditos/${client.credit.id}`" v-else>
                            <img v-if="!isDocumentary" src="../../../images/user-check.svg" alt="">
                        </a>
                        <a @click.prevent="deleteClient(client, i)" v-if="isSuper">
                            <img src="../../../images/delete.svg" alt="">
                        </a>
                        <a @click.prevent="viewCode(client.document)" v-if="!isDocumentary">
                            <img src="../../../images/token.svg" alt="">
                        </a>
                        <a v-if="client.credit && client.credit['reconsideration']"
                           @click="reconsideration(client)">
                            <img src="../../../images/repeat.svg" alt="">
                        </a>
                    </div>
                    <div class="row justify-center middle-items" v-else>

                        <a v-if="!client.credit" :href="`/admin/usuario-sesion/${client.document}`">
                            <img src="../../../images/settings.svg" alt="">
                        </a>
                        <a v-if="client.credit && client.credit['reconsideration']"
                           @click="reconsideration(client)">
                            <img src="../../../images/repeat.svg" alt="">
                        </a>
                    </div>
                    <div class="row justify-center middle-items" v-if="isPoint">
                        <a v-if="client.credit" @click="openModalMethod(client)">
                            ver info
                        </a>
                        <a v-if="!client.credit" :href="`/admin/usuario-sesion/${client.document}`">
                            <img src="../../../images/settings.svg" alt="">
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-else-if="search">
            <p>No hemos encontrado ningún registro con el término de búsqueda</p>
        </div>
        <modal-info v-if="openModal" :client="client" :credit="credit" @close-modal="closeModal"></modal-info>
    </section>

</template>

<script>
    import swal from 'sweetalert';
    import axios from 'axios';
    import ModalInfo from './ModalInfo'

    export default {
        name: "Users",
        props: ['clients', 'token', 'search', 'isAnalysts', 'isDocumentary', 'isPoint', 'ModalInfo', 'isSuper'],
        data: function () {
            return {
                clientsLocal: this.clients,
                client: {},
                openModal: false
            }
        },
        methods: {
            openModalMethod(client) {
                this.client = client;
                this.openModal = true
            },
            reconsideration(client) {
                swal({
                    title: "Estás seguro de reconsiderar el crédito ?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        axios.get(`/admin/reconsideration/${client.document}`)
                            .then((response) => {
                                if (response.data.success) {
                                    swal("El cliente ha sido eliminado", {icon: "success",});
                                    setTimeout(() => window.location = `/admin/usuario-sesion/${client.document}`, 3000);
                                    return
                                }
                                swal("Hubo un error! Vuelve a intentarlo", {icon: "error",});
                            });
                    }
                });
            },
            closeModal() {
                this.openModal = false
            },
            stateCredit(credit) {
                switch (credit.state) {
                    case 0:
                        return 'Por aprobar';
                    case 1:
                        return 'Pre - Aprobado';
                    case 2:
                        return `Denegado - ${credit.reason.name}`
                }
            },
            deleteClient(client, index) {
                swal({
                    title: "Estás seguro?",
                    text: "Recuerda que no prodrás recuper la información!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        this.clientsLocal.splice(index, 1);
                        console.log(client)
                        axios.delete(`/admin/usuarios/${client.document}`)
                            .then((response) => {
                                if (response.data.success) {
                                    this.clientsLocal.splice(index, 1);
                                    swal("El cliente ha sido eliminado", {icon: "success",});
                                    return
                                }
                                swal("Hubo un error! Vuelve a intentarlo", {icon: "error",});
                            });

                    }
                });
            },
            viewCode: function (client) {
                axios.get(`/admin/codigo-usuario/${client}`)
                    .then(({data}) => swal(`El código es : ${data.code}`, {icon: "success",}))
            }
        }
    }
</script>

<style scoped>
    a {
        cursor: pointer;
        margin-right: 8px;
    }
</style>
