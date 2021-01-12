<!-- 左侧导航 -->
<div class="layui-side layui-bg-black">
    <div class="user-photo">
        <a class="img" title="我的头像"><img src="{{url('')}}/blogadmin/face.jpg" class="userAvatar"></a>
        <p>你好！<span class="userName">{{$userName}}</span>, 欢迎登录111111</p>
    </div>
    <!-- 搜索 -->
    <div class="layui-form component">
        <select name="search" id="search" lay-search="" lay-filter="searchPage">
            <option value="">搜索页面或功能</option>
            <option value="1">layer</option>
            <option value="2">form</option>
        </select><div class="layui-form-select"><div class="layui-select-title"><input type="text" placeholder="搜索页面或功能" value="" class="layui-input"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">搜索页面或功能</dd><dd lay-value="1" class="">layer</dd><dd lay-value="2" class="">form</dd></dl></div>
        <i class="layui-icon"></i>
    </div>
    <div class="navBar layui-side-scroll" id="navBar" style="height: 532px;">
        <ul class="layui-nav layui-nav-tree" style="height: 532px;">
            <li class="layui-nav-item layui-this"><a data-url="page/main.html"><i class="layui-icon" data-icon=""></i><cite>后台首页</cite></a></li>
            <li class="layui-nav-item"><a data-url="#"><i class="seraph icon-text" data-icon="icon-text"></i><cite>文章列表</cite></a></li>
            <li class="layui-nav-item"><a data-url="page/img/images.html"><i class="layui-icon" data-icon=""></i><cite>图片管理</cite></a></li>
            <li class="layui-nav-item"><a><i class="layui-icon" data-icon=""></i><cite>其他页面</cite><span class="layui-nav-more"></span></a>
                <dl class="layui-nav-child">
                    <dd>
                        <a data-url="page/404.html"><i class="layui-icon" data-icon=""></i><cite>404页面</cite></a>
                    </dd>
                    <dd>
                        <a data-url="page/login/login.html" target="_blank"><i class="layui-icon" data-icon=""></i><cite>登录</cite></a>
                    </dd>
                </dl></li>
            <span class="layui-nav-bar" style="top: 22.5px; height: 0px; opacity: 0;"></span>
        </ul>
    </div>
</div>
<div class="layui-body layui-form">
    <div class="layui-tab mag0" lay-filter="bodyTab" id="top_tabs_box">
        <ul class="layui-tab-title top_tab" id="top_tabs">
            <li class="layui-this" lay-id=""><i class="layui-icon"></i> <cite>后台首页</cite></li>
        </ul>
        <ul class="layui-nav closeBox">
            <li class="layui-nav-item">
                <a href="javascript:;" id="testContent"><i class="layui-icon caozuo"></i> 页面操作<span class="layui-nav-more"></span></a>
                <dl class="layui-nav-child layui-anim layui-anim-upbit" id="testContent2">
                    
                    <dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon">ဂ</i> 刷新当前</a></dd>
                    <dd><a href="javascript:;" class="closePageOther"><i class="seraph icon-prohibit"></i> 关闭其他</a></dd>
                    <dd><a href="javascript:;" class="closePageAll"><i class="seraph icon-guanbi"></i> 关闭全部</a></dd>
                </dl>
            </li>
            <span class="layui-nav-bar" style="left: 48px; top: 35px; width: 0px; opacity: 0;"></span></ul>