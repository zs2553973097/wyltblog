<!DOCTYPE html>
<!-- saved from url=(0048)http://www.layuicms.com/v2/page/login/login.html -->
<html class="loginHtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>登录--我有辣条博客后台管理</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="http://www.layuicms.com/v2/favicon.ico">
        <link rel="stylesheet" href="{{url('')}}/blogadmin/layui.css" media="all">
        <link rel="stylesheet" href="{{url('')}}/blogadmin/public.css" media="all">
        <link id="layuicss-layer" rel="stylesheet" href="{{url('')}}/blogadmin/layer.css" media="all"></head>
    <body class="loginBody"  style='

          background-repeat: no-repeat;
          background-position: center;
          background-attachment: fixed;
          background-size: cover;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          '>
        <form class="layui-form" >
            <div class="login_face"><img src="{{url('')}}/blogadmin/face.jpg" class="userAvatar"></div>
            <div class="layui-form-item input-item">
                <label for="userName">用户名</label>
                <input type="text" placeholder="请输入用户名" autocomplete="off" name="userName" id="userName" class="layui-input" lay-verify="required">
            </div>
            <div class="layui-form-item input-item">
                <label for="password">密码</label>
                <input type="password" placeholder="请输入密码" autocomplete="off" name="password" id="password" class="layui-input" lay-verify="required">
            </div>
            <div class="layui-form-item input-item" id="imgCode">
                <label for="code">验证码</label>
                <input type="text" placeholder="请输入验证码" autocomplete="off" name="code" id="code" class="layui-input">
                <img id="yzmCode" src="{{url('getYzm')}}">
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-block" lay-filter="login" lay-submit="">登录</button>
            </div>
            <div class="layui-form-item layui-row">
                <a href="javascript:;" class="seraph icon-qq layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>
                <a href="javascript:;" class="seraph icon-wechat layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>
                <a href="javascript:;" class="seraph icon-sina layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>
            </div>
        </form>
        <script type="text/javascript" src="{{url('')}}/blogadmin/layui.js"></script>
        <script type="text/javascript" src="{{url('')}}/blogadmin/login.js"></script>
        <script type="text/javascript" src="{{url('')}}/blogadmin/cache.js"></script>
        
        <script>
            //一般直接写在一个js文件中
            layui.use(['jquery', 'form'], function () {
                var $ = layui.jquery;
                var form = layui.form;
                $("#yzmCode").click(function () {
                    var random = Math.random();
                    var url = "{{url('getYzm')}}" + "/" + random;
                    $(this).attr("src", url);
                });
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                //监听提交
                form.on('submit(login)', function (data) {
                    $.ajax({
                        url:"{{url('doLogin')}}",
                        data:data.field,
                        type:"post",
                        async:false,
                        dataType:"json",
                        success:function(res){
                            
                            console.log(res);
                            if(res.code ==200){
                                window.location.href = "{{url('index')}}/"+res.data.uid+"/"+res.data.token;
                            }else{
                                layer.msg(res.msg);
                            }
                        },
                        error:function(){
                            layer.msg("提交失败");
                            
                        }
                    });
                    return false;
                });
            });
        </script> 


    </body>
</html>