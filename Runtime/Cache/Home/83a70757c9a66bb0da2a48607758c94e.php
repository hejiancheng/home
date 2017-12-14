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
  <script data-turbolinks-track="true" src="/Hlt/Public/js/application-fb8562c33e2e6c7d207653c10215fc91.js"></script>
  <meta content="authenticity_token" name="csrf-param" />
<meta content="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" name="csrf-token" />
  <link rel="shortcut icon" href="/Hlt/Public/images/favicon.ico"/>
  <link rel="apple-touch-icon-precomposed" href="/Hlt/Public/images/apple-touch-icon-precomposed.png">
</head>
<body>
<link href="/Hlt/Public/css/find_password-75981770dbe945b3793e91bfe66975b4.css" media="screen" rel="stylesheet"/>
<div class="signin-header">
  <div class="signin-container">
    <div class="pull-left">
      <div class="text">学习</div>
    </div>
    <div class="pull-right">
      没有账号，<a href="/users/sign_up" class="color-lnk">免费注册</a>
    </div>
  </div>
</div><!-- /.sigin-header -->
<div class="container">
  <div class="title">
    <ul class="nav nav-pill">
      <li class="special-bj bw-bj">确认账号</li>
      <li class="white-bj">邮箱验证码</li>
      <li class="white-bj">重置密码</li>
      <li>完成</li>
    </ul>
  </div>

  <div class="find-pwd">
    <form accept-charset="UTF-8" action="/users/passwords/verify" class="simple_form new_user" id="password_form" method="post"><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" /></div>

        <div class="form-group">
          <label for="user_username" class="control-label">账号</label>
          <input aria-required="true" autocomplete="off" autofocus="autofocus" class="string required form-control input-lg input-bj" id="user_username" max-length="18" maxlength="255" name="user[username]" placeholder="用户名/手机号" required="required" size="255" type="text" />
          <div class="input-icon find_pwd_user_bj find-pwd-img"></div>
          <span class="msg-icon"></span>
          <div class="help-block">邮箱、手机或3-18位中英文、数字、下划线</div>
         <div class="form-group">
          <style>
    .form-group-pic img{ width: 77px; height: 38px; }
</style>
<div class="form-group form-group-code">
  <label for="captcha" class="control-label"> 验证码</label>
  <input autocomplete="off" class="form-control input-lg" id="captcha" name="captcha" placeholder="输入邮箱验证码" required="required" type="text" />
  <span class="msg-icon"></span>
  <div class="help-block">请输入邮箱验证码</div>
  <!--<input class="form-control input-lg input-sm" id="findcode" name="findcode" type="text" placeholder="验证码" maxlength="6" />-->
</div>
<div class="form-group-pic">
  <a id="codeBtn" href="javascript:void(0);" class="link-blue">发送邮箱验证码</a>
</div>
<script>
    $("#codeBtn").click(function(){
        $.post("/users/refresh_captcha");
    })
</script>
        </div>
        <div class="form-group">
          <input class="button btn btn-primary btn-lg" disable_with="提交中..." name="commit" type="submit" value="下一步" />
        </div>
        <div class="form-group text-center">
          <a href="/users/sign_in" class="link-line link-blue" target="_blank">返回登录</a>
        </div>
</form>  </div>
</div>

<script>
    $('#captcha').addClass('input-sm');


    $("#password_form").validate({
        debug: false,
        errorClass: "has-error",
        validClass: "has-success",
        onkeyup: false,
        ignore: "",
        rules: {
            "user[username]": {
                required: true,
                username_email_mobile: true,
                remote:{ url: "/users/check_email_or_mobile_or_username_unique", type:"post", dataType:"json" }
            },
            captcha: {
                required: true,
                exactlength: 4,
                remote: { url:'/users/check_mobile_captcha_match', type:"post", dataType:"json" }
            }
        },
        messages: {
            "user[username]": {
                required: "请输入正确的用户名/邮箱/手机号"
            },
            captcha: {
                required: "验证码不能为空",
                remote: "验证码不正确"
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

    // 关于邮箱手机输入框的各种效果
    function bindEmailEvent() {

        var timer = null;
        var $dropdown = $(".dropdown-menu");
        var $list = $dropdown.find("li");
        var $txtMailMobile = $("#user_username");

        // 列表点击
        $list.mousedown(function () {
            var text = $(this).find("a").html();
            $txtMailMobile.val(text).focus();
            $txtMailMobile.parent().addClass("status-success");
            setTimeout(function(){ hideDropDown(); }, 100)
        });

        // 手机号邮箱输入框前的小图标切换
        // 以及离开的时候验证码的切换
        $txtMailMobile.keyup(function (e) {
            letterKeyEvent(this, e.keyCode);
        }).blur(function(){
            setTimeout(function(){ hideDropDown(); }, 100)
        }).keydown(function (e) {   // keydown 中可以阻止上下键的默认行为

            var txt = $(this).val();
            // 如果提示下拉列表显示出来并且点击了上下键/回车键，做完键盘事件直接返回
            var index = txt.indexOf("@");
            //if(index > -1){
            var code = e.keyCode;
            var flag = helpKeyEvent(code, $list, this);
            return flag;
            //}
            return true;
        });

        // 邮件框中的字母键键盘事件
        function letterKeyEvent(obj, code) {

            var txt = $(obj).val();

            // 输入框前边的小图标更换
            if (isNum(txt) || txt == "") {  //
                $(obj).removeClass("bg-mail");
                hideDropDown();
            } else {  // 邮件
                $(obj).addClass("bg-mail");

                // 如果有@再显示 / 输入字母的时候再显示
                var index = txt.indexOf("@");
                if(index > -1){
                    // 回车选中的时候不触发up事件
                    if (code == 13) {
                        return false;
                    }

                    var stuffix = txt.substring(index);
                    var prefix = txt.substring(0, index);
                    if (index == -1) {
                        prefix = txt;
                        stuffix = "@";
                    }

//                    clearTimeout(timer);
//                    timer = setTimeout(function () {
                        $list.hide();
                        var $result = $list.filter(":has(a[format^='" + stuffix + "'])");
                        if ($result.length == 0) {
                            hideDropDown();
                            return;
                        }
                        $result.each(function () {
                            var $a = $(this).find("a");
                            $a.html(prefix + $a.attr("format"));
                        }).show();
                        $dropdown.show();
//                    }, 100);
                }
            }
        }

        // 邮件框中的功能键键盘事件
        function helpKeyEvent(code, $list, input) {
            var $result = $list.filter(":visible");
            var resultLen = $result.length;
            if (resultLen == 0) {
                return true;
            }

            // 是否有激活的
            var $activeItem = $result.filter(".active").eq(0);
            var activeLen = $activeItem.length;
            var isActive = activeLen > 0;
            var activeIndex = getIndex($result, $activeItem);

            // 点击上下箭头，初始化都选中第一个
            if (code == 38) {  // ↑
                if (!isActive) { 	// 没有激活的
                    $result.eq(0).addClass("active");
                } else if (activeIndex > 0) { // 是激活的并且选中的不是最后一个
                    $list.removeClass("active");
                    $result.eq(activeIndex - 1).addClass("active");
                }
            } else if (code == 40) { //↓
                if (!isActive) { 	// 没有激活的
                    $result.eq(0).addClass("active");
                } else if (activeIndex < resultLen - 1) { // 是激活的并且选中的不是最后一个
                    $list.removeClass("active");
                    $result.eq(activeIndex + 1).addClass("active");
                }
            } else if (code == 13) { // 回车
                if (isActive) {
                    $(input).val($activeItem.eq(0).find("a").html());
                    hideDropDown();
                }
            } else {
                return true;
            }
            return false;
        }

        // 取下标
        function getIndex(list, item) {
            var len = list.length;
            for (var i = 0; i < len; i++) {
                if ($(list[i]).get(0) == $(item).get(0)) {
                    return i;
                }
            }
            return -1;
        }

        // 隐藏下拉列表
        function hideDropDown() {
            $dropdown.hide();
            $list.removeClass("active");
        }

    }

    // 验证是否为数字
    function isNum(txt){
        return  /^\d+$/.test(txt);
    }
    $(function(){
        bindEmailEvent();
    });


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

</div>



</div>
</body>
</html>