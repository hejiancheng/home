<?php if (!defined('THINK_PATH')) exit();?>  
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>注册</title>
  <link data-turbolinks-track="true" href="/Hlt/Public/css/application-259d88b7df3d30d7eec66f46114169d9.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/user-44752681eea2af83918f1dc30a2b564c.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/gaoxiaobang-da3a2db2fecddd160bc3e3c4a3a3bc38.css" media="all" rel="stylesheet" />
  <script data-turbolinks-track="true" src="/Hlt/Public/js/application-fb8562c33e2e6c7d207653c10215fc91.js"></script>
  <meta content="authenticity_token" name="csrf-param" />
<meta content="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" name="csrf-token" />
  <link rel="shortcut icon" href="/Hlt/Public/images/favicon.ico"/>
  <link rel="apple-touch-icon-precomposed" href="/Hlt/Public/images/apple-touch-icon-precomposed.png">
</head>
<body>

<div class="signup">
  <div class="signin-header">
    <div class="signin-container">
      <div class="pull-left">
        <a href="index.html" class="signin-logo">开课吧</a>
        <div class="text">注册账号</div>
      </div>
      <div class="pull-right">
        我已经注册，现在就&nbsp;
        <a href="<?php echo U('Home/login');?>" class="color-lnk">登录</a>
      </div>
    </div>
  </div>
  <div class="center-block">
    <form accept-charset="UTF-8" action="/users" class="simple_form new_user" id="register_form" method="post"><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" /></div>
        <div class="form-group hidden user_landing_page_course_url"><input class="hidden" id="user_landing_page_course_url" name="user[landing_page_course_url]" type="hidden" value="http://www.kaikeba.comcourse_detail.html" /></div>
        <div class="signup-main" action="">
          <h4>注&nbsp;册</h4>
          <div class="form-group status-warning">
            <label class="control-label" for="user_username">用户名</label>
            <input aria-required="true" class="string required form-control" id="user_username" maxlength="18" name="user[username]" placeholder="用户名" required="required" size="18" type="text" />
            <div class="input-icon bg-username"></div>
            <span class="msg-warning">3-18位中英文、数字、下划线</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
         
          <div class="form-group status-warning">
            <label class="control-label" for="user_password">密码</label>
            <input autocomplete="false" class="password optional form-control" id="user_password" maxlength="16" name="user[password]" placeholder="请输入密码" size="16" type="password" />
            <div class="input-icon bg-pwd"></div>
            <span class="msg-warning">6-16位数字、字母或符号的组合</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
          <div class="form-group status-warning">
            <label class="control-label" for="user_password">确认密码</label>
            <input autocomplete="false" class="password optional form-control" id="user_password" maxlength="16" name="user[password]" placeholder="请输入密码" size="16" type="password" />
            <div class="input-icon bg-pwd"></div>
            <span class="msg-warning">6-16位数字、字母或符号的组合</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
           <div class="form-group status-warning">
            <label class="control-label" for="user_email_mobile">认证邮箱</label>
            <input autocomplete="off" class="string optional form-control" id="user_email_or_mobile" maxlength="50" name="user[email_or_mobile]" placeholder="邮箱/手机号" size="50" type="text" />
            <div class="input-icon bg-mobile"></div>
            <span class="msg-warning">请输入正确的邮箱</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
          <div class="form-group status-warning">
  <!-- 添加 switch-mail 类可以切换到邮件验证 -->
  <label class="control-label" for="user_captcha">验证码</label>
  <input autocomplete="off" class="form-control txt-code" id="user_captcha" name="user[captcha]" placeholder="验证码" required="required" type="text" value="" />
  <!--<input type="text" maxlength="6" class="form-control txt-code" id="user_code" name="user_code" placeholder="验证码">-->
  <div class="tab-mobile">
    <div id="mobile_captcha"></div>
    <button type="button" class="btn btn-primary" id="refresh_mobile_captcha_button">获取邮箱验证码</button>
    <button type="button" class="btn btn-waitting">60''后重新发送</button>
  </div>
  <span class="msg-warning">4-6位数字、字母</span>
  <div class="error-block"></div>
  <span class="msg-success">&nbsp;</span>
</div>

<script>
    $("#refresh_mobile_captcha_button").click(function(){
        $.post("/users/refresh_mobile_captcha?object=user", { mobile: $('#user_email_or_mobile').val() });
    })
</script>


          <div class="submit-div">
            <button class="btn btn-warning" type="submit">注册</button>
          </div>
        </div>
</form>  </div>
</div>

<script src="js/signup-df186aea04637ab5e68434a347ae462b.js"></script>

<script type="text/javascript">
    $(function(){
        $('#user_username').trigger('blur');
        $('#user_email_or_mobile').trigger('blur');
    });

</script>



</body>
</html>