<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>忘记密码 - 设置成功提示</title>
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
      没有账号，<a href="<?php echo U('Home/reg');?>" class="color-lnk">免费注册</a>
    </div>
  </div>
</div>
<div class="container">
  <div class="title">
    <ul class="nav nav-pill">
      <li class="pass-bj finish">确认账号</li>
      <li class="pass-bj finish">验证安全性</li>
      <li class="finish-bj finish">重置密码</li>
      <li class="special-bj">完成</li>
    </ul>
  </div>
  <div class="success">
    <h4><img src="/Hlt/Public/images/find_pwd_success.png"> 重置密码已成功！</h4>
    <p>密码重置已成功，<span id="delay_time">5</span> 秒后自动跳转到登录页面！</p>
    <div class="form-group  text-center">
      <a href="<?php echo U('Home/login_user');?>" class="link-line link-blue" target="_blank">直接登录</a>
    </div>
  </div>
</div>

<script type="text/javascript">
    var delay_time = 6, interval;
    function redirect_to_index(){
        delay_time = delay_time - 1;
        $("#delay_time").text(" "+delay_time);
        if(delay_time == 0){clearInterval(interval); window.location.href ="<?php echo U('Home/login_user');?>";}
    }
    $(function(){
        interval = setInterval(redirect_to_index, 1000)
    })
</script>

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




</div>
</body>
</html>