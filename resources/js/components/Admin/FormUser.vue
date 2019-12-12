<template>
    <div>

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
                message: 'Copy asdasdasd Text',
                typeDocument: ['Cédula de ciudadanía', 'cédula de extranjería'],
                userFiles: this.user.files,
                addressType: ['casa', 'apartamento'],
                typing: this.credit.typing_id ? this.credit.typing_id : '',
                dropzoneOptions: {
                    url: '/admin/files',
                    thumbnailWidth: 150,
                    maxFilesize: 5,
                    maxFiles: 5,
                    parallelUploads: 5,
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

            doCopy: function () {
                const r1 = this.user.references['0'];
                const r2 = this.user.references['1'];
                this.message = `<table><tbody>
<tr>
    <td>Referencia1</td>
    <td>${r1.name}</td>
    <td>${r1.phone}</td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Referencia2</td>
<td>${r2.name}</td>
<td>${r2.phone}</td>
</tr>
</tbody></table>`;
                this.$copyText(this.message).then(function (e) {
                    alert('Copied')

                }, function (e) {
                    alert('Can not copy')
                    console.log(e)
                })
            },
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

        &-btn {
            font-size: 16px;
            min-width: 200px;
            background: #46b065;
            box-shadow: none;
            border-radius: 0;
        }
    }

</style>
