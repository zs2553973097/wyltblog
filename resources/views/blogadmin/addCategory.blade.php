<form class="layui-form c1">
   <div class="layui-form-item layui-row layui-col-xs12">
    <label class="layui-form-label">分类名</label>
    <div class="layui-input-block">
        <input type="text" class="layui-input userName" name="name" id="name" value="" placeholder="请输入分类名称"/>
    </div>
   </div>
   <div class="layui-row"></div>
   <br />
   <br />
   <div class="layui-input-block layui-right">
    <a class="layui-btn layui-btn-sm" lay-filter="addCategory" lay-submit="">添加分类</a>
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
        form.on('submit(addCategory)',function(data){
            if(data.field.name==""){
                layer.msg("分类名称不能为空");
                return false;
            }
            data.field.uid = uid;
            data.field.token = token;
            $.ajax({
                url:"{{url('addCategoryApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==24){
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