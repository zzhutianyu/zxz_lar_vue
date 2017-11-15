/**
 * Created by zhuxingzhao on 2017/10/4.
 */
import Vue from 'vue'
import Vuex from 'vuex'
import mutations from './mutations'
import actions from './action'
import getters from './getters'

Vue.use(Vuex);

const state = {
      token: ''
}

export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations
})





