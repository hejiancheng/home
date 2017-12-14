<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>忘记密码 - 验证</title>
  <link data-turbolinks-track="true" href="/Hlt/Public/css/application-259d88b7df3d30d7eec66f46114169d9.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/user-44752681eea2af83918f1dc30a2b564c.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/gaoxiaobang-da3a2db2fecddd160bc3e3c4a3a3bc38.css" media="all" rel="stylesheet" />
  <script data-turbolinks-track="true" src="/Hlt/Public/js/application-fb8562c33e2e6c7d207653c10215fc91.js"></script>
  <meta content="authenticity_token" name="csrf-param" />
<meta content="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" name="csrf-token" />
  <link rel="shortcut icon" href="/Hlt/Public/images/favicon.ico"/>
  <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
 
</head>
<body>
<link href="/Hlt/Public/css/find_password-75981770dbe945b3793e91bfe66975b4.css" media="screen" rel="stylesheet" />
<div class="signin-header">
  <div class="signin-container">
     <div class="pull-left">
      <div class="text">小腾学习网</div>
    </div>
    <div class="pull-right">
      没有账号，<a href="/users/sign_up" class="color-lnk">免费注册</a>
    </div>
  </div>
</div>

<div class="container">
  <div class="title">
    <ul class="nav nav-pill">
      <li class="finish-bj finish">确认账号</li>
      <li class="special-bj bw-bj">验证安全性</li>
      <li class="white-bj">重置密码</li>
      <li>完成</li>
    </ul>
  </div>
  <div class="verify-con ">
    <div class="verify" style="margin-left: 100px">
      <div class="mobile mail " id="email-validate-dialog"><!--未绑定时加一个"disabled mail-img"类-->
        <a data-method="post" data-remote="true" href="/users/password?validate_type=email" rel="nofollow">
            <div class="content">
              <h5>邮箱找回</h5>
              <div class="one">
                <p class="one-img find-pwd-img find_pwd_mail_02"></p>
                    <p>已绑定邮箱</p>
                    <p>41614*****@qq.com</p>
              </div>
            </div>
</a>      </div>
<div class="form-group form-group-code">
  
</div>
      <div class="form-group text-center">
      <input autocomplete="off" class="form-control input-lg" id="captcha" name="captcha" placeholder="验证码" required="required" type="text" />
   <input type="button"  class="btn btn-primary" id="refresh_mobile_captcha_button" value="获取邮箱验证码" onclick="time(this)" style="margin-top: 10px">
        <a href="forget.html" class="link-line link-blue">返回上一步</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
      var wait = 60; 
function time(o) { 
    /*  if(state==1){
       // send_email();
        state=0;
      }*/
    if (wait == 0) {
  o.removeAttribute("disabled"); 
   $("#refresh_mobile_captcha_button").val("获取邮箱验证码");
   //state=1;
  wait = 60; 
  } else { 
  o.setAttribute("disabled", true); 
   $("#refresh_mobile_captcha_button").val("重新发送(" + wait + ")");
  wait--; 
  setTimeout(function(){time(o)},1000); 
  } 
  } 
</script>
</div>
</body>
</html>