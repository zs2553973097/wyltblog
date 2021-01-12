<div class="layui-tab-content clildFrame">
    <div class="layui-tab-item layui-show">
        
        <table id="linkList" lay-filter="test"></table>

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
    elem: '#linkList'
            , height: 500
            , url: '{{url("linkListApi")}}/{{$uid}}/{{$token}}' //数据接口

            , page: true //开启分页
            , limit:10

            , cols: [[ //表头
            {field: 'id', title: 'ID', width:'10%', sort: true, fixed: 'left'}
            , {field: 'name', title: '名称', width:'15%'}
            , {field: 'link', title: '地址', width:'25%'}
            , {field: '', title: '操作', width:'10%', templet: function(d){
            
            var space = "&nbsp;&nbsp;&nbsp;";
            var stredit = '<a href ="javascript:;"  class="layui-table-link"  onclick="editLink(' + d.id+',\''+d.link+'\'' + ',\''+d.name+'\');">编辑</a>';
            var str = stredit + space;
            var strdel = '<a href ="javascript:;"  class="layui-table-link" onclick="delLink(' + d.id + ');">删除</a>';
            str = str + strdel;
            return str;
            }}
            ]]
    });
    
});
function delLink(id){
        var layer = layui.layer;
        layer.confirm('是否删除本友链', {icon: 3, title:'提示'}, function(index){
        layui.use(['jquery'],function(){
            var $ = layui.jquery;
                $.ajax({
                url:"{{url('delLinkApi')}}",
                data:{uid: uid, token: token, id: id},
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==49){
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
function editLink(id, link, name){
    layui.use(['form','jquery'],function(){
        var form = layui.form;
        var $ = layui.jquery;
        layer.open({
            title:'友链编辑',
            type:1,
            area:['640px','480px'],
            content:'<form class="layui-form c1"><div class="layui-form-item layui-row layui-col-xs12"><label class="layui-form-label">友链名称</label><div class="layui-input-block"><input type="text" class="layui-input userName" name="name" id="name" value="'+name+'" placeholder="请输入友链名称"/></div></div><div class="layui-form-item layui-row layui-col-xs12"><label class="layui-form-label">友链地址</label><div class="layui-input-block"><input type="text" class="layui-input userName" name="link" id="link" value="'+link+'" placeholder="请输入友链地址"/></div></div><div class="layui-row"></div><br/><br/><div class="layui-input-block layui-right"><a class="layui-btn layui-btn-sm" lay-filter="edit" lay-submit="">编辑友链</a></div></form>'
        });
        form.render();
        form.on('submit(edit)',function(data){
            data.field.id = id;
            data.field.uid = uid;
            data.field.token = token;
            $.ajax({
                url:"{{url('editLinkApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==47){
                        layer.msg(res.msg);
                        window.location.reload();
                    }else{
                        layer.msg(res.msg);
                    }
                },
                error:function(){
                    layer.msg("提交失败");
                }
            });
        });
    });
}
</script>