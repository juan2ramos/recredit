<template>
    <div>
        <div :class="[{ error: error }, 'Request-formGroup'] "
             data-errorMessage="El campo es requerido o ya ha sido registrado ">

            <label for="InputEmail">Correo electrónico</label>
            <input type="text" id="InputEmail" autocomplete="nope" v-model="beforeEmail" name="beforeEmail">
            <div class="Request-formSelectEmail row middle-items">
                <div class="m-r-8">@</div>
                <div class="Request-formSelectEmailContent">
                    <select id="SelectEmail" v-model="afterEmail" name="afterEmail">
                        <option value="">Seleccione un correo</option>
                        <option v-for="email in emails" :value="email">{{email}}</option>
                    </select>
                </div>
            </div>

            <div class="row justify-end " :class="{ 'is-hidden' : afterEmail !== 'otro'}">
                <label class="col-m-8 col-16">
                    <input type="text" placeholder="ejemplo.com" v-model="otherEmail" name="other">
                </label>
            </div>
            <input type="hidden" name="email" :value="email">
            <div class="Request-formGroup">
                <input type="text" :value="email" class="Request-disabled" placeholder="Tu Email" disabled>
            </div>
        </div>

    </div>

</template>
<script>

    export default {
        name: 'Email',
        props: ['emails', 'before', 'after', 'other', 'error'],
        data: function () {
            return {
                beforeEmail: this.before,
                afterEmail: this.after,
                otherEmail: this.other,
            }
        },
        computed: {
            email: function () {
                if (this.afterEmail === 'otro') {
                    return `${this.beforeEmail}@${this.otherEmail} `
                }
                return `${this.beforeEmail}@${this.afterEmail} `
            }
        }
    }
</script>
