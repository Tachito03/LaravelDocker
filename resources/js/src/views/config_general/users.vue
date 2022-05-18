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
        
        <div class="seperator-header layout-top-spacing text-right">
            <b-btn @click="btnNuevo()" class="btn btn-primary" >Nuevo usuario</b-btn>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="panel br-6 p-0">
                    <div class="custom-table">
                        <div class="table-header">
                            <div class="d-flex align-items-center">
                                <span>Results :</span>
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
                                <b-input v-model="table_option.search_text" size="sm" placeholder="Search..." />
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
                            <template #cell(action)="row">
                                <a size="sm" variant="primary" @click="btnEdit(row.item)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </a>
                                <a size="sm" variant="primary" @click="btnDelete(row.item)">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
                                </a>
                            </template>
                        </b-table>

                        <div class="table-footer">
                            <div class="dataTables_info">Showing {{ meta.total_items ? meta.start_index + 1 : 0 }} to {{ meta.end_index + 1 }} of {{ meta.total_items }}</div>
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
                    <!-- Modal Register-->
                    <b-modal  ref="modalAlta" title="Actualizar Usuario" size="lg">
                        <div class="panel-body">
                            <b-form @submit.prevent="agregarUsuario">
                                <b-form-group>
                                    <b-input type="nombre" placeholder="Nombre" v-model="usuarioAdd.nombre"></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="apellidos" placeholder="Apellidos" v-model="usuarioAdd.apellidos" ></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="correo" placeholder="Correo Electrónico" v-model="usuarioAdd.correo" ></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="password" placeholder="Nueva contraseña" v-model="usuarioAdd.contrasena" ></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="password" placeholder="Confirma la contraseña" v-model="usuarioAdd.contrasena_conf"></b-input>
                                </b-form-group>
                                <b-form-group label="Asignar un rol">
                                    <b-select value="Hola"  v-model="usuarioAdd.id_rol">
                                         <b-select-option :value="null">Selecciona un rol</b-select-option>
                                        <b-select-option v-for="(opciones, indexOpt) in selected.options" 
                                        :key="indexOpt" :value="opciones.id">
                                          {{ opciones.descripcion }}
                                        </b-select-option>
                                    </b-select>
                                </b-form-group>
                                    <b-button type="submit" variant="primary" class="mt-4">Actualizar</b-button>
                            </b-form>
                        </div>
                    </b-modal>
                    <!-- End Modal Register-->
                    <!-- Modal Editar-->
                    <b-modal  ref="modalEdita" title="Actualizar Usuario" size="lg">
                        <div class="panel-body">
                            <b-form @submit.prevent="UpdateUser">
                                <b-form-group>
                                    <b-input type="nombre" placeholder="Nombre" v-model="usuarios.nombre"></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="apellidos" placeholder="Apellidos" v-model="usuarios.apellidos" ></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="correo" placeholder="Correo Electrónico" v-model="usuarios.correo" ></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="password" placeholder="Nueva contraseña" ></b-input>
                                </b-form-group>
                                <b-form-group>
                                    <b-input type="password" placeholder="Confirma la contraseña" ></b-input>
                                </b-form-group>
                                <b-form-group label="Asignar un rol">
                                    <b-select value=""  v-model="selected.id_rol">
                                        <b-select-option v-for="(opciones, indexOpt) in selected.options" 
                                        :key="indexOpt" :value="opciones.id">
                                          {{ opciones.descripcion }}
                                        </b-select-option>
                                    </b-select>
                                </b-form-group>
                                    <b-button type="submit" variant="primary" class="mt-4">Actualizar</b-button>
                            </b-form>
                        </div>
                    </b-modal>
                    <!-- End Modal edita-->
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    import '@/assets/sass/scrollspyNav.scss';
    import '@/assets/sass/components/custom-sweetalert.scss';
    import '@/assets/sass/components/custom-modal.scss';

    export default {
        metaInfo: { title: 'Bootstrap Multiple Tables' },
        data() {
            return {
                //table 1
                items: [],
                columns: [],
                table_option: { total_rows: 0, current_page: 1, page_size: 10, search_text: '' },
                meta: {},
                usuarios: {},
                selected: {
                    id_rol: null,
                    selected: null,
                    options: []
                    },
                usuarioAdd: {
                    nombre: '',
                    apellidos: '',
                    correo: '',
                    contrasena: '',
                    contrasena_conf: '',
                    id_rol: ''
                }
            };
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
            this.dataTable();
            this.obtieneRoles();
        },
        methods: {
            async ObtieneListaUsuarios(){
                axios.get('/api/users/lista').then((response) =>{
                    this.items = response.data.list;
                })

            },
            dataTable() {
                this.columns = [
                    { key: 'id', label: 'No', sortable: true },
                    { key: 'nombre', label: 'Nombre', sortable: true },
                    { key: 'apellidos', label: 'Apellidos', sortable: true },
                    { key: 'correo', label: 'Email', sortable: true },
                    { key: 'rol', label: 'Rol', sortable: true },
                    { key: 'action', label: 'Acciones', class: 'text-center' },
                ];

                this.table_option.total_rows = this.items.length;
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
            async btnNuevo(){
                this.$refs["modalAlta"].show();
            },
            async btnEdit(item) {
                this.$refs["modalEdita"].show();
                this.usuarios = item;
            },
            async UpdateUser(){
                axios.post(`/api/users/update/${this.usuarios.id}`, this.usuarios).then((response) =>{
                    console.log('Data user: ', response);
                });
            },
            async agregarUsuario(){
                axios.post('/api/users/add', this.usuarioAdd).then((response) => {
                        console.log(response.data);
                        
                    }).catch((errors) =>{
                        this.errors = errors.response.data.errors;
                    })
            }, 
            async btnDelete(item) {
                //alert('ID: ' + item.id + ', Name: ' + item.nombre);
                
            },

            async obtieneRoles(){
                axios.get('/api/users/roles').then((response) =>{
                     this.selected.options = response.data.roles;
                });
            }
     
        }
    };
</script>
