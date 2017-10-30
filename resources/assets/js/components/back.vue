<template>
    <div class="contianer">
        <svg class="load_ellipse" xmlns="http://www.w3.org/2000/svg" version="1.1">
            <ellipse cx="26" cy="10" rx="26" ry="10" style="fill:#ddd;stroke:none;"></ellipse>
        </svg>
    </div>
</template>

<script>
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