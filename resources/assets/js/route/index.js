import Vue from 'vue'
import Router from 'vue-router'
//test
import index from '../page/home'
import test from '../test/test.vue'
import bloglist from '../page/blog/list.vue'
import posts from '../page/blog/posts.vue'
import post from '../page/blog/post.vue'

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
    }]
})