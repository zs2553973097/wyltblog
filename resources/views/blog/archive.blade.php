@extends("layouts.all")

@section("left")
<div class=" site-header ">
    <h2 class="gd-title gd-title-2 ">
        <span class="gd-line"  style="color:#ffffff;">黑色森林</span>
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
    <div class="site-main">
        
        <div class="site-main ">
 		<div class="page-header">
                    <h1 class="gd-title ">
                        <span class="gd-line text-size-1_5" style="color:#009900"> 归档</span>
                    </h1>
                </div>
 	</div>

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
        
    </script>
</div>
@endsection