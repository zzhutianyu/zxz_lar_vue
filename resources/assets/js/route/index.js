import Vue from 'vue'
import Router from 'vue-router'
//test
const index = r => require.ensure([], () => r(require('../page/home')), 'home');
const test = r => require.ensure([], () => r(require('../page/blog/list.vue')), 'test');
const bloglist = r => require.ensure([], () => r(require('../page/blog/list.vue')), 'bloglist');
const posts = r => require.ensure([], () => r(require('../page/blog/posts.vue')), 'posts');
const post = r => require.ensure([], () => r(require('../page/blog/post.vue')), 'post');
const login = r => require.ensure([], () => r(require('../page/admin/login.vue')), 'login');
const adminIndex = r => require.ensure([], () => r(require('../page/admin/adminIndex.vue')), 'adminIndex');
const mIndex = r => require.ensure([], () => r(require('../page/admin/index.vue')), 'mIndex');
const mPosts = r => require.ensure([], () => r(require('../page/admin/posts.vue')), 'mPosts');
const mEdit = r => require.ensure([], () => r(require('../page/admin/postEdit.vue')), 'mEdit');
const upload = r => require.ensure([], () => r(require('../components/upload.vue')), 'upload');
const roll = r => require.ensure([], () => r(require('../page/admin/Roll.vue')), 'roll');
const file = r => require.ensure([], () => r(require('../page/admin/file.vue')), 'file');

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
        path: '/login',
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
                component: mIndex,
                meta: {
                    admin: true
                }
            }, {
                path: 'posts',
                component: mPosts,
                meta: {
                    admin: true
                }
            }, {
                path: 'edit',
                component: mEdit,
                meta: {
                    admin: true
                }
            }, {
                path: 'roll',
                component: roll,
                meta: {
                    admin: true
                }
            }, {
                path: 'file',
                component: file,
                meta: {
                    admin: true
                }
            }]
    }, {
        path: '/test/upload',
        component: upload
    }]
})