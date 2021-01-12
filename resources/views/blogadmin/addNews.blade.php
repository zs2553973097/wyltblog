
<form class="layui-form layui-row layui-col-space10">
    <div class="layui-col-md9 layui-col-xs12">
        <div class="layui-row layui-col-space10">
            <div class="layui-col-md9 layui-col-xs7">
                
                <div class="layui-form-item magt3">
                    <label class="layui-form-label">文章封面</label>
                    <div class="layui-input-block">
                        <img id="imgBill" src="" style="width:100px;height: 100px;display: none;">
                    </div>
                    <div class="layui-input-block">
                        <button type="button" class="layui-btn" id="testUpImage">
                            <i class="layui-icon">&#xe67c;</i>上传封面
                          </button>
                        <button type="button" class="layui-btn" id ="deleteBill">删除封面</button>
                    </div>
                </div>
                
                <div class="layui-form-item magt3">
                    <label class="layui-form-label">文章标题</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input newsName" lay-verify="newsName" name="title" placeholder="请输入文章标题">
                    </div>
                </div>
                <div class="layui-form-item magt3">
                    <label class="layui-form-label">文章描述</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input newsName" lay-verify="newsName" name="description" placeholder="请输入文章描述">
                    </div>
                </div>
                <div class="layui-form-item magt3">
                    <label class="layui-form-label">文章来源</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input newsName" lay-verify="newsOrigin" name="origin" placeholder="请输入文章来源">
                    </div>
                </div>
                <div class="layui-form-item magt3">
                    <label class="layui-form-label">文章出处</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input newsName" lay-verify="newsReference" name="reference" placeholder="请输入文章出处">
                    </div>
                </div>
                <div class="layui-form-item magt3">
                    <label class="layui-form-label">文章分类</label>
                    <div class="layui-input-block">
                        <input type="text" class="layui-input newsName" id="newsCategory"  lay-verify="newsCategory"  placeholder="请选择文章分类">
                    </div>
                </div>
                <div class="layui-form-item magt3" style="height: 0px;display: none;">
                    <div class="layui-input-block">
                        
                        <input type="hidden" class="layui-input newsName" id="newsSubCategoryId" lay-verify="newsSubCategoryId"  name="sub_category_id">
                        
                    </div>
                </div>
                <div class="layui-form-item magt3" style="height: 0px;display: none;">
                    <div class="layui-input-block">
                        
                        <input type="hidden" class="layui-input newsName" id="newsCategoryId" lay-verify="newsCategoryId"  name="category_id">
                    </div>
                </div>
                <div class="layui-form-item magt3"  style="height: 0px;display: none;">
                    <div class="layui-input-block">
                        
                        <input type="hidden" class="layui-input newsName" id="uid" lay-verify="newsSubCategoryId"  name="uid" value="{{$uid}}">
                        
                    </div>
                </div>
                <div class="layui-form-item magt3" style="height: 0px;display: none;">
                    <div class="layui-input-block">
                        
                        <input type="hidden" class="layui-input newsName" id="token" lay-verify="newsCategoryId"  name="token" value="{{$token}}">
                    </div>
                </div>
                <div class="layui-form-item magt3" style="height: 0px;display: none;">
                    <div class="layui-input-block">
                        
                        <input type="hidden" class="layui-input newsName" id="bill" lay-verify="newsCategoryId"  name="bill" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item magt3">
            <label class="layui-form-label">文章内容</label>
            <div class="layui-input-block"> 
                 <div class="layuimini-container layuimini-page-anim">
                    <style type="text/css">
                        .toolbar {
                            border: 1px solid #ccc;/*设置下拉棒*/
                        }
                        .w-e-text-container{
                            height: 900px !important;/*!important是重点，因为原div是行内样式设置的高度300px*/
                        }
                    </style>
                        <div id="editor" class="toolbar">
                            <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
                        </div>
                     
                </div>
            </div>
            
        </div>
    </div>
    <div class="layui-col-md3 layui-col-xs12">

        <blockquote class="layui-elem-quote title"><i class="seraph icon-caidan"></i> 分类目录</blockquote>
        <div class="border category">
            <div id="test1"></div>
        </div>
        <blockquote class="layui-elem-quote title magt10"><i class="layui-icon"></i> 发布</blockquote>
        <div class="border">

            <div class="layui-form-item magt3">
                <label class="layui-form-label">审核状态</label>
                <div class="layui-input-block">
                    
                    <input type="radio" name="article_verify" value="1" title="开放浏览" checked>
                    <input type="radio" name="article_verify" value="0" title="私密浏览" >
                </div>
            </div>


            <hr class="layui-bg-gray">
            <div class="layui-right">
                <a class="layui-btn layui-btn-sm" lay-filter="addNews" lay-submit=""><i class="layui-icon"></i>发布</a>

            </div>
        </div>
    </div>

</form>

<script>
    layui.use(['layer', 'wangEditor', 'tree', 'form', 'jquery', 'upload'], function () {
        var $ = layui.jquery,
                layer = layui.layer,
                wangEditor = layui.wangEditor;
        form = layui.form;
        form.render();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var upload = layui.upload;
        //执行实例
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
            $('#imgBill').attr('src',url+res.data[0]);
            $("#imgBill").attr("style", "width:100px;height:100px;display:block;")
            $("#bill").val(res.data[0]);
            layer.msg("上传封面成功");
          }
          ,error: function(){
            //请求异常回调
            layer.msg('提交上传海报失败');
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
        
        var dataTree = [];
        $.ajax({
            url: "{{url('getCategoryApi')}}",
            data: "",
            type: "post",
            async: false,
            dataType: "json",
            success: function (res) {
                //console.log(res);
                if (res.code == 200) {
                    var data = res.data;
                    if (data != []) {
                        var category = data.category;
                        var subcategory = data.subcategory;
                        var arrAll = [];
                        for (var i in category) {
                            var titleParent = category[i].name;
                            var idParent = category[i].id;
                            var objParent = {};
                            var arrChild = [];
                            objParent.title = titleParent;
                            objParent.id = idParent;

                            for (var j in subcategory) {
                                if (subcategory[j].category_id == idParent) {
                                    var obj = {};
                                    obj.title = subcategory[j].name;
                                    obj.id = subcategory[j].id;
                                    obj.category_id = subcategory[j].category_id;
                                    arrChild.push(obj);
                                }
                            }
                            objParent.children = arrChild;
                            arrAll.push(objParent);
                        }
                        dataTree = arrAll;
                        console.log(dataTree);
                        var tree = layui.tree;
                        //渲染
                        var inst1 = tree.render({
                            elem: '#test1'  //绑定元素
                            , data: dataTree
                            ,click:function(obj){
                                
                                if(obj.data.children==undefined){
                                    var jsonData = obj.data;
                                    //alert(jsonData);
                                    var title = jsonData.title;
                                    var id = jsonData.id;
                                    var category_id = jsonData.category_id;
                                    $('#newsCategory').val(title);
                                    $('#newsCategoryId').val(category_id);
                                    $('#newsSubCategoryId').val(id);
                                    layer.msg($("#newsCategory").val());
                                }
                            }
                        });
                    }
                }
                //return false;
            },
            error: function () {
                layer.msg("取分类错误");
            }
        });
        form.on('submit(addNews)',function(data){
            if(data.field.title==""){
                layer.msg("文章标题必填");
                return;
            }
            if(data.field.description==""){
                layer.msg("文章描述必填");
                return;
            }
            if(data.field.origin==""){
                layer.msg("文章来源必填，未知填未知");
                return;
            }
            if(data.field.reference==""){
                layer.msg("文章出处必填");
                return;
            }
            if(data.field.sub_category_id==""){
                layer.msg("文章分类必选");
                return;
            }
            var content = editor.txt.html();
            data.field.content = content;
            console.log(data.field);
            $.ajax({
                url:"{{url('addArticleApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==8){
                        layer.msg("发布成功");
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
        $("#deleteBill").click(function(){
            var picPath = $("#imgBill").attr("src");
            var url = '{{url("")}}/';
            deleteImage(picPath,1);
        });
        form.on('radio(test)', function (data) {
            console.log(data.elem); //得到radio原始DOM对象
            console.log(data.value); //被点击的radio的value值
        });

    });

</script>