import Dropzone from 'dropzone';
import axios from 'axios';
import swal from 'sweetalert';


const dropzoneDom = document.querySelector('.dropzone'),
    token = document.querySelector('[name=_token]'),
    buttonsDelete = document.querySelectorAll('.File-delete'),
    finalizeButton = document.getElementById('finalizeButton');

export default function () {
    if (dropzoneDom) {
        const dropzone = new Dropzone('.dropzone', {
            url: '/archivos/',
            headers: {
                'X-CSRF-TOKEN': token.value
            },
            acceptedFiles: 'image/*,application/pdf',
            paramName: 'files',
            maxFilesize: 5,
            dictDefaultMessage: '<div class="dropzone-buttonMessage">Selecciona tus documentos</div>' +
                '<div class="dropzone-message">(FOTOCOPIA DE LA CÉDULA AL 150%)</div>',
            addRemoveLinks: true,

        });
        dropzone.on("addedfile", function () {
            finalizeButton.setAttribute('disabled', 'disabled')

        });
        dropzone.on("success", function (file, response) {
            finalizeButton.removeAttribute('disabled');
            file.id_number = response;

        });
        dropzone.on('removedfile', function (file) {
            destroyFile(file.id_number);
        });

        Dropzone.autoDiscover = false;

        buttonsDelete.forEach(function (item) {

            item.addEventListener('click', function () {
                destroyFile(item.dataset.id, this.parentNode)
            });
        });
    }
}

function destroyFile(id, node = false) {
    swal({
        title: "Estas seguro de eliminar el archivo?",
        text: "Una vez eliminado, no podrás recuperar este archivo!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                axios.delete('archivos/' + id, {
                    _token: document.querySelector('[name=_token]').value
                }).then(function (response) {
                    console.log(response);
                });
                swal("Archivo eliminado", {
                    icon: "success",
                });
                if (node) {
                    node.remove();
                }

            }
        });
}
