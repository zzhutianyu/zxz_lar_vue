<template>
    <v-app>
        <v-navigation-drawer dark class="blue lighten-3" permanent clipped app>
            <v-list>
                <v-list-tile v-for="item in items" :key="item.title" @click="to(item.path)">
                    <v-list-tile-action>
                        <v-icon dark>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <main>
            <v-content>
                    <router-view>
                    </router-view>
            </v-content>
        </main>
    </v-app>
</template>

<script>
    import router from '../../route'
    export default {
        data: () => ({
            items: [
                { title: 'Admin', icon: 'gavel', path: '/admin/' },
                { title: 'Posts', icon: 'create', path: '/admin/posts'},
                { title: 'File', icon: 'cloud', path: '/admin/file' },
                { title: 'BlogRoll', icon: 'attach_file', path: '/admin/roll'}
            ],
            right: null
        }),
        methods: {
            to: function(path) {
                router.push({
                    path: path
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>