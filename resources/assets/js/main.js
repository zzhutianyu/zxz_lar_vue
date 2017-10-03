/**
 * Created by zhuxingzhao on 2017/10/3.
 */
import Vue from 'vue/dist/vue.js'
import App from './App.vue'
import router from './route'
import Vuex from 'vuex/dist/vuex.js'

Vue.use(Vuex)

new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {App}
})