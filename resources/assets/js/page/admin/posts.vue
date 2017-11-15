<template>
    <v-container fluid fill-heigh>
        <v-toolbar>
            <v-toolbar-title>文章</v-toolbar-title>
        </v-toolbar>
        <v-list>
            <v-list-tile avatar v-for="item in items" v-bind:key="item.title" @click="">
                <v-list-tile-avatar>
                    <img v-bind:src="item.image_url"/>
                </v-list-tile-avatar>
                <v-list-tile-action>
                    <v-icon v-if="item.icon" color="pink">star</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title v-text="item.title"></v-list-tile-title>
                </v-list-tile-content>
                <v-spacer></v-spacer>
                <v-btn fab dark color="cyan" @click="update(item.g_id)">
                    <v-icon dark>edit</v-icon>
                </v-btn>
            </v-list-tile>
        </v-list>
        <div class="text-xs-center" >
            <v-container>
                <div class="text-xs-center">
                    <v-pagination :length="6" v-model="page"></v-pagination>
                </div>
            </v-container>
        </div>
    </v-container>

</template>

<script>
    import router from '../../route'
    import {baseUrl} from '../../config/env'
    export default {
        data: () => ({
            items: [
//                {icon: true, title: 'Jason Oner', avatar: '/static/doc-images/lists/1.jpg'},
//                {title: 'Travis Howard', avatar: '/static/doc-images/lists/2.jpg'},
//                {title: 'Ali Connors', avatar: '/static/doc-images/lists/3.jpg'},
//                {title: 'Cindy Baker', avatar: '/static/doc-images/lists/4.jpg'},
            ],
            page: 1
        }),
        watch: {
            page: function(val) {
                this.getPosts();
            }
        },
        mounted(){
          this.getPosts();
        },
        methods: {
            async getPosts() {
                await this.$http.get(baseUrl + '/posts/list/' + this.page).then(res => {
                    this.items = res.body;
                })
            },
            update(gid) {
                router.push({
                    path: '/admin/edit',
                    query:{
                        gid: gid
                    }
                })

            }
        }
    }
</script>