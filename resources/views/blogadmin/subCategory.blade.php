<div class="layui-tab-content clildFrame">
    <div class="layui-tab-item layui-show">
        
        <table id="subCategoryList" lay-filter="test"></table>

    </div>
</div>
<script>
    var uid = {{$uid}};
    var token = '{{$token}}';
    layui.use([ 'table', 'jquery'], function(){
    var table = layui.table;
    var $ = layui.jquery;
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var tableIns = table.render({
    elem: '#subCategoryList'
            , height: 500
            , url: '{{url("subCategoryListApi")}}/{{$uid}}/{{$token}}' //数据接口

            , page: true //开启分页
            , limit:10

            , cols: [[ //表头
            {field: 'id', title: 'ID', width:'10%', sort: true, fixed: 'left'}
            , {field: 'name', title: '子分类名称', width:'15%'}
            , {field: 'category', title: '父分类名称', width:'15%'}
            , {field: '', title: '操作', width:'10%', templet: function(d){
            
            var space = "&nbsp;&nbsp;&nbsp;";
            var stredit = '<a href ="javascript:;"  class="layui-table-link"  onclick="editSubCategory(' + d.id +','+d.category_id+ ',\''+d.name+'\');">编辑</a>';
            var str = stredit + space;
            var strdel = '<a href ="javascript:;"  class="layui-table-link" onclick="delSubCategory(' + d.id + ');">删除</a>';
            str = str + strdel;
            return str;
            }}
            ]]
    });
    
});
function delSubCategory(id){
    var layer = layui.layer;
        layer.confirm('是否删除本分类', {icon: 3, title:'提示'}, function(index){
        layui.use(['jquery'],function(){
            var $ = layui.jquery;
                $.ajax({
                url:"{{url('delSubCategoryApi')}}",
                data:{uid: uid, token: token, id: id},
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==32){
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
        layer.close(index);
      });
}
function editSubCategory(id,category_id,name){
    layui.use(['form','jquery'],function(){
        var form = layui.form;
        var $ = layui.jquery;
        layer.open({
            title:'子分类编辑',
            type:1,
            area:['640px','480px'],
            content:'<form class="layui-form c1"><div class="layui-form-item layui-row layui-col-xs12"><label class="layui-form-label">子分类名称</label><div class="layui-input-block"><input type="text" class="layui-input userName" name="name" id="name" value="'+name+'"/></div></div><div class="layui-row"><div class="magb15 layui-col-md4 layui-col-xs12"><label class="layui-form-label">所属父分类</label><div class="layui-input-block"><select name="category_id" id="selectList" class="userStatus"><option value="0">text</option></select></div></div></div><br/><br/><div class="layui-input-block"><div class="layui-right"><a class="layui-btn layui-btn-sm" lay-filter="editSubCategory" lay-submit="">编辑</a></div></div></form>'
        });
        $.ajax({
            url:"{{url('getDefaultCategoryApi')}}",
            data:{uid: uid, token: token},
            type:"post",
            dataType:"json",
            async:false,
            success:function(res){
                if(res.code == 200){
                    var data = res.data;
                    var length = data.length;
                    var html = '';
                    for(var i=0;i<length;i++){
                        html+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $("#selectList").html(html);
                }else{
                    layer.msg(res.msg);
                }
            },
            error:function(){
                layer.msg("提交出错");
            }
        });
        $("#selectList").find("option[value="+category_id+"]").prop("selected",true);
        form.render();
        form.on('submit(editSubCategory)',function(data){
            data.field.id = id;
            data.field.uid = uid;
            data.field.token = token;
            $.ajax({
                url:"{{url('editSubCategoryApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code == 30){
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