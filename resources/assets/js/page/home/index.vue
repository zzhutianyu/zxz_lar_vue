<template>
    <div class="contianer">
        <cheader v-bind:rootScroll="pScroll"></cheader>
        <div class="page-contianer">
            <div class="m-top" ref="top" :style="{width: this.clientWidth, height: this.clientHeight}">
                <div class="title">诸兴天域</div>
                <p class="content">诸天域的个人小站</p>
            </div>
        </div>
        <div class="m-content">

        </div>
        <cfooter></cfooter>
        <loading v-bind:parentLoad="parentLoading"></loading>
    </div>
</template>

<script>
    import cheader from '../../components/header/header.vue'
    import cfooter from '../../components/footer/footer.vue'
    import loading from '../../components/loading.vue'
    import {throttle } from '../../config/utils'

    export default {
        components: {
            cheader,
            cfooter,
            loading
        },
        data() {
            return {
                parentLoading: true,
                clientHeight: window.innerHeight + 'px',
                clientWidth: window.innerWidth + 'px',
                pScroll: false
            }
        },
        created() {
            this.parentLoading = true;
            this.pScroll = true;
            this.clientHeight = document.documentElement.clientHeight + 'px';
            this.clientWidth = document.documentElement.clientWidth + 'px';
            window.onresize = throttle(() => {
                    this.clientHeight = document.documentElement.clientHeight + 'px';
                    this.clientWidth = document.documentElement.clientWidth + 'px';
            }, 300);
            window.addEventListener('scroll', throttle(this.scrollFun, 200));
            this.parentLoading = false;
        },
        mounted() {


        },
        methods: {

        }
    }
</script>

<style lang="scss">
    @import "../../style/mixin";

        .page-contianer {
            .m-top {
                text-align: center;
                @include backImg("../../assets/logo.jpg");
                &:before {
                    content: "";
                    display: table;
                }
                .title {
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    margin-top: 350px;
                    @include fontColor(4rem, #fff);
                    padding: 20px 0;
                }
                .content {
                    z-index: auto;
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    @include fontColor(2rem, #fff)
                }

            }

             .m-content {

             }

        }

</style>