@extends("layouts.all")

@section("left")
<div class=" site-header ">
    <h2 class="gd-title gd-title-2 ">
        <span class="gd-line"  style="color:white">黑色森林</span>
    </h2>
    <div class="gd-desc">
        <p><br></p>
        <p>
            <span  style="color:white">{{$motto}}</span>
        </p>
        <p><br></p>
    </div>
    <div class="icon-list">
        <img src='blog/weixin.png' id="weixin" />
        <img src='blog/qq.png' id="qq" />
        <img src='blog/weibo.png' id="weibo" />
    </div>
</div>
@endsection

@section("right")
<div class="gd-content gd-content-right">
    <div class="site-archive-header-menu">
        <nav class="top-nav">
            <a href="{{url('')}}/about"  class="nav-link "  style="color:white">关于</a>
            <a href="{{url('')}}/archive"  class="nav-link "  style="color:white">归档</a>
            <a href="{{url('')}}/links"  class="nav-link "  style="color:white">邻居</a>
        </nav>
    </div>
    <div class="site-main">
        <article class="post">
            <header class="post-header">
                
                <div class="post-meta">
                    <time  style="color:#009900" id="updateTime">
                        
                    </time>
                </div>
            </header>
            <div class="post-content content" id="post_body">
                
                <h3 id="blogTitle0"  style="color:#009900">关于我</h3>
                <div   style="color:#ffffff;font-size: 20px;" id="aboutContent">
                    
                </div>
                <br>
                <br>
                <br>
                <blockquote>
                    <p  style="color:#cc3300">欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接。</p>
                </blockquote>
            </div>
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
        
        $.ajax({
            url: "{{url('getAboutContent')}}",
            data: {},
            type: "post",
            dataType: "json",
            success: function (res) {
                if(res.code==200){
                    //console.log(res);
                    $("#updateTime").html(res.data.update_time);
                    $("#aboutContent").html(res.data.content);
                }
                return false;
            },
            error: function () {
                alert("error");
            }
        });
    </script>
</div>
@endsection