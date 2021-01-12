@extends("blogadmin.layouts.all")
<!-- 右侧内容 -->
@section("right")

        <div class="layui-tab-content clildFrame">
            <div class="layui-tab-item layui-show">
                <form class="layui-form">
                    <blockquote class="layui-elem-quote quoteBox">

                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input searchVal" placeholder="请输入搜索的内容">
                            </div>
                            <a class="layui-btn search_btn" data-type="reload">搜索</a>
                        </div>
                        <div class="layui-inline">
                            <a class="layui-btn layui-btn-normal addNews_btn">添加文章</a>
                        </div>
                        <div class="layui-inline">
                            <a class="layui-btn layui-btn-danger layui-btn-normal delAll_btn">批量删除</a>
                        </div>

                    </blockquote></form>
                <table id="newsList" lay-filter="newsList">

                </table>

                <div class="layui-form layui-border-box layui-table-view" lay-filter="LAY-table-1" style=" height:477px;">
                    <div class="layui-table-box">
                        <div class="layui-table-header">
                            <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                                <thead>
                                    <tr>
                                        <th data-field="0" data-unresize="true">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-filter="layTableAllChoose" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></th>
                                        <th data-field="newsId">
                                            <div class="layui-table-cell laytable-cell-1-newsId" align="center">
                                                <span>ID</span>
                                            </div></th>
                                        <th data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                <span>文章标题</span>
                                            </div></th>
                                        <th data-field="newsAuthor">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor" align="center">
                                                <span>发布者</span>
                                            </div></th>
                                        <th data-field="newsStatus">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus" align="center">
                                                <span>发布状态</span>
                                            </div></th>
                                        <th data-field="newsLook">
                                            <div class="layui-table-cell laytable-cell-1-newsLook" align="center">
                                                <span>浏览权限</span>
                                            </div></th>
                                        <th data-field="newsTop">
                                            <div class="layui-table-cell laytable-cell-1-newsTop" align="center">
                                                <span>是否置顶</span>
                                            </div></th>
                                        <th data-field="newsTime" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime" align="center">
                                                <span>发布时间</span>
                                            </div></th>
                                        <th data-field="8">
                                            <div class="layui-table-cell laytable-cell-1-8" align="center">
                                                <span>操作</span>
                                            </div></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="layui-table-body layui-table-main" style="height: 396px;">
                            <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                                <tbody>
                                    <tr data-index="0" class="">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                1
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                css3用transition实现边框动画效果
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="0">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-blue">已存草稿</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                开放浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" />
                                                <div class="layui-unselect layui-form-switch" lay-skin="_switch">
                                                    <em>否</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="1" class="">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                2
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                自定义的模块名称可以包含/吗
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="1">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-red">等待审核</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="2" class="">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                3
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                layui.tree如何ajax加载二级菜单
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                admin
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="2">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus">
                                                审核通过 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                开放浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="3" class="">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                4
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                layui.upload如何带参数？像jq的data:{}那样
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                admin
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="0">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-blue">已存草稿</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" />
                                                <div class="layui-unselect layui-form-switch" lay-skin="_switch">
                                                    <em>否</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="4">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                5
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                表单元素长度应该怎么调整才美观
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="1">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-red">等待审核</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                开放浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="5">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                6
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                layui 利用ajax冲获取到json 数据后 怎样进行渲染
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                admin
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="0">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-blue">已存草稿</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="6">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                7
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                微信页面中富文本编辑器LayEdit无法使用
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="1">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-red">等待审核</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                开放浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" />
                                                <div class="layui-unselect layui-form-switch" lay-skin="_switch">
                                                    <em>否</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="7">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                8
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                layui 什么时候发布新的版本呀
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="2">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus">
                                                审核通过 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="8">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                9
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                layui上传组件不支持上传前的图片预览嘛？
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                admin
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="2">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus">
                                                审核通过 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="9">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                10
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                关于layer.confirm点击无法关闭的疑惑
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                admin
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="1">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-red">等待审核</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                开放浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" />
                                                <div class="layui-unselect layui-form-switch" lay-skin="_switch">
                                                    <em>否</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="10">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                11
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                layui form表单提交成功如何拿取返回值
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="2">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus">
                                                审核通过 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="11">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                12
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                layer mobileV2.0 yes回调函数无法用？
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="1">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-red">等待审核</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                开放浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="12">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                13
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                关于layer中自带的btn回调弹层页面的内容
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                admin
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="1">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-red">等待审核</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" />
                                                <div class="layui-unselect layui-form-switch" lay-skin="_switch">
                                                    <em>否</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="13">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                14
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                被编辑器 layedit 图片上传搞崩溃了
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="0">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus"> 
                                                <span class="layui-blue">已存草稿</span> 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                私密浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                    <tr data-index="14">
                                        <td data-field="0">
                                            <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                    <i class="layui-icon"></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsId" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsId">
                                                15
                                            </div></td>
                                        <td data-field="newsName">
                                            <div class="layui-table-cell laytable-cell-1-newsName">
                                                element.tabChange()方法运行了，但是页面并没有产生效果
                                            </div></td>
                                        <td data-field="newsAuthor" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsAuthor">
                                                驊驊龔頾
                                            </div></td>
                                        <td data-field="newsStatus" align="center" data-content="2">
                                            <div class="layui-table-cell laytable-cell-1-newsStatus">
                                                审核通过 
                                            </div></td>
                                        <td data-field="newsLook" align="center">
                                            <div class="layui-table-cell laytable-cell-1-newsLook">
                                                开放浏览
                                            </div></td>
                                        <td data-field="newsTop" align="center" data-content="checked">
                                            <div class="layui-table-cell laytable-cell-1-newsTop">
                                                <input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-text="是|否" checked="" />
                                                <div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch">
                                                    <em>是</em>
                                                    <i></i>
                                                </div>
                                            </div></td>
                                        <td data-field="newsTime" align="center" data-content="2017-04-14 00:00:00" data-minwidth="110">
                                            <div class="layui-table-cell laytable-cell-1-newsTime">
                                                2017-04-14
                                            </div></td>
                                        <td data-field="8" align="center" data-content="">
                                            <div class="layui-table-cell laytable-cell-1-8"> 
                                                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                            </div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-table-fixed layui-table-fixed-l">
                            <div class="layui-table-header">
                                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                                    <thead>
                                        <tr>
                                            <th data-field="0" data-unresize="true">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-filter="layTableAllChoose" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="layui-table-body" style="height: 396px;">
                                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                                    <tbody>
                                        <tr data-index="0" class="">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="1" class="">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="2" class="">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="3" class="">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="4">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="5">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="6">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="7">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="8">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="9">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="10">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="11">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="12">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="13">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                        <tr data-index="14">
                                            <td data-field="0">
                                                <div class="layui-table-cell laytable-cell-1-0 laytable-cell-checkbox">
                                                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary" />
                                                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                                        <i class="layui-icon"></i>
                                                    </div>
                                                </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="layui-table-fixed layui-table-fixed-r layui-hide" style="right: 16px;">
                            <div class="layui-table-header">
                                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                                    <thead>
                                        <tr>
                                            <th data-field="8">
                                                <div class="layui-table-cell laytable-cell-1-8" align="center">
                                                    <span>操作</span>
                                                </div></th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="layui-table-mend"></div>
                            </div>
                            <div class="layui-table-body" style="height: 396px;">
                                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                                    <tbody>
                                        <tr data-index="0" class="">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="1" class="">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="2" class="">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="3" class="">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="4">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="5">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="6">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="7">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="8">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="9">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="10">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="11">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="12">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="13">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                        <tr data-index="14">
                                            <td data-field="8" align="center" data-content="">
                                                <div class="layui-table-cell laytable-cell-1-8"> 
                                                    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a> 
                                                    <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a> 
                                                </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="layui-table-page">
                        <div id="layui-table-page1">
                            <div class="layui-box layui-laypage layui-laypage-default" id="layui-laypage-1">
                                <a href="javascript:;" class="layui-laypage-prev layui-disabled" data-page="0"><i class="layui-icon"></i></a>
                                <span class="layui-laypage-curr"><em class="layui-laypage-em"></em><em>1</em></span>
                                <a href="javascript:;" class="layui-laypage-next layui-disabled" data-page="2"><i class="layui-icon"></i></a>
                                <span class="layui-laypage-skip">到第<input type="text" min="1" value="1" class="layui-input" />页<button type="button" class="layui-laypage-btn">确定</button></span>
                                <span class="layui-laypage-count">共 15 条</span>
                                <span class="layui-laypage-limits"><select lay-ignore=""><option value="10">10 条/页</option><option value="15">15 条/页</option><option value="20" selected="">20 条/页</option><option value="25">25 条/页</option></select></span>
                            </div>
                        </div>
                    </div>
                    <style>.laytable-cell-1-0{ width: 50px; }.laytable-cell-1-newsId{ width: 60px; }.laytable-cell-1-newsName{ width: 350px; }.laytable-cell-1-newsAuthor{ width: 147px; }.laytable-cell-1-newsStatus{ width: 147px; }.laytable-cell-1-newsLook{ width: 147px; }.laytable-cell-1-newsTop{ width: 147px; }.laytable-cell-1-newsTime{ width: 147px; }.laytable-cell-1-8{ width: 170px; }</style>
                </div>

                <!--审核状态-->
                <script type="text/html" id="newsStatus">
                    if(d.newsStatus == "1"){
                    <span class="layui-red">等待审核</span>
                     } else if(d.newsStatus == "0"){
                    <span class="layui-blue">已存草稿</span>
                    } else {
                    审核通过
                    }
                    </script>

                    <!--操作-->
                    <script type="text/html" id="newsListBar">
                        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                        <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
                        <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a>
                        </script>
                        <!--
                        <script type="text/javascript" src="{{url('')}}/blogadmin/layui.js"></script>
                        -->
                        <script type="text/javascript" src="{{url('')}}/blogadmin/newsList.js"></script>
                    </div>
                </div>
            </div>
        </div>

        @endsection
