import Vue from 'vue'
import Router from 'vue-router'
//test
import index from '../page/home'
import test from '../test/test.vue'
import bloglist from '../page/blog/list.vue'
import posts from '../page/blog/posts.vue'
import post from '../page/blog/post.vue'
import login from '../page/admin/login.vue'
import adminIndex from '../page/admin/adminIndex.vue'
import mIndex from '../page/admin/index.vue'
import mPosts from '../page/admin/posts.vue'
import mEdit from '../page/admin/postEdit.vue'
import upload from '../components/upload.vue'
import roll from '../page/admin/Roll.vue'

Vue.use(Router)

export default new Router({
    routes: [{
        path: '/test/test',
        name: 'te',
        component: test
    }, {
        path: '/index',
        name: 'index',
        component: index
    }, {
        path: '/blog',
        name: 'blog',
        component: bloglist,
        children: [{
            path: '',
            component: posts
        }, {
            path: 'post',
            component: post
        }
        ]
    }, {
        path: '/admin/login',
        name: 'login',
        component: login
    }, {
        path: '/admin/',
        name: 'adminIndex',
        meta: {
            admin: true
        },
        component: adminIndex,
        children: [
            {
                path: '',
                component: mIndex
            }, {
                path: 'posts',
                component: mPosts
            }, {
                path: 'edit',
                component: mEdit
            }, {
                path: 'roll',
                component: roll
            }]
    }, {
        path: '/test/upload',
        component: upload
    }]
})