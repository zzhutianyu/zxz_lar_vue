<template>
    <div class="m-blog-list" >
        <div class="line" :style="{ height: this.scrollHeight + 'px'}"></div>
        <div class="f-item">

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                scrollHeight: 0 + 'px'

            }
        },
        mounted() {
            this.scrollHeight = document.body.scrollHeight - 350;
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../style/mixin";

    .m-blog-list {
        @include wh(1200px, 400px);
        margin: 0 auto;
        background-color: #fff;

        .line {
            position: absolute;
            left: 50%;
            background-color: #27BBF5;
            padding: 1px;
        }


    }

</style>