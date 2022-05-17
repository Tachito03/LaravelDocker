<template>
    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        <nav ref="menu" id="sidebar">
            <div class="shadow-bottom"></div>

            <perfect-scrollbar class="list-unstyled menu-categories" tag="ul" :options="{ wheelSpeed: 0.5, swipeEasing: !0, minScrollbarLength: 40, maxScrollbarLength: 300, suppressScrollX: true }">
                <!--Empieza Ajustes Sistema-->
                <li class="menu" v-for="(opcion, i) in usuarioPuede" :key="i" v-if="opcion.nombre_modulo == 'ajustes' && opcion.lista">
                    <a href="#ajustes" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                            <span>{{ $t('General') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="ajustes" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link v-if="opcion.nombre_modulo == 'ajustes' && opcion.lista"  tag="li" to="/general/usuarios" @click.native="toggleMobileMenu" ><a>Gestion Usuarios</a></router-link>
                            <router-link tag="li" to="/config/security" @click.native="toggleMobileMenu"><a>Reglas de Seguridad</a></router-link>
                            <router-link tag="li" to="/config/catalogs" @click.native="toggleMobileMenu"><a>Catálogos Generales</a></router-link>
                            <router-link tag="li" to="/config/access" @click.native="toggleMobileMenu"><a>Registro de Acceso</a></router-link>
                        </ul>
                    </b-collapse>
                </li>
                <!-- Termina Modulo Ajustes-->
                
                <!--Modulo de compras-->
                <li class="menu" v-for="(opcion, i) in usuarioPuede" :key="i" v-if="opcion.nombre_modulo == 'compras' && opcion.ver">
                    <a href="#compras" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span>{{ $t('Compras') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="compras" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link v-if="opcion.nombre_modulo == 'compras' && opcion.reporte"  tag="li" to="/general/usuarios" @click.native="toggleMobileMenu" ><a>Gestion Usuarios</a></router-link>
                            <router-link tag="li" to="/config/security" @click.native="toggleMobileMenu"><a>Reglas de Seguridad</a></router-link>
                            <router-link tag="li" to="/config/catalogs" @click.native="toggleMobileMenu"><a>Catálogos Generales</a></router-link>
                            <router-link tag="li" to="/config/access" @click.native="toggleMobileMenu"><a>Registro de Acceso</a></router-link>
                        </ul>
                    </b-collapse>
                </li>
                <!-- Termina Compras-->
                <!--Modulo de proyectos-->
                <li class="menu" v-for="(opcion, i) in usuarioPuede" :key="i" v-if="opcion.nombre_modulo == 'proyectos' && opcion.ver">
                    <a href="#proyectos" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                            <span>{{ $t('Proyectos') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="proyectos" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link v-if="opcion.nombre_modulo == 'proyectos' && opcion.reporte"  tag="li" to="/general/usuarios" @click.native="toggleMobileMenu" ><a>Gestion Usuarios</a></router-link>
                            <router-link tag="li" to="/config/security" @click.native="toggleMobileMenu"><a>Reglas de Seguridad</a></router-link>
                            <router-link tag="li" to="/config/catalogs" @click.native="toggleMobileMenu"><a>Catálogos Generales</a></router-link>
                            <router-link tag="li" to="/config/access" @click.native="toggleMobileMenu"><a>Registro de Acceso</a></router-link>
                        </ul>
                    </b-collapse>
                </li>
                <!-- Termina Proyectos-->

                <li class="menu">
                    <a href="#dashboard" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-home"
                            >
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>{{ $t('dashboard') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="dashboard" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/" @click.native="toggleMobileMenu">
                                <a>{{ $t('sales') }}</a>
                            </router-link>
                            <router-link tag="li" to="/index2" @click.native="toggleMobileMenu">
                                <a>{{ $t('analytics') }}</a>
                            </router-link>
                        </ul>
                    </b-collapse>
                </li>
                <li class="menu">
                    <a href="#app" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-cpu"
                            >
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>{{ $t('apps') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="app" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/apps/mailbox" @click.native="toggleMobileMenu"><a>Mailbox</a></router-link>
                            <router-link tag="li" to="/apps/todo-list" @click.native="toggleMobileMenu"><a>Todo List</a></router-link>
                            <router-link tag="li" to="/apps/contacts" @click.native="toggleMobileMenu"><a>Contacts</a></router-link>
                            <li>
                                <a href="#appInvoice" v-b-toggle class="dropdown-toggle" @click.prevent>
                                    Invoice
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
                                        class="feather feather-chevron-right"
                                    >
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </a>
                                <b-collapse id="appInvoice">
                                    <ul class="collapse list-unstyled sub-submenu show" data-parent="#app">
                                        <router-link tag="li" to="/apps/invoice/list" @click.native="toggleMobileMenu"><a>List</a></router-link>
                                        <router-link tag="li" to="/apps/invoice/preview" @click.native="toggleMobileMenu"><a>Preview</a></router-link>
                                        <router-link tag="li" to="/apps/invoice/add" @click.native="toggleMobileMenu"><a>Add</a></router-link>
                                        <router-link tag="li" to="/apps/invoice/edit" @click.native="toggleMobileMenu"><a>Edit</a></router-link>
                                    </ul>
                                </b-collapse>
                            </li>
                            <router-link tag="li" to="/apps/calendar" @click.native="toggleMobileMenu"><a>Calendar</a></router-link>
                        </ul>
                    </b-collapse>
                </li>

                <li class="menu">
                    <a href="#components" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-box"
                            >
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>{{ $t('components') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="components" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/components/tabs" @click.native="toggleMobileMenu"><a>Tabs</a></router-link>
                            <router-link tag="li" to="/components/modals" @click.native="toggleMobileMenu"><a>Modals</a></router-link>
                            <router-link tag="li" to="/components/sweetalert" @click.native="toggleMobileMenu"><a>Sweet Alerts</a></router-link>
                            <router-link tag="li" to="/components/notifications" @click.native="toggleMobileMenu"><a>Notifications</a></router-link>
                        </ul>
                    </b-collapse>
                </li>

                <li class="menu">
                    <a href="#elements" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-zap"
                            >
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                            <span>{{ $t('elements') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="elements" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/elements/alerts" @click.native="toggleMobileMenu"><a>Alerts</a></router-link>
                            <router-link tag="li" to="/elements/buttons" @click.native="toggleMobileMenu"><a>Buttons</a></router-link>
                            <router-link tag="li" to="/elements/tooltips" @click.native="toggleMobileMenu"><a>Tooltips</a></router-link>
                        </ul>
                    </b-collapse>
                </li>

                <li class="menu">
                    <a href="#datatables" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-layers"
                            >
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                            <span>{{ $t('datatables') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="datatables" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/tables/multi-column" @click.native="toggleMobileMenu"><a>Multi Column</a></router-link>
                            <router-link tag="li" to="/tables/multiple-tables" @click.native="toggleMobileMenu"><a>Multiple Tables</a></router-link>
                            <router-link tag="li" to="/tables/alt-pagination" @click.native="toggleMobileMenu"><a>Alt. Pagination</a></router-link>
                            <router-link tag="li" to="/tables/custom" @click.native="toggleMobileMenu"><a>Custom</a></router-link>
                            <router-link tag="li" to="/tables/export" @click.native="toggleMobileMenu"><a>Export</a></router-link>
                           
                        </ul>
                    </b-collapse>
                </li>

                <li class="menu">
                    <a href="#forms" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-clipboard"
                            >
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                            <span>{{ $t('forms') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="forms" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/forms/basic" @click.native="toggleMobileMenu"><a>Basic</a></router-link>
                            <router-link tag="li" to="/forms/input-group" @click.native="toggleMobileMenu"><a>Input Group</a></router-link>
                            <router-link tag="li" to="/forms/layouts" @click.native="toggleMobileMenu"><a>Layouts</a></router-link>
                            <router-link tag="li" to="/forms/validation" @click.native="toggleMobileMenu"><a>Validation</a></router-link>
                            <router-link tag="li" to="/forms/select2" @click.native="toggleMobileMenu"><a>Select2</a></router-link>
                            <router-link tag="li" to="/forms/checkbox-radio" @click.native="toggleMobileMenu"><a>Checkbox &amp; Radio</a></router-link>
                            <router-link tag="li" to="/forms/switches" @click.native="toggleMobileMenu"><a>Switches</a></router-link>
                            <router-link tag="li" to="/forms/file-upload" @click.native="toggleMobileMenu"><a>File Upload</a></router-link>
                            <router-link tag="li" to="/forms/date-picker" @click.native="toggleMobileMenu"><a>Date &amp; Range Picker </a></router-link>
                            <router-link tag="li" to="/forms/clipboard" @click.native="toggleMobileMenu"><a>Clipboard</a></router-link>
                        </ul>
                    </b-collapse>
                </li>

                <li class="menu">
                    <a href="#users" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-users"
                            >
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>{{ $t('users') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="users" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/users/profile" @click.native="toggleMobileMenu"><a>Profile</a></router-link>
                            <router-link tag="li" to="/users/account-setting" @click.native="toggleMobileMenu"><a>Account Settings</a></router-link>
                        </ul>
                    </b-collapse>
                </li>

                <li class="menu">
                    <a href="#pages" v-b-toggle class="dropdown-toggle" @click.prevent>
                        <div class="">
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
                                class="feather feather-file"
                            >
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            <span>{{ $t('pages') }}</span>
                        </div>
                        <div>
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
                                class="feather feather-chevron-right"
                            >
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <b-collapse id="pages" accordion="menu">
                        <ul class="collapse submenu list-unstyled show">
                            <router-link tag="li" to="/pages/helpdesk" @click.native="toggleMobileMenu"><a>Helpdesk</a></router-link>
                            <li>
                                <a href="#pages-error" v-b-toggle class="dropdown-toggle" @click.prevent>
                                    Error
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
                                        class="feather feather-chevron-right"
                                    >
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </a>
                                <b-collapse id="pages-error">
                                    <ul class="collapse list-unstyled sub-submenu show" data-parent="#pages">
                                        <li @click="toggleMobileMenu"><a target="_blank" href="/pages/error404">404</a></li>
                                        <li @click="toggleMobileMenu"><a target="_blank" href="/pages/error500">500</a></li>
                                        <li @click="toggleMobileMenu"><a target="_blank" href="/pages/error503">503</a></li>
                                    </ul>
                                </b-collapse>
                            </li>
                            <router-link tag="li" to="/pages/sample" @click.native="toggleMobileMenu"><a>Sample Page</a></router-link>
                        </ul>
                    </b-collapse>
                </li>
                <router-link tag="li" to="/charts/apex-chart" class="menu" @click.native="toggleMobileMenu">
                    <a class="dropdown-toggle">
                        <div class="">
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
                                class="feather feather-pie-chart"
                            >
                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                            </svg>
                            <span>{{ $t('charts') }}</span>
                        </div>
                    </a>
                </router-link>

                <!--</ul>-->
            </perfect-scrollbar>
        </nav>
    </div>
    <!--  END SIDEBAR  -->
</template>
<script>
    export default {
        data() {
            return { 
                menu_collapse: 'dashboard',
                permisos: localStorage.getItem('data'),
                usuarioPuede: ''
            };

        },

        watch: {
            $route(to) {
                const selector = document.querySelector('#sidebar a[href="' + to.path + '"]');
                const ul = selector.closest('ul.collapse');
                if (!ul) {
                    const ele = document.querySelector('.dropdown-toggle.not-collapsed');
                    if (ele) {
                        ele.click();
                    }
                }
            }
        },

        mounted() {
            // default menu selection on refresh
            const selector = document.querySelector('#sidebar a[href="' + window.location.pathname + '"]');
            if (selector) {
                const ul = selector.closest('ul.collapse');
                if (ul) {
                    let ele = ul.closest('li.menu').querySelectorAll('.dropdown-toggle');
                    if (ele) {
                        ele = ele[0];
                        setTimeout(() => {
                            ele.click();
                        });
                    }
                } else {
                    selector.click();
                }
            }
            this.usuarioPuede = JSON.parse(this.permisos);
            //console.log('Log:', this.usuarioPuede)
        },

        methods: {
            toggleMobileMenu() {
                if (window.innerWidth < 991) {
                    this.$store.commit('toggleSideBar', true);
                }
            }
        }
    };
</script>
