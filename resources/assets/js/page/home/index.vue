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
                        <v-flex xs12 md4 light-blue--text>
                            <div class="text-xs-center">
                                <v-avatar size="125px">
                                    <img
                                            class="img-circle elevation-7 mb-1"
                                            src="assets/logo.jpeg"
                                    >
                                </v-avatar>
                                <h4><span style="font-weight:bold">诸兴天域</span></h4>
                                <h5 class="text-xs-center">诸天域的个人小站</h5>
                                <v-layout justify-space-between>
                                    <a href="#/" class="body-2">Home</a>
                                    <a href="#/blog" class="body-2">Blog</a>
                                    <a href="#/blog/post/?gid=2" class="body-2">About</a>
                                    <a href="#/contact" class="body-2">Contact</a>
                                </v-layout>
                            </div>
                        </v-flex>
                        <v-flex xs12 md5 offset-md2>
                            <div v-for="post in posts" :key="post.title">
                                <v-card class="my-3" hover>
                                    <v-card-media
                                            class="white--text"
                                            height="170px"
                                            :src="post.image_url"
                                    >
                                          <v-container fill-height fluid>
                                            <v-layout fill-height>
                                                <v-flex xs12 align-end flexbox>
                                                    <span class="headline">{{ post.title }}</span>
                                                </v-flex>
                                            </v-layout>
                                        </v-container>
                                    </v-card-media>
                                    <v-card-text>
                                        {{ post.sub }}
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-btn icon class="red--text">
                                            <v-icon medium>fa-reddit</v-icon>
                                        </v-btn>
                                        <v-btn icon class="light-blue--text">
                                            <v-icon medium>fa-twitter</v-icon>
                                        </v-btn>
                                        <v-btn icon class="blue--text text--darken-4">
                                            <v-icon medium>fa-facebook</v-icon>
                                        </v-btn>
                                        <v-spacer></v-spacer>
                                        <v-btn flat class="blue--text" @click="to(post.g_id)">Read More</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </div>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
        </main>
        <cfooter></cfooter>
        <loading :parentLoad="loading"></loading>
    </v-app>
</template>

<script>
    import cheader from '../../components/header/header.vue'
    import cfooter from '../../components/footer/footer.vue'
    import loading from '../../components/loading.vue'
    import {throttle} from '../../config/utils'
    import {baseUrl} from '../../config/env'
    import router from '../../route'

    export default {
        components: {
            cheader,
            cfooter,
            loading
        },
        data() {
            return {
                pScroll: false,
                drawer: true,
                windowsize: {
                    x: 0,
                    y: 0
                },
                posts: [],
                loading: true
            }
        },
        props: {
            source: String
        },
        created() {

        },
        mounted() {
            this.getPosts();
            this.loading = false;

        },
        methods: {
            onScroll(e) {

            },
            onResize() {
                this.windowsize = {x: window.innerWidth, y: window.innerHeight}
            },
            async getPosts() {
                await this.$http.get(baseUrl + '/posts/index').then(res => {
                    this.posts = res.body;
                    console.log(this.posts);
                });
            },
            to(gid) {
                router.push({
                        path: '/blog/post/',
                        query: {
                            gid: gid
                        }
                    }
                )
            }

        }
    }
</script>

<style lang="scss">
    @import "../../style/mixin";

</style>