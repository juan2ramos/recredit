<template>
    <form :action="route" @submit.prevent="sendCredit" method="post" class="Request-form container">
        <links-header :user="user"></links-header>
        <vue-dropzone
                id="MyDropZoneFile"
                :options="dropzoneOptions"
                @vdropzone-file-added="addFile"
                @vdropzone-success="successFile"
                @vdropzone-error="error"
                ref="FilesID"
        >
        </vue-dropzone>
        <div class="row m-t-20 justify-around">
            <div class="File col-3" v-for="(file, index) in filesLocal">
                <div class="File-delete" @click="deleteFile(file, index)">x</div>
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
        <div class="row justify-center Request-formGroup">
            <button type="submit" id="finalizeButton" :disabled="sending">Finalizar</button>
        </div>
    </form>
</template>
<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    import axios from 'axios'

    export default {
        props: ['files', 'route', 'user'],
        name: 'Files',
        components: {
            vueDropzone: vue2Dropzone
        },
        data: function () {
            return {
                sending: false,
                filesLocal: this.files,
                dropzoneOptions: {
                    url: '/archivos',
                    acceptedFiles: 'image/*',
                    thumbnailWidth: 150,
                    maxFilesize: 5,
                    parallelUploads:5,
                    paramName: 'files',
                    dictDefaultMessage: '<div class="dropzone-buttonMessage">Selecciona tus documentos</div>' +
                        '<div class="dropzone-message">(FOTOCOPIA DE LA CÉDULA)</div>',
                    headers: {"X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content}
                }
            }
        },
        computed: {},
        methods: {
            addFile: function () {
                this.sending = true
            },
            successFile: function (file, response) {
                this.sending = false;
                this.filesLocal.push(response);
                this.$refs.FilesID.removeAllFiles()
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
                            axios.delete(`archivos/${file.id}`, {
                                _token: document.head.querySelector("[name=csrf-token]").content
                            }).then((response) => {
                                swal("Archivo eliminado", {icon: "success",});
                                this.filesLocal.splice(index, 1);
                            });

                        }
                    });
            },
            sendCredit: function () {
                axios.post(this.route, {_token: document.head.querySelector("[name=csrf-token]").content})
                    .then(({data}) => {
                        if (data.creditCreated) {
                            swal("¡OK!", " Se ha enviado la solicitud de crédito con éxito ", "success");
                            setTimeout(() => window.location = "/", 3000);
                        }
                    })
                    .catch(() => {
                            swal("¡Error!", "Por favor revisa toda la solicitud de créditos", "error");
                        }
                    )
            }
        }
    }
</script>
<style>

    .vue-dropzone {
        min-height: 350px;
        background: url("../../../images/back-upload-files.png") no-repeat center 50px, #F4F4F4;
        padding: 20px 20px;
        align-items: flex-end;
        display: flex;
        justify-content: center;
    }

    .dropzone-buttonMessage {
        background: white;
        border: var(--primary-color) 1px solid;
        padding: 8px;
        border-radius: 4px;
        color: #909090;
        font-weight: 300;
    }

    .dropzone-message {
        color: #848383;
        margin-top: 10px;
        font-weight: 300;
    }
</style>
