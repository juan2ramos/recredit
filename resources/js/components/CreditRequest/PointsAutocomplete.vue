<template>
    <div>
        <div :class="[{ error: error }, 'Request-formGroup row middle'] "
             data-errorMessage="Debes seleccionar la ciudad y el punto de venta">
            <div class="col-16 col-m-8 p-r-4 row middle-items">
                <autocomplete
                        placeholder="Busca tu ciudad"
                        :source="cities"
                        input-class="form-control"
                        @noResults="selected"
                        @selected="selected"
                        @clear="clear"
                        :initialValue="cityOld"
                        :initialDisplay="cityName"
                        name="city"
                >
                </autocomplete>
            </div>
            <div class="col-16 col-m-8 p-l-4 ">
                <select name="point" v-model="pointSelect">
                    <option value="">SELECCIONE UN PUNTO DE VENTA</option>
                    <option v-for="point in pointsLocal" :value="point.id">{{point.name}}</option>
                </select>
            </div>
        </div>

    </div>

</template>
<script>
    import Autocomplete from 'vuejs-auto-complete'

    export default {
        name: 'PointsAutocomplete',
        components: {
            Autocomplete,
        },
        props: ['cities', 'points', 'error', 'cityOld', 'point'],
        data: function () {
            return {
                pointSelect: this.point ,
                city: Number(this.cityOld)
            }
        },
        computed: {
            pointsLocal: function () {
                return this.points.filter(point => point.city_id === this.city)
            },
            cityName: function () {
                const city = this.cities.find(cities => cities.id === Number(this.cityOld));
                return city ? city.name : ''
            }
        },
        methods: {
            selected(group) {
                this.pointSelect = '';
                this.city = group.value
            },
            clear() {
                this.pointSelect = '';
                this.city = 0
            },

        }
    }
</script>
