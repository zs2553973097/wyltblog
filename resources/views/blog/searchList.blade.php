@extends("layouts.all")

@section("left")
<div class=" site-header">
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
        <img src='{{url("")}}/blog/weixin.png' id="weixin" />
        <img src='{{url("")}}/blog/qq.png' id="qq" />
        <img src='{{url("")}}/blog/weibo.png' id="weibo" />
    </div>
    <div class="layui-inline" style="margin: 10px;">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input searchVal" id="searchVal" placeholder="请输入搜索的内容" value="{{$searchVal}}">
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
            <a href="{{url("")}}/about" class="nav-link "  style="color:#ffffff">关于</a>
            <a href="{{url("")}}/archive" class="nav-link "  style="color:#ffffff">归档</a>
            <a href="{{url("")}}/links"  class="nav-link "  style="color:#ffffff">邻居</a>
        </nav>
        
    </div>
    <div class="article-list">
        <div class="site-main ">
            <div class="page-header">
                <h1 class="gd-title "  style="color:#009900">
                    <span class="gd-line text-size-1_5" style="color: red;">{{$searchVal}}</span>的搜索结果
                </h1>
            </div>
            <ul class="hentry">
                @if($contentData != null)
                <link rel="stylesheet" href="{{url("")}}/blog/article.css">
                @foreach($contentData as $v)
                        
                <article class="">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a class="post-title-link" href="{{url("")}}/article/{{$v['id']}}" rel="bookmark"
                                    data-pjax-state="">
                                        {{$v['title']}}
                                    </a>
                                </h2>
                            </header>
                            <div class="entry-content">
                                @if($v['bill']!=null)
                                <p style="text-align: center;">
                                    <img src="{{url('')}}/{{$v['bill']}}"
                                    data-original="{{url('')}}/{{$v['bill']}}"
                                    alt="{{$v['title']}}">
                                </p>
                                @endif
                                <p>
                                    {{$v['description']}}
                                </p>
                                <p class="article-more-link">
                                    <a href="{{url("")}}/article/{{$v['id']}}" data-pjax-state="">
                                        前往阅读 →
                                    </a>
                                </p>
                            </div>
                            <footer class="entry-footer">
                                <span class="">
                                    更新时间:
                                    <a href="" rel="bookmark" data-pjax-state="">
                                        <time class="updated" datetime="{{$v['update_time']}}">
                                            {{$v['update_time']}}
                                        </time>
                                    </a>
                                </span>
                                <span class="">
                                    所属分类:
                                    <a href="{{url('articles')}}/{{$v['category_id']}}/{{$v['sub_category_id']}}/{{$v['name']}}" rel="category tag" data-pjax-state="">
                                        {{$v['name']}}
                                    </a>
                                </span>
                                <span class="">
                                    浏览量:
                                    <span id="article/{{$v['id']}}" class="leancloud_visitors" data-flag-title="{{$v['title']}}">
                                        {{$v['browser_num']}}
                                    </span>
                                </span>
                            </footer>
                        </article>
                        @endforeach
                @endif
            </ul>
        </div>
    </div>
    {{ ($contentData->links()) }}
</div>     
@endsection