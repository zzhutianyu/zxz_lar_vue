<template>
    <main>
        <v-content>
            <v-container>
                <v-layout row wrap align-center>
                    <v-flex xs12 md12 lg12 sm12 >
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
</template>

<script>
    import {baseUrl} from '../../config/env'
    import router from '../../route'
    export default {
        data() {
            return {
                posts: []
            }
        },
        props: ['page'],
        watch: {
          'page': function(val) {
              this.getPostsList();
          }
        },
        mounted() {
            this.getPostsList();
        },
        methods: {
            async getPostsList() {
               await this.$http.get(baseUrl + '/posts/list/' + this.page).then(res => {
                   this.posts = res.body;
               })
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