<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>搜索关键词“<?php echo $word ?>”-<?php echo $webconf['web_name'] ?></title>
<meta name="keywords" content="搜索关键词“<?php echo $word ?>”" />
<meta name="description" content="搜索关键词“<?php echo $word ?>”" />
<link rel="stylesheet" href="<?php echo $tpl ?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $tpl ?>assets/css/css.css">
<link rel="stylesheet" href="<?php echo $tpl ?>assets/fonts/simple-line-icons.min.css">
<link rel="stylesheet" href="<?php echo $tpl ?>assets/css/baguetteBox.min.css">
<link rel="stylesheet" href="<?php echo $tpl ?>assets/css/Projects-Horizontal.css">
<link rel="stylesheet" href="<?php echo $tpl ?>assets/css/smoothproducts.css">
<style>
.post-body img {
    width: 100%;
}
</style>

<!--统计代码-->
<?php echo $webconf['web_js'] ?>

</head>

<body>
     <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="/"><img src="<?php echo $webconf['web_logo'] ?>"/></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if(!isset($type) && APP_CONTROLLER=='Home'){ ?>active<?php } ?>" href="/">首页</a></li>
					<?php $v_n=0;foreach( $classtypedata as $v){ $v_n++;?>
					<?php if($v['isshow']==1){ ?>
					<?php if($v['pid']==0){ ?>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if(isset($type) && in_array($type['id'],$v['children']['ids'])){ ?>active<?php } ?>" href="<?php echo $v['url'] ?>"><?php echo $v['classname'] ?></a></li>
					<?php } ?>
					<?php } ?>
					<?php } ?>
					<?php if(!$islogin){ ?>
                    <li class="nav-item" role="presentation"><a class="nav-link <?php if(!isset($type) && APP_CONTROLLER=='Login'){ ?>active<?php } ?>" href="<?php echo U('login/index') ?>">登录</a></li>
					<?php }else{ ?>
					<!--已登录-->
					<li class="nav-item" role="presentation"><a class="nav-link <?php if(APP_CONTROLLER=='User' && APP_ACTION=='cart'){ ?>active<?php } ?>" href="<?php echo U('User/cart') ?>">购物车</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link <?php if(APP_CONTROLLER=='User'  && APP_ACTION!='cart'){ ?>active<?php } ?>" href="<?php echo U('User/index') ?>"><?php echo $member['username'] ?></a></li>
					<li class="nav-item" role="presentation" ><a class="nav-link <?php if(APP_CONTROLLER=='User'  && APP_ACTION!='comment'){ ?>active<?php } ?>" href="<?php echo U('User/comment') ?>"><i class="icon-bell" style="color:#f00" ><?php echo has_no_read_comment() ?></i></a></li>
					<?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">搜索列表页展示</h2>
                    <p>经典Foreach模板标签使用</p>
                </div>
                <div class="block-content article-list">
				<?php if($lists){ ?>
				<?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
                    <div class="clean-blog-post">
                        <div class="row">
                            <div class="col-lg-5"><img class="rounded img-fluid" src="<?php if($v['litpic']==''){ ?><?php echo $tpl ?>assets/img/tech/image4.jpg<?php }else{ ?><?php echo $v['litpic'] ?><?php } ?>"></div>
                            <div class="col-lg-7">
                                <h3>【<?php echo $v['id'] ?>】<?php echo $v['title'] ?></h3>
                                <div class="info"><span class="text-muted"><?php echo date('Y-m-d',$v['addtime']) ?>&nbsp;<a ><?php echo get_info_table('level',['id'=>$v['userid']],'name') ?></a></span></div>
                                <p><?php echo newstr($v['description'],150) ?></p><a href="<?php echo $v['url'] ?>"><button class="btn btn-outline-primary btn-sm" type="button">了解更多</button></a></div>
                        </div>
                    </div>
				<?php } ?>
				<?php }else{ ?>
				<p>暂时没有数据~</p>
				<?php } ?>
				<!--判断端口，手机端不显示分页-->
				<?php if(!isMobile()){ ?>
				 <nav>
					<ul class="pagination">
					
					<?php if($listpage['list']){ ?>
						<li class="page-item <?php if($listpage['prev']){ ?>disabled<?php } ?>"><a class="page-link" href="<?php echo $listpage['prev'] ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						<?php $ss_n=0;foreach( $listpage['list'] as $ss){ $ss_n++;?>
						<li class="page-item <?php if($ss['num']==$listpage['current_num']){ ?>active background<?php } ?>"><a href="<?php echo $ss['url'] ?>" class="page-link"><?php echo $ss['num'] ?></a></li>
						<?php } ?>
						<li class="page-item <?php if($listpage['next']){ ?>disabled<?php } ?>"><a class="page-link" href="<?php echo $listpage['next'] ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
					<?php } ?>
					</ul>
				</nav>
				<?php } ?>
                </div>
            </div>
        </section>
    </main>
      <footer class="page-footer dark">
        <div class="container">
            <div class="row">
			<?php $v_n=0;foreach( $classtypedata as $v){ $v_n++;?>
			<?php if($v['isshow']==1){ ?>
			<?php if($v['pid']==0){ ?>
                <div class="col-sm-2">
                    <h5><?php echo $v['classname'] ?></h5>
                    <ul>
					
					<?php $vv_n=0;foreach( $classtypedata as $vv){ $vv_n++;?>
					<?php if($vv['pid']==$v['id']){ ?>
                        <li><a href="<?php echo $vv['url'] ?>"><?php echo $vv['classname'] ?></a></li>
					<?php } ?>
					<?php } ?>
                        
                    </ul>
                </div>
			<?php } ?>
			<?php } ?>
			<?php } ?>
               
            </div>
        </div>
        <div class="footer-copyright">
            <p><?php echo $webconf['web_beian'] ?> <?php echo $webconf['web_copyright'] ?> All Rights Reserved</p>
        </div>
    </footer>

   	<script src="<?php echo $tpl ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $tpl ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $tpl ?>assets/js/baguetteBox.min.js"></script>
    <script src="<?php echo $tpl ?>assets/js/smoothproducts.min.js"></script>
    <script src="<?php echo $tpl ?>assets/js/theme.js"></script>

   
   <script>
   function addcart(tid,id,num){
		$.ajax({
			 url:"<?php echo U('user/addcart') ?>",//请求的url地址
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
				 url:"<?php echo U('user/collectAction') ?>",//请求的url地址
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
				 url:"<?php echo U('user/likesAction') ?>",//请求的url地址
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
<!--判断端口，手机端下拉加载-->
<?php if(isMobile()){ ?>
var p=<?php echo $frpage ?>;
var istrue = true;
$(window).scroll(function () {
	//判断是否滑动到页面底部
	
	if ($(window).scrollTop() === ($(document).height() - $(window).height()) ) {
		//防止过度加载
		if(!istrue){
			return false;
		}
		p+=1;
		$.ajax({
			url:window.location.href,//请求的url地址
			// dataType:"json",//返回格式为json
			async:true,//请求是否异步，默认为异步，这也是ajax重要特性
			data:{ajax:1,ajax_tpl:1,page:p},//参数值
			type:"GET",//请求方式
			beforeSend:function(){
				//请求前的处理
				istrue = false;
				
			},
			 success:function(r){
				if(r==1){
					alert('没有了~');return false;
				}
				$(".article-list").append(r);
					
			},
			complete:function(){
			//请求完成的处理
				istrue = true;
			},
			 error:function(){
			//请求出错处理
				alert('网络错误');
			}

					
			
		})
	}
})

<?php } ?>
   </script>
</body>

</html>