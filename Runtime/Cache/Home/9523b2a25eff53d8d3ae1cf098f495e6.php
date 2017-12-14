<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

      <title>我的信息</title>
    <link data-turbolinks-track="true" href="/Hlt/Public/css/application-259d88b7df3d30d7eec66f46114169d9.css" media="all" rel="stylesheet" />
    <link data-turbolinks-track="true" href="/Hlt/Public/css/sign_in_modal-3160308d45c1acdf19162e7886744068.css" media="all" rel="stylesheet" />
    <link data-turbolinks-track="true" href="/Hlt/Public/css/gaoxiaobang-da3a2db2fecddd160bc3e3c4a3a3bc38.css" media="all" rel="stylesheet" />
      <script type="text/javascript" src="/Hlt/Public/js/jquery.min.js"></script>
    <script data-turbolinks-track="true" src="/Hlt/Public/js/application-fb8562c33e2e6c7d207653c10215fc91.js"></script>
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
  </head>
  <body onload="get_province()">
<header class="white-header" id="header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="pull-left">
          <div class="logo">
            <a href="index.html"><img alt="Logo color" data-at2x="/assets//Hlt/Public/images/logo-color@2x.png" src="/Hlt/Public/images/logo-color.png" /></a>
            
          </div>
            <div class="dropdown">
        <a href="index.html" class="btn btn btn-default"> 首页 </a>
                  </div>
       <div class="dropdown">
        <a href="course_list.html" class="btn btn btn-default"> 刷题</a>
                  </div>
                  
        <div class="dropdown">
        <a href="index.html" class="btn btn btn-default"> 我的信息</a>
                  </div>  
        
        </div>
        <div class="pull-right header-link">
          <style type="text/css" media="screen">
.dowe-menu-course{ width:336px; background:#fff;border-radius: 4px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);}
.dowe-menu-course-title{ height:40px; padding-left:20px; color:#879099; font-size:14px; line-height:40px;}
.dowe-menu-course-list a{ display:block; height:65px; padding:0 20px; text-decoration:none;}
.dowe-menu-course-list a:hover{ background:#F4F4F4;}
.listtitle{color: #606366;font-size: 14px;}
.listtime{ color: #b6bec6;font-size: 12px;}
.dowe-menu-course-list a ul{padding-top: 10px; border-top: 1px #EDEFF0 solid;}
.dowe-menu-course-list a ul li.classtitle{color: #b2b6b9;line-height: 30px;font-size: 12px; height: 30px;overflow: hidden;}
</style>
    <span id="my_course">
        <div class="dowe-menu-course dropdown-menu" id="study_progression">
        </div>
    </span>
    <span class="dropdown">
      <a data-toggle="dropdown" href="#">
        <!--<img src="/Hlt/Public/images/avatar.png" alt="avatar" class="header-avatar">-->
        <img alt="Avatar" class="header-avatar thumb_avatar" height="36" src="/Hlt/Public/images/avatar.png?time=1428625299" width="36" />
        <span>hjl416148489</span>
        <span id="email" style="display: none;">416148489@qq.com</span>
        <span id="user_id" style="display: none;">934441</span>
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li><a href="http://www.kaikeba.com/users/collections">刷题</a></li>
        <li><a href="/users/sign_out">退出</a></li>
      </ul>
    </span>

<script>
  window.domain = 'kaikeba.com'
  var arrStr = document.cookie.split("; ");
  var access_token = null;
  for (var i=0; i < arrStr.length; i++) {
    if (arrStr[i].split("=")[0] === 'access_token') {
        access_token = unescape(arrStr[i].split("=")[1]);
    };
  };
  var kaikeba_lms_website = "http://lms.kaikeba.com";
  if (access_token) {
      $.ajax({
          url : "http://w.api.kaikeba.com"+'/learn_log/'+access_token+'?size=5&school_code='+(window.location.host.split(".").length==3?window.location.host.split(".")[0]:''),
          type : 'GET',
          contentType : 'application/json',
          success : function(back){
              if (back.data.length) {
                  var htmls = '<div class="dowe-menu-course-title">最近学习</div>';
                  for (var i=0; i < back.data.length; i++) {
                      var hlink =  back.data[i]["school_code"] ? 'http://class.'+back.data[i]["school_code"]+'.kaikeba.com' : kaikeba_lms_website;
                    htmls += '<div class="dowe-menu-course-list">'
                        +'<a href="'+hlink+back.data[i]["redirect_uri"]+'">'
                            +'<ul class="list-unstyled">'
                              +'<li>'
                                  +'<dl class="dl-horizontal" style="margin-bottom: 4px;">'
                                      +'<dt class="listtitle" style="text-align: left;">'+back.data[i]["course_name"]+'</dt>'
                                      +'<dd class="text-right listtime">'+back.data[i]["last_time_str"]+'学习</dd>'
                                    +'</dl>'
                              +'</li>'
                              +'<li class="classtitle">'+back.data[i]["context_title"]+'</li>'
                            +'</ul>'
                        +'</a>'
                    +'</div>';
                  };
                  $('#study_progression').html(htmls);
              } else {
                  var htmls = '<div class="dowe-menu-course-title">最近学习</div>';
                  htmls += '<div class="dowe-menu-course-list" style="color:#333;text-align:center;">还没开始学习，来一课吧！</div>';
                  $('#study_progression').html(htmls);
              }
          }
      });
  };
  $('#my_course').hover(function(){
        $('#study_progression').stop(true,true).show('fast');
    },function(){
        $('#study_progression').stop(true,true).hide('fast');
    });
</script>


        </div>
        <div class="pull-right header-search">
      </div>
    </div>
  </div>
</header>
<div class="header-occupation"></div>

    <div class="user-center-gray-bg">
      <div class="container">
  <nav class="user-center-nav clearfix">
    <h1 class="pull-left">个人中心</h1>
    <ul class="pull-right">
      <li class="">
        <a href="/users/my">我的首页</a>
      </li>
      <li class="">
        <a href="/users/collections">刷题</a>
      </li>
    </ul>
  </nav>
</div>
      <div class="container">
        <div class="course-center-mainlt course-center-menu">
  <ul>
    <li><a class="on" href="/users/edit">个人信息</a></li>
  </ul>
</div>


        <div class="course-center-mainrt ">
          <h2 class="user-center-title user-center-title-line">个人设置</h2>
          <div class="user-center-content course-center-information">
            <!-- TODO form-descrip 改为 form-desc -->
<script>
    $(function() {
        $(".datepicker").css({"cursor": "default"}).datepicker({constrainInput: true, changeYear: true, changeMonth: true, yearRange: "1970:1999", defaultDate: "1990-01-01", beforeShow: function (input) {
            $(input).css({});
        }});
        $("#user_birthday").change(function(){
            $(this).blur();
        });
        $("#user_profile_attributes_job_category").change(function(){
            if("其他"!=$(this).find("option:selected").attr("value")){
                $(".job_category_other").removeClass("job_category_other_show").hide();
                $(this).removeClass("job_category_show");
                $(".user_profile_job_category_other div").hide();
                $(".user_profile_job_direction_other div").hide();
                $(".job_direction_other").hide();
            } else{
                $("#user_profile_attributes_job_direction").hide();
                $(".job_category_other").addClass("job_category_other_show").show();
                $(this).addClass("job_category_show");
                $(".job_direction_other").show();
            }
        });
        function show_major_other() {
            if ("其他" != $("#user_profile_attributes_major").find("option:selected").attr("value")) {
                $(".major_other").parent().hide();
                $("#user_profile_attributes_major").removeClass("major_show");
                $("#user_profile_attributes_major_other").removeClass("major_other_show");
            } else {
                $(".major_other").parent().show();
                $("#user_profile_attributes_major").addClass("major_show");
                $("#user_profile_attributes_major_other").addClass("major_other_show");
            }
        }

        show_major_other();
        $("#user_profile_attributes_major").change(function(){
            show_major_other();
        });


    })
</script>
<form accept-charset="UTF-8" action="/users" class="simple_form edit_user" data-remote="true" id="user_form" method="post"><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="_method" type="hidden" value="put" /></div>
    <div class="form-descrip">
      <strong>用户名</strong>
      <span>禁止修改</span>
    </div>
        <div class="form-group string required user_username"><input class="string required form-control input-lg" id="user_username" maxlength="20" name="user[username]" placeholder="用户名" size="20" type="text" value="hjl416148489" Readonly="true"/></div>
    <div class="form-descrip">
      <strong>真实姓名</strong>
      <span>放心，不会对外透露</span>
    </div>
    <div class="form-group string optional user_name"><input autofocus="autofocus" class="string optional form-control input-lg" id="user_name" maxlength="10" name="user[name]" placeholder="真实姓名" size="10" type="text" /></div>
    <div class="form-descrip">
      <strong>真实姓名拼音</strong>
    </div>
    <div class="row">
    <div class="form-group string optional user_last_name col-md-6 col-md-offset-0"><input autofocus="autofocus" class="string optional form-control input-lg" id="user_last_name" maxlength="20" name="user[last_name]" placeholder="姓氏拼音" size="20" type="text" /></div>
    <div class="form-group string optional user_first_name col-md-6 col-md-offset-0"><input autofocus="autofocus" class="string optional form-control input-lg" id="user_first_name" maxlength="10" name="user[first_name]" placeholder="名字拼音" size="10" type="text" /></div>
    </div>

    <div class="form-descrip">
      <strong>所在省份</strong>
    </div>
    <div class="form-group integer optional user_zone_id ChinaArea">
        <select id="province_input" name="province_id" class="input-lg form-control"></select>
</div>    <script type="text/javascript">


    </script>
    <div class="form-descrip">
      <strong>性别</strong>
    </div>
    <div class="form-group radio_buttons optional user_gender form-group-sex"><label class="radio"><input checked="checked" class="radio_buttons optional inline" id="user_gender_male" name="user[gender]" type="radio" value="male" />男</label><label class="radio"><input class="radio_buttons optional inline" id="user_gender_female" name="user[gender]" type="radio" value="female" />女</label></div>
    <div class="form-descrip">
      <strong>生日</strong>
    </div>
    <div class="form-group string required user_birthday form-group-age"><input class="string required form-control input-lg datepicker" id="user_birthday" name="user[birthday]" placeholder="生日日期" readonly="readonly" type="text" /></div>

    

        <div class="form-descrip">
          <strong>学历</strong>
        </div>
        <div class="form-group select optional user_profile_education"><select class="select optional form-control input-lg" id="user_profile_attributes_education" name="user[profile_attributes][education]"><option value="大专">大专</option>
<option value="本科">本科</option>
<option value="硕士">硕士</option>
<option value="博士">博士</option></select></div>

        <div class="form-descrip form-descrip-status">
        </div>

        <div id="student_info" class="profile" style="display: block;">
          <div class="form-descrip">
            <strong>学校名称</strong>
          </div>

          <div class="form-group string optional user_profile_school_name"><input class="string optional form-control input-lg" id="user_profile_attributes_school_name" maxlength="255" name="user[profile_attributes][school_name]" placeholder="学校名称" size="255" type="text" /></div>

          <div class="form-descrip">
            <strong>专业</strong>
          </div>
          <div id="major_other_show">
            <div class="form-group select optional user_profile_major"><select class="select optional form-control input-lg" id="user_profile_attributes_major" name="user[profile_attributes][major]"><option value="">请选择专业</option>
<option value="计算机科学与技术">计算机科学与技术</option>
<option value="软件工程">软件工程</option>
<option value="网络工程">网络工程</option>
<option value="信息安全">信息安全</option>
<option value="物联网工程">物联网工程</option>
<option value="数字媒体技术">数字媒体技术</option>
<option value="自动化">自动化</option>
<option value="电子信息工程">电子信息工程</option>
<option value="电子科学与技术">电子科学与技术</option>
<option value="通信工程">通信工程</option>
<option value="微电子科学与工程">微电子科学与工程</option>
<option value="光电信息科学与工程">光电信息科学与工程</option>
<option value="信息工程">信息工程</option>
<option value="理学">理学</option>
<option value="工学">工学</option>
<option value="经济学">经济学</option>
<option value="管理学">管理学</option>
<option value="艺术学">艺术学</option>
<option value="哲学">哲学</option>
<option value="法学">法学</option>
<option value="教育学">教育学</option>
<option value="文学">文学</option>
<option value="历史学">历史学</option>
<option value="农学">农学</option>
<option value="医学">医学</option>
<option value="其他">其他</option></select></div>
            <div class="form-group string optional user_profile_major_other"><input class="string optional form-control input-lg major_other" id="user_profile_attributes_major_other" maxlength="255" name="user[profile_attributes][major_other]" placeholder="请填写专业" size="255" type="text" /></div>
          </div>
          <div class="form-descrip">
            <strong>入学年份</strong>
          </div>
          <div class="form-group date optional user_profile_school_started_at"><select class="date optional form-control" id="user_profile_attributes_school_started_at_1i" name="user[profile_attributes][school_started_at(1i)]" placeholder="入学年份">
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option selected="selected" value="2016">2016</option>
</select>
<select class="date optional form-control" id="user_profile_attributes_school_started_at_2i" name="user[profile_attributes][school_started_at(2i)]" placeholder="入学年份">
<option value="1">一月</option>
<option value="2">二月</option>
<option value="3">三月</option>
<option selected="selected" value="4">四月</option>
<option value="5">五月</option>
<option value="6">六月</option>
<option value="7">七月</option>
<option value="8">八月</option>
<option value="9">九月</option>
<option value="10">十月</option>
<option value="11">十一月</option>
<option value="12">十二月</option>
</select>
<input id="user_profile_attributes_school_started_at_3i" name="user[profile_attributes][school_started_at(3i)]" type="hidden" value="1" />
</div>
        </div>

    <div class="btm">
      <input class="button btn btnblue" data-disable-with="保存中..." name="commit" type="submit" value="保存信息" />
          <div class="result" style="display: none;">
            <span class="glyphicon glyphicon-ok"></span>
            <label>信息修改成功</label>
          </div>

    </div>
</form>
<style>
    .user_profile_current_situation label{ display: inline-block; margin-left: 30px; }
    .user_profile_school_stared_at label{ display: inline-block; margin-left: 30px; }
    .user_gender label{ display: inline-block; margin-left: 30px; }
    .user_birthday .form-control{ display: inline-block; margin-left: 5px; }
    .user_zone_id .form-control{ width: 200px; display: inline-block; margin-left: 0px; }
    .user_profile_school_started_at .form-control{ width: 700px; display: inline-block;  }
    .major_show { float: left; width: 150px; margin-right: 5px; }
    .major_other_show { width: 255px; }
    .user_profile_job_category { z-index: 1; }
    .user_profile_major { z-index: 1; }
    .job_category_show { float: left; width: 150px; margin-right: 5px; }
    .job_category_other_show { width: 255px; }
    .user_last_name { float: left; width: 180px; margin-right: 5px; padding-right: 5px; }
    .user_first_name {  width: 255px; }
    .user_first_name .form-ok { right: 20px; }

</style>

<script>

    $('input[name="user[profile_attributes][current_situation]"]').change(function(){
        $('#' + $(this).val() + "_info").show().siblings('.profile').hide();
    });

    $(".form-group-place select").select2({
        'minimumResultsForSearch': -1,
        width: 199
    });

    $('.form-group-age select').select2({
        'minimumResultsForSearch': -1,
        width: 119
    });
    $(".user_birthday select").select2({
        'minimumResultsForSearch': -1,
        width: 100
    });

    $(".user_profile_school_started_at select").select2({
        'minimumResultsForSearch': -1,
        width: 160
    });

    $("#user_form").validate({
        debug: false,
        errorClass: "has-error",
        validClass: "has-success",
        onkeyup: false,
        rules: {
            "user[username]": {
                required: true,
                old_username: true,
                minlength: 3, maxlength: 18,
                remote:{ url:'/users/check_username_unique', type:"post",dataType:"json" }
            },
            "user[email]": {
                required: true,
                email: true,
                remote:{ url:'/users/check_email_unique', type:"post",dataType:"json" }
            },
            "user[name]": {
                required: true,
                chinese_name: true,
                minlength: 2, maxlength: 25
            },
            "user[zone_id]": {
                required: true
            },
            "user[birthday]": {
                required: true
            },
            "user[first_name]": {
//                required: true
                lettersonly: true
            },
            "user[last_name]": {
//                required: true
                lettersonly: true
            },
            "user[profile_attributes][school_name]": { required: true, minlength: 2, maxlength: 20 },
            "user[profile_attributes][major]": { required: true, minlength: 1, maxlength: 20  },
            "user[profile_attributes][company_name]": { required: true, minlength: 2, maxlength: 20 },
            "user[profile_attributes][major_other]": { required: true, minlength: 2, maxlength: 20 },
            "user[profile_attributes][job_category_other]": { required: true, minlength: 2, maxlength: 20 },
            "user[profile_attributes][job_direction_other]": { required: true, minlength: 2, maxlength: 20 },
            "user[profile_attributes][school_started_at(1i)]": { date: false },
            "user[profile_attributes][school_started_at(2i)]": { date: false}

        },
        messages: {
            "user[username]": {
                required: "用户名不能为空",
                minlength: "最小长度是 3",
                maxlength: "最大长度是 18",
                remote: "该用户名已经存在"
            },
            "user[name]": {
                required: "真实姓名不能为空",
                minlength: "最小长度是 2",
                maxlength: "最大长度是 6"
            },
            "user[email]": {
                required: "邮箱不能为空",
                email: "邮箱格式不正确",
                remote: "该邮箱已经存在"
            },
            "user[birthday]": {
                required: "请选择生日日期"
            },
            "user[last_name]": {
//                required: "请填写姓氏拼音",
                lettersonly: "请填写拼音，如ZHOU"

            },
            "user[first_name]": {
//                required: "请填写名字拼音",
                lettersonly: "请填写拼音，如KE"
            },

            "user[profile_attributes][school_name]": {
                required: "不能为空",
                minlength: "最小长度是 2",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][major]": {
                required: "不能为空",
                minlength: "最小长度是 1",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][company_name]": {
                required: "不能为空",
                minlength: "最小长度是 2",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][job_category]": {
                required: "不能为空",
                minlength: "最小长度是 2",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][job_direction]": {
                required: "不能为空",
                minlength: "最小长度是 2",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][major_other]": {
                required: "不能为空",
                minlength: "最小长度是 1",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][job_category_other]": {
                required: "不能为空",
                minlength: "最小长度是 2",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][job_direction_other]": {
                required: "不能为空",
                minlength: "最小长度是 2",
                maxlength: "最大长度是 20"
            },
            "user[profile_attributes][school_started_at(1i)]": {
                date: ""
            },
            "user[profile_attributes][school_started_at(2i)]": {
                date: ""
            }
        },
        highlight: function(element,errorClass) {
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element,errorClass) {
            $(element).parent().removeClass("has-error").addClass('has-success');
            $(element).parent().find(".form-error").parent().remove();
            if($(element).attr('name') != 'province_id' && $(element).attr('name') != 'user[zone_id]' && $(element).attr('name') != 'user[profile_attributes][school_started_at(1i)]'
                    && $(element).attr('name') != 'user[profile_attributes][school_started_at(2i)]' && $(element).attr('name') != 'user[profile_attributes][major]'
                    && $(element).attr('name') != 'user[profile_attributes][job_category]' && $(element).attr('name') != 'user[profile_attributes][job_direction]') {
                $(element).parent().append("<div class='help-block'><div class='form-ok'><span>&nbsp;</span></div></div>");
            }
        },
        errorPlacement: function(error, element){
            if (!!$(element).parent().find(".form-error").length) {
                $(element).parent().find(".form-error").parent().remove();
                $(element).parent().append("<div class='help-block'><div class='form-error'><div>" + error.text() + "<em></em></div><span>&nbsp;</span></div></div>");
            } else {
                $(element).parent().find(".form-ok").parent().remove();
                $(element).parent().append("<div class='help-block'><div class='form-error'><div>" + error.text() + "<em></em></div><span>&nbsp;</span></div></div>");
            }
        }
    });
</script>

          </div>
        </div>
      </div>
    </div>

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
  <script type="text/javascript" src="/Hlt/Public/js/conversion.js">
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
   function get_province(){
  		$.ajax({
  		type:"post",
  		url:"<?php echo U('UsersHome/get_province');?>",
  		dataType:"json",
  		success:function(data){
  			content="";
  			if(data.key==1){
  				$.each(data.array,function(index,value){
  					if(value.id!=null){
  						if(value.id!=""){
  							content+="<option value='" + value.id + "'>" + value.province_name+ "</option>";
  						}
  					}
  				});
  			$("#province_input").html(content);
  			}else{
  				alert(data.msg);
  			}
	
  		},
  		error:function(){
  			alert("长时间未操作请重新登录2！");
  			window.location.herf="<?php echo U('Index/index');?>";
  		}
  		});
  	} 
  </script>
 
</div>
  </body>
</html>