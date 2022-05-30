<template>
    <div class="layout-px-spacing">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Roles</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Edición</span></li>
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
                                            <h4>Editar rol</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="mt-0" ref="formadd" @submit.prevent="EditRol">
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
                                                    <b-button type="submit" variant="primary" block class="mt-2 mb-2">Actualizar rol</b-button>
                                                </b-form-group>
                                            </b-form-row>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-12">
                                                <p class="mb-4">Seleccione los permisos para este rol</p>
                                            </b-form-group>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Ajustes generales</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ajustes.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ajustes.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ajustes.actualizar">Editar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ajustes.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ajustes.submenus">Sub menús</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ajustes.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Ordenes Compras</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.compras.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.compras.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.compras.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.compras.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.compras.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Proyectos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.proyectos.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.proyectos.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.proyectos.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.proyectos.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.proyectos.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Clientes</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.clientes.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.clientes.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.clientes.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.clientes.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.clientes.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Ingresos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ingresos.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ingresos.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ingresos.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ingresos.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.ingresos.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Flujo</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success"  v-model="roles.permisos.flujo.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success"  v-model="roles.permisos.flujo.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success"  v-model="roles.permisos.flujo.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success"  v-model="roles.permisos.flujo.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success"  v-model="roles.permisos.flujo.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Almacén/Inventario</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.almacen.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.almacen.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.almacen.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.almacen.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.almacen.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Sistemas</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.sistemas.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.sistemas.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.sistemas.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.sistemas.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.sistemas.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                        </b-form-row>
                                        <b-form-row class="col-12">
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Soporte</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.soporte.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.soporte.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.soporte.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.soporte.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.soporte.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Vehículos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.vehiculos.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.vehiculos.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.vehiculos.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.vehiculos.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.vehiculos.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Recurso Humanos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.recursos.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.recursos.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.recursos.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.recursos.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.recursos.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Autorización</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.autorizacion.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.autorizacion.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.autorizacion.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.autorizacion.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.autorizacion.reportes">Reportes</b-checkbox>
                                            </b-form-group>
                                            <b-form-group class="col-lg-3 col-md-4 col-6">
                                                <h6><strong>Análisis de datos</strong></h6>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.analisis.crear">Ver módulo</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.analisis.crear">Crear</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.analisis.actualizar">actualizar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.analisis.eliminar">Eliminar</b-checkbox>
                                                <b-checkbox variant="success" class="checkbox-success" v-model="roles.permisos.analisis.reportes">Reportes</b-checkbox>
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
    import '@/assets/sass/components/custom-sweetalert.scss';
    import { required} from 'vuelidate/lib/validators';

    export default {
        metaInfo: { title: 'Edición roles y permisos' },
        /*components: {
            highlight
        },*/
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
                submitted: false,
                errors: []
            }
        },
        validations: {
            roles: {
                descripcion: {required}
            }
        },
        created(){
            axios.get(`/api/catalogs/edit/rol/${this.$route.params.id}`).then((response) =>{
                this.roles.descripcion = response.data.rol.descripcion;
                let permisosEdit = response.data.rol.permisos;
                
                for(var x=0; x < permisosEdit.length; x++){
                    if(permisosEdit[x].name_mod == 'Ajustes'){
                        this.roles.permisos.ajustes = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Compras'){
                        this.roles.permisos.compras = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Proyectos'){
                        this.roles.permisos.proyectos = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Clientes'){
                        this.roles.permisos.clientes = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Ingresos'){
                        this.roles.permisos.ingresos = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Flujo'){
                        this.roles.permisos.flujo = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Almacen'){
                        this.roles.permisos.almacen = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Sistemas'){
                        this.roles.permisos.sistemas = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Soporte'){
                        this.roles.permisos.soporte = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Vehiculos'){
                        this.roles.permisos.vehiculos = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Recursos'){
                        this.roles.permisos.recursos = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Autorizacion'){
                        this.roles.permisos.autorizacion = response.data.rol.permisos[x];
                    }else if(permisosEdit[x].name_mod == 'Analisis'){
                        this.roles.permisos.analisis = response.data.rol.permisos[x];
                    }
                }
           })
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
            async EditRol(){
                this.submitted = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return; 
                }  

                var jsonAjustes = {}; var jsonProyect   = {}; var jsonCompras = {}; var jsonClient = {}; var jsonIngreso = {}; var jsonFlujo = {}; var jsonAlmacen = {}; var jsonSistem = {}; var jsonSoport = {}; var jsonVehiculo = {}; var jsonRecursos = {}; var jsonAutorizacion = {}; var jsonAnalisis = {};
                var listapermisos = [];
                var obj_permisos   = [];

                jsonAjustes = Object.assign({},this.roles.permisos.ajustes);
                jsonCompras = Object.assign({},this.roles.permisos.compras);
                jsonProyect = Object.assign({},this.roles.permisos.proyectos);
                jsonClient = Object.assign({},this.roles.permisos.clientes);
                jsonIngreso = Object.assign({},this.roles.permisos.ingresos);
                jsonFlujo = Object.assign({},this.roles.permisos.flujo);
                jsonAlmacen = Object.assign({},this.roles.permisos.almacen);
                jsonSistem = Object.assign({},this.roles.permisos.sistemas);
                jsonSoport = Object.assign({},this.roles.permisos.soporte);
                jsonVehiculo = Object.assign({},this.roles.permisos.vehiculos);
                jsonRecursos = Object.assign({},this.roles.permisos.recursos);
                jsonAutorizacion = Object.assign({},this.roles.permisos.autorizacion);
                jsonAnalisis = Object.assign({},this.roles.permisos.analisis);

                  if(!jsonAjustes.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonAjustes).length != 0){
                        jsonAjustes.name_mod = "Ajustes";
                    }
                }

                if(!jsonCompras.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonCompras).length != 0){
                        jsonCompras.name_mod = "Compras";
                    }
                }
                
                if(!jsonProyect.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonProyect).length != 0){
                        jsonProyect.name_mod = "Proyectos";
                    }
                }

                if(!jsonClient.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonClient).length != 0){
                        jsonClient.name_mod = "Clientes";
                    }
                }

                if(!jsonIngreso.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonIngreso).length != 0){
                        jsonIngreso.name_mod = "Ingresos";
                    }
                }

                if(!jsonFlujo.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonFlujo).length != 0){
                        jsonFlujo.name_mod = "Flujo";
                    }
                }

                if(!jsonAlmacen.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonAlmacen).length != 0){
                        jsonAlmacen.name_mod = "Almacen";
                    }
                }
                
                if(!jsonSistem.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonSistem).length != 0){
                        jsonSistem.name_mod = "Sistemas";
                    }
                }

                if(!jsonSoport.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonSoport).length != 0){
                        jsonSoport.name_mod = "Soporte";
                    }
                }

                if(!jsonVehiculo.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonAutorizacion).length != 0){
                        jsonVehiculo.name_mod = "Vehiculos";
                    }
                }

                if(!jsonRecursos.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonRecursos).length != 0){
                        jsonRecursos.name_mod = "Recursos";
                    }
                }

                if(!jsonAutorizacion.hasOwnProperty('name_mod')){
                    if(Object.keys(jsonAutorizacion).length != 0){
                        jsonAutorizacion.name_mod = "Autorizacion";
                    }
                }

                if(!jsonAnalisis.hasOwnProperty('name_mod')){
                     if(Object.keys(jsonAnalisis).length != 0){
                         jsonAnalisis.name_mod = "Analisis";
                     }
                }
                
               listapermisos = [].concat(jsonAjustes, jsonCompras, jsonProyect, jsonClient, jsonIngreso, jsonFlujo, jsonAlmacen, jsonSistem, jsonSoport, jsonVehiculo, jsonRecursos, jsonAutorizacion, jsonAnalisis);
              for(var w = 0; w < listapermisos.length; w++){
                   if(Object.keys(listapermisos[w]).length != 0){
                        if(listapermisos[w].crear === true || listapermisos[w].eliminar === true  || listapermisos[w].reportes === true || listapermisos[w].actualizar === true || listapermisos[w].submenus === true){
                            console.log('Objeto no falso ', w);
                            obj_permisos = obj_permisos.concat(listapermisos[w]);
                        }
                   }
                }

               // console.log('Lista editado',obj_permisos);
                axios.post(`/api/catalogs/update/rol/${this.$route.params.id}`, {descripcion: this.roles.descripcion, permisos: obj_permisos}).then(response => {
                        if(response.data.message === "success"){
                            this.$swal({
                                icon: 'success',
                                title: 'Se ha actualizado los permisos con éxito!',
                                text: "Dirígigete a la lista de roles para ver la actualización!",
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
                    this.$swal({
                        icon: 'error',
                        title: 'Opss, hay errores en el formulario!',
                        text: 'Intente de nuevo!',
                        padding: '2em'
                    });
                })
            }, 
        }
    };
</script>
