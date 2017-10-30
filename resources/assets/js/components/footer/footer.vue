<template>
     <div class="container">
         <footer>
             <div class="f-con clearfix">
                 <div class="f-item">
                     <ul>
                         <li>个人</li>
                         <li class="f-qq">
                             <div class="f-erwei">
                                 <img src="../../assets/qq-erwei.jpg" alt="">
                             </div>
                         </li>
                         <li class="f-weixin">
                             <div class="f-erwei">
                                 <img src="../../assets/weixin.jpg" alt="">
                                 <p>关注微信号</p>
                             </div>
                         </li>
                         <li class="f-github">
                             <a href="https://github.com/zzhutianyu"></a>
                         </li>

                     </ul>
                     
                 </div>
                 <div class="f-item">
                     <ul>
                         <li>APP-LIST</li>
                         <li></li>
                     </ul>

                 </div>
                 <div class="f-item">
                     <ul>
                         <li>友情-链接</li>
                         <li></li>
                     </ul>
                 </div>
             </div>
             <div class="m-connect">
                 <div class="item">

                 </div>

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
        background-color: #27BBF5;
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
                    &:nth-child(2n-1) {
                        border-right: 2px solid #e5e9ef;
                        border-left: 2px solid #e5e9ef;
                    }
                    &:first-child {
                        .f-qq {
                            position: relative;
                            margin: 0 auto;
                            @include backImg('../../assets/qq.png');
                            @include wh(32px, 32px);

                            &:hover {
                                @include backImg('../../assets/qq1.png');
                                .f-erwei {
                                    display: block;
                                }
                            }
                            .f-erwei {
                                padding: 5px;
                                position: absolute;
                                @include wh(160px, 160px);
                                background-color: #fff;
                                @include borderRadius(10px);
                                bottom: 140%;
                                left: -65px;

                                &:before {
                                    position: absolute;
                                    content: ' ';
                                    border-left: .1rem solid transparent;
                                    border-right:.1rem solid transparent;
                                    border-top: .1rem solid #fff;
                                    top: 100%;
                                    left: 50%;
                                    transform: translateX(-50%);
                                }
                                display: none;

                                img {
                                    @include wh(150px, 150px);
                                }
                            }
                        }
                        .f-weixin {
                            position: relative;
                            margin: 0 auto;
                            @include backImg('../../assets/weixin.png');
                            @include wh(32px, 32px);
                            &:hover {
                                @include backImg('../../assets/weixin1.png');
                                .f-erwei {
                                    display: block;
                                }
                            }

                            .f-erwei {
                                position: absolute;
                                @include wh(160px, 160px);
                                background-color: #fff;
                                @include borderRadius(10px);
                                bottom: 130%;
                                left: -65px;
                                display: none;

                                &:before {
                                    position: absolute;
                                    content: ' ';
                                    border-left: .1rem solid transparent;
                                    border-right:.1rem solid transparent;
                                    border-top: .1rem solid #fff;
                                    top: 100%;
                                    left: 50%;
                                    transform: translateX(-50%);
                                }


                                img {
                                    @include wh(140px, 140px)
                                }

                                p {
                                    @include fontColor(10px, #888);
                                    transform: translateY(-.1rem);
                                }

                            }
                        }

                        .f-github {
                            position: relative;
                            margin: 0 auto;
                            @include backImg('../../assets/github.png');
                            @include wh(32px, 32px);

                            &:hover {
                                @include backImg('../../assets/github1.png');
                                .f-erwei {
                                    display: block;
                                }
                            }

                            a {
                                display: block;
                                @include wh(32px, 32px);
                            }

                        }
                    }

                    margin-left: 40px;
                    @include wh(280px, 280px);
                    padding: 20px;
                    ul {
                        @include wh(250px, auto);
                        margin: 0 auto;

                        li {
                            text-align: center;
                            @include wh(100%, 25px);
                            @include fontColor(14px, #fff);

                            &:first-child {
                                @include fontColor(20px, #fff);
                                margin-bottom: 20px;
                            }
                            a {
                                @include wh(100%, 25px);
                                @include fontColor(14px, #888);

                                &:hover {
                                    text-decoration: underline;
                                }

                            }

                        }
                    }
                }
            }

            .m-connect {


            }
        }
        .copyright {
            @include wh(100%, 60px);
            background: #27BBF5;
            line-height: 60px;
            .cr {
                margin-left: 30%;
                @include fontColor(16px, #fff);
            }
        }

    }



</style>