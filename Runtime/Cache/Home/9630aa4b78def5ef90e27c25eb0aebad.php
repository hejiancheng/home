<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!-- 头部包含的css、js等 -->
	<script src="/Hlt/Public/js/jquery-1.11.1.min.js"></script>
	<script src="/Hlt/Public/js/jQuery.md5.js"></script>	
	<script src="/Hlt/Public/js/bootstrap.min.js"></script>
	<link href="/Hlt/Public/css/login.css" rel="stylesheet" type="text/css" />	
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
		var name=$("#staff_name").val();
		var password=$("#staff_password").val();
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
	        url:"<?php echo U('Login/login');?>", 
	        dataType:"json",
	        data:{
	        	"staff_id":name,
	        	"staff_password":$.md5(password)},
	        success:function(data){   
	        	if(data==null | data.num==-1)
	        	{
	        		alert("用户名或密码错误");
	        		return;
	        	}
	        	if(data.num==-2){
	        		alert("用户已锁定，请与管理人员联系解锁");
	        		return;
	        	}
	        	if(data.num==0){
	        		alert("系统连接问题，请重试或联系开发人员");
	        		return;
	        	}
				window.location.href="<?php echo U('Public/home');?>";
	        },   
	        error:function(){   
	            alert("登陆出错");   
	        }   
	    });				  
	}
	</script>
</head>

<body class="loginbody">
<div class="dataEye">
	<div class="loginbox">
		<div class="login-content">
			<div class="loginbox-title">
				<h3>登录</h3>
			</div>
			<form id="signupForm">
			<div class="login-error"></div>
			<div class="row">
				<input type="text" class="input-text-user input-click" name="staff_name" id="staff_name">
			</div>
			<div class="row">
				<input type="password" class="input-text-password input-click" name="staff_password" id="staff_password">
			</div>
			<div class="row btnArea">
				
				<a class="login-btn" onclick="login()">登录</a>
			</div>
			</form>
		</div>
	</div>
</body>

</html>