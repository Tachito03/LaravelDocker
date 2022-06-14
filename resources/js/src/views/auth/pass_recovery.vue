<template>
    <div class="form full-form auth-cover">
        <div class="form-container">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">

                            <h2 class="">Recuperar contraseña</h2>
                            <p class="signup-link">Ingrese su email para restablecer la contraseña!</p>
                            <b-form class="text-left">
                                <div class="form">

                                    <div id="email-field" class="field-wrapper input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <b-input type="email" placeholder="Email"></b-input>
                                    </div>
                                    <div class="justify-content-between">
                                        <div class="field-wrapper">
                                            <b-button type="submit" block class="mb-4 mr-2" variant="primary">Enviar</b-button>
                                        </div>
                                    </div>

                                </div>
                            </b-form>
                            <p class="terms-conditions">© 2022 All Rights Reserved.  <a href="javascript:void(0);">Privacidad</a>, y <a href="javascript:void(0);">Términos</a>.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-image">
                <div class="l-image">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import '@/assets/sass/authentication/auth.scss';
    export default {
        metaInfo: { title: 'Password Recovery Cover' },
        mounted() {
        },
        methods: {
        }
    };
</script>
