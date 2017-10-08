<template>
    <div class="loading-contianer" v-if="loading">
        <img src="../assets/loading.gif" alt="" class="loading">
    </div>
</template>

<script>
    export default {
        name: 'Loading',
        data() {
            return {
                loading: false
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../style/mixin";
    .loading-contianer {
        @include allCover;
        @include wh(100%, 100%);
        background-color: #f5f5f5;
        .loading {
            @include wh(2rem, 2rem);
            @include center;
        }
    }
</style>