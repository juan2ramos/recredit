<template>
    <div>
        <section class="Faq-content container row">
            <article class="col-16 col-m-8">
                <h2>MI SOLICITUD</h2>
                <ul class="is-list-less">
                    <li>
                        <h4>¿Dónde puedo solicitar mi crédito?</h4>
                        <p>Puedes dirigirte a cualquiera de nuestras tiendas a nivel nacional o puedes solicitarlo ahora
                            mismo en <a href="www.nuevo.creditoslilipink.com/solicitud-creditos.">www.creditoslilipink.com/solicitud-creditos.</a>
                        </p>
                    </li>
                    <li>
                        <h4>¿Qué documentos necesito para obtener mi crédito?</h4>
                        <p>En el momento de realizar la validación de datos solo debes presentar tu cédula original en
                            nuestras tiendas.

                        </p>
                    </li>
                    <li>
                        <h4>¿Debo tener un codeudor?</h4>
                        <p>
                            Nuestro crédito no requiere codeudor, únicamente necesitarás dos referencias personales.

                        </p>
                    </li>
                    <li>
                        <h4>¿Puedo iniciar vida crediticia con este crédito?</h4>
                        <p>Si, este crédito no requiere que tengas un historial crediticio previo, aun así, recuerda que
                            cualquier solicitud estará sujeta al estudio de tu perfil.</p>
                    </li>
                    <li>
                        <a @click.prevent="modal" class="button openModal">Ver tasas de interés</a>
                    </li>
                </ul>
                <h2>DETALLES DE USO</h2>
                <ul class="is-list-less">
                    <li>
                        <h4>¿Puedo iniciar vida crediticia con este crédito?</h4>
                        <p>Si, este crédito no requiere que tengas un historial crediticio previo, aun así, recuerda que
                            cualquier solicitud estará sujeta al estudio de tu perfil.</p>

                    </li>
                </ul>
            </article>
            <article class="col-16 col-m-8">
                <h2> PAGOS Y COBROS</h2>
                <ul class="is-list-less">

                    <li>
                        <h4>QUE DEBO HACER SI NO PUEDO INICIAR SESIÓN EN WWW.CREDITOSLILIPINK.COM</h4>
                        <p>Comunicate a la línea de servicio al cliente en bogotá 670 2400 ext: 133 236.</p>
                    </li>

                    <li>
                        <h4>ES POSIBLE CAMBIAR LAS FECHAS LIMITES DE PAGO DE MI CRÉDITO</h4>
                        <p>No. Las fechas del pago del crédito Lili Pink no pueden ser modificadas a solicitud del
                            cliente</p>
                    </li>

                    <li>
                        <h4>SI PRESENTO RETRASO EN MIS CUOTAS</h4>
                        <p>Serás reportado a centrales de riesgo y de persistir o continuar la mora o ser superior a 90
                            días se realizará cobro jurídico. Recuerda que tener buenos hábitos de pago es su mejor
                            carta de presentación ante el comercio
                            y sector financiero
                        </p>
                    </li>

                    <li>
                        <h4>CUÁNDO PUEDE ESTAR BLOQUEADO EL CRÉDITO</h4>
                        <p>Puede estar bloqueado si presenta mora superior a 30 días, suplantación o perdida.</p>
                    </li>
                </ul>
                <div class="Faq-contentInfo">
                    <h4 class="color-primary ">¿QUIERES MÁS INFORMACIÓN?</h4>
                    <p>PBX: (571) 670 2400 Ext: 127 133 236 carteralilipink@lilipink.com //Cra 19A No 196-23 Bogotá</p>
                </div>
            </article>
        </section>
        <section class="Modal row justify-center align-middle Faq-Modal" v-show="openModal">
            <div class="Modal-content row Contact-content" style="height: 500px;">
                <div class="Modal-contentClose modalClose" @click.prevent="modal">X</div>
                <div class=" table-container" style="max-height: 90%;">
                    <table class="Faq-modalTable">
                        <thead>
                        <tr>
                            <th>Tasa mÍnima legal EA</th>
                            <th>Tasa mÍnima legal EA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Cuotas</td>
                            <td>Interés</td>
                        </tr>

                        <tr v-for="i in 12" :key="i">
                            <td>{{i}}</td>
                            <td>{{i*1.5}}%</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</template>
<script>


    export default {
        name: 'Modal',
        data: function () {
            return {
                openModal: false
            }
        },
        methods: {
            modal() {
                this.openModal = !this.openModal
            }
        }
    }
</script>
<style scoped lang="scss">
    h2 {
        text-align: center;
        font-size: 2.4rem;
        margin: 20px 0 -20px;
        font-weight: 600;
        color: #46b065;
    }
</style>

