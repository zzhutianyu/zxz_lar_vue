<template>
    <v-app>
        <v-navigation-drawer dark class="blue lighten-3" permanent clipped app>
            <v-list>
                <v-list-tile v-for="item in items" :key="item.title" @click="">
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
    export default {
        data: () => ({
            items: [
                { title: 'Dashboard', icon: 'dashboard' },
                { title: 'Account', icon: 'account_box' },
                { title: 'Admin', icon: 'gavel' }
            ],
            right: null
        })
    }
</script>

<style lang="scss" scoped>

</style>