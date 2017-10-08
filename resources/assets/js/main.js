/**
 * Created by zhuxingzhao on 2017/10/3.
 */
import Vue from 'vue'
import App from './App.vue'
import router from './route'
// import Vuex from './store'
import './config/rem'
import Icon from 'vue-svg-icon'

Vue.use(Icon);

new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {App}
})