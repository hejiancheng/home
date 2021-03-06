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
  <body onload="init()">
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
        <a href="<?php echo U('Home/member_set');?>" class="btn btn btn-default"> 我的信息</a>
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
        <?php if($user_state == 1 ): ?><span class="dropdown">
      <a data-toggle="dropdown" href="#">
        <!--<img src="/Hlt/Public/images/avatar.png" alt="avatar" class="header-avatar">-->
        <img alt="Avatar" class="header-avatar thumb_avatar" height="36" src="/Hlt/Public/images/avatar.png?time=1428625299" width="36" />
        <span><?php echo ($data['user_id']); ?></span>
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li><a href="<?php echo U('Home/course_list');?>">刷题</a></li>
        <li><a href="<?php echo U('Home/exit_login');?>">退出</a></li>
      </ul>
    </span>
    
    <?php else: ?>
          <span><a  href="<?php echo U('Home/login_user');?>">登录</a></span>
         <span>|</span>
        <span><a href="<?php echo U('Home/reg');?>">注册</a></span><?php endif; ?>
        
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
<form accept-charset="UTF-8" class="simple_form edit_user" data-remote="true" id="user_form" ><div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="_method" type="hidden" value="put" /></div>
    <div class="form-descrip">
      <strong>用户名</strong>
      <span>禁止修改</span>
    </div>
        <div class="form-group string required user_username"><input class="string required form-control input-lg" id="user_username" maxlength="20" name="user[username]" placeholder="用户名" size="20" type="text" value="<?php echo ($data['user_id']); ?>" Readonly="true"/></div>
    <div class="form-descrip">
      <strong>真实姓名</strong>
      <span>放心，不会对外透露</span>
    </div>
    <div class="form-group string optional user_name"><input autofocus="autofocus" class="string optional form-control input-lg" id="user_name" maxlength="10" name="user[name]" placeholder="真实姓名" size="10" type="text" value="<?php echo ($data_info['name']); ?>"/></div>
    <div class="form-descrip">
      <strong>真实姓名拼音</strong>
    </div>
    <div class="row">
    <div class="form-group string optional user_last_name col-md-6 col-md-offset-0"><input autofocus="autofocus" class="string optional form-control input-lg" id="user_last_name" maxlength="20" name="user[last_name]" placeholder="姓氏拼音" size="20" type="text" value="<?php echo ($data_info['surname']); ?>"/></div>
    <div class="form-group string optional user_first_name col-md-6 col-md-offset-0"><input autofocus="autofocus" class="string optional form-control input-lg" id="user_first_name" maxlength="10" name="user[first_name]" placeholder="名字拼音" size="10" type="text" value="<?php echo ($data_info['spell_name']); ?>"/></div>
    </div>

    <div class="form-descrip">
      <strong>所在省份</strong>
    </div>
    <div class="form-group integer optional user_zone_id ChinaArea">
    <input type="hidden" id="hidden_1" value="<?php echo ($data_info['province_id']); ?>">
        <select id="province_input" name="province_id" class="input-lg form-control">
        </select>
</div>    <script type="text/javascript">


    </script>
    <div class="form-descrip">
      <strong>性别</strong>
      <input type="hidden" id="hidden_2" value="<?php echo ($data_info['sex']); ?>">
    </div>
    <div class="form-group radio_buttons optional user_gender form-group-sex"><label class="radio"><input checked="checked" class="radio_buttons optional inline" id="user_gender_male" name="user[gender]" type="radio" value="male" />男</label><label class="radio"><input class="radio_buttons optional inline" id="user_gender_female" name="user[gender]" type="radio" value="female" />女</label></div>
    <div class="form-descrip">
      <strong>生日</strong>
    </div>
    <div class="form-group string required user_birthday form-group-age"><input class="string required form-control input-lg datepicker" id="user_birthday" name="user[birthday]" placeholder="生日日期" readonly="readonly" type="text" value="<?php echo ($data_info['both']); ?>"/></div>

    

        <div class="form-descrip">
          <strong>学历</strong>
          <input type="hidden" id="hidden_3" value="<?php echo ($data_info['education']); ?>">
        </div>
        <div class="form-group select optional user_profile_education"><select class="select optional form-control input-lg" id="user_profile_attributes_education" name="user[profile_attributes][education]">
 <option value=0>大专</option>
 <option value=1>本科</option>
 <option value=2>硕士</option>
 <option value=3>博士</option></select></div>

        <div class="form-descrip form-descrip-status">
        </div>

        <div id="student_info" class="profile" style="display: block;">
          <div class="form-descrip">
            <strong>学校名称</strong>
          </div>

          <div class="form-group string optional user_profile_school_name"><input class="string optional form-control input-lg" id="user_profile_attributes_school_name" maxlength="255" name="user[profile_attributes][school_name]" placeholder="学校名称" size="255" type="text" value="<?php echo ($data_info['university']); ?>"/></div>

          <div class="form-descrip">
            <strong>专业</strong>
          </div>
          <div id="major_other_show">
          <input type="hidden" id="hidden_4" value="<?php echo ($data_info['major']); ?>">
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
            <input type="hidden" id="hidden_5" value="<?php echo ($data_info['year']); ?>"></br>
           <input type="text" id="user_profile_attributes_school_started_at_1i"  value="<?php echo ($data_info['year']); ?>">年<input type="text" id="user_profile_attributes_school_started_at_2i" value="<?php echo ($data_info['month']); ?>" >月
           
          </div>
          <div class="form-group date optional user_profile_school_started_at">
             <input type="hidden" id="hidden_6" value="<?php echo ($data_info['month']); ?>">
</div>
        </div>

    <div class="btm">
      <input type="button" class="button btn btnblue"  name="commit" onclick="update_info()" value="保存信息" />

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
</script>

          </div>
        </div>
      </div>
    </div>

<div style="display: none;">
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
   function init(){
	   get_province();
   }   
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
  			
  			if($("#hidden_2").val()==1){
  				$("#user_gender_male").attr("checked","checked");
  			}else{
  				$("#user_gender_female").attr("checked","checked");
  			}
  			$("#province_input").val( $("#hidden_1").val());
  			$("#user_profile_attributes_education").val($("#hidden_3").val());
  			$("#user_profile_attributes_major").val($("#hidden_4").val());
  			//location.reload();
  		},
  		error:function(){
  			alert("长时间未操作请重新登录2！");
  			window.location.herf="<?php echo U('Home/index');?>";
  		}
  		});
  	} 
   function update_info(){
 		$.ajax({
 		type:"post",
 		url:"<?php echo U('UsersHome/update_info');?>",
 		dataType:"json",
 		data:{
 		  "name":$("#user_name").val(),
 		  "surname":$("#user_last_name").val(),
 		  "spell_name":$("#user_first_name").val(),	
 		  "province_id":$("#province_input").val(),
 		  "sex":$("input[name='user[gender]']:checked").val(),
 		  "both":$("#user_birthday").val(),
 		  "education":$("#user_profile_attributes_education").val(),
 		  "university":$("#user_profile_attributes_school_name").val(),
 		  "major":$("#user_profile_attributes_major").val(),
 		  "year":$("#user_profile_attributes_school_started_at_1i").val(),
 		  "month":$("#user_profile_attributes_school_started_at_2i").val(),
 		},
 		success:function(data){
 		  if(data.msg==0){
 			  alert(data.msg);
 		  }else{
 			 alert(data.msg);
 			
 		  }
 		},
 		error:function(){
 			alert("长时间未操作请重新登录！");
 			window.location.herf="<?php echo U('Home/index');?>";
 		}
 		});
 	} 
  </script>
 
</div>
  </body>
</html>