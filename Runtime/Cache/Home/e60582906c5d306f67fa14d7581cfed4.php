<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>忘记密码 - 重置密码</title>
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
      <li class="pass-bj finish">确认账号</li>
      <li class="finish-bj finish">验证安全性</li>
      <li class="special-bj bw-bj">重置密码</li>
      <li>完成</li>
    </ul>
  </div>

  <div class="find-pwd reset">
    <form accept-charset="UTF-8"  class="simple_form new_user" id="reset_password_form" method="post" role="form"><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="_method" type="hidden" value="put" /><input name="authenticity_token" type="hidden" value="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" /></div>
        
        <div class="form-group hidden user_reset_password_token"><input class="hidden" id="user_reset_password_token" name="user[reset_password_token]" type="hidden" value="yBqq3Ebvq5YG_w-ANmhY" /></div>
        

        <div class="form-group ">
          <label for="user_password" class="control-label">密码</label>
          <input aria-required="true" autofocus="autofocus" class="password required form-control input-lg input-bj" id="user_password" maxlength="128" name="user[password]" placeholder="请输入密码（6-16位字符）" required="required" size="128" type="password" />
          <div class="input-icon find_pwd_bj find-pwd-img"></div>
          <span class="msg-icon"></span>
          <div class="help-block">6-16位数字、字母或符号的组合</div>
        </div>
        <div class="form-group ">
          <label for="user_password_confirmation" class="control-label">再次确认密码</label>
          <input aria-required="true" class="password required form-control input-lg input-bj" id="user_password_confirmation" name="user[password_confirmation]" placeholder="请再次输入密码（6-16位字符）" required="required" type="password" />
          <div class="input-icon find_pwd_bj find-pwd-img"></div>
          <span class="msg-icon"></span>
          <div class="help-block">6-16位数字、字母或符号的组合</div>
        </div>
        <div class="form-group btn-right">
          <input type="button" class="button btn btn-primary btn-lg btn-block"  value="确认重置密码" />
        </div>
</form>  </div>
</div>

<script type="text/javascript">
    $(function(){
        validateForm();
    });

    // 表单验证
    function validateForm(){
        $("#reset_password_form").validate({
            rules: {
                "user[password]": {required: true, minlength: 6, maxlength: 16 },
                "user[password_confirmation]": { required: true, equalTo: '#user_password' }
            },
            messages: {
                "user[password]": {
                    minlength: "密码最小长度是6位", maxlength: "密码最大长度是16位"
                },
                "user[password_confirmation]": {
                    required: "确认密码不能为空", equalTo: "密码与确认密码不一致"
                }
            },
            // 未通过
            highlight: function(el) {
                $(el).parents(".form-group").addClass("status-error").removeClass("status-success");
            },
            // 通过
            unhighlight: function(el) {
                $(el).parents(".form-group").removeClass("status-error").addClass("status-success");
            },
            errorPlacement: function(error, el) {
                $(el).parents(".form-group").find(".help-block").empty().append(error);
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
<div style="display: none;">
  <script type="text/javascript" src="js/conversion.js">
  </script>
  <noscript>
    <div style="display:inline;">
      <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/983566162/?label=wTJBCL7Q9gcQ0o6A1QM&amp;guid=ON&amp;script=0"/>
    </div>
  </noscript>

  <script type="text/javascript">
      $(document).ready(function(){
          var src_url = window.location.href;
          $("[click_source]").each(function(){
              var src_ele_value = $(this).attr("click_source");
              var tag_name = $(this).prop('tagName');
              if (tag_name == 'UL') {
                  $(this).find("a").each(function (index) {
                      $(this).click(function () {
                          var des_url = $(this).attr("href");
                          _paq.push(['setCustomVariable', '1', 'user_click', src_ele_value + '||' + index + '||' + src_url + '||' + des_url, 'page']);
                          _paq.push(['trackPageView']);
                      });
                  });
              }else if (tag_name == 'A') {
                  $(this).click(function () {
                      var des_url = $(this).attr("href");
                      _paq.push(['setCustomVariable', '1', 'user_click', src_ele_value + '||' + src_url + '||' + des_url, 'page']);
                      _paq.push(['trackPageView']);
                  });
              }else if (tag_name == 'INPUT'){
                  $(this).click(function () {
                      _paq.push(['setCustomVariable', '1', 'user_click', src_ele_value + '||' + src_url, 'page']);
                      _paq.push(['trackPageView']);
                  });
              }

          })
      });
  </script>
  <script src="/Hlt/Public/js/monitorView-2.0.js"></script>
  <noscript><p><img src="http://piwik.kaikeba.com/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
</div>
</div>
</body>
</html>