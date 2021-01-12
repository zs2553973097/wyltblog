<form class="layui-form layui-row layui-col-space10">

<div class="layui-form-item magt3">
            <label class="layui-form-label">关于表内容</label>
            <div class="layui-input-block"> 
                 <div class="layuimini-container layuimini-page-anim">
                     
                        <div id="editor">
                        </div>
                     
                </div>
            </div>
            
        </div>
    <div class="layui-input-block layui-right">
    <hr class="layui-bg-gray">
            <div class="layui-right">
                <a class="layui-btn layui-btn-sm" lay-filter="addOrEditAbout" lay-submit=""><i class="layui-icon"></i>提交</a>

            </div>
    </div>
</form>
<script>
    layui.use([ 'wangEditor', 'form', 'jquery'], function () {
        var $ = layui.jquery,
        wangEditor = layui.wangEditor;
        form = layui.form;
        form.render();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var editor = new wangEditor('#editor');
        editor.customConfig.uploadImgServer = '{{url("upLoadImgApi")}}';
        editor.customConfig.uploadFileName = 'image';
        editor.customConfig.pasteFilterStyle = false;
        editor.customConfig.uploadImgMaxLength = 1;
        editor.customConfig.uploadImgMaxSize = 4 * 1024 * 1024; // 4M
        editor.customConfig.uploadImgHeaders = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        };
        editor.customConfig.uploadImgParams = {
            token: '{{$token}}',
            uid: '{{$uid}}',
            billFlag: false
        };
        editor.customConfig.uploadImgHooks = {
            // 上传超时
            timeout: function (xhr, editor) {
                layer.msg('上传超时！')
            },
            customInsert: function(insertImgFn, result) {
                // result 即服务端返回的接口
                console.log('customInsert', result);

                // insertImgFn 可把图片插入到编辑器，传入图片 src ，执行函数即可
                if(result.code==0){
                    var url = "{{url('')}}/";
                    insertImgFn(url+result.data[0]);
                }else{
                    layer.msg(result.msg);
                }
                
            }
        };
        editor.customConfig.customAlert = function (info) {
            layer.msg(info);
        };
        var imgsrc = [];
        editor.customConfig.onchange = function (html) {
          
          //if (imgsrc.length !== 0) 
          {
          var imgReg = /<img.*?(?:>|\/>)/gi
            // 匹配src属性
            var srcReg = /src=[\\"]?([^\\"]*)[\\"]?/i
            var arr = html.match(imgReg)
            let imgs = []
            if (arr) {
              for (let i = 0; i < arr.length; i++) {
                var src = arr[i].match(srcReg)[1]
                imgs.push(src)
              }
            }
          let nowimgs = imgs;
          let merge = imgsrc.concat(nowimgs).filter(function (v, i, arr) {
            return arr.indexOf(v) === arr.lastIndexOf(v)
          })
          imgsrc = nowimgs
          console.log("总图片路径：");
          console.log(imgsrc);
          for (let x in merge) {
            let colds = merge[x]
            //this.deleteImage(colds) //服务器删除文件 .split('/')
            console.log("要判断的图片路径：");
            console.log(colds);
            if(($.inArray(colds,imgsrc))==-1){
                console.log("可以删除的图片路径：");
                console.log(colds);
                deleteImage(colds,0);
            }else{
                console.log("不能删除的图片路径：");
                console.log(colds);
            }
            
          }
          
        };
        
        }.bind(this);
        
        function deleteImage(picPath,flag){
            $.ajax({
                url:"{{url('deleteImage')}}",
                data:{uid:uid, token:token, picPath:picPath},
                type:"post",
                dataType:"json",
                success:function(res){
                    //
                    if(flag==1){
                        $("#bill").val("");
                        $("#imgBill").attr("src", "");
                        $("#imgBill").attr("style", "display:none;");
                        layer.msg("删除封面成功");
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
        editor.create();
        editor.txt.html('{{$content}}');
        form.on('submit(addOrEditAbout)',function(data){
            var id = {{$id}};
            var content = editor.txt.html();
            if(content==""){
                layer.msg("内容不能为空");
                return false;
            }
            $.ajax({
                url:"{{url('addOrEditAboutApi')}}",
                data:{id: id, content: content, uid: {{$uid}}, token:"{{$token}}"},
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==41){
                        layer.msg("提交成功");
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