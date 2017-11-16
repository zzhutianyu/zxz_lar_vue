import Vue from 'vue'
import {baseUrl, grantType, clientId, clientSecrte} from "../config/env";
import router from '../route'


export default {
    async login({commit}, da) {
           let _this = da._this;
           let tk = {
               username: da.email,
               password: da.pass,
               grant_type: grantType,
               client_id: clientId,
               client_secret: clientSecrte
           }
           let data = {};
           let token = await Vue.http.post('/oauth/token', tk).then(res => {
               data = res.data;
               _this = false;
               router.push({
                   path: '/admin'
               })

           })
           commit('SET_TOKEN', data.access_token);
    }
}
