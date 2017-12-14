<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>忘记密码</title>
  <link data-turbolinks-track="true" href="/Hlt/Public/css/application-259d88b7df3d30d7eec66f46114169d9.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/user-44752681eea2af83918f1dc30a2b564c.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/gaoxiaobang-da3a2db2fecddd160bc3e3c4a3a3bc38.css" media="all" rel="stylesheet" />
  <script type="text/javascript" src="/Hlt/Public/js/jquery.min.js"></script>
  <meta content="authenticity_token" name="csrf-param" />
<meta content="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" name="csrf-token" />
  <link rel="shortcut icon" href="/Hlt/Public/images/favicon.ico"/>
  <link rel="apple-touch-icon-precomposed" href="/Hlt/Public/images/apple-touch-icon-precomposed.png">
</head>
<body>
<link href="/Hlt/Public/css/find_password-75981770dbe945b3793e91bfe66975b4.css" media="screen" rel="stylesheet" />
<div class="signin-header">
  <div class="signin-container">
    <div class="pull-left">
    <a href="" class="signin-logo"></a>
      <div class="text">小腾学习网</div>
    </div>
    <div class="pull-right">
      没有账号，<a href="<?php echo U('Home/reg');?>" class="color-lnk">免费注册</a>
    </div>
  </div>
</div><!-- /.sigin-header -->
<div class="container">
  <div class="title">
    <ul class="nav nav-pill">
      <li class="special-bj bw-bj">确认账号</li>
      <li class="white-bj">验证安全性</li>
      <li class="white-bj">重置密码</li>
      <li>完成</li>
    </ul>
  </div>

  <div class="find-pwd">
    <form accept-charset="UTF-8" class="simple_form new_user" ><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" /></div>

        <div class="form-group">
          <label for="user_username" class="control-label">账号</label>
          <input aria-required="true" autocomplete="off" autofocus="autofocus" class="string required form-control input-lg input-bj" id="user_username" max-length="18" maxlength="255" name="user[username]" placeholder="用户名" required="required" size="255" type="text" />
          <div class="input-icon find_pwd_user_bj find-pwd-img"></div>
          <span class="msg-icon"></span>
          <div class="help-block">手机或3-18位中英文、数字、下划线</div>
        </div>
        <div class="form-group">
          <style>
    .form-group-pic img{ width: 77px; height: 38px; }
</style>
      
        <div class="form-group">
          <input class="button btn btn-primary btn-lg" type="button" value="下一步" onclick="d_user()" />
        </div>
        <div class="form-group text-center">
          <a href="<?php echo U('Home/login_user');?>"  class="link-line link-blue" target="_blank">返回登录</a>
        </div>
</form>  </div>
</div>

<script>
function d_user(){
   $.ajax({   
	        type:"post",     
	        url:"<?php echo U('Users/d_password_user');?>", 
	        dataType:"json",
	        data:{
	        	 "username":$("#user_username").val(),
	        	 },
	        success:function(data){   
	        	 if(data.key==0){
	                 alert(data.msg);
	               }else{
	             window.location.href="<?php echo U('Home/forget_check');?>";
	               }
	        },   
	        error:function(){   
	            alert("登陆出错");   
	        }   
	    });		
}
   

</script>



<div style="display: none; line-height: 0px;">

<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 983566162;
    var google_conversion_language = "en";
    var google_conversion_format = "2";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "wTJBCL7Q9gcQ0o6A1QM";
    var google_remarketing_only = false;
    /* ]]> */
</script>

</div>
</body>
</html>