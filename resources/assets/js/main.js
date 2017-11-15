/**
 * Created by zhuxingzhao on 2017/10/3.
 */
import Vue from 'vue'
import App from './App.vue'
import router from './route'
import Vuetify from 'vuetify'
import Vr from 'vue-resource'
import 'vuetify/dist/vuetify.css'
// import Vuex from './store'
import './config/utils'
import store from './store'
import {getStore} from "./config/utils";

Vue.use(Vuetify);
Vue.use(Vr);
router.beforeEach((to, form, next) => {
    if (to.path == '/') {
        next('/index');
    }
    if (to.meta.admin) {
        if (localStorage.getItem('token')) {

        }
    } else {
        next();
    }
})
new Vue({
    el: '#app',
    router,
    store,
    template: '<App/>',
    components: {App}
})