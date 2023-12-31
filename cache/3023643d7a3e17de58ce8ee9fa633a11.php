<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo $common ?>user/css/reset.css">
<link rel="stylesheet" href="<?php echo $common ?>user/css/user.css">
<link rel="stylesheet" href="//at.alicdn.com/t/font_1546140_3tb06o2k3sy.css">
<script src="<?php echo $common ?>user/js/jquery.min-1.10.2.js"></script>
  <title>个人中心-未登录</title>
</head>
<body>

<header>
  <div class="container">
    <div class="brand">
      <a href="<?php echo $webconf['domain'] ?>/" class="logo"><i class="iconfont iconhome"></i> 返回网站</a>
    </div>
    <div class="user-center">
      <ul class="unlogin">
        <li><a href="<?php echo U('login/index') ?>" title="登录">登录</a></li>
        <li><a href="<?php echo U('login/register') ?>" title="注册">注册</a></li>
      </ul>
      <ul class="user-login" style="display: none;">
        <li class="user-message"><a href="#" title="消息"><i class="iconfont iconxinxi"></i> <span>2</span></a></li>
        <li class="user-icon">
          <a href="<?php echo U('login/index') ?>" title="我的"><img src="images/login.png" alt=""></a>
          <ul class="user-menu">
            <li class="bt1"><a href="<?php echo U('login/index') ?>" title="去登录">去登录</a></li>
            <li class="bt1"><a href="<?php echo U('login/index') ?>" title="我的关注">我的关注</a></li>
            <li class="hidden-md"><a href="<?php echo U('login/index') ?>" title="我的粉丝">我的粉丝</a></li>
            <li><a href="<?php echo U('login/index') ?>" title="我的投稿">我的投稿</a></li>
            <li><a href="<?php echo U('login/index') ?>" title="我的收藏">我的收藏</a></li>
            <li class="hidden-md"><a href="<?php echo U('login/index') ?>" title="我的喜欢">我的喜欢</a></li>
            <li class="hidden-md"><a href="<?php echo U('login/index') ?>" title="我的评论">我的评论</a></li>
            <li class="bt1"><a href="<?php echo U('login/index') ?>" title="我的钱包">我的钱包</a></li>
            <li class="hidden-md"><a href="<?php echo U('login/index') ?>" title="购物车">购物车</a></li>
            <li><a href="<?php echo U('login/index') ?>" title="我的订单">我的订单</a></li>
            <li class="bt1"><a href="<?php echo U('login/index') ?>" title="修改密码">修改密码</a></li>
            <li><a href="<?php echo U('login/index') ?>" title="退出登录">退出登录</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>

<div class="no-login-page page">
  <div class="container clearfix">
    <div class="user-left hidden-sm">
      <div class="user-card">
        <div class="img-box">
          <a href="<?php echo U('login/index') ?>" title="去登录"><img src="<?php echo $common ?>user/images/no-login.png" alt=""></a>
        </div>
        <div class="username-info">
          <a href="<?php echo U('login/index') ?>" title="去登录">去登录</a>
        </div>
        <div class="autograph-info">
          个性签名
        </div>
        <div class="btn-area">
          <a href="<?php echo U('login/index') ?>" class="btn-default btn-release">发布文章</a><br>
          <a href="<?php echo U('login/index') ?>" class="btn-default btn-sign-out">退出登录</a>
        </div>
      </div>
      <ul class="user-list">
        <li><a href="<?php echo U('login/index') ?>" title="我的关注" class="bt1">我的关注</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="我的粉丝">我的粉丝</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="我的投稿">我的投稿</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="我的收藏">我的收藏</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="我的喜欢">我的喜欢</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="我的评论">我的评论</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="我的钱包" class="bt1">我的钱包</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="购物车">购物车</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="订单管理">订单管理</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="资料与账号" class="bt1">资料与账号</a></li>
        <li><a href="<?php echo U('login/index') ?>" title="修改密码">修改密码</a></li>
        <li><a href="<?php echo $webconf['domain'] ?>/" title="返回主页" class="bt1">返回主页</a></li>
      </ul>
    </div>
    <div class="user-right">
      <div class="user-tips">
        <p><i class="iconfont iconxiaoxi3"></i> 欢迎注册本站会员，注册会员后您将享受专属会员服务!包括但不限于专属文章浏览权限，会员投稿权限，在线购物权限，下载会员可见附件等实用功能，欢迎注册体验！</p>
      </div>
        <div class="user-content">
        <h2>登录网站</h2>
        <form method="POST" onsubmit="return checklogin()" class="user-form">
          <input id="isremember" name="isremember" value="0" type="hidden" />
          <input id="token" name="token" value="<?php echo $token ?>" type="hidden" />
          <div class="form-control">
            <label for="">账户：</label>
            <input type="text" name="tel" id="tel" value="" placeholder="请输入手机号/邮箱">
          </div>
          <div class="form-control">
            <label for="">密码：</label>
            <input type="password" value="" id="password" name="password" placeholder="请输入您的密码">
            <a style="color:#f00" href="<?php echo U('forget') ?>">忘记密码？</a>
          </div>
          <div class="form-control">
            <label for="">验证码：</label>
            <input type="text" value="" name="vercode" id="yzm" placeholder="请输入验证码">
            <img src="<?php echo U('common/vercode',['code_name'=>'login_vercode']) ?>" onclick="this.src=this.src+'?'+Math.random()" style="height:50px;"/>
          </div>
          <div class="form-group">
              <div style="margin-left: 80px;height: 50px;">
              
              <input class="form-check-input" type="checkbox" id="jz_login">记住密码
              <a  href="<?php echo U('login/register') ?>">还没有账号？立即注册</a>
              </div>
          </div>
          <div class="form-control">
            <label for="submit"></label>
            <input type="submit" name="submit" value="提交">
          </div>
          <?php if(isWeixin()){ ?>
          <div class="form-control">
            <label for="submit"></label>
            <input type="button" style="border: 1px solid #6eb12d; background: #6eb12d;color: #fff;" onclick="wechat_login()" value="微信端登录">
          </div>
          <?php } ?>
         
        </form>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="copyright">
    <p><span>Copyright &copy; 2019-2099</span><span><a href="#" title="ICP备案号"><?php echo $webconf['web_beian'] ?></a></span><span>Theme By Shubinqi</span></p>
  </div>
</footer>
<script src="<?php echo $common ?>user/js/user.js"></script>
<script>
function setCookie(name,value,day)
{
var Days = parseInt(day);
var exp = new Date();
exp.setTime(exp.getTime() + Days*24*60*60*1000);
document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg)){
return unescape(arr[2]);
}else{
return null;
}

}

$(function(){
//页面执行时处理
var name = getCookie('jizhi_username');
var jizhi_login_token = getCookie('jizhi_login_token');
if(name!=null && jizhi_login_token!=null){
  $("#tel").val(name);
  $("#password").val(jizhi_login_token);
}

})

function checklogin(){
  if($.trim($("#tel").val())=='' || $.trim($("#password").val())==''){
    alert('账号密码不能为空~');
    return false;
  }
  if($.trim($("#yzm").val())==''){
    alert('验证码不能为空~');
    return false;
  }
  if($("#jz_login").is(":checked")){
    $("#isremember").val(1);
    setCookie('jizhi_username',$("#tel").val());//设置用户名
    setCookie('jizhi_login_token',$("#token").val(),7);//设置7天有效期
  }else{
    $("#isremember").val(0);
  }
  
  return true;

}

function wechat_login(){
  window.location.href="<?php echo U('Wechat/login') ?>"
}

</script>
</body>
</html>