<template>
    <div class="pr-5 pl-5">
        <h2 class="text-xs-center">{{ post[0].title}}</h2>
        <blockquote><p>版权声明：本文为 诸天域 原创文章，可以随意转载，但必须在明确位置注明出处！！！</p></blockquote>
        <div v-html="post[0].html_content"></div>
    </div>
</template>

<script>
    import {baseUrl} from '../../config/env'
    export default {
        data: () => ({
           post:[]
        }),
        watch: {
          '$route': function(val) {
              this.getPost();
          }
        },
        mounted() {
              this.getPost();
        },
        methods: {
            async getPost(){
                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
                await this.$http.get(baseUrl + '/post/' + this.$route.query.gid, {headers: header}).then(res => {
                    this.post = res.body
                    console.log(this.post)
                });
            }
        }

    }
</script>

