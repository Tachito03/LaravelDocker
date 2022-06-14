<template>
    <div class="layout-px-spacing">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Ajustes generales</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Gestión de usuarios</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </portal>
        
        <div v-for="(opcion, i) in usuarioPuede" :key="i"  class="seperator-header layout-top-spacing text-right">
            <b-btn v-if="opcion.name_mod == 'Ajustes' && opcion.crear" @click="btnNuevo" class="btn btn-primary" >Nuevo usuario</b-btn>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="panel br-6 p-0">
                    <div class="custom-table">
                        <div class="table-header">
                            <div class="d-flex align-items-center">
                                <span>Resultados :</span>
                                <span class="ml-2">
                                    <b-select v-model="table_option.page_size" class="h-auto">
                                        <b-select-option value="5">5</b-select-option>
                                        <b-select-option value="10">10</b-select-option>
                                        <b-select-option value="20">20</b-select-option>
                                        <b-select-option value="50">50</b-select-option>
                                    </b-select>
                                </span>
                            </div>
                            <div class="header-search">
                                <b-input v-model="table_option.search_text" size="sm" placeholder="Buscar..." />
                                <div class="search-image">
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
                                        class="feather feather-search"
                                    >
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <b-table
                            ref="basic_table"
                            responsive
                            :items="items"
                            :fields="columns"
                            :per-page="table_option.page_size"
                            :current-page="table_option.current_page"
                            :filter="table_option.search_text"
                            sort-by="name"
                            :show-empty="true"
                            @filtered="on_filtered"
                        >
                            <template #cell(salary)="row"> ${{ row.item.salary }} </template>
                            <template #cell(status)="row">
                                <div v-b-tooltip class="t-dot" :class="row.value.class" :title="row.value.tooltip"></div>

                            </template>
                            <template  #cell(action)="row">
                                <div v-for="(opcion, i) in usuarioPuede" :key="i" class="option-group">
                                    <a v-if="opcion.name_mod == 'Ajustes' && opcion.actualizar" size="sm" variant="primary" @click="btnEdit(row.item)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>
                                    <a v-if="opcion.name_mod == 'Ajustes' && opcion.eliminar" size="sm" variant="primary" @click="btnDelete(row.item)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
                                    </a>
                                </div>
                            </template>
                        </b-table>

                        <div class="table-footer">
                            <div class="dataTables_info">Mostrando {{ meta.total_items ? meta.start_index + 1 : 0 }} a {{ meta.end_index + 1 }} de {{ meta.total_items }}</div>
                            <div class="paginating-container pagination-solid flex-column align-items-right">
                                <b-pagination
                                    v-model="table_option.current_page"
                                    :total-rows="table_option.total_rows"
                                    :per-page="table_option.page_size"
                                    prev-text="Prev"
                                    next-text="Next"
                                    first-text="First"
                                    last-text="Last"
                                    first-class="first"
                                    prev-class="prev"
                                    next-class="next"
                                    last-class="last"
                                    class="rounded"
                                >
                                    <template #first-text>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                                        </svg>
                                    </template>
                                    <template #prev-text>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </template>
                                    <template #next-text>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </template>
                                    <template #last-text>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                        </svg>
                                    </template>
                                </b-pagination>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Nuevo-->
                    <b-modal hide-footer ref="AddModal" title="Nuevo usuario" size="lg" class="modal">
                        <form class="mt-0" ref="formadd" @submit.prevent="addUser">
                            <b-form-row class="col-12">
                                <b-form-group class="col-md-6" label="Nombre:">
                                    <b-input type="text" placeholder="Nombre" v-model="usuarioadd.nombre" :class="{ 'is-invalid': submitted && $v.usuarioadd.nombre.$error }"></b-input>
                                        <div v-if="submitted && $v.usuarioadd.nombre.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.usuarioadd.nombre.required">El nombre es obligatorio</span>
                                        </div>
                                        <span class="text-danger" v-if="errors.nombre">{{ errors.nombre[0] }}</span>
                                </b-form-group>
                                <b-form-group class="col-md-6" label="Apellidos: ">
                                    <b-input type="text" placeholder="Apellidos" v-model="usuarioadd.apellidos" :class="{ 'is-invalid': submitted && $v.usuarioadd.apellidos.$error }"></b-input>
                                        <div v-if="submitted && $v.usuarioadd.apellidos.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.usuarioadd.apellidos.required">Los apellidos son obligatorios</span>
                                        </div>
                                        <span class="text-danger" v-if="errors.apellidos">{{ errors.apellidos[0] }}</span>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row class="col-12">
                                    <b-form-group label="Correo eletrónico:" class="col-12">
                                        <b-input type="email" placeholder="Correo electrónico" v-model="usuarioadd.correo" :class="{ 'is-invalid': submitted && $v.usuarioadd.correo.$error }" ></b-input>
                                        <div v-if="submitted && $v.usuarioadd.correo.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.usuarioadd.correo.required">El correo es obligatorio</span>
                                            <span class="text-danger" v-if="!$v.usuarioadd.correo.email">El correo tiene formato incorrecto</span>
                                        </div>
                                         <span class="text-danger" v-if="errors.correo">{{ errors.correo[0] }}</span>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row class="col-12">
                                    <b-form-group class="col-md-6" label="Contraseña: ">
                                        <b-input type="password" placeholder="Contraseña" v-model="usuarioadd.contrasena" :class="{ 'is-invalid': submitted && $v.usuarioadd.contrasena.$error }"></b-input>
                                        <div v-if="submitted && $v.usuarioadd.contrasena.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.usuarioadd.contrasena.required">La contraseña es obligatoria</span>
                                            <span class="text-danger" v-if="!$v.usuarioadd.contrasena.minLength">Debe tener al menos 8 caracteres</span>
                                        </div>
                                        <span class="text-danger" v-if="errors.contrasena">{{ errors.contrasena[0] }}</span>
                                     </b-form-group>
                                        <b-form-group class="col-md-6" label="Confirmar contraseña: ">
                                            <b-input type="password" placeholder="Confirma tu contraseña" v-model="usuarioadd.contrasena_conf" :class="{ 'is-invalid': submitted && $v.usuarioadd.contrasena_conf.$error }"></b-input>
                                            <div v-if="submitted && $v.usuarioadd.contrasena_conf.$error" class="invalid-feedback">
                                                <span class="text-danger" v-if="!$v.usuarioadd.contrasena_conf.required">Es necesario confirmar la contraseña</span>
                                                <span class="text-danger" v-if="!$v.usuarioadd.contrasena_conf.minLength">Debe tener al menos 8 caracteres</span>
                                                <span class="text-danger" v-if="!$v.usuarioadd.contrasena_conf && !$v.usuarioadd.contrasena_conf.sameAsPassword">Las contraseñas no coinciden</span>
                                            </div>
                                            <span class="text-danger" v-if="errors.contrasena_conf">{{ errors.contrasena_conf[0] }}</span>
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
                                        <span class="text-danger" v-if="errors.id_rol">{{ errors.id_rol[0] }}</span>
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
                    <!-- end modal nuevo-->
                    <!-- Modal Editar-->
                    <b-modal hide-footer  ref="modalEdita" title="Actulización de información" size="lg">
                        <form class="mt-0" ref="formedit" @submit.prevent="updateUser">
                            <b-form-row class="col-12">
                                <b-form-group class="col-md-6" label="Nombre:">
                                    <b-input type="text" placeholder="Nombre" v-model="usuarioedit.nombre" :class="{ 'is-invalid': update && $v.usuarioedit.nombre.$error }"></b-input>
                                    <div v-if="update && $v.usuarioedit.nombre.$error" class="invalid-feedback">
                                        <span class="text-danger" v-if="!$v.usuarioedit.nombre.required">El nombre es obligatorio</span>
                                    </div>
                                    <span class="text-danger" v-if="errors_up.nombre">{{ errors_up.nombre[0] }}</span>
                                </b-form-group>
                                 <b-form-group class="col-md-6" label="Apellidos: ">
                                    <b-input type="text" placeholder="Apellidos" v-model="usuarioedit.apellidos" :class="{ 'is-invalid': update && $v.usuarioedit.apellidos.$error }"></b-input>
                                    <div v-if="update && $v.usuarioedit.apellidos.$error" class="invalid-feedback">
                                        <span class="text-danger" v-if="!$v.usuarioedit.apellidos.required">Los apellidos son obligatorios</span>
                                    </div>
                                    <span class="text-danger" v-if="errors_up.apellidos">{{ errors_up.apellidos[0] }}</span>
                                </b-form-group>
                            </b-form-row>
                            <b-form-row class="col-12">
                                <b-form-group label="Correo eletrónico:" class="col-12">
                                    <b-input type="email" placeholder="Correo electrónico" v-model="usuarioedit.correo" :class="{ 'is-invalid': update && $v.usuarioedit.correo.$error }" ></b-input>
                                    <div v-if="update && $v.usuarioedit.correo.$error" class="invalid-feedback">
                                        <span class="text-danger" v-if="!$v.usuarioedit.correo.required">El correo es obligatorio</span>
                                        <span class="text-danger" v-if="!$v.usuarioedit.correo.email">El correo tiene formato incorrecto</span>
                                    </div>
                                    <span class="text-danger" v-if="errors_up.correo">{{ errors_up.correo[0] }}</span>
                                </b-form-group>
                            </b-form-row>
                            <b-form-row class="col-12">
                                <b-form-group class="col-md-6" label="Nueva contraseña: ">
                                    <b-input type="password" placeholder="Nueva Contraseña" v-model="usuarioedit.contrasena" :class="{ 'is-invalid': update && $v.usuarioedit.contrasena.$error }"></b-input>
                                    <div v-if="update && $v.usuarioedit.contrasena.$error" class="invalid-feedback">
                                        <span class="text-danger" v-if="!$v.usuarioedit.contrasena.minLength">Debe tener al menos 8 caracteres</span>
                                    </div>
                                    <span class="text-danger" v-if="errors_up.contrasena">{{ errors_up.contrasena[0] }}</span>
                                </b-form-group>
                                 <b-form-group class="col-md-6" label="Confirmar contraseña: ">
                                    <b-input type="password" placeholder="Confirma tu contraseña" v-model="usuarioedit.contrasena_conf" :class="{ 'is-invalid': update && $v.usuarioedit.contrasena_conf.$error }"></b-input>
                                    <div v-if="update && $v.usuarioedit.contrasena_conf.$error" class="invalid-feedback">
                                        <span class="text-danger" v-if="!$v.usuarioedit.contrasena_conf.minLength">Debe tener al menos 8 caracteres</span>
                                        <span class="text-danger" v-if="!$v.usuarioedit.contrasena_conf && !$v.usuarioedit.contrasena_conf.sameAsPassword">Las contraseñas no coinciden</span>
                                    </div>
                                    <span class="text-danger" v-if="errors_up.contrasena_conf">{{ errors_up.contrasena_conf[0] }}</span>
                                </b-form-group>
                            </b-form-row>
                                <b-form-row class="col-12">
                                    <b-form-group class="col-md-6" label="Asignar Rol: ">
                                        <b-select value="" v-model="usuarioedit.id_rol" :class="{ 'is-invalid': update && $v.usuarioedit.id_rol.$error }"> 
                                            <b-select-option value="null">Seleccione un rol</b-select-option>
                                            <b-select-option v-for="(opciones, indexOpt) in selected.options" 
                                                :key="indexOpt" :value="opciones.id">
                                                {{ opciones.descripcion }}
                                            </b-select-option>
                                        </b-select>
                                        <div v-if="update && $v.usuarioedit.id_rol.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.usuarioedit.id_rol.required">Este campo es obligatorio</span>
                                        </div>
                                        <span class="text-danger" v-if="errors_up.id_rol">{{ errors_up.id_rol[0] }}</span>
                                    </b-form-group>
                                </b-form-row>
                            <b-form-row class="col-12">
                                <b-form-group class="col-md-6"></b-form-group>
                                <b-form-group class="col-md-6">
                                    <b-button type="submit" variant="primary" block class="mt-2 mb-2">Actualizar datos</b-button>
                                </b-form-group>
                            </b-form-row>
                            </form>
                    </b-modal>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import '@/assets/sass/components/custom-sweetalert.scss';
    import '@/assets/sass/components/custom-modal.scss';
    import { required, email, minLength,sameAs} from 'vuelidate/lib/validators';
    //import modal from '../../components/add-user.vue';

    export default {
        metaInfo: { title: 'Gestion de usuarios' },
        data() {
            return {
                permisos: localStorage.getItem('data'),
                usuarioPuede: '',
                items: [],
                columns: [],
                table_option: { total_rows: 0, current_page: 1, page_size: 10, search_text: '' },
                meta: {},
                selected: {
                    selected: null,
                    options: []
                    },
                usuarioedit: { nombre: '', apellidos: '', correo: '', contrasena: '', contrasena_conf: '', id_rol: null },
                usuarioadd: { nombre: '', apellidos: '', correo: '', contrasena: '', contrasena_conf: '', id_rol: null },
                update: false,
                submitted: false,
                errors: [],
                errors_up: []
            };
        },
        validations: {
            usuarioedit:{
                nombre: {required},
                apellidos: {required},
                correo: {required, email},
                contrasena: {minLength: minLength(8)},
                contrasena_conf: {sameAsPassword: sameAs('contrasena')},
                id_rol: {required}
            },
        },
        watch: {
            table_option: {
                handler: function() {
                    this.get_meta();
                },
                deep: true
            }
        },
        mounted() {
            this.ObtieneListaUsuarios(); 
            this.obtieneRoles();
            this.usuarioPuede = JSON.parse(this.permisos)
            console.log(this.usuarioPuede)
        },
        methods: {
            openModal(){
                this.$refs.modal.show()
            },
            ObtieneListaUsuarios() {
                this.columns = [
                    { key: 'id', label: 'No', sortable: false },
                    { key: 'nombre', label: 'Nombre', sortable: false },
                    { key: 'apellidos', label: 'Apellidos', sortable: false },
                    { key: 'correo', label: 'Email', sortable: false },
                    { key: 'rol', label: 'Rol', sortable: false },
                    { key: 'action', label: 'Acciones', class: 'text-center' },
                ];

                 axios.get('/api/users/lista').then((response) =>{
                    this.items = response.data.list;
                    this.table_option.total_rows = this.items.length;
                })
                
                this.get_meta();
            },
            on_filtered(filtered_items) {
                this.refresh_table(filtered_items.length);
            },
            refresh_table(total) {
                this.table_option.total_rows = total;
                this.table_option.currentPage = 1;
            },
            get_meta() {
                var startPage;
                var endPage;
                var totalPages = this.table_option.page_size < 1 ? 1 : Math.ceil(this.table_option.total_rows / this.table_option.page_size);
                totalPages = Math.max(totalPages || 0, 1);

                var maxSize = 5;
                var isMaxSized = typeof maxSize !== 'undefined' && maxSize < totalPages;
                if (isMaxSized) {
                    startPage = Math.max(this.table_option.current_page - Math.floor(maxSize / 2), 1);
                    endPage = startPage + maxSize - 1;

                    if (endPage > totalPages) {
                        endPage = totalPages;
                        startPage = endPage - maxSize + 1;
                    }
                } else {
                    startPage = 1;
                    endPage = totalPages;
                }
                let startIndex = (this.table_option.current_page - 1) * this.table_option.page_size;
                let endIndex = Math.min(startIndex + this.table_option.page_size - 1, this.table_option.total_rows - 1);

                var pages = Array.from(Array(endPage + 1 - startPage).keys()).map(i => startPage + i);
                this.meta = {
                    total_items: this.table_option.total_rows,
                    current_page: this.table_option.current_page,
                    page_size: this.table_option.page_size,
                    total_pages: totalPages,
                    start_page: startPage,
                    end_page: endPage,
                    start_index: startIndex,
                    end_index: endIndex,
                    pages: pages
                };
            },
             async btnNuevo() {
                this.$refs["AddModal"].show();
            },
            async btnEdit(item) {
                this.$refs["modalEdita"].show();
                this.usuarioedit = item;
            },
            async updateUser(){
                this.update = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return; 
                }  
                axios.post(`/api/users/update/${this.usuarioedit.id}`, this.usuarioedit).then((response) =>{
                    console.log(response.data.message);
                    if(response.data.message === 'OK'){
                        this.ObtieneListaUsuarios();
                        this.$refs.formedit.reset();
                        this.$refs["modalEdita"].hide();
                        this.$swal({
                            icon: 'success',
                            title: 'El registro se actualizó correctamente!',
                            padding: '2em'
                        });
                    }else{
                        this.$swal({
                            icon: 'error',
                            title: 'Oops, No se pudo guardar el registro!',
                            text: 'Intente de nuevo!',
                            padding: '2em'
                        });
                    }
                }).catch((errors) =>{
                    if(errors.response.status === 501){
                        this.$swal({
                            icon: 'error',
                            title: 'Oops, hubo un error en el proceso!',
                            text: 'Intente más tarde!',
                            padding: '2em'
                        });
                    }else if(errors.status === 401){
                        this.errors_up = errors.response.data.errors;
                    }
                    
                    console.log(errors);
                });
            },
            async addUser(){
                await axios.get('/sanctum/csrf-cookie');
                axios.post('/api/users/add', this.usuarioadd).then((response) => {
                    console.log(response);
                    if(response.data.message === 'OK'){
                        this.ObtieneListaUsuarios();
                        this.$refs.formadd.reset();
                        this.$refs["AddModal"].hide();
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
                    if(errors.response.status === 401){
                        this.errors = errors.response.data.errors;
                    }
                })
            },
            async btnDelete(item) {
                this.$swal({
                        icon: 'warning',
                        title: '¡Estás seguro que desea eliminar el usuario?',
                        text: "Este usuario ya no aparecerá en la lista!",
                        showCancelButton: true,
                        confirmButtonText: 'Si, eliminar',
                        padding: '2em'
                    }).then(result => {
                        axios.post(`/api/users/delete/${item.id}`).then(response => {
                            if(response.data.message === 'OK'){
                                this.ObtieneListaUsuarios();
                                this.$swal('Eliminado!', 'El usuario se eliminó correctamente.', 'success');
                            }        
                        }).catch((errors) =>{
                            if(errors.status === 501){
                                this.$swal('Opps!', 'No se pudo eliminar el registro.', 'error');
                            }
                        })
                            
                        
                });
                
            },

            async obtieneRoles(){
                axios.get('/api/users/roles').then((response) =>{
                     this.selected.options = response.data.roles;
                });
            }
     
        }
    };
</script>
