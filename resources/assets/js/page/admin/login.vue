<template>
    <v-app>
        <main>
            <v-content>
                <v-container>
                    <v-progress-linear v-bind:indeterminate="loading"></v-progress-linear>
                    <v-card>
                        <v-toolbar color="light-blue">
                            <v-toolbar-title>登录</v-toolbar-title>
                        </v-toolbar>
                        <v-from v-model="valid">
                            <v-text-field
                                    label="email"
                                    v-model="email"
                                    :rules="emailRules"
                                    required>
                            </v-text-field>
                            <v-text-field
                                    label="密码"
                                    v-model="passWD"
                                    :rules="passRules"
                                    required
                                    type="password">
                            </v-text-field>
                            <v-btn block color="light-blue" dark @click="login">登录</v-btn>
                        </v-from>

                    </v-card>
                </v-container>
            </v-content>
        </main>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            valid: true,
            email: '',
            emailRules: [
                (v) => !!v || 'E-mail is required',
                (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail is required'
            ],
            passWD: '',
            passRules: [
                (v) => !!v || '密码 is required'
            ],
            loading: false
        }),
        methods: {
            async login() {
                this.loading = true;
                let _this = this;
                let data = {
                    email: this.email,
                    pass: this.passWD,
                    _this: _this
                }

                await this.$store.dispatch('login', data).then(res => {
                    console.log(res);
                })
            }
        }

    }
</script>

