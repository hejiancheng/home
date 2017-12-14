<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- 头部包含的css、js等 -->
		<!DOCTYPE html>
<html>
<head>
<style>
	table thead th,table tbody td{
		text-align:center;
	}
</style>
<title><?php echo (C("SITENAME")); ?></title>
	<script src="/OfficialCarManage/Public/js/jquery-1.11.1.min.js"></script>	
	<script src="/OfficialCarManage/Public/js/ajaxupload.js"></script>
	<script src="/OfficialCarManage/Public/js/jquery.cookie.js"></script>
	<script src="/OfficialCarManage/Public/js/jQuery.md5.js"></script>	
	<script src="/OfficialCarManage/Public/js/bootstrap.min.js"></script>
	<script src="/OfficialCarManage/Public/js/jquery.ztree.core-3.5.js"></script>
	<script src="/OfficialCarManage/Public/js/jquery.ztree.excheck-3.5.js"></script>
	<script src="/OfficialCarManage/Public/js/jquery.validate.js"></script>
	<script src="/OfficialCarManage/Public/js/jquery-ui.js"></script>
	<link href="/OfficialCarManage/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/OfficialCarManage/Public/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">	
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="/OfficialCarManage/Public/css/jquery.dataTables.css">
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="/OfficialCarManage/Public/js/jquery.dataTables.min.js"></script>
	<link href="/OfficialCarManage/Public/css/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" href="/OfficialCarManage/Public/css/font-awesome.min.css">
	
	<script src="/OfficialCarManage/Public/js/common.js"></script>
	<link rel="stylesheet" href="/OfficialCarManage/Public/css/common.css">
	<script type="text/javascript">
	function get_type(type,functionname){
		$.ajax({   
	        type:"post",     
	        url:"<?php echo U('"+type[0]+"');?>", 
	        dataType:"json",
	        data:{"name":type[1]},
	        success:function(data){   
	        	//alert(data);
	        	if(data==null)
	    		{
	        		return;
	    		}
	        	content="";
	        	$.each(data,function(index,value){
	        		if(value.id!=null & value.name!=null){
						if(value.id!="" & value.name!=""){
							content+="<option value='"+value.id+"'>"+trim(value.name)+"</option>";
						}
					}
	        	});
	        	$("#"+type[2]).html(content);
	        	$("#"+type[2]).combobox();
	        	$("#"+type[2]).val(type[3]);
	        	$("#"+type[2]).combobox("value",$("#"+type[2]+" option:selected").text());
	        	functionname();
	        },   
	        error:function(){   
	            alert("获取" + type[4] + "出错");
	            //alert("长时间未操作，请重新登录！");
	            //window.location.href = "<?php echo U('Index/index');?>";
	        }   
	    });
	}
	</script>
</head>
<body>
<div id="AlertMessage" title="信息确认">
	<p id="AlertMessageBody"  class="msgbody"></p>
</div>
<div id="ConfirmMessage" title="信息提问">
	<p id="ConfirmMessageBody" class="msgbody"></p>
</div>
<script>

</script>
</body>
</html>
	</head>
	<body>
		<div class="container" id="system_window">
			<!-- 页面的顶部 -->
			<!DOCTYPE html>
<html>
<head>
<style>
#update_password_form label.error{
	margin-left: 10px;
	min-width: 120px;
	display: inline;
	position: absolute;
	color: red;
	line-height: 22px;
}
</style>
<script type="text/javascript"> 
		$(function(){
			initsys();
		});
		function initsys(){
			getUserMessage();
			getstaffmenu();
			var thisheight=$(window).height();
			var thiswidth=$(window).width();
			if(thiswidth>1200){
				document.getElementById("system_window").setAttribute("class", "col-lg-12");
				document.getElementById("system_content").setAttribute("class", "col-lg-10");
				document.getElementById("system_menu").setAttribute("class", "col-lg-2");		
			}
			else{
				document.getElementById("system_window").setAttribute("class", "container");
				document.getElementById("system_content").setAttribute("class", "col-sm-9");
				document.getElementById("system_menu").setAttribute("class", "col-sm-3");
			}
			$("#system_menu").height(thisheight-80);
			$("#signature_show").dialog({
                autoOpen: false,
                height: thisheight,
                width: 800,
                modal: false,
                buttons: {
                    "确定": function () {
                        set_signature();
                    },
                    "取消": function () {
                        $(this).dialog("close");
                    }
                },
                close: function () {
                    clearForm($("#signature_form"));
					$("#signature_file_name").val("");
					$("#signature_contract_file").attr("src","/OfficialCarManage/Public/image/nophoto.jpg");
					$('#signature_uploadphotoconfirm').text(""); 
                }
            });
			$("#update_password_show").dialog({
                autoOpen: false,
                height: thisheight,
                width: 600,
                modal: false,
                buttons: {
                    "确定": function () {
                        $("#update_password_form").submit();
                    },
                    "取消": function () {
                        $(this).dialog("close");
                    }
                },
                close: function () {
                    clearForm($("#update_password_form")); 
                }
            });
			validator=$("#update_password_form").validate({
				rules: {			
					oldpassword: "required",
					newpassword: "required",
					confirmpassword: {
						required: true,
						equalTo: "#newpassword"
					}
				},
				messages: {
					oldpassword: "请输入原始密码",
					newpassword:"请输入修改密码",
					confirmpassword: {
						required: "请输入确认密码",
						equalTo: "两次密码必须一致"
					}
				},
				submitHandler: function(form) {  //通过之后回调 
					modifypassword();
					
				},
				invalidHandler: function(form, validator) {  //不通过回调 
					
				},		
			});	
			signature_uploadpic();
		}
		function modifypassword(){
			var oldpassword=$("#oldpassword").val();
			var newpassword=$("#newpassword").val();
			$.ajax({   
				type:"post",     
				url:"<?php echo U('Public/updatepassword');?>", 
				dataType:"json",
				data:{
					"oldpassword":$.md5(oldpassword),
					"newpassword":$.md5(newpassword)
					},
				success:function(data){   
					if(data==null | data.num<1)
					{
						if(data.num==-1){
							alert("请重新登录");
							window.location.href="<?php echo U('Index/index');?>";
							return;
						}
						if(data.num==-2){
							alert("原始密码错误");
							return;
						}
						alert("密码修改失败");
						return;
					}
					else{
						alert("修改成功");
						$("#update_password_show").dialog("close");
					}
					window.location.href="<?php echo U('Index/index');?>";
				},   
				error:function(){   
					alert("出错");   
				}   
			});				  
		}
		function set_signature(){
			$.ajax({
                type: "post",
                url: "<?php echo U('Public/set_signature');?>",
                dataType: "json",
                data: {
                    "signature": $("#signature_file_name").val()
                },
                success: function (data) {
                    if (data == null | data.num < 1) {
                        alert("设置失败");
						return;
                    }
                    alert("设置成功");
					$("#signature_show").dialog("close");
                },
                error: function () {
                    alert("长时间未操作，请重新登录！");
                    window.location.href = "<?php echo U('Index/index');?>";
                }
            });
		}
		function show_signature(){
			$("#signature_show").dialog("open");
		}
		function show_update_password(){
			$("#update_password_show").dialog("open");
		}
		function getUserMessage(){  
			$.ajax({   
				type:"post",     
				url:"<?php echo U('Public/getuserinfo');?>", 
				dataType:"json",
				success:function(data){  
					if(data==null)
					{
						window.location.href="<?php echo U('Index/index');?>";
					}
					var table="";        
					
					table+="<a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='user-info'><small>欢迎光临,</small>"+data+"</span></a><ul class='dropdown-menu'><li><a href='javascript:show_update_password();'><i class='icon-cog'></i>修改密码</a></li><li class='divider'></li><li><a href='<?php echo U('Public/logout');?>'><i class='icon-off'></i>退出</a></li></ul>";						 
					$("#UserInfo").html(table);
				},   
				error:function(){   
					alert("长时间未操作，请重新登录！");
					window.location.href = "<?php echo U('Index/index');?>";
				}   
    		});   
		}  
		function getstaffmenu(){  
			$.ajax({   
				type:"post",     
				url:"<?php echo U('Public/getstaffoperation');?>", 
				dataType:"json",
				data:{
					"parentid":0
				},
				success:function(data){  
					if(data==null){
						alert("用户职位不存在，请与管理员联系");
						window.location.href="<?php echo U('Index/index');?>";
						return;
					}
					var menu="";
					$.each(data,function(index,value){
						if(value.id==null){
							value.id="";
						}
						if(value.url==null){
							value.url="";
						}
						if(value.name==null){
							value.name="";
						}				
						menu+="<div class='panel panel-default'><div class='panel-heading'><a data-toggle='collapse' data-parent='#user_menu' href='#";
						if(trim(value.url)!=""){
							menu+="collapse_"+trim(value.url);
						}
						menu+="'>"+trim(value.name)+"</a><span class='arrow'></span></div>";
						if(trim(value.url)!=""){
							menu+="<div id='collapse_"+trim(value.url)+"' class='panel-collapse collapse'></div>";
						}
						menu+="</div>";
						getstaffchildmenu(value.url,value.id);
					});						 
					$("#user_menu").html(menu);
				},   
				error:function(){   
					alert("长时间未操作，请重新登录！");
					window.location.href = "<?php echo U('Index/index');?>";
				}   
			});   
		}  
		function getstaffchildmenu(url,parentid){  
			$.ajax({   
				type:"post",     
				url:"<?php echo U('Public/getstaffoperation');?>", 
				dataType:"json",
				data:{
					"parentid":parentid
				},
				success:function(data){  
					var childmenu="<ol>";        
					$.each(data,function(index,value){
						if(value.url==null){
							value.url="";
						}
						if(value.name==null){
							value.name="";
						}				
						childmenu+="<div class='panel-body'";
						if(trim(value.url)!=""){
							childmenu+="id='menu_"+trim(value.url)+"'";
						}
						childmenu+="><a href='";
						if(trim(value.url)!=""){
							childmenu+="<?php echo U('"+trim(value.url)+"/index');?>";
						}
						childmenu+="'>"+trim(value.name)+"</a></div>";
					});
					childmenu+="</ol>";
					$("#collapse_"+url).html(childmenu);
					setleftmenu();
				},   
				error:function(){   
					alert("长时间未操作，请重新登录！");
					window.location.href = "<?php echo U('Index/index');?>";
				}   
			});   
		} 
		function signature_uploadpic(){
			var fileType = "pic",fileNum = "one";
			var button = $('#signature_upload_button'), interval;
			var confirmdiv = $('#signature_uploadphotoconfirm');
			var filename=$("#signature_file_name");
			var flag=false;
			new AjaxUpload(button,{
				action: "<?php echo U('Public/uploadpic');?>",
				data:{        	
				},
				name: 'userfile',
				onSubmit : function(file, ext){
					if (ext && /^(jpg|png|jpeg|gif|JPG)$/.test(ext)){
						this.setData({
                    "type_id":$("#signature_file_type_id").val()
                });
					}
					else{
						confirmdiv.text('文件格式错误，请上传格式为.png .jpg .jpeg 的图片');
						return false;               
					} 
					confirmdiv.text('文件上传中');          
					this.disable();          
					interval = window.setInterval(function(){
						var text = confirmdiv.text();
						if (text.length < 14){
							confirmdiv.text(text + '.');                    
						} else {
							confirmdiv.text('文件上传中');             
						}
					}, 200);
				},
				onComplete: function(file, response){
           
					if(response != "success"){
						
						if(response =='2'){
							//confirmdiv.text("文件格式错误，请上传格式为.png .jpg .jpeg 的图片");
						}else{
							
							var path="signature/";
							var index=response.indexOf(path);
							if(index<0){
								confirmdiv.text("文件上传失败请重新上传"+response);            
							}else{
								confirmdiv.text("上传完成"+response);                        						$("#signature_contract_file").attr("src","/OfficialCarManage/Public/Uploads/"+response);            
								filename.val("/OfficialCarManage/Public/Uploads/"+response);
							}
						}              
					}
					window.clearInterval(interval);                        
					this.enable();            
					if(response == "success")
					alert('上传成功');            
				}
			});
		} 
	</script>
</head>
<body >
	<div class="row">
		<nav class="navbar navbar-default " role="navigation">
	   		<div class="navbar-header col-sm-4">      
	      		<a class="navbar-brand" href="<?php echo U('Public/home');?>">
				<!-- 系统的icon 改成img的形式
					<i class="icon-leaf"></i>
				-->
					<?php echo (C("SITENAME")); ?>
				</a>
	   		</div>
	   		<div  class="collapse navbar-collapse pull-right col-sm-8" id="example-navbar-collapse">
	      		<ul class="nav navbar-nav">
	        	 	
	         		<li class="dropdown" id="UserInfo">				            	
		         	</li>
		      	</ul>
		    </div>
		</nav>
		
	</div>
    <div id="signature_show" title="数字签名" style="display:none">
        <form id="signature_form">
            <div class="col-sm-12">
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label">
                        数字签名图片
                        </label>
                        <div class="col-sm-6"> 
                        <input type="hidden" id="signature_file_type_id">
                        <input type="hidden" id="signature_file_name">
		<img  id="signature_contract_file" src="/OfficialCarManage/Public/image/nophoto.jpg" style="max-height:120px;max-width:120px;" />
		<div id="signature_uploadphotoconfirm"></div>
		<input type="button" class="btn btn-primary" id="signature_upload_button"  value="上传图片" />
		<br/>
		<div class="help-inline">*请上传格式为.png .jpg .jpeg 的图片</div>
        <div class="help-inline">*文件大小不要超过30M</div>
        <div class="help-inline">*上传的图片的宽高比要设置成2:1</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="update_password_show" title="修改密码" style="display:none">
    <form id="update_password_form">
		<div class="col-sm-12 form-group">
			<label for="oldpassword" class="col-sm-3 control-label">旧密码
            	<label class="Form_necessary">*</label>
            </label>
			<div class="col-sm-9">
            
				<input type="password" class="col-sm-6" id="oldpassword" name="oldpassword" placeholder="请输入密码">
			</div>
		</div>
		<div class="col-sm-12 form-group">
			<label for="newpassword" class="col-sm-3 control-label">新密码
            	<label class="Form_necessary">*</label>
            </label>
			<div class="col-sm-9">
				<input type="password" class="col-sm-6" id="newpassword" name="newpassword" placeholder="请输入密码">
			</div>
		</div>
		<div class="col-sm-12 form-group">
			<label for="confirmpassword" class="col-sm-3 control-label">确认密码
            	<label class="Form_necessary">*</label>
            </label>
			<div class="col-sm-9">
				<input type="password" class="col-sm-6" id="confirmpassword" name="confirmpassword" placeholder="请输入密码">
			</div>
		</div>
	</form>
    </div>
</body>
</html>
			<div class="row">
				<!-- 页面内容左边的菜单栏-->
				<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="col-sm-3" id="system_menu" style="overflow:auto;">
			<div class="panel-group" id="user_menu">
			</div>
		</div>
</body>
</html>
				<div class="col-sm-9" id="system_content">
					<!-- 内容页 -->
					<ol class="breadcrumb">
						<li><?php echo ($parentname); ?></li>
						<li class="active"><?php echo ($childname); ?></li>
					</ol>
					<!DOCTYPE html>
<html lang="en">
	<head>
    	<script type="text/javascript">
    		function init() {
				$.ajax({
                type: "post",
                url: "<?php echo U('Public/get_work_message');?>",
                dataType: "json",
                success: function (data) {
					//alert(data);
					if (data == null) {
                        $("#work_message").html("");
                    }
                    var message = "";
                    $.each(data, function (index, value) {
						var url="<?php echo U('"+value.url+"/index');?>";
                        message += "<div class='row' style='height: 73px'><div class='col-xs-12'><div class='alert alert-block alert-success'><a class='icon-ok green' href='"+url+"')>未处理的事情：<strong class='green'>"+value.name+"任务<small><span class='pull-right'>"+value.num+"条</span></small></strong></a></div></div></div>";
                    });
                    $("#work_message").html(message);
                },
                error: function () {
                    settingalert("长时间未操作，请重新登录！");
                    //window.location.href = "<?php echo U('Index/index');?>";
                }
            });
        	}
			function show_work(type){
				window.location.href="<?php echo U('"+type+"/index');?>";
			}
		</script>
	</head>
	<body onLoad="init()">
		<div class="main-content">
			<div class="page-content" id="work_message">
				
			</div>
		</div>
	</body>
</html>

				</div>
			</div>
		</div>
	</body>
</html>