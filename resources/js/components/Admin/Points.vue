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
                <td width="5%">
                    <div class="row justify-center middle-items">
                        <a :href="`/admin/tiendas/${point.id}/editar`"><img src="../../../images/edit.svg" alt=""></a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </section>
</template>

<script>
    export default {
        name: "Points",
        props: ['points'],
        data: function () {
            return {
                pointsLocal: this.points
            }
        },
        methods: {}
    }
</script>

