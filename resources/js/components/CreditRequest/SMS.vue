<template>
    <div>

        <div :class="[{ error: error }, 'Request-formGroup'] "
             data-errorMessage="El campo es requerido y debe ser verificado">
            <label>Celular</label>
            <input v-model="mobile" type="text" name="mobile" placeholder="3102123456">
            <a class="Request-validateNumber" @click="sendSMS">Verificar número</a>
        </div>

        <section class="Modal row justify-center align-middle validateCode-Modal" v-if="openModal">
            <div class="Modal-content row content">
                <div class="Modal-contentClose modalClose" @click="openModal = false">X</div>
                <div class="p-40">
                    <p class="is-text-center">Un código de verificación fué enviado a tu teléfono</p>
                    <form @submit.prevent="checkCode" class="validateCode-ModalForm" >
                        <input type="text" v-model="code" placeholder="CÓDIGO DE VERIFICACIÓN">
                        <div class="is-text-center"><a  @click="sendSMS" >Enviar de nuevo</a></div>
                        <p>Se está enviando un código de seguridad a su teléfono en un mensaje de texto. Espere un
                            minuto
                            para que se envíe antes de solicitar un reenvío.</p>
                        <div class="row justify-center Request-formGroup">
                            <button type="submit">VALIDAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    import axios from 'axios';
    import swal from 'sweetalert';

    export default {
        name: 'sms',
        props:['token','error','mobileOld'],
        data: function () {
            return {
                openModal: false,
                mobile: this.mobileOld,
                code: ''
            }
        },
        methods: {

            sendSMS() {
                if (this.isNumberValidate()) {
                    axios.post('/sendSMS', {'_token': this.token, 'mobile': this.mobile})
                        .then(() => this.openModal = true)
                        .catch(() => swal("¡Ups!", " Algo ah salido mal", "warning"));
                    return
                }
                swal("¡Ups!", " Debes ingresar un número 📱 válido.", "error")
            },

            checkCode() {
                axios.post('/checkCode', {'_token': this.token, 'code': this.code}).then(() => {
                    this.openModal = false;
                    swal("¡OK!", " el código se ha verificado con éxito ", "success");
                }).catch(() => swal("¡Ups!", "El código no es valido", "warning"));
            },

            isNumberValidate() {
                const regex = /^\+(?:[0-9] ?){11}[0-9]$/;
                return regex.test(`+57${this.mobile}`);
            }
        }
    }
</script>
<style scoped>
    a {
        cursor: pointer;
    }
</style>
