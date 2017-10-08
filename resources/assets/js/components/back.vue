<template>
    <div class="contianer">
        <icon></icon>
    </div>
</template>

<script>
    Icon.inject('back');
    export default {
        data() {
            return {

            }
        },
        mounted() {
        }
    }
</script>

<style lang="scss" scoped>
    @import "../style/mixin";
    .contianer {
        @include wh(50px, 50px);
        a {
            @include wh(50px, 50px);
            @include borderRadius(10px);
            background-color: #2a88bd;
            .back-img {
                @include wh(50px, 50px);
            }
        }
    }
</style>