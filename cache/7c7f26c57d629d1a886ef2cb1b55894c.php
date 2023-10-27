<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $webconf['web_name'] ?></title>
<meta name="keywords" content="<?php echo $webconf['web_keyword'] ?>" />
<meta name="description" content="<?php echo $webconf['web_desc'] ?>" />

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
  
    <main class="page landing-page">
	   <section class="clean-block clean-hero" style="background-image:url('<?php echo $tpl ?>assets/img/tech/image4.jpg');color:rgba(9, 162, 255, 0.85);">
            <div class="text">
                <h2>极致CMS建站系统</h2>
                <p>开源免费，无商业授权，仅需记住几个简单的模板标签，小白也能搭建一个简单的网站，让你简单快乐的工作。</p><a href="<?php echo $classtypedata[5]['url'] ?>" target="_blank"><button class="btn btn-outline-light btn-lg" type="button">了解更多</button></a></div>
        </section>
		
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">极致CMS建站 Demo</h2>
                    <p>一个基于极致CMS搭建的简易模板网站</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="<?php echo $tpl ?>assets/img/scenery/image5.jpg"></div>
                    <div class="col-md-6">
                        <h3>极致建站系统</h3>
                        <div class="getting-started-info">
                            <p>简单轻便，易操作，初学者无任何压力。在版权许可范围内，无需商业授权，自由开源。支持免费二开，小白也能做插件！</p>
                        </div><a href="<?php echo $classtypedata[5]['url'] ?>"><button class="btn btn-outline-primary btn-lg" type="button">立刻了解</button></a></div>
                </div>
            </div>
        </section>
	<div class="projects-horizontal">
      
        <div class="container">
            <div class="intro">
                <h2 class="text-center">新闻列表</h2>
                <p class="text-center">新闻在首页的输出，初识LOOP模板标签强大的功能</p>
            </div>
            <div class="row projects">
			<?php
		$v_table ='article';
		$v_w=' 1=1 ';
		$v_order='orders desc,addtime desc';
		$v_fields=null;
		$v_limit='4';
			$v_page = new FrPHP\Extend\Page($v_table);
			$v_page->typeurl = 'tpl';
			$v_data = $v_page->where($v_w)->fields($v_fields)->orderby($v_order)->limit($v_limit)->page($frpage)->go();
			$v_pages = $v_page->pageList(3,'?page=');
			$v_sum = $v_page->sum;
			$v_listpage = $v_page->listpage;
			$v_prevpage = $v_page->prevpage;
			$v_nextpage = $v_page->nextpage;
			$v_allpage = $v_page->allpage;$v_n=0;foreach($v_data as $v_key=> $v){
			$v_n++;
			if(isset($v['htmlurl']) && !isset($v['url'])){
				
				if($v_table=='classtype'){
					$v['url'] = $classtypedata[$v['id']]['url'];
				}else{
					$v['url'] = gourl($v,$v['htmlurl']);
				}
				
			}
			?>
                <div class="col-sm-6 item">
                    <div class="row">
                        <div class="col-md-12 col-lg-5"><a href="<?php echo $v['url'] ?>"><img class="img-fluid" src="<?php echo $v['litpic'] ?>"></a></div>
                        <div class="col">
                            <h3 class="name"><?php echo $v['title'] ?></h3>
                            <p class="description"><?php echo newstr($v['description'],100) ?></p>
                        </div>
                    </div>
                </div>
			<?php } ?>
			<div style="    width: 215px;margin: 0 auto;margin-top:20px">
			 <nav>
				<ul class="pagination">
				<?php if($v_listpage['list']){ ?>
					<li class="page-item <?php if($v_listpage['prev']){ ?>disabled<?php } ?>"><a class="page-link" href="<?php echo $v_listpage['prev'] ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
					<?php $ss_n=0;foreach( $v_listpage['list'] as $ss){ $ss_n++;?>
					<li class="page-item <?php if($ss['num']==$v_listpage['current_num']){ ?>active background<?php } ?>"><a href="<?php echo $ss['url'] ?>" class="page-link"><?php echo $ss['num'] ?></a></li>
					<?php } ?>
					<li class="page-item <?php if($v_listpage['next']){ ?>disabled<?php } ?>"><a class="page-link" href="<?php echo $v_listpage['next'] ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				<?php } ?>
				</ul>
			</nav>
			</div>
            </div>
        </div>
    </div>
	<div class="projects-horizontal">
		
                <div class="col-xl-12 mx-auto" style="text-align: center;">
                    <h1 class="mb-5">搜索模块展示</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form action="<?php echo get_domain() ?>/search" method="GET">
						<input name="molds" type="hidden" value="article" />
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg" name="word" type="text" placeholder="输入关键词"></div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-block btn-lg" type="submit">单模搜索</button></div>
                        </div>
						
                    </form>
                </div>
            
    </div>
	<div class="projects-horizontal" style="margin-top:20px;">
		
                
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form action="<?php echo get_domain() ?>/searchAll" method="GET">
						<input name="molds[]" type="hidden" value="article" />
						<input name="molds[]" type="hidden" value="product" />
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg" name="word" type="text" placeholder="输入关键词"></div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-block btn-lg" type="submit">全局搜索</button></div>
                        </div>
						
                    </form>
                </div>
           
    </div>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">极致CMS特点</h2>
                    <p>极致CMS建站系统与其他的CMS系统区别不大，如果你有模板建站的基础，那么很容易掌握极致CMS使用方法</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4>模板标签</h4>
                        <p>模板标签很简单，仅需记住几个就可以完成建站</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                        <h4>自定义</h4>
                        <p>后台简单的自定义内容设置和前台输出</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                        <h4>多端支持</h4>
                        <p>内置自动识别多种客户端：PC、WAP、微信，可分别设置模板，系统自动切换模板</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                        <h4>内置文件缓存</h4>
                        <p>可以通过设置模板缓存时间达到静态访问的快速效果</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">轮播图</h2>
                    <p>系统专门设置有轮播图分类，可以设置多个轮播图。初识轮播图前台输出效果，用LOOP模板标签，简单完成。</p>
                </div>
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner" role="listbox">
					<?php
		$v_table ='collect';
		$v_w=' 1=1 and tid=1 ';
		$v_order='orders desc';
		$v_fields=null;
		$v_limit=null;
			$v_data = M($v_table)->findAll($v_w,$v_order,$v_fields,$v_limit);$v_n=0;foreach($v_data as $v_key=> $v){
			$v_n++;
			if(isset($v['htmlurl']) && !isset($v['url'])){
				
				if($v_table=='classtype'){
					$v['url'] = $classtypedata[$v['id']]['url'];
				}else{
					$v['url'] = gourl($v,$v['htmlurl']);
				}
				
			}
			?>
                        <div class="carousel-item <?php if($v_key==0){ ?>active<?php } ?>"><img class="w-100 d-block" src="<?php echo $v['litpic'] ?>" alt="Slide Image"></div>
					<?php } ?>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button"
                            data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <!--loop自带$n计数-->
					<?php if($v_n){ ?>
                        <?php for( $i=0;$i<=$v_key;$i++){ ?>
                        <li data-target="#carousel-1" data-slide-to="<?php echo $i ?>" class="<?php if($i==0){ ?>active<?php } ?>"></li>
						<?php } ?>
					<?php } ?>
                       
                    </ol>
                </div>
            </div>
        </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">极致CMS开发者</h2>
                    <p>极致CMS是由个人开发者独立开发，版权归于廊坊极致网络科技有限公司。</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?php echo $tpl ?>assets/img/avatars/avatar1.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">John Smith</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?php echo $tpl ?>assets/img/avatars/avatar2.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Robert Downturn</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?php echo $tpl ?>assets/img/avatars/avatar3.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Ally Sanders</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
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
</body>

</html>