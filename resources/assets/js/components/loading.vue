<template>
    <div class="loading-contianer" v-if="this.parentLoad">
        <img src="../assets/loading.gif" alt="" class="loading">
    </div>
</template>

<script>
    export default {
        name: 'Loading',
        props: ['parentLoad'],
        data() {
            return {
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
        z-index: 10000;
        .loading {
            @include wh(2rem, 2rem);
            @include center;
        }
    }
</style>