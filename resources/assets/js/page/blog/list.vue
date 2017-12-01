<template>
    <v-app id="blog-list">
        <v-navigation-drawer
                persistent
                v-model="drawer"
                enable-resize-watcher
                app
        >
            <v-list dense>
                <router-link to="/">
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>home</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Home</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </router-link>
                <router-link to="/blog">
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>import_contacts
                            </v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Blog</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </router-link>
                <router-link to="/blog/post/?gid=2">
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>record_voice_over</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>About</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </router-link>
                <router-link to="/contact">
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>contact_mail</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Contact</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </router-link>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar color="light-blue" dark fixed lights-out app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title>
                <router-link to="/"><img src="/assets/logo.png" alt="" style="width:6rem; heigh: 4rem"></router-link>
            </v-toolbar-title>
        </v-toolbar>
        <main>
            <v-content>
                <transition name="fade">
                    <v-container>
                        <router-view :page="page"></router-view>
                    </v-container>
                </transition>
                <v-speed-dial
                        v-model="fab"
                        :top="top"
                        :bottom="bottom"
                        :right="right"
                        :left="left"
                        :direction="direction"
                        :hover="hover"
                        :transition="transition"
                        :fixed="fixed"
                        v-show="!this.pagtional"
                >
                    <v-btn
                            slot="activator"
                            color="blue darken-2"
                            dark
                            fab
                            hover
                            v-model="fab"
                    >
                        <v-icon>pause</v-icon>
                        <v-icon>play_arrow</v-icon>
                    </v-btn>
                </v-speed-dial>
                <div class="text-xs-center" v-if="pagtional">
                    <v-container>
                        <div class="text-xs-center">
                            <v-pagination :length="6" v-model="page"></v-pagination>
                        </div>
                    </v-container>
                </div>
            </v-content>

        </main>

        <cfooter></cfooter>

    </v-app>
</template>

<script>
    import cfooter from '../../components/footer/footer.vue'


    export default {
        components: {
            cfooter
        },
        data: () => ({
            drawer: true,
            page: 1,
            direction: "top",
            fab: false,
            fling: false,
            hover: false,
            tabs: null,
            top: false,
            right: true,
            bottom: true,
            left: false,
            transition: 'slide-y-reverse-transition',
            fixed: true,
            pagtional: false
        }),
        watch: {
            page: function (val) {
                console.log(val);
            },
            '$route': function (val) {

                if (/post/.test(val.fullPath)) {
                    this.pagtional = false;
                } else {
                    this.pagtional = true;
                }
            }
        },
        mounted() {

            if (/post/.test(this.$route.fullPath)) {
                this.pagtional = false;
            } else {
                this.pagtional = true;
            }
        },
        methods: {}

    }
</script>

<style lang="scss" scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to {
        opacity: 0
    }
</style>