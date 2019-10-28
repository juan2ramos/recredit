<template>
    <section class="m-b-40 m-t-20 is-full-width table-container">
        <table>
            <thead>
            <tr>
                <th>Nombre completo</th>
                <th class="is-text-center">Créditos</th>
                <th class="is-text-center">Emprendedoras</th>
                <th class="is-text-center">Activo</th>
                <th width="5%" class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(point, i) in pointsLocal ">
                <td>{{point.full_name}}</td>
                <td class="is-text-center">
                    <img v-if="point.is_credit"  src="../../../images/check.svg" alt="">
                </td>
                <td class="is-text-center">
                    <img v-if="point.is_entrepreneur"  src="../../../images/check.svg" alt="">
                </td>
                <td class="is-text-center"><img v-if="point.state"  src="../../../images/check.svg" alt=""></td>
                <td width="5%" class="row justify-center">
                    <div class="row justify-center middle-items">
                        <a :href="`/admin/tiendas/${point.id}/editar`"><img src="../../../images/edit.svg" alt=""></a>
                    </div>
                    <div class="row justify-center middle-items m-l-8" >
                        <a @click.prevent="deleteAdmin(point, i)">
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
    import axios from 'axios'
    export default {
        name: "Points",
        props: ['points'],
        data: function () {
            return {
                pointsLocal: this.points
            }
        },
        methods: {
            deleteAdmin(point, index) {
                swal({
                    title: "Estás seguro?",
                    text: "Recuerda que no prodrás recuper la información!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {

                        axios.delete(`/admin/tiendas/${point.id}`)
                            .then((response) => {
                                console.log(response);
                                if (response.data.success) {
                                    this.pointsLocal.splice(index, 1);
                                    swal("El cliente ha sido eliminado", {icon: "success",});
                                    return
                                }
                                swal("Hubo un error! el punto no puede ser eliminado, debes eliminar los clientes asocidos", {icon: "error",});
                            });
                    }
                });
            },
        }
    }
</script>

