<template>
    <div class="h-contianer" :class="{ 'scroll': this.scroll}">
        <div class="clearfix header">
            <div class="logo left"><a href="/#"><img src="../../assets/logo.png" alt="" title="诸天域"></a></div>
            <nav>
                <ul>
                    <li v-for="(item, index) in nav">{{ item.name}}
                        <ul v-if="item.childNav">
                            <li v-for="(it, intex) in item.cNav">{{ it.name}}</li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    import { debounce} from '../../config/utils'
  export default {
      name: 'header',
      data() {
          return {
              nav: [{
                  name: 'item1',
                  childNav: false
              }, {
                  name: 'item2',
                  childNav: false,
                  cNav: []
              }, {
                  name: 'item3',
                  childNav: false,
                  cNav: []
              }, {
                  name: 'item4',
                  childNav: false,
                  cNav: []
              }, {
                  name: 'item5',
                  childNav: false,
                  cNav: []
              }, {
                  name: 'item6',
                  childNav: true,
                  cNav: [
                      {
                          name: '01'
                      }, {
                          name: '02'
                      }
                  ]
              }
              ],
              scroll: true
          }
      },
      props:['rootScroll'],
      mounted() {
          window.addEventListener('scroll', debounce(this.scrollFun, 200));
      },
      methods: {
          scrollFun: function() {
              let heighttop = document.documentElement.scrollTop || document.body.scrollTop;
              if (heighttop >= 200) {
                  this.scroll = false;
                  return;
              }
              this.scroll = true;
              return;
          }
      }
  }
</script>

<style lang="scss" >
    @import "../../style/mixin";
    .h-contianer {
        @include allCover;
       @include wh(100%, inherit);
        z-index: 1000;
        padding: 0 20px;
        position: fixed;
        -webkit-transition: all .5s ease-out ;
        -moz-transition: all .5s ease-out ;
        -ms-transition: all .5s ease-out ;
        -o-transition: all .5s ease-out ;
        transition: all .5s ease-out ;
        /*background-color: #27BBF5;*/

        background-color: transparent;
        .header {
            max-width: 800px;
            margin: 0 auto;
            padding:0 15px;

            @include flexType();
            align-items: center;

            .logo {
                @include wh(35%, 120px);
            }
            .logo a{
                @include wh(120px, 120px);
                float: left;
            }
            .logo img {
                @include wh(120px, 120px);
                background-image: url("../../assets/timg.png");
                background-repeat: no-repeat;
                background-position: 47% 38%;
                background-size: 24%;
            }

            nav {
                height: auto;
                -webkit-transition: all .3s linear ;
                -moz-transition: all .3s linear;
                -ms-transition: all .3s linear;
                -o-transition: all .3s linear;
                transition: all .3s linear;
                float: right;

                &>ul>li {
                    position: relative;
                    float: left;
                    padding:0 14px;
                    color: #f5f5f5;
                    font-size: 14px;
                    &:hover {
                        color: #17ed04;
                        -webkit-transition: all .5s linear ;
                        -moz-transition: all .5s linear ;
                        -ms-transition: all .5s linear ;
                        -o-transition: all .5s linear ;
                        transition: all .5s linear ;
                    }
                    &:hover ul{
                        opacity: 1;
                        visibility: visible;
                        z-index: 100000;
                        -webkit-transition: all .3s linear ;
                        -moz-transition: all .3s linear ;
                        -ms-transition: all .3s linear ;
                        -o-transition: all .3s linear ;
                        transition: all .3s linear ;
                    }
                    ul {
                        position: absolute;
                        top: 100%;
                        width: 180px;
                        background-color: black;
                        opacity: 0;
                        visibility: hidden;
                        @include borderRadius(10px);
                        -webkit-transition: all .3s linear ;
                        -moz-transition: all .3s linear ;
                        -ms-transition: all .3s linear ;
                        -o-transition: all .3s linear ;
                        transition: all .3s linear ;
                        li {
                            background-color: black;
                            color: #FFFFFF;
                            height: 30px;
                            width: 180px;
                            padding: 0 10px;
                            line-height: 30px;
                            float: left;
                            -webkit-transition: all .3s linear ;
                            -moz-transition: all .3s linear ;
                            -ms-transition: all .3s linear ;
                            -o-transition: all .3s linear ;
                            transition: all .3s linear ;
                            &:hover {
                                background-color: #2ab27b;
                                -webkit-transition: all .3s linear ;
                                -moz-transition: all .3s linear ;
                                -ms-transition: all .3s linear ;
                                -o-transition: all .3s linear ;
                                transition: all .3s linear ;
                            }
                        }
                    }
                }
            }
        }

    }

    .scroll {
        /*background-col;*/
        padding: 5px 0;
        background: linear-gradient(to top, #27BBF5, #229ff5);
    }

</style>