<template>
    <v-container fluid fill-heigh>
        <v-toolbar>
            <v-toolbar-title>友情链接</v-toolbar-title>
        </v-toolbar>
        <v-card color="grey lighten-4" flat>
            <v-container grid-list-md>
                <v-layout row wrap>
                    <v-flex xs12 sm6>
                        <v-text-field box label="Name" v-model="name" :rules="rules" required></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                        <v-text-field box label="Url" v-model="url" :rules="rules" required></v-text-field>
                    </v-flex>
                </v-layout>
            </v-container>
            <v-card-actions>
                <v-btn flat @click="save">Save</v-btn>
            </v-card-actions>
        </v-card>
        <v-dialog v-model="dialog" persistent max-width="290">
            <v-card>
                <v-progress-circular indeterminate v-bind:size="50" v-bind:width="7" color="purple"
                                     v-show="loading"></v-progress-circular>
                <v-card-text >{{ this.text}}</v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat @click.native="dialog = false">确定</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script>
    import {baseUrl} from '../../config/env'

    export default {
        data: () => ({
            name: '',
            url: '',
            rules: [
                (v) => !!v || '不能空'
            ],
            text: '',
            loading: false,
            dialog: false
        }),
        methods: {
            async save() {
                this.text = '';
                this.dialog = true;
                this.loading = true;

                if ((!this.name || (!this.url))) {
                    this.loading = false;
                    this.success = true;
                    this.text = '请填写完成';
                    return;
                }
                let data = {
                    name: this.name,
                    url: this.url
                }

                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
                let status;
                await this.$http.post(baseUrl + '/api/roll/create', data, {headers: header}).then(res => {
                    status = res.body.errcode;
                })
                this.text = '上传成功';
                this.loading = false;
                this.success = true
                return
            }
        }

    }
</script>

<style lang="scss"></style>