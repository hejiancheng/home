<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Bootply" />
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
  <title>登录</title>
  <link rel="stylesheet" type="text/css" href="/Hlt/Public/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/Hlt/Public/css/global.css" />
  <link rel="stylesheet" type="text/css" href="/Hlt/Public/css/signin.css" />
	<script src="/Hlt/Public/js/jQuery.md5.js"></script>	
  <script type="text/javascript" src="/Hlt/Public/js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <link rel="icon" type="image/png" href="images/favicon.ico" />
  <style>
      html { height: 100% }
  </style>
</head>
<body style="height: 100%;">

<div class="signin">
  <div class="signin-header">
    <div class="signin-container">
      <div class="pull-left">
        <a  href="index.html" class="signin-logo"></a>
        <div class="text">访问首页</div>
      </div>
      <div class="pull-right">
        
            没有帐号，<a class="color-lnk" href="<?php echo U('Home/reg');?>">免费注册</a>
        
      </div>
    </div>
  </div>
  <div class="signin-body">
    <div class="signin-container text-center">
      <h1>登&nbsp;&nbsp;&nbsp;录</h1>
      

<style>
    .dropdown-menu > li > a {
        text-align: left;
    }
</style>

<form class="form-horizontal signin-form"  >
  <div class="form-group">
    <label for="username" class="col-xs-2 control-label">账号</label>
    <div class="col-xs-10">
      <div class="form-icon">
        <span class="signin-icon signin-user"></span>
      </div>
      <input name="username" type="text" class="form-control" tabindex="1" accesskey="u" id="username" placeholder="用户名/手机号" autocomplete="off" maxlength="50" required="required">
      <div class="help-block"><span class="signin-icon signin-info"></span>用户名、手机号</div>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="left: 15px;">
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@sina.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@163.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@qq.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@126.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@sina.cn"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@hotmail.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@gmail.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@sohu.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@139.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@wo.com.cn"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@189.com"></a>
        </li>
        <li role="presentation">
          <a role="menuitem" tabindex="-1" href="#" format="@21cn.com"></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-xs-2 control-label" for="password">密码</label>
    <div class="col-xs-10">
      <div class="form-icon">
        <span class="signin-icon signin-pwd"></span>
      </div>
      <input name="password" type="password" class="form-control" id="password" tabindex="2" autocomplete="off" placeholder="请输入密码" maxlength="16" required="required">
      <div class="help-block"><span class="signin-icon signin-info"></span>6-16位数字、字母或字符的组合</div>
    </div>
  </div>
  <div class="signin-helper row">
    <div class="col-xs-5 col-xs-offset-2 text-left">
      <!-- <div class="checkbox">
        <label>
         <img src="/Hlt/Public/images/qq_login.png"></a>
        </label>
      </div> -->
    </div>
    <div class="col-xs-5 text-right">
      
          <a href="<?php echo U('Home/forget');?>" class="forget-pwd-lnk color-lnk">忘记密码？</a>
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-10 col-xs-offset-2">
      <input type="hidden" id="lt" name="lt" value="LT-1428624317rs0wBPrGW-5N5dU7C7B" />
      <input type="hidden" id="service" name="service" value="http:&#x2F;&#x2F;www.kaikeba.com&#x2F;users&#x2F;service" />
      <input  type="button" id="login-submit" class="btn btn-warning btn-block" value="登录" onclick="login()">
    </div>
  </div>
  </form>
<script type="text/javascript">
document.onkeydown = function(eventTag){
    var event=eventTag||windows.event;
    var e=event.srcElement||event.target;
    if(event.keyCode == 13){
    	login();
        return false;
    }
}
function login(){
	var name=$("#username").val();
	var password=$("#password").val();
	if(name==""){
		alert("用户名不能为空");
		return;
	}
	if(password==""){
		alert("密码不能为空");
		return;
	}
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Users/login');?>", 
        dataType:"json",
        data:{
        	"name":name,
        	"password":password
        	},
        success:function(data){   
        	if(data.key==0){
        		alert(data.msg);
        	}else{
			window.location.href="<?php echo U('UsersHome/index');?>";
        	}
        },   
        error:function(){   
            alert("登陆出错");   
        }   
    });				  
}
</script>
    </div>
  </div>
</div>
<div class="copyright text-center" style="display: none;">
</div>
</body>
</html>