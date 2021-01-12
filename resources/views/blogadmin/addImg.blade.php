<form class="layui-form layui-row layui-col-space10">

<div class="layui-form-item magt3">
                    <label class="layui-form-label">首页图片</label>
                    <div class="layui-input-block">
                        <img id="imgsrc" src="" style="width:100px;height: 100px;display: none;">
                    </div>
                    <div class="layui-input-block">
                        <button type="button" class="layui-btn" id="testUpImage">
                            <i class="layui-icon">&#xe67c;</i>上传图片
                          </button>
                        <button type="button" class="layui-btn" id ="deleteImg">删除图片</button>
                    </div>
</div>
<div class="layui-form-item magt3" style="height: 0px;display: none;">
                    <div class="layui-input-block">
                        
                        <input type="hidden" class="layui-input newsName"  lay-verify="newsCategoryId" id="imglink">
                    </div>
                </div>
<div class="layui-form-item magt3">
                    <label class="layui-form-label">网络图片URL</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input newsName" id="imglinkNet" lay-verify="newsName"  placeholder="请输入网络图片路径">
                    </div>
                </div>
<hr class="layui-bg-gray">
<div class="layui-input-block">
            <div class="layui-right">
                <a class="layui-btn layui-btn-sm" lay-filter="addImg" lay-submit=""><i class="layui-icon"></i>添加</a>

            </div>
</div>
</form>
<script>
    var uid = {{$uid}};
    var token = "{{$token}}";
    layui.use(['jquery','upload','form'],function(){
        var $ = layui.jquery;
        var upload = layui.upload;
        var form = layui.form;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
        form.on('submit(addImg)',function(data){
            var imglink = $("#imglink").val();
            var imglinkNet = $("#imglinkNet").val();
            if(imglink==""&&imglinkNet==""){
                layer.msg("图片上传或网络图片路径必须有其一");
                return false;
            }
            if(imglink!=""){
                data.field.imglink = imglink;
            }else if(imglinkNet!=""){
                data.field.imglink = imglinkNet;
            }
            data.field.uid = uid;
            data.field.token = token;
            console.log(data.field);
            $.ajax({
                url:"{{url('addIndexImgApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==200){
                        layer.msg("首页图片发布成功");
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
</script>
