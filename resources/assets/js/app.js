
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
require('moment');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from 'vue-router'
import routes from './routes'
import store from './main'

Vue.component('example', require('./components/Example.vue'));
Vue.component('VcClients', require('./components/clients.vue'));
Vue.component('my-vuetable', require('./components/table/MyVuetable.vue'));
Vue.component('my-post', require('./components/posts/index.vue'));

Vue.use(VueRouter);


const app = new Vue({
    el: '#app',
    store
});
