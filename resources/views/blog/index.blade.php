@extends("layouts.all")

@section("left")
<div class="gd-content gd-content-left gd-cover">
    <img src={{$link}} class="gd-img" alt="墙角">
</div>
@endsection

@section("right")
<div class="gd-content gd-content-right">
    <div class="gd-content-inner" style="margin-top:120px;"><!-- <nav class="top-nav"><a href="/about.html" class="nav-link ">关于</a><a href="/archive.html" class="nav-link ">归档</a><a href="/links.html" class="nav-link ">邻居</a></nav> -->
                <h2 class="gd-title gd-title-1">
                    <span class="gd-line"   style="color:#ffffff;font-size: 22px;text-align: center">辣条铭言</span>
                </h2>
                    <div class="gd-desc">
                        <p><br></p>
                        <p style="line-height: 20px;"><span   style="color:#ffffff;">{{$motto}}</span></p>
                        <p><br></p>
                    </div>
                <div class="icon-list">
                    <img src='blog/weixin.png' id="weixin" />
                    <img src='blog/qq.png' id="qq" />
                    <img src='blog/weibo.png' id="weibo" />
                </div>
                <div style="margin-top: 38%;color:#ffffff;font-size: 12px;text-align: center;">
                    下拉查看推荐文章
                </div>
                <div class="gd-panel archive-list" style="margin-top:20% ">
                    <div class="gd-title ">
                        <span class="gd-line "  style="color:#009900">最近</span>
                    </div>
                    <ul class="hentry">
                        <link rel="stylesheet" href="{{url("")}}/blog/article.css">
                        @if($contents !=null)
                        @foreach($contents as $v)
                        
                        <article class="">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a class="post-title-link" href="article/{{$v['id']}}" rel="bookmark"
                                    data-pjax-state="">
                                        {{$v['title']}}
                                    </a>
                                </h2>
                            </header>
                            <div class="entry-content">
                                @if($v['bill']!=null)
                                <p style="text-align: center">
                                    <img src="{{url('')}}/{{$v['bill']}}"
                                    data-original="{{url('')}}/{{$v['bill']}}"
                                    alt="{{$v['title']}}">
                                </p>
                                @endif
                                <p>
                                    {{$v['description']}}
                                </p>
                                <p class="article-more-link">
                                    <a href="article/{{$v['id']}}" data-pjax-state="">
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
                                    <a href="{{url('')}}/articles/{{$v['category_id']}}/{{$v['sub_category_id']}}/{{$v['subcategoryName']}}" rel="category tag" data-pjax-state="">
                                        {{$v["subcategoryName"]}}
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
                    <span class="">
                                    
                                    <a href="{{url('')}}/category" style="color: red;">
                                        更多文章
                                    </a>
                                </span>
                </div>
            </div>
        </div>
@endsection
