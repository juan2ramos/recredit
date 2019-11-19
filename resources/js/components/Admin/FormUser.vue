<template>
    <div>
        <form :action="`/admin/usuarios/${user.document}`" method="post" class="Request-form col-16">
            <input name="_method" type="hidden" value="PUT">
            <input name="_token" type="hidden" :value="token">
            <div class="row">
                <h4 class="col-16 h-4">Datos del crédito</h4>
                <div class="col-8">
                    <p><b>Estado del credito:</b> {{credit.state === 1 ? 'Aprobado':'Denegado'}}</p>
                    <p v-if="credit.reasons_id"><b>Denegado por:</b> {{credit.reason.name}}</p>
                    <p><b>Fecha de solicitud: </b>{{credit.created_at}}</p>
                    <p><b>Fecha de cierre: </b>{{credit.check_date}}</p>
                </div>
                <div class="col-8">
                    <p><b>Número de solicitudes:</b> {{credit.number_requested}}</p>
                    <p><b>Usuario que finalizó la solicitud:</b> {{credit.finished.name}}</p>
                    <p><b>Usuario que valido el crédito:</b> {{credit.reviewed.name}}</p>
                </div>
            </div>
            <div class="row">
                <h4 class="col-16 h-4">Datos personales</h4>
                <div class="col-16 col-m-8 Form-column">
                    <div class="Form-labelContent">
                        <label for="name">Nombre</label>
                        <input v-if="superAdmin"
                               type="text"
                               :value="user.name"
                               name="name"
                               id="name">
                        <p v-if="!superAdmin">
                            {{user.name}}
                            <input type="hidden" :value="user.name" name="name">
                        </p>
                    </div>
                    <div class="Form-labelContent">
                        <label for="document_type">Tipo de documento</label>
                        <select v-if="superAdmin" name="document_type" id="document_type" class="Request-formSelect"
                                v-model="selectedUser">
                            <option value="null" selected>Select a name</option>
                            <option v-for="option in typeDocument" :value="option">{{ option }}</option>
                        </select>
                        <p v-if="!superAdmin">{{selectedUser}}
                            <input type="hidden" :value="selectedUser" name="document_type">
                        </p>
                    </div>
                    <div class="Form-labelContent">
                        <label for="phone">Teléfono</label>
                        <input
                                v-if="superAdmin"
                                type="text"
                                :value="user.client.phone"
                                name="phone"
                                id="phone">
                        <p v-if="!superAdmin">
                            {{(user.client.phone)?user.client.phone:'Sin Teléfono'}}
                            <input type="hidden" :value="(user.client.phone)?user.client.phone:''" name="phone">
                        </p>
                    </div>
                    <div class="Form-labelContent">
                        <label for="email">Correo Electrónico</label>
                        <input
                                v-if="superAdmin"
                                type="email"
                                :value="user.email"
                                name="email"
                                id="email">
                        <p v-if="!superAdmin">
                            {{user.email}}
                            <input type="hidden" :value="user.email" name="email">
                        </p>
                    </div>
                    <div class="Form-labelContent">
                        <label for="birth_city">Ciudad</label>
                        <select v-if="superAdmin" id="birth_city" v-model="selectedCity" class="Request-formSelect"
                                @change="change">
                            <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                        </select>
                        <p v-if="!superAdmin">{{cities.filter((c)=>c.id === selectedCity)[0].name}}</p>
                    </div>
                    <div class="Form-labelContent">
                        <label for="residency_city">Ciudad de residencia</label>
                        <input
                                v-if="superAdmin"
                                type="text"
                                :value="user.client.residency_city"
                                name="residency_city"
                                id="residency_city">
                        <p v-if="!superAdmin">
                            {{user.client.residency_city}}
                            <input type="hidden" :value="user.client.residency_city" name="residency_city">
                        </p>
                    </div>

                </div>
                <div class="col-16 col-m-8 Form-column">
                    <div class="Form-labelContent">
                        <label for="last_name">Apellido</label>
                        <input v-if="superAdmin"
                               type="text"
                               :value="user.last_name"
                               name="last_name"
                               id="last_name">
                        <p v-if="!superAdmin">
                            {{user.last_name}}
                            <input type="hidden" :value="user.last_name" name="last_name">
                        </p>
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
                        <label for="mobile">Celular</label>
                        <input
                                v-if="superAdmin"
                                type="text"
                                :value="user.client.mobile"
                                name="mobile"
                                id="mobile">
                        <p v-if="!superAdmin">
                            {{user.client.mobile}}
                            <input type="hidden" :value="user.client.mobile" name="mobile">
                        </p>
                    </div>
                    <div class="Form-labelContent">
                        <label for="address">Dirección</label>
                        <input
                                v-if="superAdmin"
                                type="text"
                                :value="user.client.address"
                                name="address"
                                id="address">
                        <p v-if="!superAdmin">
                            {{user.client.address}}
                            <input type="hidden" :value="user.client.address" name="address">
                        </p>
                    </div>
                    <div class="Form-labelContent">
                        <label for="point">Punto</label>
                        <select style="text-transform: capitalize" v-if="superAdmin" id="point" name="point"
                                v-model="selectedPoint"
                                class="Request-formSelect">
                            <option value="0">Seleccione un punto</option>
                            <option v-for="point in pointsLocal" :value="point.id">{{point.name}}</option>
                        </select>
                        <p v-if="!superAdmin" style="text-transform: capitalize">
                            {{pointsLocal.filter((p)=>p.id === selectedPoint)[0].name}}
                            <input type="hidden" :value="selectedPoint" name="point">
                        </p>
                    </div>
                    <div class="Form-labelContent" v-if="superAdmin">
                        <label for="password" >Contraseña</label>
                        <input
                                type="password"
                                name="password"
                                id="password">
                    </div>
                    <p v-if="!superAdmin">
                        <input type="hidden" value="" name="password">
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-16 col-m-8 Form-column">


                </div>
                <div class="col-16 col-m-8 Form-column">


                </div>
            </div>
            <div class="row">
                <h4 class="col-16 h-4">Referencias personales </h4>
                <div class="is-full-width References">
                    <table class="is-full-width">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Celular</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(reference, i) in user.references">
                            <td><h5 class="col-16">Referencia {{ i + 1 }}</h5></td>
                            <td>
                                <div class="col-16 col-m-8 Form-column">
                                    <input
                                            v-if="superAdmin"
                                            type="hidden"
                                            :name="`references[${i}][id]`"
                                            :value="reference.id">
                                    <div class="Form-labelContent">
                                        <input
                                                v-if="superAdmin"
                                                type="text"
                                                :value="reference.name"
                                                :name="`references[${i}][name]`"
                                                :id="`reference.name${i}`">
                                        <p v-if="!superAdmin">
                                            {{reference.name}}
                                            <input
                                                    type="hidden"
                                                    :name="`references[${i}][id]`"
                                                    :value="reference.id">
                                            <input type="hidden" :value="reference.name" :name="`references[${i}][name]`">
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-16 col-m-8 Form-column">
                                    <div class="Form-labelContent">
                                        <input
                                                v-if="superAdmin"
                                                type="text"
                                                :value="reference.phone"
                                                :name="`references[${i}][phone]`"
                                                :id="`reference.phone${i}`">
                                        <p v-if="!superAdmin">
                                            {{reference.phone}}
                                            <input type="hidden" :value="reference.phone" :name="`references[${i}][phone]`"></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="row col-16">

                <vue-dropzone v-if="superAdmin || analyst"
                              id="MyDropZoneFileAdmin"
                              :options="dropzoneOptions"
                              @vdropzone-file-added="addFile"
                              @vdropzone-success="successFile"
                              @vdropzone-error="error"
                              ref="FilesIDAdmin"
                >
                </vue-dropzone>
                <div class="row m-t-20 justify-around">
                    <div class="File col-3" v-for="(file, index) in userFiles">
                        <div class="File-delete" v-if="superAdmin || analyst" @click="deleteFile(file, index)">x</div>
                        <div class="m-auto is-text-center">
                            <div class="m-auto is-text-center">
                                <img width="80px" :src="file.temporaryUrl" alt="">
                            </div>
                        </div>
                        <p class="is-text-center">{{file.name}}<br>
                            <a target="_blank" :href="file.temporaryUrl">Ver archivo</a>
                        </p>
                    </div>
                </div>

            </div>

            <div class="row col-16 m-t-20 m-b-20">
                <h4 class="col-16 h-4">Selecciona una tipificación (Opcional)</h4>
                <div class="is-full-width">
                    <select style="margin: 0 !important; " v-model="typing" name="typing_id">
                        <option value="">NINGUNA</option>

                        <option v-for="typing in typings"  v-bind:value="typing.id">
                            {{typing.analyst_name}}
                        </option>

                    </select>
                </div>
            </div>

            <div class="row justify-center " v-if="analyst">
                <button type="submit" :disabled="sending">Actualizar</button>
            </div>
        </form>
    </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    import axios from 'axios'

    export default {
        components: {vueDropzone: vue2Dropzone},
        name: "form-user",
        props: ['user', 'cities', 'points', 'token', 'authUser', 'superAdmin', 'credit', 'analyst', 'typings'],
        data: function () {
            return {
                selectedUser: null,
                selectedCity: null,
                selectedAddressType: null,
                selectedPoint: null,
                sending: false,
                typeDocument: ['Cédula de ciudadanía', 'cédula de extranjería'],
                userFiles: this.user.files,
                addressType: ['casa', 'apartamento'],
                typing: this.credit.typing_id ? this.credit.typing_id:'',
                dropzoneOptions: {
                    url: '/admin/files',
                    thumbnailWidth: 150,
                    maxFilesize: 5,
                    maxFiles: 5
		    paramName: 'files',
                    dictDefaultMessage: '<div class="dropzone-buttonMessage">Selecciona los documentos</div>',
                    headers: {"X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content},
                    params: {user: this.user.id}
                }
            }
        },
        created() {
            this.selectedUser = this.user.document_type;
            this.selectedPoint = this.user.client.point.id;
            this.selectedCity = this.user.client.point.city.id;
            console.log(this.superAdmin)

        },
        computed: {
            pointsLocal: function () {
                return this.points.filter(point => point.city_id === this.selectedCity)
            }
        },
        methods: {
            change: function () {
                this.selectedPoint = 0;
            },
            addFile: function () {
                this.sending = true
            },
            successFile: function (file, response) {
                this.sending = false;
                this.userFiles.push(response);
                this.$refs.FilesIDAdmin.removeAllFiles()
            },
            error: function () {
                this.sending = false
            },
            deleteFile: function (file, index) {
                swal({
                    title: "Estas seguro de eliminar el archivo?",
                    text: "Una vez eliminado, no podrás recuperar este archivo!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            axios.delete(`/admin/files/${file.id}`, {
                                _token: this.token
                            }).then((response) => {
                                swal("Archivo eliminado", {icon: "success",});
                                this.userFiles.splice(index, 1);
                            });

                        }
                    });
            },

        }
    }
</script>

<style scoped lang="scss">
    input {
        text-transform: uppercase;
    }

    .dropzone {
        width: 100%;
    }

    p {
        text-transform: uppercase;
    }

    .References {
        table td, table th {
            min-width: 30rem !important;
        }

        td:nth-child(3), th:nth-child(3), td:nth-child(7), th:nth-child(7) {
            min-width: 30rem !important;
        }
    }
</style>
