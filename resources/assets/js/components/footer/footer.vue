<template>
     <div class="container">
         <footer>
             <div class="f-con clearfix">
                 <div class="f-item"></div>
                 <div class="f-item"></div>
                 <div class="f-item"></div>
             </div>
         </footer>
         <div class="copyright">
             <p class="cr">Copyright © 诸天域 | 浙ICP备17027797号-1</p>
         </div>
     </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../style/mixin";
    .container {
        @include wh(100%, 350px);
        footer {
            @include wh(100%, 290px);
            position: relative;
            .f-con {
                width: auto;
                margin: 0 auto;
                padding: 0 15px;
                @include center;
                @include flexType(center);
                .f-item {
                    margin-left: 40px;
                    @include wh(280px, 280px);
                    @include borderRadius(10%);
                    background: #2a88bd;
                }
            }
        }
        .copyright {
            @include wh(100%, 60px);
            background: #000;
            line-height: 60px;
            .cr {
                margin-left: 30%;
                @include fontColor(16px, #fff);
            }
        }

    }

     @keyframes f-ani {

     }
</style>