<?php if (!defined('THINK_PATH')) exit();?>  
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>注册</title>
  	<script src="/Hlt/Public/js/jquery-1.11.1.min.js"></script>
	<script src="/Hlt/Public/js/jQuery.md5.js"></script>	
  <link data-turbolinks-track="true" href="/Hlt/Public/css/application-259d88b7df3d30d7eec66f46114169d9.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/user-44752681eea2af83918f1dc30a2b564c.css" media="all" rel="stylesheet" />
  <link data-turbolinks-track="true" href="/Hlt/Public/css/gaoxiaobang-da3a2db2fecddd160bc3e3c4a3a3bc38.css" media="all" rel="stylesheet" />
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
        <a href="index.html" class="signin-logo"></a>
        <div class="text">注册账号</div>
      </div>
      <div class="pull-right">
        我已经注册，现在就&nbsp;
        <a href="<?php echo U('Home/login_user');?>" class="color-lnk">登录</a>
      </div>
    </div>
  </div>
  <div class="center-block">
   <div style="display:none"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" /></div>
        <div class="form-group hidden user_landing_page_course_url"><input class="hidden" id="user_landing_page_course_url" name="user[landing_page_course_url]" type="hidden" value="http://www.kaikeba.comcourse_detail.html" /></div>
        <div class="signup-main" >
          <h4>注&nbsp;册</h4>
          <div class="form-group status-warning">
            <label class="control-label" for="user_username">用户名</label>
            <input aria-required="true" class="string required form-control" id="lt_user_username" maxlength="18" name="user[username]" placeholder="用户名" required="required" size="18" type="text" onkeyup="d_user_name()"/>
            <div class="input-icon bg-username" ></div>
            <span class="msg-warning" id="user_d">3-18位中英文、数字、下划线</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
         
          <div class="form-group status-warning">
            <label class="control-label" for="user_password">密码</label>
            <input autocomplete="false" class="password optional form-control" id="lt_user_password" maxlength="16" name="user[password]" placeholder="请输入密码" size="16" type="password" onkeyup="md()"/>
            <div class="input-icon bg-pwd"></div>
            <span class="msg-warning" id="d_user_password">6-16位数字、字母或符号的组合</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
          <div class="form-group status-warning">
            <label class="control-label" for="user_password">确认密码</label>
            <input autocomplete="false" class="password optional form-control" id="lt_user_password1" maxlength="16" name="user[password]" placeholder="请输入密码" size="16" type="password" onkeyup="md1()"/>
            <div class="input-icon bg-pwd"></div>
            <span class="msg-warning" id="d_user_password1">6-16位数字、字母或符号的组合</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
           <div class="form-group status-warning">
            <label class="control-label" for="user_email_mobile">认证邮箱</label>
            <input autocomplete="off" class="string optional form-control" id="lt_user_email" maxlength="50" placeholder="邮箱/手机号" size="50" type="text" onkeyup="d_email_input()" />
            <div class="input-icon bg-mobile"></div>
            <span class="msg-warning" id="d_user_email">请输入邮箱</span>
            <div class="error-block"></div>
            <span class="msg-success">&nbsp;</span>
          </div>
          <div class="form-group status-warning">
  <!-- 添加 switch-mail 类可以切换到邮件验证 -->
  <label class="control-label" for="user_captcha">验证码</label>
  <input autocomplete="off" class="form-control txt-code" id="lt_user_captcha" placeholder="验证码" required="required" type="text" value="" />
  <!--<input type="text" maxlength="6" class="form-control txt-code" id="user_code" name="user_code" placeholder="验证码">-->
  <div class="tab-mobile">
    <div id="mobile_captcha"></div>
    <input type="button" class="btn btn-primary" id="refresh_mobile_captcha_button" value="获取邮箱验证码" onclick="time(this)">
  </div>
  <span class="msg-warning">6位数字</span>
  <div class="error-block"></div>
  <span class="msg-success">&nbsp;</span>
</div>
 <div class="submit-div">
            <button class="btn btn-warning"  onclick="reg_user_hjc_name()">注册</button>
          </div>
<script>

    var d_name=0;
    var d_pass=0;
    var d_email_name_d=0;
    var wait=60; 
    var state=1;
    function time(o) { 
    	if(state==1){
    		send_email();
    		state=0;
    	}
		if (wait == 0) {
	o.removeAttribute("disabled"); 
	 $("#refresh_mobile_captcha_button").val("获取邮箱验证码");
	 state=1;
	wait = 60; 
	} else { 
	o.setAttribute("disabled", true); 
	 $("#refresh_mobile_captcha_button").val("重新发送(" + wait + ")");
	wait--; 
	setTimeout(function(){time(o)},1000); 
	} 
	} 
	function send_email(){
		
		$.ajax({   
	        type:"post",     
	        url:"<?php echo U('Users/send_email');?>", 
	        dataType:"json",
	        async: false,
	        data:{
	        	"content":document.getElementById("lt_user_email").value,
	        	},
	        success:function(data){   
	        	if(data.key==0){
	        		alert("发送邮箱失败！");
	        	}
	        },   
	        error:function(){   
	            alert("系统错误");   
	        }   
		});
	}
	function d_user_name(){
		if($("#lt_user_username").val()==""){
			d_name=0;
			document.getElementById("user_d").style.color="#F28500";
    		document.getElementById("user_d").innerHTML="3-18位中英文、数字、下划线";
			return ;
		}
		$.ajax({   
	        type:"post",     
	        url:"<?php echo U('Users/d_user_name');?>", 
	        async: false,
	        dataType:"json",
	        data:{
	        	"user_username":$("#lt_user_username").val(),
	        	},
	        success:function(data){   
	        	if(data.key==0){
	        		d_name=0;
	        		document.getElementById("user_d").style.color="red";
	        		document.getElementById("user_d").innerHTML="该用户已经存在！";
	        	}
	        	if(data.key==1){
	        		d_name=1;
	        		document.getElementById("user_d").style.color="#008ee0";
	        		document.getElementById("user_d").innerHTML="✔";
	        	}	  
	        },   
	        error:function(){   
	            alert("系统错误");   
	        }   
	    });		
	}
	function md(){
		if($("#lt_user_password").val()==""){
			d_pass=0;
			document.getElementById("d_user_password").style.color="#F28500";
    		document.getElementById("d_user_password").innerHTML="3-18位中英文、数字、下划线";
			return ;
		}else{
			if($("#lt_user_password1").val()==$("#lt_user_password").val()){
				d_pass=1;
			document.getElementById("d_user_password").style.color="#008ee0";
    		document.getElementById("d_user_password").innerHTML="✔";
    		document.getElementById("d_user_password1").style.color="#008ee0";
    		document.getElementById("d_user_password1").innerHTML="✔";
			}else{
				d_pass=0;
				document.getElementById("d_user_password").style.color="#008ee0";
	    		document.getElementById("d_user_password").innerHTML="✔";
				document.getElementById("d_user_password1").style.color="red";
        		document.getElementById("d_user_password1").innerHTML="你输入的两次密码不一样！";
			}
		}
	}
	function md1(){
      if($("#lt_user_password1").val()==""){
    	  d_pass=0;
    	  document.getElementById("d_user_password1").style.color="#F28500";
  		document.getElementById("d_user_password1").innerHTML="3-18位中英文、数字、下划线";
			return ;
		}else{
			if($("#lt_user_password1").val()==$("#lt_user_password").val()){
				d_pass=1;
				document.getElementById("d_user_password1").style.color="#008ee0";
	    		document.getElementById("d_user_password1").innerHTML="✔";
			}else{
				d_pass=0;
				document.getElementById("d_user_password1").style.color="red";
        		document.getElementById("d_user_password1").innerHTML="你输入的两次密码不一样！";
			}
		}
	}
	function d_email_input(){
		if($("#lt_user_email").val()==""){
			d_email_name_d=0;
			document.getElementById("d_user_email").style.color="#F28500";
    		document.getElementById("d_user_email").innerHTML="请输入邮箱";
			return ;
		}
		var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		var email=document.getElementById("lt_user_email").value;
		if(reg.test(email)){
			d_email_name_d=1;
			document.getElementById("d_user_email").style.color="#008ee0";
    		document.getElementById("d_user_email").innerHTML="✔";
		}else{
			d_email_name_d=0;
    		document.getElementById("d_user_email").style.color="red";
    		document.getElementById("d_user_email").innerHTML="你输入邮箱格式不对";
		}
	}
   function reg_user_hjc_name(){
       if(d_name==0){
			  alert("请正确输入用户名！");
			  return;
		  } 
		  if(d_pass==0){
			  alert("请正确输入密码！");
			  return;
		  }
		 if(d_email_name_d==0){
			  alert("请正确输入邮箱");
			  return;
		  }   
			$.ajax({   
		        type:"post",     
		        url:"<?php echo U('Users/reg_user');?>", 
		        async: false,
		        dataType:"json",
		     data:{
		        	"name":$("#lt_user_username").val(),
		        	"password":$.md5($("#lt_user_password").val()),
		        	"name_email":$("#lt_user_email").val(),
		        	"d_name_email":$("#lt_user_captcha").val(),
		        	},
		        success:function(data){   
		        	if(data.key==0){
		        		alert(data.msg);
		        	}else{
		        		window.location.href="<?php echo U('Home/login_user');?>";	
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
</body>
</html>