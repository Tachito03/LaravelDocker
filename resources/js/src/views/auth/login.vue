<template>
    <div class="form full-form auth-cover">
        <div class="form-container">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">
                            <h1 class="text-center">
                                <span class="brand-name">Bienvenido a CyP</span>
                            </h1>
                            <h4 class="text-center">
                                <span class="brand-name">Iniciar sesión</span>
                            </h4>
                            
                                <b-form class="text-left" @submit.prevent="logInit">
                                    <div class="form">
                                        <div id="username-field" class="field-wrapper input">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-user"
                                            >
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <input type="email" placeholder="Correo Electronico"  v-model="user.email"  :class="{ 'is-invalid': submitted && $v.user.email.$error }">
                                            <div v-if="submitted && $v.user.email.$error" class="invalid-feedback">
                                                <span class="text-danger" v-if="!$v.user.email.required">Ingresa tu correo electrónico</span>
                                                <span class="text-danger" v-if="!$v.user.email.email">El correo tiene formato incorrecto</span>
                                            </div>
                                            <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                                        </div>

                                        <div id="password-field" class="field-wrapper input mb-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-lock"
                                            >
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                            </svg>
                                            <input type="password" placeholder="Password"  v-model="user.password"  :class="{ 'is-invalid': submitted && $v.user.password.$error }" >
                                           <div v-if="submitted && $v.user.password.$error" class="invalid-feedback">
                                                <span class="text-danger" v-if="!$v.user.password.required">Ingresa tu contraseña</span>
                                                <span class="text-danger" v-if="!$v.user.password.minLength">Debe tener al menos 8 caracteres</span>
                                            </div>
                                             <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>

                                        </div>
                                        <div class="field-wrapper text-center">
                                            <h5 class="text-danger"><strong>{{ message }}</strong></h5>
                                        </div>
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="field-wrapper toggle-pass d-flex align-items-center">
                                            </div>
                                            <div class="field-wrapper">
                                                <b-button type="submit" variant="primary">Entrar</b-button>
                                            </div>
                                        </div>
                                        <div class="field-wrapper">
                                            <router-link to="/auth/pass-recovery" class="forgot-pass-link">¿Olvidaste tu contraseña?</router-link>
                                        </div>
                                    </div>
                                </b-form>
                            <p class="terms-conditions text-center">
                                © 2022 Todos los derechos reservados. <br>
                                <a href="javascript:void(0);">Aviso de Privacidad</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-image">
                <div class="l-image"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import '@/assets/sass/authentication/auth.scss';
    import axios from 'axios';
    import { required, email, minLength } from 'vuelidate/lib/validators';
    
    export default {
        metaInfo: { title: 'Inicio de sesión' },
        data(){
            return {
                user: {
                    email: "",
                    password: ""
                },
                errors: [],
                message: '',
                submitted: false
                
            }
        },

        validations: {
            user: {
                email: {required, email},
                password: {
                    required, 
                    minLength: minLength(5)
                }
            }
        },

        mounted() {},
        methods: {
           async logInit(){
                this.submitted = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return; 
                }   
                    await axios.get('/sanctum/csrf-cookie');
                    await axios.post('/api/login', this.user).then((response) => {
                        console.log(response.status);
                        if(response.status === 200){
                            localStorage.setItem('uuid', response.data.token);
                            localStorage.setItem('data', JSON.stringify(response.data.access[0].permisos));
                            this.$router.push({name: 'dashboard'});
                        }
                        
                    }).catch((errors) =>{
                        console.log(errors);
                        var v = this;
                        if(errors.response.status === 501) {
                            v.message = errors.response.data.message;
                            setTimeout(function () {
                                v.message = '';
                            }, 4000);
                        }else if(errors.response.status === 401){
                            this.errors = errors.response.data.errors;
                        }
                    })
            }
        }
    };
</script>
