<template>
    <div class="container">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Pago</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Suscripción</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </portal>

        <div class="container">
            <div class="row layout-top-spacing">

                <div id="basic" class="col-lg-12 layout-spacing">
                    <div class="statbox panel box box-shadow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Has elegido el plan {{ detalle.nombre }} por <strong>${{ detalle.costo }} </strong> al {{ detalle.stripe_plan }} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="mt-0" ref="processPago" @submit.prevent="procesoPago">
                                <b-form-row>
                                    <b-form-group class="col-md-6" label="Nombre: ">
                                        <b-input type="text" placeholder="Escribe tu nombre" v-model="cliente.nombre" :class="{ 'is-invalid': submitted && $v.cliente.nombre.$error }"></b-input>
                                        <div v-if="submitted && $v.cliente.nombre.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.cliente.nombre.required">El campo nombre es requerido</span>
                                        </div>
                                    </b-form-group>
                                    <b-form-group class="col-md-6" label="Apellidos: ">
                                        <b-input type="text" placeholder="Paterno y Materno" v-model="cliente.apellidos" :class="{ 'is-invalid': submitted && $v.cliente.apellidos.$error }"></b-input>
                                        <div v-if="submitted && $v.cliente.apellidos.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.cliente.apellidos.required">El campo apellido es requerido</span>
                                        </div>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row>
                                    <b-form-group class="col-md-6" label="Email: ">
                                        <b-input type="email" placeholder="Correo eléctronico" v-model="cliente.email" :class="{ 'is-invalid': submitted && $v.cliente.email.$error }"></b-input>
                                        <div v-if="submitted && $v.cliente.email.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.cliente.email.required">El campo correo electrónico es requerido</span>
                                            <span class="text-danger" v-if="!$v.cliente.email.email">El campo correo electrónico no tiene el formato correcto</span>
                                        </div>
                                    </b-form-group>
                                    <b-form-group class="col-md-6" label="Dirección: ">
                                        <b-input type="text" placeholder="Dirección" v-model="cliente.direccion" :class="{ 'is-invalid': submitted && $v.cliente.direccion.$error }"></b-input>
                                        <div v-if="submitted && $v.cliente.direccion.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.cliente.direccion.required">El campo dirección es requerido</span>
                                        </div>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row>
                                    <b-form-group class="col-md-4" label="Ciudad: ">
                                        <b-input type="text" placeholder="Ciudad" v-model="cliente.ciudad" :class="{ 'is-invalid': submitted && $v.cliente.ciudad.$error }"></b-input>
                                        <div v-if="submitted && $v.cliente.ciudad.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.cliente.ciudad.required">El campo ciudad es requerido</span>
                                        </div>
                                    </b-form-group>
                                    <b-form-group class="col-md-4" label="Estado: ">
                                        <b-input type="text" placeholder="Estado" v-model="cliente.estado" :class="{ 'is-invalid': submitted && $v.cliente.estado.$error }"></b-input>
                                        <div v-if="submitted && $v.cliente.estado.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.cliente.estado.required">El campo estado es requerido</span>
                                        </div>
                                    </b-form-group>
                                    <b-form-group class="col-md-4" label="Código Postal: ">
                                        <b-input type="number" placeholder="Código postal" v-model="cliente.postal" :class="{ 'is-invalid': submitted && $v.cliente.postal.$error }"></b-input>
                                        <div v-if="submitted && $v.cliente.postal.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.cliente.postal.required">El campo código postal es requerido</span>
                                            <span class="text-danger" v-if="!$v.cliente.postal.minLength">El código postal es incorrecto</span>
                                            <span class="text-danger" v-if="!$v.cliente.postal.maxLength">El código postal es incorrecto</span>
                                        </div>
                                    </b-form-group>
                                </b-form-row>

                                <b-form-row>
                                    <b-form-group class="col-12" label="Número de tarjeta: ">
                                        <div id="card-element"></div>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row v-if="success">
                                    <b-form-group class="col-12 text-center">
                                        <b-alert show dismissible variant="light-success" class="border-0 mb-4 text-center"><strong>{{ success }}</strong>  </b-alert>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row v-if="errors">
                                    <b-form-group class="col-12 text-center">
                                        <b-alert show dismissible variant="light-warning" class="border-0 mb-4 text-center"> <strong>{{ errors }}</strong>  </b-alert>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row>
                                    <b-form-group class="col-12 text-right">
                                        <b-button type="submit" class="btn-block mb-4 mr-2 flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                            @click="procesoPago" :disabled="procesandoPago" v-text="procesandoPago ? 'Procesando pago...' : 'Confirmar pago'">
                                        </b-button>
                                    </b-form-group>
                                </b-form-row>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import '@/assets/sass/scrollspyNav.scss';
    import highlight from '@/components/plugins/highlight.vue';
    import { required, email, minLength, maxLength}  from 'vuelidate/lib/validators';
    import { loadStripe } from '@stripe/stripe-js';
    import axios from 'axios';

    export default {
        metaInfo: { title: 'Subscripción' },
        components: {
            highlight
        },
        data() {
            return {
                stripe: {},
                cardElement: {},
                procesandoPago: false,
                submitted: false,
                errors: '',
                success: '',
                detalle: {nombre: '', costo: '', stripe_plan: ''},
                cliente: {nombre: '', apellidos: '', email: '', direccion: '', ciudad: '', estado: '',postal: ''},
                code_arr: [],
            }
        },
        validations: {
            cliente:{
                nombre: {required},
                apellidos: {required},
                email: {required, email},
                direccion: {required},
                ciudad: {required},
                estado: {required},
                postal: {required, minLength: minLength(4), maxLength: maxLength(5)},
              
            },
        },
        async mounted() {
            this.stripe = await loadStripe(`${process.env.MIX_STRIPE_KEY}`);
            const elements = this.stripe.elements();
            this.cardElement = elements.create('card', {
                classes: {
                    base: 'bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 p-3 leading-8 transition-colors duration-200 ease-in-out'
                }
            });
            this.cardElement.mount('#card-element');
            this.obtieneDetalle();
            this.obtieneUsuario();
        },
        methods: {
            toggleCode(name) {
                if (this.code_arr.includes(name)) {
                    this.code_arr = this.code_arr.filter(d => d != name);
                }
                else {
                    this.code_arr.push(name);
                }
            },
            async obtieneUsuario(){
                 axios.get('/api/suscription/usuario').then((response) =>{
                    this.cliente.nombre = response.data.usuario.nombre;
                    this.cliente.apellidos = response.data.usuario.apellidos;
                    this.cliente.email = response.data.usuario.correo;
                });
            },
            async obtieneDetalle(){
                axios.get(`/api/suscription/obtienedetalle/${this.$route.params.plan}`).then((response) =>{
                    this.detalle.nombre = response.data.detalle[0].name.toLowerCase();
                    this.detalle.costo = response.data.detalle[0].price.toFixed(2);
                    this.detalle.stripe_plan = response.data.detalle[0].stripe_plan.toLowerCase();
                });
            },
            async procesoPago(){
                this.submitted = true
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return; 
                } 
                this.procesandoPago = true; 
 
                const {paymentMethod, error} = await this.stripe.createPaymentMethod(
                    'card', this.cardElement, {
                        billing_details: {
                            name: this.cliente.nombre + ' ' + this.cliente.apellidos,
                            email: this.cliente.email,
                            address: {
                                line1: this.cliente.direccion,
                                city: this.cliente.ciudad,
                                state: this.cliente.estado,
                                postal_code: this.cliente.postal
                            }
                        }
                    }
                );

                if(error){
                    this.procesandoPago = false;
                    this.errors = error.message;
                }else{
                    this.cliente.payment_method_id = paymentMethod.id;
                    this.cliente.slug = this.$route.params.plan;

                     axios.post('/api/suscription/purchase', this.cliente).then((response) => {
                        this.procesandoPago = false;
                        this.success = response.data.message;

                    }).catch((error) => {
                        this.procesandoPago = false;
                        this.errors = error.response.data.message;
                        
                    })
                }
            }
        }
    };
</script>
