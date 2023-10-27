<?php die();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>留言-极致CMS建站系统</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="/static/default/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/static/default/assets/css/css.css">
<link rel="stylesheet" href="/static/default/assets/fonts/simple-line-icons.min.css">
<link rel="stylesheet" href="/static/default/assets/css/baguetteBox.min.css">
<link rel="stylesheet" href="/static/default/assets/css/Projects-Horizontal.css">
<link rel="stylesheet" href="/static/default/assets/css/smoothproducts.css">
<style>
.post-body img {
    width: 100%;
}
</style>

<!--统计代码-->
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/"><img src="/static/default/assets/img/logo.png"/></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link " href="/">首页</a></li>
															                    <li class="nav-item" role="presentation"><a class="nav-link " href="http://10.119.9.215/shangpin.html">商品</a></li>
																																																																																																									                    <li class="nav-item" role="presentation"><a class="nav-link " href="http://10.119.9.215/xinwen.html">新闻</a></li>
																																																																																																									                    <li class="nav-item" role="presentation"><a class="nav-link " href="http://10.119.9.215/lianxi.html">联系</a></li>
																									                    <li class="nav-item" role="presentation"><a class="nav-link active" href="http://10.119.9.215/msg.html">留言</a></li>
																									                    <li class="nav-item" role="presentation"><a class="nav-link " href="http://10.119.9.215/guanyu.html">关于</a></li>
																									                    <li class="nav-item" role="presentation"><a class="nav-link " href="http://10.119.9.215/faq.html">常见问题</a></li>
																				                    <li class="nav-item" role="presentation"><a class="nav-link " href="http://10.119.9.215/login/index.html">登录</a></li>
					                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">留言建议</h2>
                    <p>如果您对极致CMS有什么建议或者想要定制开发，可以通过下面的方式联系我们！</p>
                </div>
                <form action="http://10.119.9.215/message/index.html" onsubmit="return checkform()" method="POST">
					<input name="tid" type="hidden" value="4" >
                    <div class="form-group"><label>*您的称呼</label><input name="user" id="user" class="form-control" type="text"></div>
                    <div class="form-group"><label>*您咨询的问题</label><input name="title" id="title" class="form-control" type="text"></div>
					<div class="form-group"><label>*您的手机号</label><input name="tel" id="tel" class="form-control" type="tel"></div>
                    
					<span id="ext_fields"></span>
					
                    <div class="form-group"><label>*问题描述</label><textarea name="body" id="body" class="form-control"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">确定发送</button></div>
                </form>
            </div>
        </section>
    </main>
       <footer class="page-footer dark">
        <div class="container">
            <div class="row">
									                <div class="col-sm-2">
                    <h5>商品</h5>
                    <ul>
					
																				                        <li><a href="http://10.119.9.215/fenleiyi.html">分类一</a></li>
															                        <li><a href="http://10.119.9.215/fenleier.html">分类二</a></li>
															                        <li><a href="http://10.119.9.215/fenleisan.html">分类三</a></li>
															                        <li><a href="http://10.119.9.215/fenleisi.html">分类四</a></li>
																																																																																																				                        
                    </ul>
                </div>
																																																															                <div class="col-sm-2">
                    <h5>新闻</h5>
                    <ul>
					
																																																																						                        <li><a href="http://10.119.9.215/xinwenfenleiyi.html">新闻分类一</a></li>
															                        <li><a href="http://10.119.9.215/xinwenfenleier.html">新闻分类二</a></li>
															                        <li><a href="http://10.119.9.215/xinwenfenleisan.html">新闻分类三</a></li>
															                        <li><a href="http://10.119.9.215/xinwenfenleisi.html">新闻分类四</a></li>
																																																		                        
                    </ul>
                </div>
																																																															                <div class="col-sm-2">
                    <h5>联系</h5>
                    <ul>
					
																																																																																																																																																	                        
                    </ul>
                </div>
															                <div class="col-sm-2">
                    <h5>留言</h5>
                    <ul>
					
																																																																																																																																																	                        
                    </ul>
                </div>
															                <div class="col-sm-2">
                    <h5>关于</h5>
                    <ul>
					
																																																																																																																																																	                        
                    </ul>
                </div>
															                <div class="col-sm-2">
                    <h5>常见问题</h5>
                    <ul>
					
																																																																																																																																																	                        
                    </ul>
                </div>
									               
            </div>
        </div>
        <div class="footer-copyright">
            <p>冀ICP备18036869号 @2019-2099 All Rights Reserved</p>
        </div>
    </footer>

   	<script src="/static/default/assets/js/jquery.min.js"></script>
    <script src="/static/default/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/static/default/assets/js/baguetteBox.min.js"></script>
    <script src="/static/default/assets/js/smoothproducts.min.js"></script>
    <script src="/static/default/assets/js/theme.js"></script>

   
   <script>
   function addcart(tid,id,num){
		$.ajax({
			 url:"http://10.119.9.215/user/addcart.html",//请求的url地址
			 dataType:"json",//返回格式为json
			 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
			 data:{tid:tid,id:id,num:num,ajax:1},//参数值
			 type:"POST",//请求方式
			 beforeSend:function(){
				//请求前的处理
				},
				 success:function(r){
					if(r.code==0){
						window.location.href=r.url;
					}else{
						alert(r.msg);
					}
						
				},
				 complete:function(){
				//请求完成的处理
				},
				 error:function(){
				//请求出错处理
					alert('网络错误');
				}

					
			
		})
   }
   
   //收藏 
	function collect(tid,id){
		$.ajax({
				 url:"http://10.119.9.215/user/collectAction.html",//请求的url地址
				 dataType:"json",//返回格式为json
				 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
				 data:{tid:tid,id:id,ajax:1},//参数值
				 type:"POST",//请求方式
				 beforeSend:function(){
					//请求前的处理
					},
					 success:function(r){
						if(r.code==0){
							alert(r.msg);
							window.location.reload();
						}else{
							alert(r.msg);
						}
							
					},
					 complete:function(){
					//请求完成的处理
					},
					 error:function(){
					//请求出错处理
						alert('网络错误');
					}

						
				
			})
	}
	   
   //点赞
	function likes(tid,id){
		$.ajax({
				 url:"http://10.119.9.215/user/likesAction.html",//请求的url地址
				 dataType:"json",//返回格式为json
				 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
				 data:{tid:tid,id:id,ajax:1},//参数值
				 type:"POST",//请求方式
				 beforeSend:function(){
					//请求前的处理
					},
					 success:function(r){
						if(r.code==0){
							alert(r.msg);
							window.location.reload();
						}else{
							alert(r.msg);
						}
							
					},
					 complete:function(){
					//请求完成的处理
					},
					 error:function(){
					//请求出错处理
						alert('网络错误');
					}

						
				
			})
	}

   </script>
	<script>
	function checkform(){
		var user = $.trim($("#user").val());
		var title = $.trim($("#title").val());
		var email = $.trim($("#email").val());
		var tel = $.trim($("#tel").val());
		var body = $.trim($("#body").val());
		if(user==''){
			alert('您的称呼不能为空~');$("#user").focus();return false;
		}
		if(title==''){
			alert('您的咨询的问题不能为空~');$("#title").focus();return false;
		}
		if(tel==''){
			alert('您的手机号不能为空~');$("#tel").focus();return false;
		}
		if(body==''){
			alert('问题描述不能为空~');$("#body").focus();return false;
		}
		return true;
	}
	function get_fields(tid,id){
		var id = arguments[1]?arguments[1]:0;
		$.post("http://10.119.9.215/Common/get_fields.html",{molds:'message',tid:tid,id:id},function(r){
			var res = JSON.parse(r);
			console.log(res);
			if(res.code==0){
				//默认 res.tpl输出的是layui的模板HTML,可以审核元素查看res里面的内容
				//$("#ext_fields").html(res.tpl);
				var html = '';
				var len = res.fields_list.length;
				if(len>0){
					//根据对应的字段，进行HTML设计
					for(var i=0;i<len;i++){
						if(res.fields_list[i].field=='email'){
							html+='<div class="form-group"><label>您的邮箱</label><input name="email" id="email" class="form-control" type="email"></div>';
						}
					}
					
				}
				$("#ext_fields").html(html);
			}
			
		});
	}
	$(document).ready(function(){
		
		 get_fields(4);
	});
	
	</script>
</body>

</html>