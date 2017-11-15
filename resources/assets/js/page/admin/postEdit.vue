<template>
    <v-container fluid fill-heigh>
        <v-toolbar>
            <v-toolbar-title>文章</v-toolbar-title>
        </v-toolbar>
        <v-card color="grey lighten-4" flat>
            <v-container grid-list-md>
                <v-layout row wrap>
                    <v-flex xs12 sm6>
                        <v-text-field box label="Title" v-model="title" :rules="rules" required></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                        <v-text-field box label="Sub" v-model="sub" :rules="rules" required></v-text-field>
                    </v-flex>
                    <v-flex xs12>
                        <v-text-field
                                box
                                label="image url"
                                v-model="imageUrl"
                                persistent-hint
                                :rules="rules"
                                required></v-text-field>
                    </v-flex>
                    <v-flex xs12>
                        <v-text-field box multi-line label="content" v-model="content" :rules="rules" required></v-text-field>
                    </v-flex>
                    <v-flex xs6></v-flex>
                </v-layout>
            </v-container>
            <v-card-actions>
                <v-btn flat @click="test" >Save</v-btn>
                <v-btn
                        flat
                        color="primary"
                        @click="create()"

                >Create</v-btn>
            </v-card-actions>
        </v-card>
        <v-dialog v-model="dialog" persistent max-width="290">
            <v-card>
                <v-progress-circular indeterminate v-bind:size="50" v-bind:width="7" color="purple" v-show="loading"></v-progress-circular>
                <v-card-text v-show="success">{{ this.text}}</v-card-text>
                <v-card-actions v-show="success">
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat @click.native="dialog = false">确定</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script>
    import update from '../../components/upload.vue'
    import {baseUrl} from '../../config/env'

    export default {
        components: {
            update
        },
        data: () => ({
            title: '',
            sub: '',
            imageUrl: '',
            content: '',
            dialog: false,
            loading: false,
            success: false,
            rules: [
                (v) => !!v || '不能空'
            ],
            text: ''

        }),
        methods: {
            test() {
                console.log(this.title + this.sub + this.imageURL + this.content);
            },
           async create() {
                this.text = '';
                this.dialog = true;
                this.loading = true;
                if ((!this.title) || (!this.sub) || (!this.imageUrl) || (!this.content)) {
                    this.loading = false;
                    this.success = true;
                    this.text = '请填写完成';
                    return;
                }
                let data = {
                    title: this.title,
                    sub: this.sub,
                    imageUrl: this.imageUrl,
                    content: this.content,
                }

                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
                let status;
                await this.$http.post(baseUrl + '/api/post/create', data, {headers: header}).then(res => {
                    status = res.body.errcode;
                })
               this.text = '上传成功';
               this.loading = false;
               this.success = true;
               console.log(status);
           }
        }
    }
</script>