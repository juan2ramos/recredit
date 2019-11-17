<template>
    <div>
        <vue-dropzone
                id="MyDropZoneFileEntrepreneur"
                :options="dropzoneOptions"
                @vdropzone-file-added="addFile"
                @vdropzone-success="successFile"
                @vdropzone-error="error"
                ref="FilesIDEntrepreneurs"
                @vdropzone-removed-file="removedfile"
        >
        </vue-dropzone>
        <div v-for="file in files" :key="file.index">
            {{file}}
            <input type="hidden" :name="`images[${file.index}]`" :value="file.url">
        </div>
    </div>
</template>
<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    import axios from 'axios'

    export default {
        props: ['route', 'user'],
        name: 'FilesEntrepreneurs',
        components: {
            vueDropzone: vue2Dropzone
        },
        data: function () {
            return {
                indexFile: 0,
                files: [],
                dropzoneOptions: {
                    url: '/entrepreneurs-files',
                    acceptedFiles: 'image/*',
                    thumbnailWidth: 150,
                    addRemoveLinks: true,
                    maxFilesize: 5,
                    dictRemoveFile: 'Eliminar Archivo',
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
            },
            successFile: function (file, response) {
                file.url = response;
                file.index = this.indexFile;
                this.files.push(file);
                this.indexFile++
            },
            error: function () {

            },
            removedfile: function (file, xhr, error) {

                axios.post(`entrepreneurs-filesDelete`, {
                    url: file.url,
                    _token: document.head.querySelector("[name=csrf-token]").content
                }).then((response) => {
                    swal("Archivo eliminado", {icon: "success",});
                    this.files.splice(file.id, 1);
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
