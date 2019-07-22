<template>
    <p class="is-text-center">
        <input type="checkbox" v-model="assignedLocal" @click="credit" id="validated">
        <label for="validated">Validar credito</label>
    </p>
</template>

<script>
    import axios from 'axios';
    import swal from 'sweetalert'

    export default {
        name: "ValidatedCredit",
        props: ['user', 'assigned', 'credit_id'],
        mounted() {
            console.log(this.assignedLocal)
        },
        data: function () {
            return {
                assignedLocal: !!this.assigned
            }
        },
        methods: {
            credit: function () {
                axios.post(`/admin/assigned/${this.credit_id}`, {
                    assigned: !this.assignedLocal ? this.user : 0,
                    _token: document.head.querySelector("[name=csrf-token]").content
                }).then(({data}) => {
                    swal("Se cambio satifactoriamente ", {icon: "success",})
                })
            }
        }
    }
</script>

