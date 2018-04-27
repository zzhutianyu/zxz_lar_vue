<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>飞行棋随机大法好</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <!-- rem 正比例缩放 -->
    <script>!function(a,b,c){function q(){var d=Math.min((o?e[h]().width:f.innerWidth)/(a/b),c);d!=p&&(k.innerHTML="html{font-size:"+d+"px!important;"+n+"}",p=d)}function r(){clearTimeout(l),l=setTimeout(q,500)}var l,d=document,e=d.documentElement,f=window,g="addEventListener",h="getBoundingClientRect",i="pageshow",j=d.head||d.getElementsByTagName("HEAD")[0],k=d.createElement("STYLE"),m="text-size-adjust:100%;",n="-webkit-"+m+"-moz-"+m+"-ms-"+m+"-o-"+m+m,o=h in e,p=null;a=a||320,b=b||16,c=c||32,j.appendChild(k),d[g]("DOMContentLoaded",q,!1),"on"+i in f?f[g](i,function(a){a.persisted&&r()},!1):f[g]("load",r,!1),f[g]("resize",r,!1),q()}(320,10,100);</script>
    <!-- /rem -->
</head>
<style>
    body {
        background-color: #fafafa;
    }
    .header {
        text-align: center;
        font-size: 3rem;
        color: #666;
    }

    .random-wrap {
        display: flex;
        justify-content: center;
    }

    .random-wrap .color {
        border-radius: 50%;
        width: 10rem;
        height: 10rem;
        background: red;
        line-height: 10rem;
        text-align: center;
        font-size: 5rem;
    }

    /*.random-wrap .num {*/
        /*border-radius: 50%;*/
        /*width: 5rem;*/
        /*height: 5rem;*/
    /*}*/
</style>
<!-- 引入样式 -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/element-ui@2.0.3/lib/theme-chalk/index.css">
<body>
<div id="app">
    <el-header class="header" style="margin-top: 4rem;">飞行棋随机系统</el-header>
    <div class="random-wrap">
        <div class="color" v-text="number[number_random]" :style="{background: color[color_random]}"></div>
        <div class="num"></div>

    </div>
    <el-row type="flex" class="row-bg" justify="space-around">
        <el-col :span="6">
            <el-button type="primary" icon="el-icon-success" @click="random" style="margin-top: 4rem;">随机</el-button>
        </el-col>
    </el-row>

</div>
<script src="//cdn.jsdelivr.net/npm/vue@2.5.3"></script>
<script src="//cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>
<!-- 引入组件库 -->
<script src="//cdn.jsdelivr.net/npm/element-ui@2.0.3/lib/index.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            color: [
                'blue',
                'green',
                'yellow',
                'red'
            ],
            number: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ,13],
            color_random: 0,
            number_random: 0
        },
        methods: {
            random() {
                this.color_random = Math.floor(Math.random() * this.color.length)
                this.number_random = Math.floor(Math.random() * this.number.length)

            }

        }
    })
</script>
</body>
</html>