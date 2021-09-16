/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import Form from 'vform'
import moment from 'moment'

window.Form = Form;
import VueRouter from 'vue-router'
Vue.use(VueRouter)


import VueGeolocation from 'vue-browser-geolocation'
Vue.use(VueGeolocation)

import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyBHE1Jj-tc9HbcHKSvxdWdSKZdNzRkENYs',
      libraries: 'places', // This is required if you use the Autocomplete plugin
      // OR: libraries: 'places,drawing'
      // OR: libraries: 'places,drawing,visualization'
      // (as you require)
   
      //// If you want to set the version, you can do so:
      // v: '3.26',
    },
})


import Vuex from 'vuex'
import storeVueX from './store/index'
Vue.use (Vuex)
const store = new Vuex.Store(storeVueX)


import VueChatScroll from 'vue-chat-scroll';

Vue.use(VueChatScroll);


import Gate from './Gate';
Vue.prototype.$gate = new Gate(window.user);

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })

import VueQrcode from 'vue-qrcode'
Vue.use(VueQrcode)


import VueHtmlToPaper from 'vue-html-to-paper';

const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
    'https://unpkg.com/kidlat-css/css/kidlat.css'
  ],
  timeout: 1000, // default timeout before the print window appears
  autoClose: true, // if false, the window will not close after printing
  windowTitle: window.document.title, // override the window title
}

Vue.use(VueHtmlToPaper, options);


import swal from 'sweetalert2'
import _ from 'lodash';
window.swal = swal;

const Toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
})
window.Toast = Toast;


window.Fire = new Vue();




const routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/employees', component: require('./components/Employee.vue').default },
    { path: '/newAci', component: require('./components/NewACI.vue').default },
    { path: '/aciNotices', component: require('./components/AciAlert.vue').default },
    { path: '/aceNotices', component: require('./components/AceAlert.vue').default },
    { path: '/customs', component: require('./components/CustomsConsultation.vue').default },
    { path: '/customsResponse', component: require('./components/CustomsConsultationResponse.vue').default },
    { path: '/customsAdminRequests', component: require('./components/CustomsRequests.vue').default },
    { path: '/customsAdminResponse', component: require('./components/CustomsResponse.vue').default },
    { path: '/newAce', component: require('./components/NewACE.vue').default },
    { path: '/inBond', component: require('./components/InBond.vue').default },
    { path: '/truck', component: require('./components/Trucks.vue').default },
    { path: '/track', component: require('./components/Tracking.vue').default },
    { path: '/trailer', component: require('./components/Trailers.vue').default },
    { path: '/driver', component: require('./components/Drivers.vue').default },
    { path: '/shipper', component: require('./components/Shippers.vue').default },
    { path: '/payment', component: require('./components/Payment.vue').default },
    { path: '/company', component: require('./components/Company.vue').default },
    { path: '/home', component: require('./components/home.vue').default },
    { path: '/dispatch', component: require('./components/Dispatch.vue').default },
    { path: '/cbsACI', component: require('./components/CBSA.vue').default },
    { path: '/cbsPARS', component: require('./components/PARS.vue').default },
    { path: '/cbpACE', component: require('./components/CBP.vue').default },
    { path: '/cbpPAPS', component: require('./components/PAPS.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default },

]

const router = new VueRouter({
    mode:'history',
    routes
})

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});
Vue.filter('myDate', function(created){
    return moment(created).format('MMMM Do YYYY')
})
Vue.filter('mytime', function(created){
    return moment(created).format('Do MMMM, h:mm a')
})
Vue.filter('todotime', function(created){
    return moment(created).format('MMMM Do, h:mm a');
})

Vue.component('pagination', require('laravel-vue-pagination'));

const VueUpload = require('vue-upload-component')
Vue.component('file-upload', VueUpload)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component(
    'newchart',
    require('./components/charts/newchart.vue').default
);
Vue.component(
    'oldchart',
    require('./components/charts/oldchart.vue').default
);
Vue.component(
    'newmap',
    require('./components/charts/newmap.vue').default
);

Vue.component(
    'not-found',
    require('./components/NotFound.vue').default
);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
    VueQrcode,
    data:{
        search: ''
    },
    methods:{
        searchit:_.debounce(() => {
            Fire.$emit('searching');

        },1000),
        
    }
});
