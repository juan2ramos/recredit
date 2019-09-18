<template>
    <section class="is-full-screen Modal row justify-center middle-items ">
        <div class="row Modal-content">
            <h4 class="col-16 h-4">Datos del crédito</h4>
            <div class="col-8">
                <p><b>Estado del credito:</b>
                    {{credit.state === 1 ? 'Aprobado':credit.state === 0 ? 'Pendiente':'Denegado'}}
                </p>
                <p><b>Número de celular:</b> {{client.client.mobile}}</p>
                <p v-if="credit.reasons_id"><b>Denegado por:</b> {{credit.reason.name}}</p>
                <p><b>Fecha de solicitud: </b>{{credit.created_at}}</p>
            </div>
            <div class="col-8">
                <p><b>Número de solicitudes:</b> {{credit.number_requested}}</p>
                <p><b>Número de télefono:</b> {{client.phone}}</p>
                <p><b>Fecha de cierre: </b>{{credit.check_date}}</p>
            </div>
            <div class="Modal-contentClose" @click="closeModal">X</div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ModalInfo",
        props: ['client'],
        data: function () {
            return {
                credit: this.client.credit
            }
        },
        methods: {
            closeModal() {
                this.$emit('close-modal', false)
            }
        }

    }
</script>
<style scoped lang="scss">
    .Modal {
        background: rgba(0, 0, 0, .5);

        &-content {
            padding: 20px;
        }
    }
</style>

