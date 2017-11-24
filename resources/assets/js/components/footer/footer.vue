<template>
    <main>
        <v-content style="background:#27BBF5;">
            <v-container color="light-blue" >
                <v-layout row wrap align-center>
                        <v-flex xs12 md4>
                            <div class="f-item">
                                <ul>
                                    <li>个人</li>
                                    <li class="f-qq">
                                        <div class="f-erwei">
                                            <img src="/assets/weixin.jpg" alt="">
                                        </div>
                                    </li>
                                    <li class="f-weixin">
                                        <div class="f-erwei">
                                            <img src="/assets/weixin.jpg" alt="">
                                            <p>关注微信号</p>
                                        </div>
                                    </li>
                                    <li class="f-github">
                                        <a href="https://github.com/zzhutianyu"></a>
                                    </li>

                                </ul>

                            </div>
                        </v-flex>
                        <v-flex xs12  md4 >
                            <div class="f-item">
                                <ul>
                                    <li>APP-LIST</li>
                                    <li></li>
                                </ul>

                            </div>
                        </v-flex>
                        <v-flex xs12  md4 >
                            <div class="f-item">
                                <ul>
                                    <li>友情-链接</li>
                                    <li v-for="item in rolls">
                                        <a :href="item.url">{{ item.name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </v-flex>

                </v-layout>
                <v-layout row wrap align-center>
                <v-flex xs12 copyright>
                    <p class="cr">Copyright © 诸天域 | 浙ICP备17027797号-1</p>
               </v-flex>
                </v-layout>
            </v-container>
        </v-content>

    </main>
</template>

<script>
    import {baseUrl} from '../../config/env'

    export default {
        data() {
            return {
                rolls: []

            }
        },
        mounted() {
            this.getRolls();
        },
        methods: {
            async getRolls() {
                await this.$http.get(baseUrl + '/rolls').then(res => {
                    this.rolls = res.body;
                })
            }
        }
    }
</script>

<style lang="scss">
    @import "../../style/mixin";

        .bColor {
            background: #27BBF5;
        }
        .f-item {
            &:nth-child(2n-1) {
                border-right: 2px solid #e5e9ef;
                border-left: 2px solid #e5e9ef;
            }
            &:first-child {
                .f-qq {
                    position: relative;
                    margin: 0 auto;
                    @include backImg('/assets/qq.png');
                    @include wh(32px, 32px);

                    &:hover {
                        @include backImg('/assets/qq1.png');
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
                            border-right: .1rem solid transparent;
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
                    @include backImg('/assets/weixin.png');
                    @include wh(32px, 32px);
                    &:hover {
                        @include backImg('/assets/weixin1.png');
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
                            border-right: .1rem solid transparent;
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
                    @include backImg('/assets/github.png');
                    @include wh(32px, 32px);

                    &:hover {
                        @include backImg('/assets/github1.png');
                        .f-erwei {
                            display: block;
                        }
                    }

                    a {
                        display: block;
                        @include wh(32px, 32px);
                        @include fontColor(auto, #fff)
                    }

                }
            }

            /*margin-left: 40px;*/
            @include wh(auto, 280px);
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
                        text-decoration: none;

                        &:hover {
                            text-decoration: underline;
                        }

                    }

                }
            }
        }


    .copyright {

        background: #27BBF5;

        .cr {
            margin: 0;
            margin-left: 30%;
            @include fontColor(16px, #fff);
        }
    }


</style>