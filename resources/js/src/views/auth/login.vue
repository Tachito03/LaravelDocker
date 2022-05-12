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
                            
                            <b-form class="text-left">
                                <form action="javascript:void(0)" method="post">
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
                                            <input type="email" placeholder="Correo Electronico"  v-model="user.email" required>
                                            <p class="text-danger" v-text="errors.email"></p>
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
                                            <input type="password" placeholder="Password"  v-model="user.password" required>
                                            <p class="text-danger" v-text="errors.password"></p>
                    
                                        </div>
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="field-wrapper toggle-pass d-flex align-items-center">
                                                <!--<p class="d-inline-block">Mostrar contraseña</p>
                                                <b-checkbox switch class="switch s-primary"></b-checkbox>-->
                                            </div>
                                            <div class="field-wrapper">
                                                <b-button type="submit" variant="primary" @click="logInit()">Entrar</b-button>
                                            </div>
                                        </div>

                                        <div class="field-wrapper">
                                            <router-link to="/auth/pass-recovery" class="forgot-pass-link">¿Olvidaste tu contraseña?</router-link>
                                        </div>
                                    </div>
                                </form>
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
    
    export default {
        metaInfo: { title: 'Inicio de sesión' },
        data(){
            return {
                user: {
                    email: "",
                    password: "",
                    device_name: 'browser'
                }, 
                errors: {}
            }
        },
        mounted() {},
        methods: {
            //Aqui va el funcion login
            async logInit(){
                //if(this.email.trim() == '') return this
                
                axios.get('/sanctum/csrf-cookie');
                axios.post('/api/login', this.user).then((response) => {

                }).catch((errors) =>{
                    this.errors = errors.response.data.errors
                })
            }
        }
    };
</script>
