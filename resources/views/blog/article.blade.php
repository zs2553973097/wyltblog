@extends("layouts.all")

@section("left")
<div class=" site-header ">
    <h2 class="gd-title gd-title-2 ">
        <span class="gd-line"  style="color:#ffffff;font-size: 22px;">黑色森林</span>
    </h2>
    <div class="gd-desc">
        <p><br></p>
        <p>
            <span  style="color:#ffffff;">{{$motto}}</span>
        </p>
        <p><br></p>
    </div>
    <div class="icon-list">
        <img src='{{url('')}}/blog/weixin.png' id="weixin" />
        <img src='{{url('')}}/blog/qq.png' id="qq" />
        <img src='{{url('')}}/blog/weibo.png' id="weibo" />
    </div>
</div>
@endsection

@section("right")
<div class="gd-content gd-content-right">
    <div class="site-archive-header-menu">
        <nav class="top-nav">
            <a href="{{url('')}}/about"  class="nav-link "  style="color:#ffffff">关于</a>
            <a href="{{url('')}}/archive"  class="nav-link "  style="color:#ffffff">归档</a>
            <a href="{{url('')}}/links"  class="nav-link "  style="color:#ffffff">邻居</a>
        </nav>
    </div>
    <div class="site-main" style="background: #860909">
        
        <article class="post">
            <header class="post-header">
                <h1 class="post-title" id="post-title" style="color:#ffffff"></h1>
                <div class="post-meta">
                    <time id="time"  style="color:#009900"></time>
                    <span class="category">
                        <a href="" id="nav-link" class="nav-link"   style="color:#009900"></a>
                    </span>
                </div>
            </header>
            
            <div class="post-content content" id="post_body">
                
                <!--<p>本文章为私密浏览</p>-->
                
            </div>
            
            <blockquote>
                <p style="color:#ffffff;">
                    出处：<a href="{{$reference}}" style="color: #ffffff">{{$reference}}</a>
                </p>
                <p style="color:#ffffff;" id="origin">
                    
                </p>
                <p style="color:#ffffff;">
                    欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接。
                </p>
            </blockquote>
        </article>

    </div>
    <script>
        /*
         var layer = layui.layer
         ,$ = layui.$;
         
         $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         });
         */
        var time = 0;
        var t = null;
        var id = {{$id}};
        var secret = {{$secret}};
        var href = "{{url('')}}/articles/";
        $.ajax({
            url: "{{url('getArticleContent')}}",
            data: {
                id:id,
                secret:secret
            },
            type: "post",
            dataType: "json",
            //async:false,
            success: function (res) {
                if (res.code == 200) {
                    //console.log(res);
                    var title = res.data.title + "_我有辣条的博客";
                    $("#title").html(title);
                    $("#post-title").html(res.data.title);
                    $("#time").html(res.data.update_time);
                    $("#nav-link").html(res.data.subCategoryName);
                    $("#nav-link").attr("href", href+res.data.category_id+"/"+res.data.sub_category_id+"/"+res.data.subCategoryName);
                    //console.log(res.data.content);
                    $("#post_body").html(res.data.content);
                    //增加延时
                    //northsnow(time,t);
                    $("#post_body p").attr("style", "color:#009900;");
                    $("#post_body").attr("style", "background-color:#fff;");
                    var origin = "来源："+res.data.origin;
                    $("#origin").html(origin);
                    
                    $("#subPassword").on("click",function(){
                        var password = $("#secretPassword").val();
                        $.ajax({
                            url:"{{url('getSecretContent')}}",
                            data:{
                                id: id,
                                secret: secret,
                                password: password
                            },
                            type:"post",
                            dataType:"json",
                            //async:false,
                            success:function(res){
                                if(res.code == 51){
                                    var content = res.data;
                                    $("#post_body").html(content);
                                    $("#post_body p").attr("style", "color:#009900;");
                                    $("#post_body").attr("style", "background-color:#fff;");
                                }else{
                                    layer.msg(res.msg);
                                }
                            },
                            error:function(){
                                layer.msg("提交错误");
                            }
                        });
                    });
                    //增加延时
                    //northsnow(0,null);
                }
                
                //return false;
            },
            error: function () {
                alert("error");
            }
        });
        /*
        function northsnow(time,t){
            
            if(time==5){
                clearTimeout(t);
                return;
            }
            time = time + 1;
            console.log(time);
            t = setTimeout('northsnow('+time+','+t+')',5000);
            
        }
        */
        
        //var mo2g = '<span id="mo2g">提交<span>';
        //给A标签中的文字添加一个能被jQuery捕获的元素
        //$('#subPassword').append(mo2g);
        //模拟点击A标签中的文字
        //$('#mo2g').click();
        
        
        /*
        $("#subPassword").on("click",function(){
            var password = $("#secretPassword").val();
            alert("click");
            $.ajax({
                url:"{url('getSecretContent')}",
                data:{
                    id: id,
                    secret: secret,
                    password: password
                },
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code == 200){
                        var content = res.data;
                        $("#post_body").html(content);
                        $("#post_body p").attr("style", "color:#009900;");
                        $("#post_body").attr("style", "background-color:#fff;");
                    }else{
                        layer.msg(res.msg);
                    }
                },
                error:function(){
                    layer.msg("提交错误");
                }
            });
        });
        */
    </script>
</div>
@endsection