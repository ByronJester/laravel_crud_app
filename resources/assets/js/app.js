
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */ 

require('./bootstrap');

const axios = require('axios');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('users-list', require('./components/Users.vue'));
Vue.component('admin-login', require('./components/Admins.vue'));

const getUserInfo = new Vue({
    el: '#all-users'
});




