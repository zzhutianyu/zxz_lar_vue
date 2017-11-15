import Vue from 'vue'
import {baseUrl, grantType, clientId, clientSecrte} from "../config/env";


export default {
    async login({commit}) {
           let tk = {
               username: '704735206@qq.com',
               password: 'sqqsqq520',
               grant_type: grantType,
               client_id: clientId,
               client_secret: clientSecrte

           }
           let data = {};
           let token = await Vue.http.post('/oauth/token', tk).then(res => {
               data = res.data;
           })
           commit('SET_TOKEN', data.access_token);
    }
}
