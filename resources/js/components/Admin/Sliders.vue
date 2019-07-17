<template>
    <form class="is-full-width">
        <div class="dropzone row justify-center middle-items col-16 m-t-24"></div>
        <div class="row justify-center m-t-20">
            <button>Ingresar nuevo slide</button>
        </div>
    </form>
</template>

<script>
    import uploadFiles from '../../services/UploadFile';

    export default {
        name: "Sliders",
        data: function () {
            return {
                dropZone: {},
            }
        },
        mounted: function () {
            const msg = 'Haz click para ingresar la nueva imagen'
            this.dropZone = uploadFiles('ASDASDASD',msg);
            this.dropZone.on("addedfile", () => this.disabledButton = true);
            this.dropZone.on("success", (file, response) => {
                this.disabledButton = false;
                this.path = response.path;
                this.extension = response.extension;
                this.mime = response.mime;
                this.name = response.name;
            });
            this.dropZone.on("maxfilesexceeded", (file) => {
                this.dropZone.removeFile(file);
                swal("Solo se permite un archivo", {icon: "warning",});
                this.disabledButton = false
            });
        },
        methods: {
            save() {
                this.disabledButton = true
            }
        }
    }
</script>

<style scoped>

</style>
