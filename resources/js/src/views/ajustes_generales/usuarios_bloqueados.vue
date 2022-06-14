<template>
    <div class="layout-px-spacing">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Ajustes generales</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Usuarios loqueados</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </portal>
        
        <div class="seperator-header layout-top-spacing text-right">
            <b-btn class="btn btn-primary" @click="btn_config">Configurar tiempo máx. de bloqueo</b-btn>
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
                                <a  size="sm" variant="primary" @click="btn_activar(row.item)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </a>
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
                    <b-modal hide-footer ref="configTiempo" title="Configuración número de intentos de sesión y tiempo máximo de bloqueo" size="lg" class="modal">
                        <form class="mt-0" ref="formconfig" @submit.prevent="updateconfig">
                            <b-form-row class="col-12">
                                <b-form-group class="col-md-6" label="Tiempo máximo para el número de intentos (en minutos):">
                                    <b-input type="text" placeholder="Tiempo máximo en minutos" v-model="config.tiempomax" :class="{ 'is-invalid': submitted && $v.config.tiempomax.$error }"></b-input>
                                        <div v-if="submitted && $v.config.tiempomax.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.config.tiempomax.required">Este campo es requerido</span>
                                        </div>
                                        <span class="text-danger" v-if="errors.tiempomax">{{ errors.tiempomax[0] }}</span>
                                </b-form-group>
                                <b-form-group class="col-md-6" label="Número de intentos máximo antes de bloquear la cuenta: ">
                                    <b-input type="text" placeholder="Número de intentos" v-model="config.intentos" :class="{ 'is-invalid': submitted && $v.config.intentos.$error }"></b-input>
                                        <div v-if="submitted && $v.config.intentos.$error" class="invalid-feedback">
                                            <span class="text-danger" v-if="!$v.config.intentos.required">Este campo es requerido </span>
                                        </div>
                                        <span class="text-danger" v-if="errors.intentos">{{ errors.intentos[0] }}</span>
                                    </b-form-group>
                                </b-form-row>
                                <b-form-row class="col-12">
                                    <b-form-group class="col-md-6"></b-form-group>
                                    <b-form-group class="col-md-6">
                                        <b-button type="submit" variant="primary" block class="mt-2 mb-2">Actualizar ahora</b-button>
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

    export default {
        metaInfo: { title: 'Usuarios bloqueados' },
        data() {
            return {
                permisos: localStorage.getItem('data'),
                usuarioPuede: '',
                items: [],
                columns: [],
                table_option: { total_rows: 0, current_page: 1, page_size: 10, search_text: '' },
                meta: {}, 
                config: {intentos: '', tiempomax: ''},
                submitted: false,
                errors: []
            };
        },
        validations: {
            config:{
                tiempomax: {required},
                intentos: {required},
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
            this.Obtiene_usuarios_bloqueados(); 
            this.LlenaConfiguracion();
        },
        methods: {
            Obtiene_usuarios_bloqueados() {
                this.columns = [
                    { key: 'id', label: 'No', sortable: false },
                    { key: 'nombre', label: 'Nombre', sortable: false },
                    { key: 'apellidos', label: 'Apellidos', sortable: false },
                    { key: 'correo', label: 'Email', sortable: false },
                    { key: 'fecha_bloqueado', label: 'Fecha del bloqueo', sortable: false },
                    { key: 'action', label: 'Acciones', class: 'text-center' },
                ];

                 axios.get('/api/users/blocked').then((response) =>{
                    this.items = response.data.bloqueados;
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
            async btn_config() {
                this.$refs["configTiempo"].show();
            },
            async btn_activar(item) {
                console.log(item.id)
                this.$swal({
                        icon: 'warning',
                        title: '¿Estás seguro que desea desbloquear este usuario?',
                        showCancelButton: true,
                        confirmButtonText: 'Si, desbloquear',
                        padding: '2em'
                    }).then(result => {
                        axios.post(`/api/users/activate/${item.id}`).then(response => {
                            if(response.data.message === 'OK'){
                                this.Obtiene_usuarios_bloqueados();
                                this.$swal('Actualizado!', 'El usuario se activó correctamente.', 'success');
                            }        
                        }).catch((errors) =>{
                            if(errors.status === 501){
                                this.$swal('Opps!', 'No se pudo activar el usuario, intente más tarde', 'error');
                            }
                        })
                });
                
            },
            async LlenaConfiguracion(){
                axios.get('/api/users/intentos').then((response) =>{
                    console.log(response.data.intentos);
                    this.config = response.data.intentos;
                })
            },

            async updateconfig(){
                this.submitted = true;
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return; 
                }  
                axios.post(`/api/users/intentos/update/${this.config.id}`, this.config).then((response) =>{
                    console.log(response.data.message);
                    if(response.data.message === 'OK'){
                        this.$refs.formconfig.reset();
                        this.$refs["configTiempo"].hide();
                        this.$swal({
                            icon: 'success',
                            title: 'Se actualiazó correctamente el tiempo y el número de intentos!',
                            text: 'Consulte presionando nuevamente el botón de configuración',
                            padding: '2em'
                        });
                    }else{
                        this.$swal({
                            icon: 'error',
                            title: 'Oops, no se pudo actualizar la configguración!',
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
     
        }
    };
</script>
