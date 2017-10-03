import Vue from 'vue/dist/vue.js'
import Router from 'vue-router'
import ex from '../components/Example.vue'
Vue.use(Router)

export default new Router({
    routes: [{
        path: '/',
        name: 'Hello',
        components: ex
    }]
})