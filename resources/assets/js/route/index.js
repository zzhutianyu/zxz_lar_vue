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
Vue.use(Router)

export default new Router({
    routes: [{
        path: '/test/index',
        name: 'index',
        component: index
    }, {
        path: '/test/list',
        name: 'test',
        component: bloglist,
        children:[{
            path: 'posts',
            components:{
                fade: posts
            }
        }, {
            path: 'post',
            components: {
                fade: post
            }
        }
        ]
    }, {
        path: '/test/admin/login',
        name: 'login',
        component: login
    }, {
        path: '/test/admin/',
        name: 'adminIndex',
        component: adminIndex,
        children: [{
            path: 'index',
            component: mIndex
        }, {
            path: 'posts',
            component: mPosts
        }, {
            path: 'edit',
            component: mEdit
        }]
    }, {
        path: '/test/upload',
        component: upload
    }]
})