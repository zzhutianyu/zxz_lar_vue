<template>
    <v-app id="inspire">
        <v-toolbar color="light-blue" dark fixed lights-out app>
            <v-toolbar-title>
                <router-link to="/"><img src="/assets/logo.png" alt="" style="width:6rem; heigh: 4rem"></router-link>
            </v-toolbar-title>
        </v-toolbar>
        <main>
            <v-content>
                <v-container>
                    <v-layout row wrap align-center>
                        <v-card>
                            <v-card-title>联系我哦</v-card-title>

                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12 s6 md4>
                                        <v-text-field label="Name" required v-model="name"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 s6 md4>
                                        <v-text-field label="Email Address" required v-model="email"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 s6 md4>
                                        <v-text-field label="Phone Number" required v-model="phone"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 s6 md4>
                                        <v-text-field label="Message" required textarea v-model="message"></v-text-field>
                                    </v-flex>
                                </v-layout>
                            </v-container>
                        </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" flat @click.native="send">SEND</v-btn>
                            </v-card-actions>
                        </v-card>
                        <v-alert color="info" icon="info" dismissible v-model="alert">
                            发送成功
                        </v-alert>
                    </v-layout>
                </v-container>
            </v-content>
        </main>
        <cfooter></cfooter>

    </v-app>
</template>

<script>
    import cfooter from '../../components/footer/footer.vue'

    export default {
        data: () => ({
            name: '',
            email: '',
            phone: '',
            message: '',
            alert: false
        }),
        components: {
            cfooter
        },
        methods: {
            send() {
                const param = {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    message: this.message
                };

                this.$http.post('/contact', param).then(res => {
                    this.alert = true;
                })
            }
        }

    }

</script>