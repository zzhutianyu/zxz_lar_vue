<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>学生邮箱重置</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <script type="text/javascript">
        // 对浏览器的UserAgent进行正则匹配，不含有微信独有标识的则为其他浏览器
        var useragent = navigator.userAgent;
        if (useragent.match(/MicroMessenger/i) != 'MicroMessenger') {
            // 这里警告框会阻塞当前页面继续加载
            alert('已禁止本次访问：您必须使用微信内置浏览器访问本页面！');
            // 以下代码是用javascript强行关闭当前页面
            var opened = window.open('about:blank', '_self');
            opened.opener = null;
            opened.close();
        }
    </script>

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
</style>
<!-- 引入样式 -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/element-ui@2.0.3/lib/theme-chalk/index.css">
<body>
<div id="app">
    <el-header class="header" style="margin-top: 4rem;">学生邮箱重置</el-header>
    <div style="margin-top: 3rem;margin-bottom: 3rem">
        <el-input v-model="name" placeholder="请输入姓名" style="margin-bottom: 1rem;"></el-input>
        <el-input placeholder="请输入你的学号" v-model="sid" class="input-with-select" style="margin-bottom: 2rem;"></el-input>
        <el-input placeholder="请输入你的身份证号" v-model="iid" class="input-with-select" style="margin-bottom: 2rem;"></el-input>
        <el-row type="flex" class="row-bg" justify="space-around">
            <el-col :span="6">
                <el-button type="primary" icon="el-icon-search" @click="reset" :loading="loading">重置</el-button>
            </el-col>
        </el-row>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/vue@2.5.3"></script>
<script src="//cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>
<!-- 引入组件库 -->
<script src="//cdn.jsdelivr.net/npm/element-ui@2.0.3/lib/index.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            loading: false,
            name: '',
            iid: '',
            sid: ''
        },
        methods: {
            reset: function () {
                var _this = this
                this.loading = true
                if (!_this.iid || !_this.name || !_this.sid) {
                    _this.loading = false
                    return _this.$message.error('请输入你的身份证、姓名及学号')
                }
                _this.$http.post('/email/reset', {
                    iid: _this.iid,
                    name: _this.name,
                    sid: _this.sid
                }).then(function (response) {
                    const result = response.body
                    if (result.errcode < 0) {
                        _this.loading = false
                        return _this.$message({
                            showClose: true,
                            message: result.errmsg || '发生了一点错误',
                            type: 'warning'
                        })
                    }

                    _this.loading = false
                    _this.$message({
                        showClose: true,
                        message: '重置成功，密码为身份证后8位',
                        type: 'success'
                    })
                }, function () {
                    _this.$message.error('好像发生了一点错误')
                    _this.loading = false
                })
            }
        }
    })
</script>
</body>
</html>