<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $type['classname'] ?>-<?php echo $webconf['web_name'] ?></title>
<meta name="keywords" content="<?php echo $type['keywords'] ?>" />
<meta name="description" content="<?php echo $type['description'] ?>" />
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
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">商品列表DEMO</h2>
                    <p>商品分类输出、商品筛选、商品购买等</p>
                    <p>当前位置：<?php echo $positions ?></p>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-none d-md-block">
                                <div class="filters">
				<?php
		$table ='fields';
		$w=" fieldtype in(7,8,12) and  isshow=1 and molds= 'product'   and 1=1 and 1=1";
		$order='orders desc';
		$s_data = M($table)->findAll($w,$order);$n=0;foreach($s_data as $s_key=>  $s){
			$n++;
			$vs=array();
			$fieldvalue = explode(",",$s["body"]);
			//$rooturl = get_domain()."/screen/index/molds/".$s["molds"]."/tid/".$type["id"];
			$rooturl = get_domain()."/screen-".$s["molds"]."-".$type["id"];
			foreach($fieldvalue as $kk=>$vv){
				$d=explode("=",$vv);
				$vs[$kk] = array("key"=>$d[1],"value"=>$d[0],"url"=>$rooturl."-".$s["field"]."-".$d[1].change_parse_url($filters,$s["field"]));
			}
			
			$s["list"] = $vs;
			$s["url"] = $rooturl."-".$s["field"]."-0";
			?>
                                    <div class="filter-item">
                                        <h3><?php echo $s['fieldname'] ?></h3>
										
										<?php $ss_n=0;foreach( $s['list'] as $ss){ $ss_n++;?>
                                        <div class="form-check">
										<input target-url="<?php echo $ss['url'] ?>" class="form-check-input" <?php if(isset($filters[$s['field']]) && strpos(','.$filters[$s['field']].',',','.$ss['key'].',')!==false){ ?> checked <?php } ?>	type="checkbox" name="<?php echo $s['field'] ?>" value="<?php echo $ss['key'] ?>" >
										<label class="form-check-label" for="formCheck-1"><?php echo $ss['value'] ?></label></div>
										<?php } ?>
                                       
                                    </div>
				<?php } ?>

                                </div>
                            </div>
							<div class="d-md-none">
							<a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" role="button" href="#filters">筛选<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse" id="filters">
                                    <div class="filters">
				<?php
		$table ='fields';
		$w=" fieldtype in(7,8,12) and  isshow=1 and molds= 'product'   and 1=1 and 1=1";
		$order='orders desc';
		$s_data = M($table)->findAll($w,$order);$n=0;foreach($s_data as $s_key=>  $s){
			$n++;
			$vs=array();
			$fieldvalue = explode(",",$s["body"]);
			//$rooturl = get_domain()."/screen/index/molds/".$s["molds"]."/tid/".$type["id"];
			$rooturl = get_domain()."/screen-".$s["molds"]."-".$type["id"];
			foreach($fieldvalue as $kk=>$vv){
				$d=explode("=",$vv);
				$vs[$kk] = array("key"=>$d[1],"value"=>$d[0],"url"=>$rooturl."-".$s["field"]."-".$d[1].change_parse_url($filters,$s["field"]));
			}
			
			$s["list"] = $vs;
			$s["url"] = $rooturl."-".$s["field"]."-0";
			?>
                                        <div class="filter-item">
                                            <h3><?php echo $s['fieldname'] ?></h3>
											
											<?php $ss_n=0;foreach( $s['list'] as $ss){ $ss_n++;?>
                                            <div class="form-check"><input  target-url="<?php echo $ss['url'] ?>" class="form-check-input wap" value="<?php echo $ss['key'] ?>" name="<?php echo $s['field'] ?>" type="checkbox" ><label class="form-check-label" for="formCheck-1"><?php echo $ss['value'] ?></label></div>
											<?php } ?>
                                            
                                        </div>
				<?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
							
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row no-gutters">
								<?php if($lists){ ?>
								<?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="<?php echo $v['url'] ?>"><img class="img-fluid d-block mx-auto" src="<?php echo $v['litpic'] ?>"></a></div>
                                            <div class="product-name"><a href="<?php echo $v['url'] ?>">[<?php echo $v['id'] ?>]<?php echo $v['title'] ?></a></div>
                                            <div class="about">
                                                <div class="rating">
												<?php   $star_num = show_comment($v['tid'],$v['id'],'average') ?>
												<?php for( $i=1;$i<=$star_num;$i++){ ?>
												<img src="<?php echo $tpl ?>assets/img/star.svg">
												<?php } ?>
												<?php if(round($star_num)!=$star_num){ ?>
												<img src="<?php echo $tpl ?>assets/img/star-half-empty.svg">
												<?php } ?>
												<?php if($star_num<5){ ?>
												<?php for( $i=1;$i<=(5-$star_num);$i++){ ?>
												<img src="<?php echo $tpl ?>assets/img/star-empty.svg">
												<?php } ?>
												<?php } ?>
												
												
												</div>
                                                <div class="price">
                                                    <h3>￥<?php echo $v['price'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php } ?>
								<?php }else{ ?>
								暂无数据~
								<?php } ?>
                                   
                                </div>
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
                    </div>
                </div>
            </div>
        </section>
    </main>
	<input id="gourl" type="hidden" value="" />
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
	function get_tpl(jz_screen){
		var tid = <?php echo $type['id'] ?>;
		var molds = "<?php echo $type['molds'] ?>";
		//Screen/index/molds/$1/tid/$2/jz_screen/$3
		//screen-molds-tid-jz_screen
		var gourl = '<?php echo get_domain() ?>/screen-'+molds+'-'+tid+'-'+jz_screen+'.html';
		$("#gourl").val(gourl);
		$.ajax({
			 url:"<?php echo U('screen/index') ?>",//请求的url地址
			// dataType:"json",//返回格式为json
			 async:true,//请求是否异步，默认为异步，这也是ajax重要特性
			 data:{tid:tid,molds:molds,jz_screen:jz_screen,ajax:1,ajax_tpl:1},//参数值
			 type:"GET",//请求方式
			 beforeSend:function(){
				//请求前的处理
				},
				 success:function(r){
					if(r==1){
						$(".products").html('暂无数据~');return false;
					}
					$(".products").html(r);
						
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
	//PC端
	$(".form-check-input,.form-check-input.wap").click(function(){
		
		var categories_v_arr = [];
		$(".form-check-input[name='categories']").each(function(){
			if($(this).is(":checked")){
				categories_v_arr.push($(this).val());
			}
		});
		var brands_v_arr = [];
		$(".form-check-input[name='brands']").each(function(){
			if($(this).is(":checked")){
				brands_v_arr.push($(this).val());
			}
		});
		var os_v_arr = [];
		$(".form-check-input[name='os']").each(function(){
			if($(this).is(":checked")){
				os_v_arr.push($(this).val());
			}
		});
		var colors_v_arr = [];
		$(".form-check-input[name='colors']").each(function(){
			if($(this).is(":checked")){
				colors_v_arr.push($(this).val());
			}
		});
		var jz_screen = 'categories-'+categories_v_arr.join(',')+'-brands-'+brands_v_arr.join(',')+'-os-'+os_v_arr.join(',')+'-colors-'+colors_v_arr.join(',');
		//console.log(jz_screen);
		get_tpl(jz_screen);
		
		window.history.pushState({},0,$('#gourl').val());
		
	});
	
	<!--判断端口，手机端下拉加载-->
<?php if(isMobile()){ ?>
var p=<?php echo $frpage ?>;
var istrue = true;
$(window).scroll(function () {
	
	if ($(window).scrollTop() === ($(document).height() - $(window).height()) ) {
		//防止过度加载
		if(!istrue){
			return false;
		}
		p+=1;
		//Screen/index/molds/$1/tid/$2/jz_screen/$3
		$.ajax({
			url:window.location.href,//请求的url地址
			// dataType:"json",//返回格式为json
			async:true,//请求是否异步，默认为异步，这也是ajax重要特性
			data:{page:p,ajax:1,ajax_tpl:1},//参数值
			type:"GET",//请求方式
			beforeSend:function(){
				//请求前的处理
				istrue = false;
				
			},
			success:function(r){
			
				if(r==1){
					alert('没有了~');
					return false;
				}
				$(".row.no-gutters").append(r);
					
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