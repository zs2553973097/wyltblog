<!DOCTYPE html>
<!-- saved from url=(0028)http://www.layuicms.com/v2/# -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>首页--我有辣条后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="http://www.layuicms.com/v2/favicon.ico">
	<link rel="stylesheet" href="{{url('')}}/blogadmin/layui.css?v=1.0" media="all">
	<link rel="stylesheet" href="{{url('')}}/blogadmin/index.css" media="all">
        <script type="text/javascript" src="{{url('')}}/blogadmin/layui.js"></script>
        <script>
            var layer = layui.layer
        ,$ = layui.$;
        
        var uid = "{{$uid}}";
        var token = "{{session('token')}}";
        var newsList = "{{url('newsList')}}";
        </script>
        <script type="text/javascript" src="{{url('')}}/blogadmin/index.js"></script>
	<script type="text/javascript" src="{{url('')}}/blogadmin/cache.js"></script>
        
    </head>
<body class="main_body">
	<div class="layui-layout layui-layout-admin">
		<!-- 顶部 -->
		<div class="layui-header header">
			<div class="layui-main mag0">
                            <a href="{{url('')}}/#" target="_blank" class="logo">辣条博客</a>
				<!-- 显示/隐藏菜单 -->
				<a href="javascript:;" class="seraph hideMenu icon-caidan"></a>
				<!-- 顶级菜单 -->
				<ul class="layui-nav mobileTopLevelMenus" mobile="">
					<li class="layui-nav-item" data-menu="contentManagement">
						<a href="javascript:;"><i class="seraph icon-caidan"></i><cite>layuiCMS</cite><span class="layui-nav-more"></span></a>
						<dl class="layui-nav-child">
							<dd class="layui-this" data-menu="contentManagement"><a href="javascript:;"><i class="layui-icon" data-icon=""></i><cite>内容管理</cite></a></dd>
							<dd data-menu="memberCenter"><a href="javascript:;"><i class="seraph icon-icon10" data-icon="icon-icon10"></i><cite>用户中心</cite></a></dd>
							<dd data-menu="systemeSttings"><a href="javascript:;"><i class="layui-icon" data-icon=""></i><cite>系统设置</cite></a></dd>
							<dd data-menu="seraphApi"><a href="javascript:;"><i class="layui-icon" data-icon=""></i><cite>使用文档</cite></a></dd>
						</dl>
					</li>
				<span class="layui-nav-bar"></span></ul>
				<ul class="layui-nav topLevelMenus" pc="">
					<li class="layui-nav-item layui-this" data-menu="contentManagement">
						<a href="javascript:;"><i class="layui-icon" data-icon=""></i><cite>内容管理</cite></a>
					</li>
					<li class="layui-nav-item" data-menu="memberCenter" pc="">
						<a href="javascript:;"><i class="seraph icon-icon10" data-icon="icon-icon10"></i><cite>用户中心</cite></a>
					</li>
					<li class="layui-nav-item" data-menu="systemeSttings" pc="">
						<a href="javascript:;"><i class="layui-icon" data-icon=""></i><cite>系统设置</cite></a>
					</li>
					<li class="layui-nav-item" data-menu="seraphApi" pc="">
						<a href="javascript:;"><i class="layui-icon" data-icon=""></i><cite>使用文档</cite></a>
					</li>
				<span class="layui-nav-bar" style="left: 20px; top: 45px; width: 0px; opacity: 0;"></span></ul>
			    <!-- 顶部右侧菜单 -->
			    <ul class="layui-nav top_menu">
					<li class="layui-nav-item" pc="">
						<a href="javascript:;" class="clearCache"><i class="layui-icon" data-icon=""></i><cite>清除缓存</cite><span class="layui-badge-dot"></span></a>
					</li>
					<li class="layui-nav-item lockcms" pc="">
						<a href="javascript:;"><i class="seraph icon-lock"></i><cite>锁屏</cite></a>
					</li>
					<li class="layui-nav-item" id="userInfo">
						<a href="javascript:;" id="testHeader"><img src="{{url('')}}/blogadmin/face.jpg" class="layui-nav-img userAvatar" width="35" height="35"><cite class="adminName">{{$userName}}</cite><span class="layui-nav-more"></span></a>
						<dl class="layui-nav-child layui-anim layui-anim-upbit" id="testHeader2">
							<dd><a href="javascript:;" data-url="page/user/userInfo.html"><i class="seraph icon-ziliao" data-icon="icon-ziliao"></i><cite>个人资料</cite></a></dd>
							<dd><a href="javascript:;" data-url="page/user/changePwd.html"><i class="seraph icon-xiugai" data-icon="icon-xiugai"></i><cite>修改密码</cite></a></dd>
							<dd><a href="javascript:;" class="showNotice"><i class="layui-icon"></i><cite>系统公告</cite><span class="layui-badge-dot"></span></a></dd>
							<dd pc=""><a href="javascript:;" class="functionSetting"><i class="layui-icon"></i><cite>功能设定</cite><span class="layui-badge-dot"></span></a></dd>
							<dd pc=""><a href="javascript:;" class="changeSkin"><i class="layui-icon"></i><cite>更换皮肤</cite></a></dd>
							<dd><a href="http://www.layuicms.com/v2/page/login/login.html" class="signOut"><i class="seraph icon-tuichu"></i><cite>退出</cite></a></dd>
						</dl>
					</li>
				<span class="layui-nav-bar" style="left: 270.5px; top: 45px; width: 0px; opacity: 0;"></span></ul>
			</div>
		</div>