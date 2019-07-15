<template>
    <form action="" class=" Request-form col-16">
        <div class="row">
            <h4 class="col-16 h-4">Datos personales</h4>
            <div class="col-16 col-m-8 Form-column">
                <div class="Form-labelContent">
                    <label for="name">Nombre</label>
                    <input
                            type="text"
                            :value="user.name"
                            name="name"
                            id="name">
                </div>
                <div class="Form-labelContent">
                    <label for="document_type">Tipo de documento</label>
                    <select name="document_type" id="document_type" class="Request-formSelect" v-model="selectedUser">
                        <option value="null" selected>Select a name</option>
                        <option v-for="option in typeDocument" :value="option">{{ option }}</option>
                    </select>
                </div>
                <div class="Form-labelContent">
                    <label for="email">Correo Electrónico</label>
                    <input
                            type="email"
                            :value="user.email"
                            name="email"
                            id="email">
                </div>
            </div>
            <div class="col-16 col-m-8 Form-column">
                <div class="Form-labelContent">
                    <label for="last_name">Apellido</label>
                    <input
                            type="text"
                            :value="user.last_name"
                            name="last_name"
                            id="last_name">
                </div>
                <div class="Form-labelContent">
                    <label for="document">Documento</label>
                    <input
                            type="text"
                            :value="user.document"
                            name="document"
                            id="document">
                </div>
                <div class="Form-labelContent">
                    <label for="password">Contraseña</label>
                    <input
                            type="password"
                            name="password"
                            id="password">
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="col-16 h-4">Datos de contacto</h4>
            <div class="col-16 col-m-8 Form-column">
                <div class="Form-labelContent">
                    <label for="residency_city">Ciudad de residencia</label>
                    <input
                            type="text"
                            :value="user.user_client.residency_city"
                            name="residency_city"
                            id="residency_city">
                </div>
                <div class="Form-labelContent">
                    <label for="address">Dirección</label>
                    <input
                            type="text"
                            :value="user.user_client.address"
                            name="address"
                            id="address">
                </div>
                <div class="Form-labelContent">
                    <label for="address_type">Tipo de Dirección</label>
                    <select name="address_type" id="address_type" class="Request-formSelect"
                            v-model="selectedAddressType">
                        <option v-for="type in addressType" :value="type">{{type}}</option>
                    </select>
                </div>
                <div class="Form-labelContent">
                    <label for="office_address">Dirección oficina</label>
                    <input
                            type="text"
                            :value="user.user_client.office_address"
                            name="office_address"
                            id="office_address">
                </div>
            </div>
            <div class="col-16 col-m-8 Form-column">

                <div class="Form-labelContent">
                    <label for="mobile">Celular</label>
                    <input
                            type="text"
                            :value="user.user_client.mobile"
                            name="mobile"
                            id="mobile">
                </div>
                <div class="Form-labelContent">
                    <label for="phone">Teléfono</label>
                    <input
                            type="text"
                            :value="user.user_client.phone"
                            name="phone"
                            id="phone">
                </div>
                <div class="Form-labelContent">
                    <label for="birth_city">Región</label>
                    <select id="birth_city" v-model="selectedRegion" class="Request-formSelect" @change="change">
                        <option v-for="region in regions" :value="region.id">{{region.name}}</option>
                    </select>
                </div>
                <div class="Form-labelContent">
                    <label for="point">Punto</label>
                    <select id="point" name="point" v-model="selectedPoint" class="Request-formSelect">
                        <option value="0">Seleccione un punto</option>
                        <option v-for="point in pointsLocal" :value="point.id">{{point.name}}</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="row">
            <h4 class="col-16 h-4">Referencias personales </h4>
            <div class="col-16 row" v-for="(references, i) in user.user_references">
                <h5 class="col-16">Refencia {{ i + 1 }}</h5>
                <div class="col-16 col-m-8 Form-column">
                    <div class="Form-labelContent">
                        <label :for="`name${i}`">Nombre</label>
                        <input
                                type="text"
                                :value="references.name"
                                :name="`references.name[${i}]`"
                                :id="`references.name${i}`">
                    </div>
                </div>
                <div class="col-16 col-m-8 Form-column">
                    <div class="Form-labelContent">
                        <label :for="`references.phone${i}`">Teléfono</label>
                        <input
                                type="text"
                                :value="references.phone"
                                :name="`references.phone[${i}]`"
                                :id="`references.phone${i}`">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="col-16 h-4">Archivos</h4>
            <div class="col-16 row justify-start m-t-20 m-b-20">
                <figure v-for="file in user.user_files" class="row  is-text-center">
                    <a class="row" :href="file.temporaryUrl" target="_blank">
                        <img src="../../images/file.svg" alt="" width="80px" class="m-a">
                        <span class="col-16 is-text-center">
                            {{`${file.name}.${file.metaData.extension}` }}
                        </span>
                    </a>
                </figure>
            </div>
        </div>
        <div class="row justify-center ">
            <button type="submit">Actualizar</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "form-user",
        props: ['user', 'regions', 'points'],
        data: function () {
            return {
                selectedUser: null,
                selectedRegion: null,
                selectedAddressType: null,
                selectedPoint: null,
                typeDocument: ['cédula', 'Cédula de extranjería'],
                addressType: ['casa', 'apartamento']
            }
        },
        created() {
            this.selectedUser = this.user.document_type;
            this.selectedPoint = this.user.user_client.point.id;
            this.selectedRegion = this.user.user_client.point.region.id;
            this.selectedAddressType = this.user.user_client.address_type;

        },
        computed: {
            pointsLocal: function () {
                return this.points.filter(point => point.region_id === this.selectedRegion)
            }
        },
        methods: {
            change: function () {
                this.selectedPoint = 0;
            }
        }
    }
</script>
