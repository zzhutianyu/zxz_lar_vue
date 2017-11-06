/**
 * Created by zhuxingzhao on 2017/10/3.
 */
import Vue from 'vue'
import App from './App.vue'
import router from './route'
import KeenUi from 'keen-ui'
import 'keen-ui/dist/keen-ui.css'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.css'
// import Vuex from './store'
import './config/utils'

Vue.use(KeenUi);
Vue.use(Vuetify);

new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {App}
})