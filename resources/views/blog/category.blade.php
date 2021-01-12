@extends("layouts.all")

@section("left")
<div class=" site-header ">
    <h2 class="gd-title gd-title-2 ">
        <span class="gd-line"  style="color:#ffffff;font-size: 22px;">黑色森林</span>
    </h2>
    <div class="gd-desc">
        <p><br></p>
        <p>
            <span  style="color:#ffffff">{{$motto}}</span>
        </p>
        <p><br></p>
    </div>
    <div class="icon-list">
        <img src='blog/weixin.png' id="weixin" />
        <img src='blog/qq.png' id="qq" />
        <img src='blog/weibo.png' id="weibo" />
    </div>
    <div class="layui-inline" style="margin: 10px;">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input searchVal" id="searchVal" placeholder="请输入搜索的内容" value="">
                    </div>
        <a class="layui-btn search_btn" id="reload" data-type="reload">搜索</a>
        </div>
    <script>
        
            layui.use('jquery',function(){
                var $ = layui.jquery;
                $("#reload").click(function(){
                    var searchVal = $("#searchVal").val();
                    layer.msg(searchVal);
                    window.location.href = "{{url('searchList')}}/"+searchVal;
                });
                $("#searchVal").on('keypress',function(event){
                    if(event.keyCode==13){
                        var searchVal = $(this).val();
                        layer.msg(searchVal);
                        window.location.href = "{{url('searchList')}}/"+searchVal;
                    }
                });
            });
        
    </script>
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
    <div class="category-list">
        <div class="page-header">
            <h1 class="gd-title ">
                <span class="gd-line text-size-1_5"  style="color:#009900">导航</span>
            </h1>
        </div>
        <ul class="">
            @if($categories != null)
            @foreach($categories as $v)
            <li class="category-item">
                <a href="{{url('')}}/articles/{{$v['id']}}" class="category-link clearfix">
                    <span class="category-title gd-line"  style="color:#009900">{{$v['name']}}</span>
                </a>
            </li>
            @endforeach
            @endif
        </ul>
    </div>
</div>
@endsection