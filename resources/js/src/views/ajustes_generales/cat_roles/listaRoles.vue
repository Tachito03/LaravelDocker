<template>
    <div class="layout-px-spacing">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Ajustes generales</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Roles existentes</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </portal>
        
        <div class="seperator-header layout-top-spacing text-right">
            <router-link  to="/ajustes/rol/nuevo" ><b-btn class="btn btn-primary"> Agregar nuevo rol</b-btn></router-link>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="panel br-6 p-0">
                    <div class="custom-table">
                        <div class="table-header">
                            <div class="d-flex align-items-center">
                                <span>Resultado :</span>
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
                            <template #cell(action)="row">
                                <router-link :to="{name:'editarrol',params:{id:row.item.id}}" >
                                    <a size="sm" variant="primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>
                                </router-link>
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
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        metaInfo: { title: 'Roles y permisos' },
        data() {
            return {
                items: [],
                roles: [],
                columns: [],
                table_option: { total_rows: 0, current_page: 1, page_size: 10, search_text: '' },
                meta: {}
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
            this.ObtieneRoles();
        },
        methods: {
            ObtieneRoles() {
                this.columns = [
                    { key: 'id', label: 'No', sortable: false },
                    { key: 'descripcion', label: 'Descripción', sortable: false },
                    { key: 'modulos', label: 'Módulo (s) de control', sortable: false },
                    { key: 'created_at', label: 'Fecha creación', sortable: false },
                    { key: 'updated_at', label: 'Fecha modificación', sortable: false },
                    { key: 'action', label: 'Acciones', sortable: false },
                ];
                
                 axios.get('/api/catalogs/roles').then((response) =>{
                    this.roles = response.data.roles;
                    //console.log('roles bd', this.roles);
                    var extract_mod = [];
                    let data_rol = [];
                    var modulos = [];
                    var lista_roles = {};

                    for(var x=0; x < this.roles.length; x++ ){
                        for(var y = 0; y < this.roles[x].permisos.length; y++){
                           extract_mod[x] = extract_mod[x] + ', ' + this.roles[x].permisos[y].name_mod;
                        }
                    }

                    for(var i=0; i < extract_mod.length; i++){
                        modulos[i] = extract_mod[i].replace('undefined,', '');
                    }

                    for(var w=0; w < modulos.length; w++){
                        data_rol[w] = [];
                        data_rol[w]['id'] = this.roles[w].id;
                        data_rol[w]['descripcion'] = this.roles[w].descripcion;
                        data_rol[w]['created_at'] = this.roles[w].created_at;
                        data_rol[w]['updated_at'] = this.roles[w].updated_at;
                        data_rol[w]['modulos'] = modulos[w];  
                    }

                    this.items = data_rol;

                    this.table_option.total_rows = this.items.length;
                });
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

                var maxSize = 15;
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
            }
     
        }
    };
</script>
