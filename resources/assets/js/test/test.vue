<template>
    <div class="a" >
        <button @click="login()" class="btn">
        </button>
        <button @click="test" class="btn"></button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        mounted() {
        },
        methods: {

            login() {
                this.$store.dispatch('login').then(
                    res => {
                        console.log(res);
                    }
                )
            },
            async test() {
                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
                console.log(header);
                await this.$http.get('http://localhost:8000/api/test', {headers:header}).then(res => {
                    console.log(res);
                });
            }
        }
    }
</script>

<style lang="scss">
    @import "../style/mixin";
    .a {
        @include wh(100px, 100px);
        background-color: black;
    }
    .btn {
        @include wh(50px, 50px);
        background-color: cyan;
    }
</style>