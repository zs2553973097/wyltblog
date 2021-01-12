<!-- 底部 -->
		<div class="layui-footer footer">
			<p><span>copyright @2020 </span></p>
		</div>
	</div>

	<!-- 移动导航 -->
	<div class="site-tree-mobile"><i class="layui-icon"></i></div>
	<div class="site-mobile-shade"></div>

        

        <!--
<div class="layui-layer-move"></div>-->

        
	<!--<script type="text/javascript" src="{{url('')}}/blogadmin/layui.js"></script>
	-->
        <!--
        <script type="text/javascript" src="{{url('')}}/blogadmin/layui.js"></script>-->
        
        
        <!--    
        <script type="text/javascript" src="{{url('')}}/blogadmin/index.js"></script>
	<script type="text/javascript" src="{{url('')}}/blogadmin/cache.js"></script>
        <script type="text/javascript" src="{{url('')}}/blogadmin/main.js"></script>
        -->
        
        <script type="text/javascript" src="{{url('')}}/blogadmin/main.js"></script>
        <script>
            
                var domContent = document.getElementById("testContent");
                var domContent2 = document.getElementById("testContent2");
                var domHeader = document.getElementById("testHeader");
                var domHeader2 = document.getElementById("testHeader2");
                domContent.onmouseover = function(){
                    
                    domContent2.setAttribute("class", "layui-nav-child layui-anim layui-anim-upbit layui-show");
                };
                domContent2.onmouseleave= function(){
                    domContent2.setAttribute("class", "layui-nav-child layui-anim layui-anim-upbit");
                };
                domHeader.onmouseover = function(){
                    
                    domHeader2.setAttribute("class", "layui-nav-child layui-anim layui-anim-upbit layui-show");
                };
                domHeader2.onmouseleave= function(){
                    domHeader2.setAttribute("class", "layui-nav-child layui-anim layui-anim-upbit");
                };
            
        </script>
        
</body></html>