<template>
    <!-- Modal Register-->
        <b-modal hide-footer v-if="showModal" title="Nuevo usuario" size="lg" class="modal">
        
            <form class="mt-0" ref="formadd" @submit.prevent="addUser">
                <b-form-row class="col-12">
                    <b-form-group class="col-md-6" label="Nombre:">
                        <b-input type="text" placeholder="Nombre" v-model="usuarioadd.nombre" :class="{ 'is-invalid': submitted && $v.usuarioadd.nombre.$error }"></b-input>
                            <div v-if="submitted && $v.usuarioadd.nombre.$error" class="invalid-feedback">
                                <span class="text-danger" v-if="!$v.usuarioadd.nombre.required">El nombre es obligatorio</span>
                            </div>
                    </b-form-group>
                    <b-form-group class="col-md-6" label="Apellidos: ">
                        <b-input type="text" placeholder="Apellidos" v-model="usuarioadd.apellidos" :class="{ 'is-invalid': submitted && $v.usuarioadd.apellidos.$error }"></b-input>
                        <div v-if="submitted && $v.usuarioadd.apellidos.$error" class="invalid-feedback">
                            <span class="text-danger" v-if="!$v.usuarioadd.apellidos.required">Los apellidos son obligatorios</span>
                        </div>
                    </b-form-group>
                </b-form-row>
                <b-form-row class="col-12">
                    <b-form-group label="Correo eletrónico:" class="col-12">
                        <b-input type="email" placeholder="Correo electrónico" v-model="usuarioadd.correo" :class="{ 'is-invalid': submitted && $v.usuarioadd.correo.$error }" ></b-input>
                        <div v-if="submitted && $v.usuarioadd.correo.$error" class="invalid-feedback">
                            <span class="text-danger" v-if="!$v.usuarioadd.correo.required">El correo es obligatorio</span>
                            <span class="text-danger" v-if="!$v.usuarioadd.correo.email">El correo tiene formato incorrecto</span>
                        </div>
                    </b-form-group>
                </b-form-row>
                <b-form-row class="col-12">
                    <b-form-group class="col-md-6" label="Contraseña: ">
                        <b-input type="password" placeholder="Contraseña" v-model="usuarioadd.contrasena" :class="{ 'is-invalid': submitted && $v.usuarioadd.contrasena.$error }"></b-input>
                        <div v-if="submitted && $v.usuarioadd.contrasena.$error" class="invalid-feedback">
                            <span class="text-danger" v-if="!$v.usuarioadd.contrasena.required">La contraseña es obligatoria</span>
                            <span class="text-danger" v-if="!$v.usuarioadd.contrasena.minLength">Debe tener al menos 8 caracteres</span>
                        </div>
                    </b-form-group>
                    <b-form-group class="col-md-6" label="Confirmar contraseña: ">
                        <b-input type="password" placeholder="Confirma tu contraseña" v-model="usuarioadd.contrasena_conf" :class="{ 'is-invalid': submitted && $v.usuarioadd.contrasena_conf.$error }"></b-input>
                        <div v-if="submitted && $v.usuarioadd.contrasena_conf.$error" class="invalid-feedback">
                            <span class="text-danger" v-if="!$v.usuarioadd.contrasena_conf.required">Es necesario confirmar la contraseña</span>
                            <span class="text-danger" v-if="!$v.usuarioadd.contrasena_conf.minLength">Debe tener al menos 8 caracteres</span>
                            <span class="text-danger" v-if="!$v.usuarioadd.contrasena_conf && !$v.usuarioadd.contrasena_conf.sameAsPassword">Las contraseñas no coinciden</span>
                        </div>
                    </b-form-group>
                </b-form-row>
                <b-form-row class="col-12">
                    <b-form-group class="col-md-6" label="Asignar Rol: ">
                        <b-select value=""  v-model="usuarioadd.id_rol" :class="{ 'is-invalid': submitted && $v.usuarioadd.id_rol.$error }"> 
                            <b-select-option value="null">Seleccione un rol</b-select-option>
                            <b-select-option v-for="(opciones, indexOpt) in selected.options" 
                                :key="indexOpt" :value="opciones.id">
                                {{ opciones.descripcion }}
                            </b-select-option>
                        </b-select>
                        <div v-if="submitted && $v.usuarioadd.id_rol.$error" class="invalid-feedback">
                            <span class="text-danger" v-if="!$v.usuarioadd.id_rol.required">Este campo es obligatorio</span>
                        </div>
                    </b-form-group>
                </b-form-row>
                <b-form-row class="col-12">
                    <b-form-group class="col-md-6"></b-form-group>
                    <b-form-group class="col-md-6">
                        <b-button type="submit" variant="primary" block class="mt-2 mb-2">Guardar</b-button>
                    </b-form-group>
                </b-form-row>
            </form>
        </b-modal>
</template>
<script>
    import axios from 'axios';
    import '@/assets/sass/components/custom-sweetalert.scss';
    import '@/assets/sass/components/custom-modal.scss';
    import { required, email, minLength,sameAs} from 'vuelidate/lib/validators';

    export default {
        metaInfo: { title: 'Bootstrap Multiple Tables' },
        name: 'Modal',
        data() {
            return {
                usuarioadd: { nombre: '', apellidos: '', correo: '', contrasena: '', contrasena_conf: '', id_rol: null },
                selected: {
                    selected: null,
                    options: []
                    },
                submitted: false,
                showModal: false
            };
        },
        validations: {
            usuarioadd:{
                nombre: {required},
                apellidos: {required},
                correo: {required, email},
                contrasena: { required, minLength: minLength(8)},
                contrasena_conf: {required, sameAsPassword: sameAs('contrasena')},
                id_rol: {required}
            },
        },
        mounted() {
            this.obtieneRoles();
        },
        methods: {
            show() {
                this.showModal = true
            },
            
            hide(){
                this.showModal = false
            },
            async addUser(){
                this.submitted = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return; 
                }  
                axios.post('/api/users/add', this.usuarioadd).then((response) => {
                    if(response.data.msg === 'OK'){
                       // this.ObtieneListaUsuarios();
                        this.$refs.formadd.reset();
                        this.$swal({
                            icon: 'success',
                            title: 'El registro se guardó correctamente!',
                            padding: '2em'
                        });
                    }else{
                        this.$swal({
                            icon: 'error',
                            title: 'Oops, se produjo un error en el proceso!',
                            text: 'Intente de nuevo!',
                            padding: '2em'
                        });
                    }
                        
                }).catch((errors) =>{
                    console.log(errors);
                })
            },  
            async obtieneRoles(){
                axios.get('/api/users/roles').then((response) =>{
                     this.selected.options = response.data.roles;
                });
            }   
        }
    };
</script>