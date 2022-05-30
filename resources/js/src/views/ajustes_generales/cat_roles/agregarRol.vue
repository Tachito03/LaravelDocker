<template>
    <div class="layout-px-spacing">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Account Settings</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </portal>

        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-12 layout-spacing">
                            <div class="statbox panel box box-shadow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Agrega un nuevo rol</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="mt-0" ref="formadd" @submit.prevent="AddRol">
                                        <b-form-row class="col-12">
                                            <b-form-row class="col-12">
                                                <b-form-group class="col-md-6">
                                                    <b-input type="text" placeholder="Escribe el nombre del rol" v-model="roles.descripcion" :class="{ 'is-invalid': submitted && $v.roles.descripcion.$error }"></b-input>
                                                    <div v-if="submitted && $v.roles.descripcion.$error" class="invalid-feedback">
                                                        <span class="text-danger" v-if="!$v.roles.descripcion.required">El nombre del rol es requerido</span>
                                                    </div>
                                                </b-form-group>
                                                <b-form-group class="col-md-3">
                                                </b-form-group>
                                                <b-form-group class="col-md-3">
                                                    <b-button type="submit" variant="primary" block class="mt-2 mb-2">Guardar rol</b-button>
                                                </b-form-group>
                                            </b-form-row>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-12">
                                                <p class="mb-4">Seleccione los permisos para este rol</p>
                                                 <p class="text-danger" v-if="error.permisos"><strong>{{ error.permisos[0] }}</strong></p>
                                            </b-form-group>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Ajustes generales</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="1" v-model="roles.permisos.ajustes">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.ajustes">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.ajustes">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.ajustes">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="submenus" v-model="roles.permisos.ajustes">Sub menús</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.ajustes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Ordenes Compras</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="1" v-model="roles.permisos.compras">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.compras">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.compras">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.compras">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.compras">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Proyectos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="2" v-model="roles.permisos.proyectos">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.proyectos">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.proyectos">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.proyectos">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.proyectos">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Clientes</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="3" v-model="roles.permisos.clientes">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.clientes">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.clientes">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.clientes">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.clientes">Reportes</b-checkbox>
                                            </b-form-group>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Ingresos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="4" v-model="roles.permisos.ingresos">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.ingresos">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.ingresos">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.ingresos">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.ingresos">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Flujo</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="5" v-model="roles.permisos.flujo">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.flujo">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.flujo">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.flujo">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.flujo">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Almacén/Inventario</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="6" v-model="roles.permisos.almacen">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.almacen">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.almacen">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.almacen">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.almacen">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Sistemas</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="7" v-model="roles.permisos.sistemas">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.sistemas">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.sistemas">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.sistemas">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.sistemas">Reportes</b-checkbox>
                                            </b-form-group>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Soporte</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="8" v-model="roles.permisos.soporte">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.soporte">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.soporte">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.soporte">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.soporte">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Vehículos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="9" v-model="roles.permisos.vehiculos">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.vehiculos">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.vehiculos">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.vehiculos">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.vehiculos">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Recurso Humanos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="10" v-model="roles.permisos.recursos">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.recursos">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.recursos">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.recursos">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.recursos">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Autorización</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="11" v-model="roles.permisos.autorizacion">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.autorizacion">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.autorizacion">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.autorizacion">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.autorizacion">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Análisis de datos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" value="12" v-model="roles.permisos.analisis">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="crear" v-model="roles.permisos.analisis">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="actualizar" v-model="roles.permisos.analisis">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="eliminar" v-model="roles.permisos.analisis">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" value="reportes" v-model="roles.permisos.analisis">Reportes</b-checkbox>
                                            </b-form-group>
                                        </b-form-row>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .custom-checkbox, .custom-radio { margin-bottom: 0.5rem; }
</style>
<script>
    import axios from 'axios';
    import '@/assets/sass/scrollspyNav.scss';
    import highlight from '@/components/plugins/highlight.vue';
    import '@/assets/sass/components/custom-sweetalert.scss';
    //import { isGeneratorFunction } from 'file-upload-with-preview';
    import { required} from 'vuelidate/lib/validators';

    export default {
        metaInfo: { title: 'Alta roles y permisos' },
        components: {
            highlight
        },
        data() {
            return {
                code_arr: [],
                permisos: localStorage.getItem('data'),
                roles: {
                   descripcion: '',
                   permisos: {
                      ajustes: [], compras: [],proyectos: [],clientes: [],ingresos: [],flujo: [], almacen: [], sistemas: [], soporte: [], vehiculos: [], recursos: [], autorizacion: [], analisis: []                       
                   }
                },
                error: [],
                submitted: false,
            }
        },
        validations: {
            roles: {
                descripcion: {required}
            }
        },
        mounted() {},
        methods: {
            toggleCode(name) {
                if (this.code_arr.includes(name)) {
                    this.code_arr = this.code_arr.filter(d => d != name);
                }
                else {
                    this.code_arr.push(name);
                }
            },
            async AddRol(){
                this.submitted = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return; 
                }  

                var modulos       = {0: "Ajustes", 1:"Compras", 2: "Proyectos", 3: "Clientes", 4:"Ingresos", 5: "Flujo", 6:"Almacen", 7:"Sistemas", 8:"Soporte",9:"Vehiculos",10:'Recursos', 11:"Autorizacion",12:"Analisis"}
                var jsonProyect   = {}; var jsonAjustes= {}; var jsonCompras = {}; var jsonClient = {}; var jsonIngreso = {}; var jsonFlujo = {}; var jsonAlmacen = {}; var jsonSistem = {}; var jsonSoport = {}; var jsonVehiculo = {}; var jsonRecursos = {}; var jsonAutorizacion = {}; var jsonAnalisis = {};
                var listapermisos = [];
                
                for(var aju=1; aju < this.roles.permisos.ajustes.length; aju++){
                    if(this.roles.permisos.ajustes[0]){
                        jsonAjustes["name_mod"] = modulos[0];
                    }
                    jsonAjustes[this.roles.permisos.ajustes[aju]] = true;
                }

                for(var o=1; o < this.roles.permisos.compras.length; o++){
                    if(this.roles.permisos.compras[0]){
                        jsonCompras["name_mod"] = modulos[1];
                    }
                    jsonCompras[this.roles.permisos.compras[o]] = true;
                }


                for(var p=1; p < this.roles.permisos.proyectos.length; p++){
                    if(this.roles.permisos.proyectos[0]){
                         jsonProyect["name_mod"] = modulos[2];
                    }
                   jsonProyect[this.roles.permisos.proyectos[p]] = true;
                }

                for(var c=1; c < this.roles.permisos.clientes.length; c++){
                    if(this.roles.permisos.clientes[0]){
                         jsonClient["name_mod"] = modulos[3];
                    }
                   jsonClient[this.roles.permisos.clientes[c]] = true;
                }

                for(var i=1; i < this.roles.permisos.ingresos.length; i++){
                    if(this.roles.permisos.ingresos[0]){
                         jsonIngreso["name_mod"] = modulos[4];
                    }
                   jsonIngreso[this.roles.permisos.ingresos[i]] = true;
                }

                for(var fl=1; fl < this.roles.permisos.flujo.length; fl++){
                    if(this.roles.permisos.flujo[0]){
                         jsonFlujo["name_mod"] = modulos[5];
                    }
                    jsonFlujo[this.roles.permisos.flujo[fl]] = true;
                }

                for(var al=1; al < this.roles.permisos.almacen.length; al++){
                    if(this.roles.permisos.almacen[0]){
                         jsonAlmacen["name_mod"] = modulos[6];
                    }
                   jsonAlmacen[this.roles.permisos.almacen[al]] = true;
                }

                for(var sis=1; sis < this.roles.permisos.sistemas.length; sis++){
                    if(this.roles.permisos.sistemas[0]){
                         jsonSistem["name_mod"] = modulos[7];
                    }
                   jsonSistem[this.roles.permisos.sistemas[sis]] = true;
                }

                for(var so=1; so < this.roles.permisos.soporte.length; so++){
                    if(this.roles.permisos.soporte[0]){
                         jsonSoport["name_mod"] = modulos[8];
                    }
                   jsonSoport[this.roles.permisos.soporte[so]] = true;
                }

                for(var veh=1; veh < this.roles.permisos.vehiculos.length; veh++){
                    if(this.roles.permisos.vehiculos[0]){
                         jsonVehiculo["name_mod"] = modulos[9];
                    }
                    jsonVehiculo[this.roles.permisos.vehiculos[veh]] = true;
                }

                for(var re=1; re < this.roles.permisos.recursos.length; re++){
                    if(this.roles.permisos.recursos[0]){
                         jsonRecursos["name_mod"] = modulos[10];
                    }
                   jsonRecursos[this.roles.permisos.recursos[re]] = true;
                }

                for(var au=1; au < this.roles.permisos.autorizacion.length; au++){
                    if(this.roles.permisos.autorizacion[0]){
                         jsonAutorizacion["name_mod"] = modulos[11];
                    }
                   jsonAutorizacion[this.roles.permisos.autorizacion[au]] = true;
                }

                for(var an=1; an < this.roles.permisos.analisis.length; an++){
                    if(this.roles.permisos.analisis[0]){
                         jsonAnalisis["name_mod"] = modulos[12];
                    }
                   jsonAnalisis[this.roles.permisos.analisis[an]] = true;
                }
                
               
               
               listapermisos = [].concat(jsonAjustes,jsonCompras, jsonProyect, jsonClient, jsonIngreso, jsonFlujo, jsonAlmacen, jsonSistem, jsonSoport, jsonVehiculo, jsonRecursos, jsonAutorizacion, jsonAnalisis);
               var obj_permisos   = [];
                //console.log('Lista permisos',listapermisos);
               for(var w = 0; w < listapermisos.length; w++){
                   if(Object.keys(listapermisos[w]).length != 0){
                        obj_permisos = obj_permisos.concat(listapermisos[w]);
                   }
               }

               axios.post('/api/catalogs/add/rol/', {descripcion: this.roles.descripcion, permisos: obj_permisos}).then(response => {
                        if(response.data.message === "success"){
                            this.$swal({
                                icon: 'success',
                                title: 'Se ha creado un nuevo rol!',
                                text: "Dirígigete a la lista de roles para ver el agregado!",
                                padding: '2em'
                            });
                        }else{
                            this.$swal({
                                icon: 'error',
                                title: 'Vaya, se produjo un error en el proceso!',
                                text: 'Intente más tarde!',
                                padding: '2em'
                            });
                        }
                }).catch((errors) => {
                     console.log(errors);
                     //console.log('code', errors.response.status)
                     if(errors.response.status === 401){
                         this.error = errors.response.data.error;
                         console.log(this.error)
                     }
                     /*this.$swal({
                        icon: 'error',
                        title: 'Opss, hay errores en el formulario!',
                        text: 'Intente de nuevo!',
                        padding: '2em'
                    });*/
                })
            }, 
        }
    };
</script>
