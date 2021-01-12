
<div class="layui-tab-content clildFrame">
            <div class="layui-tab-item layui-show">
                <blockquote class="layui-elem-quote layui-bg-green">
                    亲爱的{{$userName}}，上午好！ 欢迎使用辣条博客后台管理。当前时间为：<span id="nowTime"> 2020年10月17日  07:06:43　星期六</span>
                </blockquote>
                
                
                <div class="layui-row layui-col-space10">
                    <div class="layui-col-lg6 layui-col-md12">
                        <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
                        <table class="layui-table magt0">
                            <colgroup>
                                <col width="150">
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>当前PHP版本</td>
                                    <td class="version">{{$phpVersion}}</td>
                                </tr>
                                <tr>
                                    <td>网站开发者</td>
                                    <td class="author">{{$userName}}</td>
                                </tr>
                                <tr>
                                    <td>网站首页</td>
                                    <td class="homePage">{{url('')}}</td>
                                </tr>
                                <tr>
                                    <td>服务器环境</td>
                                    <td class="server">{{$system}}</td>
                                </tr>
                                <tr>
                                    <td>数据库版本</td>
                                    <td class="dataBase">{{$dbVersion}}</td>
                                </tr>
                                <tr>
                                    <td>最大上传限制</td>
                                    <td class="maxUpload">{{$upload_max_filesize}}</td>
                                </tr>
                                <tr>
                                    <td>当前用户权限</td>
                                    <td class="userRights">超级管理员</td>
                                </tr>
                            </tbody>
                        </table>
                        <blockquote class="layui-elem-quote title">最新文章 <i class="layui-icon layui-red"></i></blockquote>
                        <table class="layui-table mag0" lay-skin="line">
                            <colgroup>
                                <col>
                                <col width="110">
                            </colgroup>
                            <tbody class="hot_news1">
                                @if($articleData!=null)
                                @foreach($articleData as $v)
                                <tr>
                                    <td align="left">
                                        <a target="_blank" href="{{url('')}}/article/{{$v['id']}}/1">{{$v['title']}}</a>
                                    </td>
                                    <td>{{$v['update_time']}}</td>
                                </tr>
                                @endforeach
                                @endif
                                </tbody>
                        </table>
                    </div>
                    <div class="layui-col-lg6 layui-col-md12">
                        <blockquote class="layui-elem-quote title">发展历程&amp;更新日志</blockquote>
                        <div class="layui-elem-quote layui-quote-nm history_box magb0">
                            <p style="text-align: center">暂无内容</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="{{url('')}}/blogadmin/js/date.js"></script>
