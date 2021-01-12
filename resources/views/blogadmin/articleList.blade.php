
<div class="layui-tab-content clildFrame">
    <div class="layui-tab-item layui-show">
        <form class="layui-form">
            <blockquote class="layui-elem-quote quoteBox">

                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input searchVal" id="searchVal" placeholder="请输入搜索的内容" value="">
                    </div>
                    <a class="layui-btn search_btn" id="reload" data-type="reload">搜索</a>
                </div>
                
            </blockquote>
        </form>
        <table id="articleList" lay-filter="test"></table>

    </div>
</div>
<style type="text/css">
.toolbar {
border: 1px solid #ccc;/*设置下拉棒*/
}
.w-e-text-container{
height: 900px !important;/*!important是重点，因为原div是行内样式设置的高度300px*/
}
</style>
<script>
    var uid = {{$uid}};
    var token = '{{$token}}';
    layui.use(['form', 'table', 'jquery'], function(){
    var table = layui.table;
    var form = layui.form;
    var $ = layui.jquery;
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var tableIns = table.render({
    elem: '#articleList'
            , height: 500
            , url: '{{url("articleListApi")}}/{{$uid}}/{{$token}}' //数据接口

            , page: true //开启分页
            , limit:10

            , cols: [[ //表头
            {field: 'id', title: 'ID', width:'10%', sort: true, fixed: 'left'}
            , {field: 'title', title: '文章标题', width:'15%'}
            , {field: 'create_time', title: '创建时间', width:'15%'}
            , {field: 'update_time', title: '更新时间', width:'15%'}
            , {field: 'origin', title: '来源', width: '12%'}
            , {field: 'reference', title: '出处', width: '12%'}
            , {field: '', title: '操作', width:'10%', templet: function(d){
            
            var space = "&nbsp;&nbsp;&nbsp;";
            var stredit = '<a href ="javascript:;"  class="layui-table-link"  onclick="editArticle(' + d.id + ','+d.article_verify+');">编辑</a>';
            var str = stredit + space;
            var strdel = '<a href ="javascript:;"  class="layui-table-link" onclick="delArticle(' + d.id + ');">删除</a>';
            str = str + strdel;
            return str;
            }}
            , {field: 'article_verify', title:'审核通过', width:'10%', templet: function(d){
            var status = "";
            if (d.article_verify == 1){
            status = "checked";
            }
            var str = '<input type="checkbox" name="article_verify" value="' + d.id + '" lay-skin="switch" lay-text="是|否" lay-filter="isShow"  ' + status + ' >';
            return str;
            }}
            ]]
    });
    $("#reload").click(function(){
    var searchVal = $("#searchVal").val();
    {
    //这里以搜索为例
    tableIns.reload({
    where: { //设定异步数据接口的额外参数，任意设
    searchVal: searchVal,
    }
    , page: {
    curr: 1 //重新从第 1 页开始
    }
    });
    $("#searchVal").val(searchVal);
    }
    });
    $("#addNews").click(function(){
    window.location.href = "{{url('addNews')}}/{{$uid}}/{{$token}}";
    });
    $("#delAll").click(function(){
    window.location.reload();
    });
    //监听'是否设置新生注册显示'操作
    form.on('switch(isShow)', function(obj){
    var id = this.value; // 当行ID
    var isShow = this.checked ? 1 : 0; // 选中状态
    var llo = layer.load(2, {shade:[0.001, '#fff']}); //layer.load() - 加载层
    $.ajax({
    url: '{{url("articleVerifyApi")}}',
            type: "post",
            cache:false,
            dataType: "json",
            async:false,
            data: {id: id, article_verify: isShow, uid:uid, token:token}, // 参数
            success: function(data) {
            var searchVal = $("#searchVal").val();
            tableIns.reload({
            where :{searchVal:searchVal}, // 设定异步数据接口的额外参数，任意设
            }, 'data'); //只重载数据
            $("#searchVal").val(searchVal);
            },
            error: function(xhr) {
            layer.close(llo); //关闭特定层
            layer.msg('提交错误');
            }
    });
    layer.close(llo);
    return false;
    });
});
function delArticle(id){
    var layer = layui.layer;
    layer.confirm('是否删除本文章', {icon: 3, title:'提示'}, function(index){
    //do something
    layui.use(['jquery'],function(){
        var $ = layui.jquery;
        $.ajax({
            url:"{{url('delArticleByIdApi')}}",
            data:{id:id,uid:uid,token:token},
            type:"post",
            dataType:"json",
            success:function(res){
                if(res.code==20){
                    layer.msg(res.msg);
                    window.location.reload();
                }else{
                    layer.msg(res.msg);
                }
            },
            error:function(){
                layer.msg();
            }
            
        });
    });
    layer.close(index);
  });
}    
function editArticle(id, article_verify){
    layui.use([ 'wangEditor', 'tree', 'form', 'jquery', 'upload'], function(){
    var layer = layui.layer;
    var $ = layui.jquery;
    var form = layui.form;
    var set1;
    var set0;
    if(article_verify==1){
        set1 = "checked";
        set0 = "";
    }else{
        set0 = "checked";
        set1 = "";
    }
    layer.open({
    title:'文章编辑',
            type: 1,
            area: ['1400px', '740px'],
            content: '<form class="layui-form layui-row layui-col-space10"> <div class="layui-col-md9 layui-col-xs12"> <div class="layui-row layui-col-space10"> <div class="layui-col-md9 layui-col-xs7"> <div class="layui-form-item magt3"><label class="layui-form-label">文章封面</label><div class="layui-input-block"><img id="imgBill" src="" class="c1" name="imgBill"  style="width:100px;height: 100px;display: none;"></div><div class="layui-input-block"><button type="button" class="layui-btn" id="testUpImage"><i class="layui-icon"></i>上传封面</button> <button type="button" class="layui-btn" id="deleteBill">删除封面</button></div></div> <div class="layui-form-item magt3"> <label class="layui-form-label">文章标题</label> <div class="layui-input-block"> <input type="text" class="layui-input newsName" lay-verify="newsName" name="title" placeholder="请输入文章标题" /> </div> </div> <div class="layui-form-item magt3"><label class="layui-form-label">文章描述</label><div class="layui-input-block"><input type="text" class="layui-input newsName" name="description"></div></div> <div class="layui-form-item magt3"> <label class="layui-form-label">文章来源</label> <div class="layui-input-block"> <input type="text" class="layui-input newsName" lay-verify="newsOrigin" name="origin" placeholder="请输入文章来源" /> </div> </div> <div class="layui-form-item magt3"> <label class="layui-form-label">文章出处</label> <div class="layui-input-block"> <input type="text" class="layui-input newsName" lay-verify="newsReference" name="reference" placeholder="请输入文章出处" /> </div> </div> <div class="layui-form-item magt3"> <label class="layui-form-label">文章分类</label> <div class="layui-input-block"> <input type="text" class="layui-input newsName" id="newsCategory" lay-verify="newsCategory" /> </div> </div> <div class="layui-form-item magt3" style="height:0px;display:none;"> <div class="layui-input-block"> <input type="hidden" class="layui-input newsName" id="newsSubCategoryId" lay-verify="newsSubCategoryId" name="sub_category_id" /> </div> </div> <div class="layui-form-item magt3" style="height:0px;display:none;"> <div class="layui-input-block"> <input type="hidden" class="layui-input newsName" id="newsCategoryId" lay-verify="newsCategoryId" name="category_id" /> </div> </div> <div class="layui-form-item magt3" style="height:0px;display:none;"> <div class="layui-input-block"> <input type="hidden" class="layui-input newsName" id="uid" lay-verify="newsSubCategoryId" name="uid" value="" /> </div> </div> <div class="layui-form-item magt3" style="height:0px;display:none;"> <div class="layui-input-block"> <input type="hidden" class="layui-input newsName" id="token" lay-verify="newsCategoryId" name="token" value="" /> </div> </div> <div class="layui-form-item magt3 layui-input-block c1"  style="height: 0px;display: none;"><input type="hidden" class="layui-input newsName" id="bill" name="bill" value=""></div> </div> </div> <div class="layui-form-item magt3"> <label class="layui-form-label">文章内容</label> <div class="layui-input-block"> <div class="layuimini-container layuimini-page-anim"> <div id="editor" class="toolbar"> <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p> </div> </div> </div> </div> </div> <div class="layui-col-md3 layui-col-xs12"> <blockquote class="layui-elem-quote title"> <i class="seraph icon-caidan"></i> 分类目录 </blockquote> <div class="border category"> <div id="test1"></div> </div> <blockquote class="layui-elem-quote title magt10"> <i class="layui-icon"></i> 发布 </blockquote> <div class="border"> <div class="layui-form-item magt3"> <label class="layui-form-label">审核状态</label> <div class="layui-input-block"> <input type="radio" name="article_verify" value="1" title="开放浏览" id="set1" '+set1+'> <input type="radio" name="article_verify" value="0" title="私密浏览" id="set0" '+set0+'> </div> </div> <hr class="layui-bg-gray" /> <div class="layui-right"> <a class="layui-btn layui-btn-sm" lay-filter="editNews" lay-submit=""><i class="layui-icon"></i>发布</a> </div> </div> </div> </form>'
    });
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
            billFlag:false
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
        
        function deleteImage(picPath, flag){
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
                        $("#imgBill").attr("style", "display:none;")
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
                            , click:function(obj){

                            if (obj.data.children == undefined){
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
            error: function() {
                        layer.msg("取分类错误");
                    }
            });
            
            $.ajax({
                url:"{{url('getArticleByIdApi')}}",
                data:{ uid:uid, token:token, id:id},
                type:"post",
                dataType:"json",
                async:false,
                success:function(res){
                    var url = '{{url("")}}/';
                    $('#imgBill').attr('src',url+res.data.bill);
                    if(res.data.bill!=null){
                        $("#imgBill").attr("style", "width:100px;height:100px;display:block;");
                    }
                    
                    $("#bill").val(res.data.bill);
                    $("[name='title']").val(res.data.title);
                    $("[name='origin']").val(res.data.origin);
                    $("[name='reference']").val(res.data.reference);
                    $("#newsCategory").val(res.data.category);
                    $("[name='sub_category_id']").val(res.data.sub_category_id);
                    $("[name='category_id']").val(res.data.category_id);
                    $("[name='description']").val(res.data.description);
                    $("[name='uid']").val(uid);
                    $("[name='token']").val(token);
                    var str = res.data.content;
                    editor.txt.html(str);
                },
                error:function(){}
            });
            
            form.on('submit(editNews)',function(data){
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
            data.field.id = id;
            console.log(data.field);
            $.ajax({
                url:"{{url('editArticleApi')}}",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.code==12){
                        layer.msg("编辑成功");
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
            });
        }
                            
                                                    
</script>