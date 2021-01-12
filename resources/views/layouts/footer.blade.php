

<footer class="site-footer" style="color:white;">Copyright(C)www.wyltblog.top, All Rights Reserved.<a style="color:white;" target="_blank" href="https://beian.miit.gov.cn/#/Integrated/index">湘ICP备2020021562号-1</a><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=43310102000298" style="color: white;display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="../../../../备案图标.png" style="float:left;"/>湘公网安备 43310102000298号</a></footer>
    </div>
    <!--
    <script src="{{url('')}}/blog/layui.all.js"></script>
    <script src="{{url('')}}/blog/iconfont.js"></script>-->
    <script>    var layer = layui.layer
        ,$ = layui.$;
        $('a span').mouseover(function(){
            $(this).attr("style", "color:#009900;font-size: 16px;");
        });
        $('a span').mouseout(function(){
            $(this).attr("style", "color:white;font-size: 16px;");
        });
        
        $('#weixin').mouseover(function(){
            $(this).attr("title","zwp13307433853");
            $(this).attr("src", "{{url('')}}/blog/weixin2.png");
        });
        $('#weixin').mouseout(function(){
            $(this).attr("src", "{{url('')}}/blog/weixin.png");
        });
        $('#qq').mouseover(function(){
            $(this).attr("title","2553973097");
            $(this).attr("src", "{{url('')}}/blog/qq2.png");
        });
        $('#qq').mouseout(function(){
            $(this).attr("src", "{{url('')}}/blog/qq.png");
        });
        $('#weibo').mouseover(function(){
            $(this).attr("title","暂无");
            $(this).attr("src", "{{url('')}}/blog/weibo2.png");
        });
        $('#weibo').mouseout(function(){
            $(this).attr("src", "{{url('')}}/blog/weibo.png");
        });
        $('#qq').click(function(){
            //location.href = "http://wpa.qq.com/msgrd?v=3&amp;uin=540785583&amp;site=qq&amp;menu=yes";
            location.href = "http://wpa.qq.com/msgrd?v=3&uin=2553973097&site=qq&menu=yes";
        });
        $('#weibo').click(function(){
            location.href = "#";
        });
</script></body></html>

