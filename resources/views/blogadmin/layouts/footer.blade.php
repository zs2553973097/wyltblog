</div>

<script>
    //var refreshNum = 0;
    var uid = "{{$uid}}";
    var token = "{{$token}}";
    var url = "{{url('')}}/";
    layui.use(['jquery', 'layer', 'miniAdmin', 'miniTongji'], function () {
        var $ = layui.jquery,
            layer = layui.layer,
            miniAdmin = layui.miniAdmin,
            miniTongji = layui.miniTongji;

        var options = {
            iniUrl: "{{url('')}}/blogadmin/api/init.json",    // 初始化接口
            clearUrl: "{{url('')}}/blogadmin/api/clear.json", // 缓存清理接口
            renderPageVersion: true,    // 初始化页面是否加版本号
            bgColorDefault: false,      // 主题默认配置
            multiModule: true,          // 是否开启多模块
            menuChildOpen: false,       // 是否默认展开菜单
            loadingTime: 0,             // 初始化加载时间
            pageAnim: true,             // 切换菜单动画
            uid:uid,
            token:token,
            url:url
        };
        console.log(options);
        miniAdmin.render(options);

        // 百度统计代码，只统计指定域名
        miniTongji.render({
            specific: true,
            domains: [
                '99php.cn',
                'layuimini.99php.cn',
                'layuimini-onepage.99php.cn',
            ],
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $('.login-out').on("click", function () {
            $.ajax({
                url:"{{url('logout')}}",
                data:{uid:{{$uid}},token:"{{$token}}"},
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==16){
                        layer.msg('退出登录成功', function () {
                        window.location = '{{url("login")}}';
                    });
                    }else{
                        layer.msg(res.msg);
                    }
                    
                },
                error:function(){
                    layer.msg("提交出错");
                }
            });
            
        });
        
    });
    function baseInfo(uid,sex,type,userName){
        layui.use(['form', 'jquery'],function(){
            var form = layui.form;
            var $ = layui.jquery;
            //var layer = layui.layer;
            console.log(uid,sex,type);
            var set1;
            var set0;
            if(sex==0){
                set0 = "checked";
                set1 = "";
            }else{
                set1 = "checked";
                set0 = "";
            }
            layer.open({
                title:"用户资料",
                type: 1,
                area:["640px", "480px"],
                content:'<form class="layui-form c1"><div class="layui-form-item layui-row layui-col-xs12"><label class="layui-form-label">登录名</label><div class="layui-input-block"><input type="text" class="layui-input userName" name="name" id="userName" value="'+userName+'"></div></div><div class="layui-row"><div class="magb15 layui-col-md4 layui-col-xs12"><label class="layui-form-label">性别</label><div class="layui-input-block userSex"><input type="radio" name="sex" value="0" title="男" '+set0+'><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><div>男</div></div><input type="radio" name="sex" value="1" title="女" '+set1+'><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div></div></div><div class="magb15 layui-col-md4 layui-col-xs12"><label class="layui-form-label">审核状态</label><div class="layui-input-block"><select name="type" id="selectList" class="userStatus"><option value="0">限制用户</option><option value="1">正常使用</option></select><div class="layui-unselect layui-form-select"><dl class="layui-anim layui-anim-upbit"><dd class="layui-this">限制用户</dd><dd class="">正常使用</dd></dl></div></div></div></div><br><br><div class="layui-input-block"><div class="layui-right"> <a class="layui-btn layui-btn-sm" lay-filter="editUser" lay-submit="">立即修改</a> </div></div></form>'
            });
            $("#selectList").find("option[value="+type+"]").prop("selected",true);
            form.render();
            form.on('submit(editUser)',function(data){
            
            var name = $("#userName").val();
            if(name==""){
                layer.msg("用户名不能为空");
                return;
            }
            data.field.uid = uid;
            data.field.token = token;
            console.log(data.field);
                $.ajax({
                    url:"{{url('editUser')}}",
                    data:data.field,
                    type:"post",
                    dataType:"json",
                    success:function(res){
                        if(res.code==18){
                            layer.msg(res.msg);
                            window.location.reload();
                        }else{
                            layer.msg(res.msg);
                        }
                    },
                    error:function(){
                        layer.msg("提交修改出错");
                    }
                });
                return false;
            });
        });
    }
    function modifyPassword(id){
        layui.use(['form', 'jquery'],function(){
            var form = layui.form;
            var $ = layui.jquery;
            //var layer = layui.layer;
            layer.open({
                title:'修改密码',
                type: 1,
                area:['640px','480px'],
                content:'<form class="layui-form c1"><div class="layui-form-item magt3"><label class="layui-form-label">输入密码</label><div class="layui-input-block"><input type="password" class="layui-input userName" name="password" /></div></div><div class="layui-form-item magt3"><label class="layui-form-label">再次输入密码</label><div class="layui-input-block"><input type="password" class="layui-input userName" name="password2" /></div></div><br/><br/><div class="layui-input-block"><div class="layui-right"><a class="layui-btn layui-btn-sm" lay-filter="editPass" lay-submit="">立即修改</a></div></div></form>'
            });
            form.render();
            form.on('submit(editPass)',function(data){
                console.log(data.field);
                if(data.field.password==""||data.field.password2==""){
                    layer.msg("密码不能为空");
                    return false;
                }
                if(data.field.password!=data.field.password2){
                    layer.msg("密码两次输入不相等");
                    return false;
                }
                $.ajax({
                    url:"{{url('editUserPass')}}",
                    data:{uid: uid, token: token, id: id, password: data.field.password},
                    type:"post",
                    dataType:"json",
                    success:function(res){
                        if(res.code==38){
                            layer.msg(res.msg);
                            window.location.reload();
                        }else{
                            layer.msg(res.msg);
                        }
                    },
                    error:function(){
                        layer.msg("提交错误");
                    }
                });
            });
        });
    }
</script>
</body>
</html>