import Vue from 'vue';
import VueRouter from 'vue-router';
import Dashboard from '../views/dashboard.vue';
import Inicio from '../views/auth/login.vue';
import Login from '../views/auth/login.vue';
import store from '../store';
import axios from 'axios';

Vue.use(VueRouter);

const routes = [
    { 
        path: '/',
        component: Login,
        name: 'login',
        meta: { authRequired: false }
    },
    { 
        path: '/permisos',
        name: 'dev',
        meta: { authRequired: false }
    },
    /*{ 
        path: '/login',
        component: Login,
        name: 'login',
        meta: { authRequired: false }
    },*/

    //dashboard
    {
        path: '/dashboard',  
        component: Dashboard ,
        name: 'dashboard',
        meta: { authRequired: true }
    },

    //Configuración General del sistema
    {
        path: '/general/usuarios',
        name: 'users',
        component: () => import(/* webpackChunkName: "components-users" */ '../views/config_general/users.vue'),
        meta: { authRequired: true }
    },
    {
        path: '/config/security',
        name: 'security',
        component: () => import(/* webpackChunkName: "components-security" */ '../views/config_general/security.vue')
    },
    {
        path: '/config/catalogs',
        name: 'catalogs',
        component: () => import(/* webpackChunkName: "components-catalogs" */ '../views/config_general/catalogs.vue')
    },
    {
        path: '/config/access',
        name: 'access',
        component: () => import(/* webpackChunkName: "components-access" */ '../views/config_general/access.vue')
    },

    //components
    {
        path: '/components/tabs',
        name: 'tabs',
        component: () => import(/* webpackChunkName: "components-tabs" */ '../views/components/tabs.vue')
    },
    {
        path: '/components/modals',
        name: 'modals',
        component: () => import(/* webpackChunkName: "components-modals" */ '../views/components/modals.vue')
    },
    {
        path: '/components/notifications',
        name: 'notifications',
        component: () => import(/* webpackChunkName: "components-notifications" */ '../views/components/toast.vue')
    },
    {
        path: '/components/sweetalert',
        name: 'sweetalert',
        component: () => import(/* webpackChunkName: "components-sweetalert" */ '../views/components/sweetalert.vue')
    },

    //pages
    {
        path: '/pages/helpdesk',
        name: 'helpdesk',
        component: () => import(/* webpackChunkName: "pages-helpdesk" */ '../views/pages/helpdesk.vue')
    },
    {
        path: '/pages/error404',
        name: 'error404',
        component: () => import(/* webpackChunkName: "pages-error404" */ '../views/pages/error404.vue'),
       
    },
    {
        path: '/pages/error500',
        name: 'error500',
        component: () => import(/* webpackChunkName: "pages-error500" */ '../views/pages/error500.vue'),
       
    },
    {
        path: '/pages/error503',
        name: 'error503',
        component: () => import(/* webpackChunkName: "pages-error503" */ '../views/pages/error503.vue'),
        
    },
    {
        path: '/pages/sample',
        name: 'sample',
        component: () => import(/* webpackChunkName: "pages-sample" */ '../views/pages/sample.vue')
    },

    {
        path: '/auth/pass-recovery',
        name: 'pass-recovery',
        component: () => import(/* webpackChunkName: "auth-pass-recovery" */ '../views/auth/pass_recovery.vue'),
      
    },

    //elements
    {
        path: '/elements/alerts',
        name: 'alerts',
        component: () => import(/* webpackChunkName: "elements-alerts" */ '../views/elements/alerts.vue')
    },
    {
        path: '/elements/buttons',
        name: 'buttons',
        component: () => import(/* webpackChunkName: "elements-buttons" */ '../views/elements/buttons.vue')
    },
    {
        path: '/elements/tooltips',
        name: 'tooltips',
        component: () => import(/* webpackChunkName: "elements-tooltips" */ '../views/elements/tooltips.vue')
    },

    //tables
    {
        path: '/tables',
        name: 'tables',
        component: () => import(/* webpackChunkName: "tables" */ '../views/tables.vue')
    },

    //users
    {
        path: '/users/profile',
        name: 'profile',
        component: () => import(/* webpackChunkName: "users-profile" */ '../views/users/profile.vue')
    },
    {
        path: '/users/account-setting',
        name: 'account-setting',
        component: () => import(/* webpackChunkName: "users-account-setting" */ '../views/users/account_setting.vue')
    },


    //charts
    {
        path: '/charts/apex-chart',
        name: 'apex-chart',
        component: () => import(/* webpackChunkName: "charts-apex-chart" */ '../views/charts/apex_chart.vue')
    },

    //forms
    {
        path: '/forms/basic',
        name: 'basic',
        component: () => import(/* webpackChunkName: "forms-basic" */ '../views/forms/basic.vue')
    },
    {
        path: '/forms/input-group',
        name: 'input-group',
        component: () => import(/* webpackChunkName: "forms-input-group" */ '../views/forms/input_group.vue')
    },
    {
        path: '/forms/layouts',
        name: 'layouts',
        component: () => import(/* webpackChunkName: "forms-layouts" */ '../views/forms/layouts.vue')
    },
    {
        path: '/forms/validation',
        name: 'validation',
        component: () => import(/* webpackChunkName: "forms-validation" */ '../views/forms/validation.vue')
    },
    {
        path: '/forms/checkbox-radio',
        name: 'checkbox-radio',
        component: () => import(/* webpackChunkName: "forms-checkbox-radio" */ '../views/forms/checkbox_radio.vue')
    },
    {
        path: '/forms/switches',
        name: 'switches',
        component: () => import(/* webpackChunkName: "forms-switches" */ '../views/forms/switches.vue')
    },
    {
        path: '/forms/file-upload',
        name: 'file-upload',
        component: () => import(/* webpackChunkName: "forms-file-upload" */ '../views/forms/fileupload.vue')
    },
    {
        path: '/forms/clipboard',
        name: 'clipboard',
        component: () => import(/* webpackChunkName: "forms-clipboard" */ '../views/forms/clipboard.vue')
    },
    {
        path: '/forms/date-picker',
        name: 'date-picker',
        component: () => import(/* webpackChunkName: "forms-date-picker" */ '../views/forms/date_range_picker.vue')
    },
    {
        path: '/forms/select2',
        name: 'select2',
        component: () => import(/* webpackChunkName: "forms-select2" */ '../views/forms/select2.vue')
    },

    //apps
    {
        path: '/apps/mailbox',
        name: 'mailbox',
        component: () => import(/* webpackChunkName: "apps-mailbox" */ '../views/apps/mailbox.vue')
    },
    {
        path: '/apps/todo-list',
        name: 'todo-list',
        component: () => import(/* webpackChunkName: "apps-todo-list" */ '../views/apps/todo_list.vue')
    },
    {
        path: '/apps/contacts',
        name: 'contacts',
        component: () => import(/* webpackChunkName: "apps-contacts" */ '../views/apps/contacts.vue')
    },
    {
        path: '/apps/calendar',
        name: 'calendar',
        component: () => import(/* webpackChunkName: "apps-calendar" */ '../views/apps/calendar.vue')
    },
    {
        path: '/apps/invoice/list',
        name: 'invoice-list',
        component: () => import(/* webpackChunkName: "apps-invoice-list" */ '../views/apps/invoice/list.vue')
    },
    {
        path: '/apps/invoice/preview',
        name: 'invoice-preview',
        component: () => import(/* webpackChunkName: "apps-invoice-preview" */ '../views/apps/invoice/preview.vue')
    },
    {
        path: '/apps/invoice/add',
        name: 'invoice-add',
        component: () => import(/* webpackChunkName: "apps-invoice-add" */ '../views/apps/invoice/add.vue')
    },
    {
        path: '/apps/invoice/edit',
        name: 'invoice-edit',
        component: () => import(/* webpackChunkName: "apps-invoice-edit" */ '../views/apps/invoice/edit.vue')
    },

    //tables
    {
        path: '/tables/multi-column',
        name: 'multi-column',
        component: () => import(/* webpackChunkName: "tables-multi-column" */ '../views/tables/multi_column.vue')
    },
    {
        path: '/tables/multiple-tables',
        name: 'multiple-tables',
        component: () => import(/* webpackChunkName: "tables-multiple-tables" */ '../views/tables/multiple_tables.vue')
    },
    {
        path: '/tables/alt-pagination',
        name: 'alt-pagination',
        component: () => import(/* webpackChunkName: "tables-alt-pagination" */ '../views/tables/alt_pagination.vue')
    },
    {
        path: '/tables/custom',
        name: 'custom',
        component: () => import(/* webpackChunkName: "tables-custom" */ '../views/tables/custom.vue')
    },
    {
        path: '/tables/export',
        name: 'export',
        component: () => import(/* webpackChunkName: "tables-export" */ '../views/tables/export.vue')
    }    
];

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { x: 0, y: 0 };
        }
    }
});

function loggedIn(){
    return localStorage.getItem('uuid');
}

router.beforeEach((to, from, next) => {
     //un usuario autenticado no puede ver login de nuevo
    if(to.path == '/'){
        store.commit('setLayout', 'auth');
    }else{
        store.commit('setLayout', 'app');
    }

    if (to.name === 'login' && localStorage.getItem("uuid")){
        store.commit('setLayout', 'app');
        router.push({
          name: 'dashboard'
        })
    } 
    else if(to.meta.authRequired) { //Las rutas necesitan authenticarse
        if (!localStorage.getItem("uuid")) { //Si no existe token mandamos a login
         router.push({
            name: 'login'
          })
        }
    }
    
    next(true)

});


export default router;
