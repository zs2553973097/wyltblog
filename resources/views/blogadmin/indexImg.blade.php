<div class="layui-tab-content clildFrame">
    <div class="layui-tab-item layui-show">
        
        <table id="imageList" lay-filter="test"></table>

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
    elem: '#imageList'
            , height: 500
            , url: '{{url("imageListApi")}}/{{$uid}}/{{$token}}' //数据接口

            , page: true //开启分页
            , limit:10

            , cols: [[ //表头
            {field: 'id', title: 'ID', width:'10%', sort: true, fixed: 'left'}
            , {field: '', title: '图片', width:'30%', templet: function(d){
            var src = d.imglink;
            if(src.indexOf('http://')!=-1||src.indexOf('https://')!=-1){
                //
            }else{
                src = '{{url("")}}/'+src;
            }
            var strImg = '<div class="layui-input-block"><img id="img" src="'+src+'" onclick="big(this.src);" style="width:100px;height: 100px;"></div>';
            return strImg;
            }}
            , {field: 'imglink', title: '路径', width:'45%'}
            , {field: '', title: '操作', width:'10%', templet: function(d){
            var space = "&nbsp;&nbsp;&nbsp;";
            var stredit = '<a href ="javascript:;"  class="layui-table-link"  onclick="editIndexImg(' + d.id + ',\''+d.imglink + '\');">编辑</a>';
            var str = stredit + space;
            var strdel = '<a href ="javascript:;"  class="layui-table-link" onclick="delIndexImg(' + d.id +',\''+d.imglink +'\');">删除</a>';
            str = str + strdel;
            return str;
            }}
            ]]
    });
    
});
function big(src){
    
        layer.open({
            title:"图片查看",
            type:1,
            area:['80%', '80%'],
            content:'<img src="'+src+'" style="width:100%;height:100%;" />'
        });
    
}

function delIndexImg(id, imglink){
        var layer = layui.layer;
        layer.confirm('是否删除此图片', {icon: 3, title:'提示'}, function(index){
        layui.use(['jquery'],function(){
            var $ = layui.jquery;
                $.ajax({
                url:"{{url('delImageApi')}}",
                data:{uid: uid, token: token, id: id, imglink:imglink},
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==14){
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

function editIndexImg(id,pic){
    layui.use(['form','jquery', 'upload'],function(){
        var form = layui.form;
        var $ = layui.jquery;
        
        var imgsrc = "";
        var imglink = "";
        var imglinkNet = "";
        var display = "none;";
        var url = "{{url('')}}/";
        if(pic.indexOf("http://")!=-1||pic.indexOf("https://")!=-1){
            imglinkNet = pic;
        }else{
            imglink = url + pic;
            imgsrc = pic;
            display = "block;";
        }
        
        layer.open({
            title:'图片编辑',
            type:1,
            area:['640px','480px'],
            content:'<form class="layui-form layui-row layui-col-space10"><div class="layui-form-item magt3"><label class="layui-form-label">首页图片</label><div class="layui-input-block"><img id="imgsrc" src="'+imglink+'" style="width:100px;height: 100px;display: '+display+'"></div><br><div class="layui-input-block"><button type="button" class="layui-btn" id="testUpImage"><i class="layui-icon">&#xe67c;</i>上传图片</button><button type="button" class="layui-btn" id="deleteImg">删除图片</button></div></div><div class="layui-form-item magt3" style="height: 0px;display: none;"><div class="layui-input-block"><input type="hidden" class="layui-input newsName" lay-verify="newsCategoryId" id="imglink" value="'+imgsrc+'"></div></div><div class="layui-form-item magt3"><label class="layui-form-label">网络图片URL</label><div class="layui-input-block"><input type="text" class="layui-input newsName" id="imglinkNet" lay-verify="newsName" value="'+imglinkNet+'"></div></div><hr class="layui-bg-gray"><div class="layui-input-block"><div class="layui-right"><a class="layui-btn layui-btn-sm" lay-filter="editImg" lay-submit=""><i class="layui-icon"></i>提交修改</a></div></div></form>'
        });
        form.render();
        form.on('submit(editImg)',function(data){
            var imglink = $("#imglink").val();
            var imglinkNet = $("#imglinkNet").val();
            if(imglink =="" && imglinkNet ==""){
                layer.msg("图片上传或网络图片必须其一");
                return false;
            }
            if(imglink==""){
                data.field.imglink = imglinkNet;
            }else{
                data.field.imglink = imglink;
            }
            console.log(data.field);
            data.field.id = id;
            data.field.uid = uid;
            data.field.token = token;
            $.ajax({
                url:"{{url('editImgApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==36){
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
        var upload = layui.upload;
        var uploadInst = upload.render({
          elem: '#testUpImage' //绑定元素
          ,url: '{{url("upLoadImgApi")}}' //上传接口
          ,data:{
              token:'{{$token}}',
              uid:'{{$uid}}',
              billFlag:true
          }
          ,done: function(res){
            //上传完毕回调
            var url = '{{url("")}}/';
            $('#imgsrc').attr('src',url+res.data[0]);
            $("#imgsrc").attr("style", "width:100px;height:100px;display:block;")
            $("#imglink").val(res.data[0]);
            layer.msg("上传图片成功");
          }
          ,error: function(){
            //请求异常回调
            layer.msg('提交上传图片失败');
          }
        });
        function deleteImage(picPath,flag){
            $.ajax({
                url:"{{url('deleteImage')}}",
                data:{uid:uid, token:token, picPath:picPath},
                type:"post",
                dataType:"json",
                success:function(res){
                    //
                    if(flag==1){
                        $("#imglink").val("");
                        $("#imgsrc").attr("src", "");
                        $("#imgsrc").attr("style", "display:none;");
                        layer.msg("删除图片成功");
                    }
                    if(res.code==15){
                        layer.msg(res.msg);
                    }
                },
                error:function(){
                    layer.msg("删除图片出错");
                }
            });
        };
        $("#deleteImg").click(function(){
            var picPath = $("#imgsrc").attr("src");
            var url = '{{url("")}}/';
            deleteImage(picPath,1);
        });
    });
}
</script>