<form class="layui-form layui-row layui-col-space10">
    <br>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">我的铭言</label>
    <div class="layui-input-block">
        <textarea name="content" placeholder="请输入内容" id="content" class="layui-textarea" style="width: 800px;height: 260px;">{{$content}}</textarea>
    </div>
  </div>
<div class="layui-form-item">
    <div class="layui-input-block">
      <a class="layui-btn layui-btn-sm" lay-filter="formMotto" lay-submit="">立即提交</a>
    </div>
  </div>
</form>

<script>
    var uid = {{$uid}};
    var token = "{{$token}}";
    var id = {{$id}};
    layui.use(['form', 'jquery'],function(){
        
        var form = layui.form;
        var $ = layui.jquery;
        form.render();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        form.on('submit(formMotto)',function(data){
            var content = $("#content").val();
            if(content==""){
                layer.msg("内容不能为空");
                return false;
            }
            $.ajax({
                url:"{{url('mottoApi')}}",
                data:{id: id, uid: uid, token: token, content: content},
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==43){
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
            return false;
        });
    });
</script>