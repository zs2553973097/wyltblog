<form class="layui-form c1">
   <div class="layui-form-item layui-row layui-col-xs12">
    <label class="layui-form-label">友链名称</label>
    <div class="layui-input-block">
        <input type="text" class="layui-input userName" name="name" id="name" value="" placeholder="请输入友链名称"/>
    </div>
   </div>
   <div class="layui-form-item layui-row layui-col-xs12">
    <label class="layui-form-label">友链地址</label>
    <div class="layui-input-block">
        <input type="text" class="layui-input userName" name="link" id="link" value="" placeholder="请输入友链地址"/>
    </div>
   </div>
   <div class="layui-row"></div>
   <br />
   <br />
   <div class="layui-input-block layui-right">
    <a class="layui-btn layui-btn-sm" lay-filter="addLink" lay-submit="">添加友链</a>
   </div>
  </form>
<script>
    var uid = {{$uid}};
    var token = "{{$token}}";
    layui.use(['form', 'jquery'],function(){
        var form = layui.form;
        var $ = layui.jquery;
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        form.on('submit(addLink)',function(data){
            if(data.field.name==""){
                layer.msg("友链名称不能为空");
                return false;
            }
            if(data.field.link==""){
                layer.msg("友链地址不能为空");
                return false;
            }
            data.field.uid = uid;
            data.field.token = token;
            $.ajax({
                url:"{{url('addLinkApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==45){
                        layer.msg(res.msg);
                        //window.location.reload();
                    }else{
                        layer.msg(res.msg);
                    }
                },
                error:function(){
                    layer.msg();
                }
            });
            return false;
        });
    });
</script>