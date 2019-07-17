<template>
    <section class="m-b-40 m-t-20 is-full-width table-container">
        <table>
            <thead>
            <tr>
                <th width="80%">Nombre</th>
                <th width="10%" class="is-text-center">Créditos</th>
                <th width="15%">Emprendedoras</th>
                <th width="5%" class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(point, i) in pointsLocal ">
                <td width="80%">{{point.name}}</td>
                <td width="10%">
                    <p class="is-text-center">
                        <input type="checkbox"
                               v-model="point.credit"
                               :id="`credit${point.id}`"
                               value="1">
                        <label style="font-size: 16px" :for="`credit${point.id}`"></label>
                    </p>
                </td>
                <td width="15%">
                    <p class="is-text-center">
                        <input type="checkbox"
                               v-model="point.entrepreneur"
                               :id="`entrepreneur${point.id}`"
                               value="1">
                        <label style="font-size: 16px" :for="`entrepreneur${point.id}`"></label>
                    </p>
                </td>
                <td width="5%">
                    <div class="row justify-center middle-items">
                        <a><img src="../../../images/edit.svg" alt=""></a>
                        <a><img class="m-l-8" src="../../../images/delete.svg" alt=""></a>

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

