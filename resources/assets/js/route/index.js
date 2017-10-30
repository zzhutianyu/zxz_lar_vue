import Vue from 'vue'
import Router from 'vue-router'
//test
import ex from '../components/Example.vue'
import header from '../components/header/header.vue'
import footer from '../components/footer/footer.vue'
import back from '../components/back.vue'
import index from '../page/home'
import test from '../test/test.vue'
Vue.use(Router)

export default new Router({
    routes: [{
        path: '/',
        name: 'Hello',
        component: ex
    }, {
        path: '/test/header',
        name: 'header',
        component: header
    }, {
        path: '/test/footer',
        name: 'footer',
        component: footer
    }, {
        path: '/test/back',
        name: 'back',
        component: back
    }, {
        path: '/test/index',
        name: 'index',
        component: index
    }, {
        path: '/test/test',
        name: 'test',
        component: test
    }
    ]
})