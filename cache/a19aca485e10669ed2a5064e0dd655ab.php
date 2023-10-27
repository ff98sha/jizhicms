<?php if (!defined('CORE_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title><?php echo webConf('web_name') ?></title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="author" content="留恋风,2581047041@qq.com"> 
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/font.css">
	<link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/xadmin.css">
    <script type="text/javascript" src="<?php echo Tpl_style ?>/style/js/jquery.min.js"></script>
    <script src="<?php echo Tpl_style ?>/style/lib/layui/layui.js?v=123" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo Tpl_style ?>/style/js/xadmin.js"></script>
	
	<?php  
	
	switch($webconf['admintpl']){
		case 'tpl':
		echo '<script type="text/javascript" src="'.Tpl_style.'/style/js/target_page.js"></script>';
		break;
		case 'default':
		echo '<script type="text/javascript" src="'.Tpl_style.'/style/js/target_window.js"></script>';
		break;
	}
	
	
	 ?>
	

    
	<style>
	.active a{    background: #f00;
    color: #fff;}
	.layui-form-item .layui-input-inline {
		float: left;
		width: auto;
		margin-right: 10px;
	}
	#jizhitj{
		position: fixed;
		bottom: 0px;
		z-index: 9999;
		width: 100%;
		background:#cccccc;
		margin-bottom: 0px;
	}
	.layui-form-select dl {
		z-index: 999999;
	}
	</style>

</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message"><?php echo webConf('web_name') ?>-管理登录</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" onsubmit="return false;"  >
            <input name="cache" id="cache" type="hidden" value="" />
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
			<input name="vercode" style="width:50%;float:left;" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">
			<img  src="<?php echo U('vercode') ?>" style="width:40%;float:right;" onclick="this.src=this.src+'?'+Math.random()" />
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
        $(function  () {
			if (top.location != self.location){
			top.location = self.location;
			}
				
			$("#cache").val(Math.random());
		
            layui.use('form', function(){
              var form = layui.form;
             
              //监听提交
              form.on('submit(login)', function(data){
           
				$.post("<?php echo U('Login/index') ?>",data.field,function(res){
				    //console.log(res);return false;
					 var res = JSON.parse(res);
					 if(res.code==1){
						layer.msg(res.msg);
					 }else{
						layer.msg(res.msg, {icon: 6,time: 2000},function(){
						window.location.href="<?php echo U('Index/index') ?>";
						});
                     
						
						 
					 }
				})
				
                return false;
              });
            });
        })

        
    </script>

    
 
</body>
</html>