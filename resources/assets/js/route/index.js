import Vue from 'vue'
import Router from 'vue-router'
import ex from '../components/Example.vue'
Vue.use(Router)

export default new Router({
    routes: [{
        path: '/',
        name: 'Hello',
        component: ex
    }]
})