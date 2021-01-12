<form class="layui-form c1">
   <div class="layui-form-item layui-row layui-col-xs12">
    <label class="layui-form-label">子分类名称</label>
    <div class="layui-input-block">
     <input type="text" class="layui-input userName" name="name" id="name" value="" />
    </div>
   </div>
   <div class="layui-row">
    
    <div class="magb15 layui-col-md4 layui-col-xs12">
     <label class="layui-form-label">所属父分类</label>
     <div class="layui-input-block">
      <select name="category_id" id="selectList" class="userStatus">
          @if($categoryData!=[])
          @foreach($categoryData as $v)
          <option value="{{$v['id']}}">{{$v['name']}}</option>
          @endforeach
          @endif
      </select>
     </div>
    </div>
   </div>
   <br />
   <br />
   <div class="layui-input-block">
    <div class="layui-right"> 
     <a class="layui-btn layui-btn-sm" lay-filter="addSubCategory" lay-submit="">添加子分类</a> 
    </div>
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
        $("#selectList").find("option[value="+0+"]").prop("selected",true);
        form.render();
        form.on('submit(addSubCategory)',function(data){
            data.field.uid = uid;
            data.field.token = token;
            if(data.field.name==""){
                layer.msg("子分类名称不能为空");
                return false;
            }
            if(data.field.category_id==""){
                layer.msg("父分类不能为空");
                return false;
            }
            $.ajax({
                url:"{{url('addSubCategoryApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code == 26){
                        layer.msg(res.msg);
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
</script>