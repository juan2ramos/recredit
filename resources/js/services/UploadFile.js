import axios from 'axios';
import swal from 'sweetalert';
import Dropzone from 'dropzone';

export default function (token, msg) {
    Dropzone.autoDiscover = false;
    return new Dropzone('.dropzone', {
        url: '/admin/archivos/uploadFileTemp',
        headers: {'X-CSRF-TOKEN': token},
        paramName: 'files',
        maxFiles: 10,
        dictDefaultMessage:
            `<i > ${msg} </i>`,
        addRemoveLinks: true,

    });


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
