<template>
    <div class="layout-px-spacing">
        <portal to="breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">DataTables</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Custom</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </portal>

        <div class="seperator-header layout-top-spacing">
            <h4 class="">Gestión de usuarios</h4>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="panel p-0">
                    <div class="custom-table">
                        <div class="table-header">
                            <div class="d-flex align-items-center">
                                <span>Results :</span>
                                <!--<span class="ml-2">
                                    <b-select v-model="table_option.page_size" size="sm">
                                        <b-select-option value="5">5</b-select-option>
                                        <b-select-option value="10">10</b-select-option>
                                        <b-select-option value="20">20</b-select-option>
                                        <b-select-option value="50">50</b-select-option>
                                    </b-select>
                                </span>-->
                            </div>
                            <!--<div class="header-search">
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
                            </div>-->
                        </div>
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Foto</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(usuario, index) of usuarios">
                                    <td>{{ usuario.id }}</td>
                                    <td>{{ usuario.nombre }}</td>
                                    <td>{{ usuario.apellidos }}</td>
                                    <td>{{ usuario.foto }}</td>
                                    <td>{{ usuario.correo }}</td>
                                    <td>
                                        <div v-for="(opcion, i) in usuarioPuede" :key="i"  class="btn-group" role="group">
                                            <a v-if="opcion.nombre_modulo == 'ajustes' && opcion.eliminar"" class="btn btn-secondary btn-xs" title="Editar" @click="btnEditar(usuario.id)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>
                                            <a v-if="opcion.nombre_modulo == 'ajustes' && opcion.eliminar" class="btn btn-danger btn-xs" title="Eliminar" @click="btnEliminar(usuario.id)">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </a>
                                        </div>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .table3 .actions svg {
        padding: 2px;
    }
</style>
<script>
    import axios from 'axios';
    import '@/assets/sass/scrollspyNav.scss';
    import '@/assets/sass/components/custom-sweetalert.scss';
    import '@/assets/sass/components/custom-modal.scss';

    export default {
        metaInfo: { title: 'Gestión de usuarios - CyP' },
        data() {
            return {
                permisos: localStorage.getItem('data'),
                usuarioPuede: '',
                usuarios: [],
                perPage: 10,
                currentPage: 1,
                sortBy: "name",
                sortDesc: false,
                /* Number.MAX_SAFE_INTEGER = 9007199254740991 */
                pageOptions: [5, 10, 20, 50, {
                    value: Number.MAX_SAFE_INTEGER,
                    text: "show all"
                }],
                items: []
            };
        },

        mounted() {
            this.ObtieneUsuarios();
            this.usuarioPuede = JSON.parse(this.permisos);
            console.log(this.usuarioPuede);
        },
        methods: {
            async ObtieneUsuarios(){
                const res = await axios.get('/api/usuarios');
                this.usuarios = res.data;
                //console.log(res);
            },

            async btnEditar(id){

            },

            async btnEliminar(id){
                this.$swal({
                        icon: 'warning',
                        title: '¡Estás seguro que desea eliminar el usuario?',
                        text: "Este usuario ya no aparecerá en la lista!",
                        showCancelButton: true,
                        confirmButtonText: 'Si, eliminar',
                        padding: '2em'
                    }).then(result => {
                        if (result.value) {
                            axios.post(`/api/usuario/${id}`).then(response => {
                                this.ObtieneUsuarios();
                            })
                            this.$swal('Eliminado!', 'El usuario se eliminó.', 'success');
                        }
                });

                
            }
        }
    };
</script>
