<template>
    <main>
        <v-content>
            <v-container>
                <v-layout row wrap align-center>
                    <v-flex xs12 md5 offset-md2>
                        <div v-for="post in posts" :key="post.title">
                            <v-card class="my-3" hover>
                                <v-card-media
                                        class="white--text"
                                        height="170px"
                                        :src="post.imgUrl"
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
                                    {{ post.content }}
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
                                    <v-btn flat class="blue--text">Read More</v-btn>
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
    export default {
        data() {
            return {
                posts: [
                    {
                        title: 'Fusce ullamcorper tellus sed maximus',
                        content: 'Fusce ullamcorper tellus sed maximus rutrum. Donec imperdiet ultrices maximus. Donec non tellus non neque pellentesque fermentum. Aenean in pellentesque urna.',
                        imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/drop.jpg'
                    },
                    {
                        title: 'Donec vitae suscipit lectus, a luctus diam.',
                        content: 'Donec vitae suscipit lectus, a luctus diam. Proin vitae felis gravida, lobortis massa sit amet, efficitur erat. Morbi vel ultrices nisi. Aenean arcu sapien, rutrum nec mollis id, condimentum quis orci.',
                        imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/docks.jpg'
                    },
                    {
                        title: 'Vestibulum condimentum quam eu est convallis',
                        content: ' at sagittis sapien vulputate. Vivamus laoreet lacus id magna rutrum dapibus. Donec vel pellentesque arcu. Maecenas mollis odio tempus felis elementum commodo. Quisque gravida, est quis tincidunt bibendum, nibh elit dapibus mauris.',
                        imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/plane.jpg'
                    }
                ]
            }
        }
    }
</script>