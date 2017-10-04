/**
 * Created by zhuxingzhao on 2017/10/3.
 */
import Vue from 'vue'
import VueRouer from 'vue-router'
import App from './App.vue'
import routers from './route'
import Vuex from 'store'
import './config/rem'


Vue.use(Vuex)

const router = new VueRouter({
    routes,
    scrollBehavior (to, from, savedPostion) {
        if (savedPostion) {
            return savedPostion;
        }

        if (from.meta.keepAlive) {
            from.meta.savedPostion = document.body.scrollTop;
        }
        return {x: 0, y: to.meta.savedPostion || 0};
    }
})
new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {App}
})