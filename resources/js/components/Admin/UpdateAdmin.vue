<template>
    <div class="col-16  p-20 row justify-between middle-items">
        <div class="col-16 ">
            <div v-if="isError" class="alert-error"><span>¡Oh no, Algo sucedió! revisa los campos</span></div>
            <div v-if="isSuccess" class="alert-success"><span>¡Se ha creado el usuario! </span></div>
            <div><h2>Actualizar usuario</h2></div>
            <form @submit.prevent="submit" method="post">
                <div class="row">
                    <div class="col-16 col-m-8 pr-md-8 ">
                        <label class="p-b-16 is-block">
                            <input type="text" v-model="form.name" placeholder="Nombre">
                            <span class="is-invalid" v-if="this.errors.name">{{this.errors.name[0]}}</span>
                        </label>
                        <label class="is-block p-b-16">
                            <input type="text" v-model="form.last_name"
                                   placeholder="Apellido">
                            <span class="is-invalid" v-if="this.errors.last_name">{{this.errors.last_name[0]}}</span>
                        </label>
                        <label class="is-block p-b-16">
                            <select v-model="form.document_type">
                                <option value="">Seleccione tipo de documento</option>
                                <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                <option value="cédula de extranjería">cédula de extranjería</option>
                            </select>
                            <span class="is-invalid"
                                  v-if="this.errors.document_type">{{this.errors.document_type[0]}}</span>
                        </label>
                        <label class="is-block p-b-16">
                            <input type="text" placeholder="Documento"
                                   v-model="form.document">
                            <span class="is-invalid" v-if="this.errors.document">{{this.errors.document[0]}}</span>
                        </label>
                        <label class="is-block p-b-16">
                            <select id="" v-if="form.role === 'Point'" v-model="form.city"
                                    @change="change">
                                <option value="">Seleccione una Ciudad</option>
                                <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-16 col-m-8 pl-md-8 ">
                        <label class="is-block p-b-16">
                            <input type="email" v-model="form.email" placeholder="Email">
                            <span class="is-invalid" v-if="this.errors.email">{{this.errors.email[0]}}</span>
                        </label>
                        <label class="is-block p-b-16">
                            <input type="password" v-model="form.password" placeholder="Contraseña">
                            <span class="is-invalid" v-if="this.errors.password">{{this.errors.password[0]}}</span>
                        </label>
                        <label class="is-block p-b-16">
                            <input type="password" class="m-b-16" v-model="form.password_confirmation"
                                   placeholder="Repetir contraseña">
                        </label>
                        <label class="is-block p-b-16">
                            <select v-model="form.role">
                                <option value="" selected>Seleccione un rol</option>
                                <option :value="role.value" v-for="role in rolesOptions">{{role.text}}</option>
                            </select>
                            <span class="is-invalid" v-if="this.errors.role">{{this.errors.role[0]}}</span>
                        </label>
                        <label class="is-block p-b-16">
                            <select id="point" v-model="form.point" class="Request-formSelect "
                                    v-if="form.role === 'Point'">
                                <option value="">Seleccione un punto</option>
                                <option v-for="point in pointsLocal" :value="point.id">{{point.name}}</option>
                            </select>
                            <span class="is-invalid" v-if="this.errors.point">{{this.errors.point[0]}}</span>
                        </label>
                    </div>
                </div>
                <div class="row justify-center ">
                    <button :disabled="disabled" type="submit">Actualizar usuario</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import ajax from 'axios';

    export default {
        name: 'UpdateAdmin',
        props: ['cities', 'points', 'token', 'route','admin'],
        data: function () {
            return {
                form: {
                    name: this.admin.name,
                    last_name: this.admin.last_name,
                    document: this.admin.document,
                    document_type: this.admin.document_type,
                    email: this.admin.email,
                    password: '',
                    password_confirmation: '',
                    role: this.admin.roles[0].name,
                    point: this.admin.point.id,
                    city:  this.admin.point.city_id,
                    _token: this.token
                },
                disabled: false,
                errors: {},
                isError: false,
                isSuccess: false,
                rolesOptions: [
                    {'value': 'SuperAdmin', 'text': 'Super administrador'},
                    {'value': 'Analysts', 'text': 'Analista',},
                    {'value': 'Documentary', 'text': 'Analista Documental',},
                    {'value': 'Point', 'text': 'Punto de venta',}
                ]
            }
        },
        computed: {
            pointsLocal: function () {
                return this.points.filter(point => point.city_id === this.form.city)
            }
        }, methods: {
            change: function () {
                this.point = '';
            },
            submit(event) {
                this.disabled = true;
                this.isError = false;
                this.isSuccess = false;

                ajax.put(this.route, this.form).then((r) => {
                    this.disabled = false;
                    this.isSuccess = true;
                    this.errors = {};
                    Object.keys(this.form).forEach((key, index) => {
                        this.form[key] = ''
                    });
                    console.log(r)
                }).catch((error) => {
                    this.disabled = false;
                    this.isError = true;
                    if (error.response.status === 422) {
                        this.errors = Object.assign({}, error.response.data.errors);
                        console.log(    this.errors)
                    }
                });
            }
        }
    }
</script>
