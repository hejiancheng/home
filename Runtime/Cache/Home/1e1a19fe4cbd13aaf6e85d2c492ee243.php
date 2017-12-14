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
	<script src="/Hlt/Public/js/jquery-1.11.1.min.js"></script>	
	<script src="/Hlt/Public/js/ajaxupload.js"></script>
	<script src="/Hlt/Public/js/jquery.cookie.js"></script>
	<script src="/Hlt/Public/js/jQuery.md5.js"></script>	
	<script src="/Hlt/Public/js/bootstrap.min.js"></script>
	<script src="/Hlt/Public/js/jquery.ztree.core-3.5.js"></script>
	<script src="/Hlt/Public/js/jquery.ztree.excheck-3.5.js"></script>
	<script src="/Hlt/Public/js/jquery.validate.js"></script>
	<script src="/Hlt/Public/js/jquery-ui.js"></script>
	<link href="/Hlt/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Hlt/Public/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">	
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="/Hlt/Public/css/jquery.dataTables.css">
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="/Hlt/Public/js/jquery.dataTables.min.js"></script>
	<link href="/Hlt/Public/css/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" href="/Hlt/Public/css/font-awesome.min.css">
	
	<script src="/Hlt/Public/js/common.js"></script>
	<link rel="stylesheet" href="/Hlt/Public/css/common.css">
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
<html>
<head>
<style>
#ad_form label.error{
	margin-left: 10px;
	min-width: 120px;
	display: inline;
	position: absolute;
	color: red;
	line-height: 22px;
}
#ad_role-error{ margin-left: 38px !important; }
</style>

<script type="text/javascript">
function init(){
	localcollapse="collapse_ad";
	localmenu="menu_Ad";
	$("#ad_show").dialog({
		autoOpen: false,
		height: 340,
	    width: 550,
	    modal: false,
	    buttons: {
	    	"确定": function() {
	    		$("#ad_form").submit();
	        },
	        "取消": function() {
	        	$( this ).dialog( "close" );
	        }
	    },
	    close: function() {
	    	validator.resetForm();
	    	clearForm($("#ad_form"));
			$("#file_name").val("");
			$('#upload_file_confirm').text(""); 
	    }
	});

 	validator=$("#ad_form").validate({
		rules: {
			ad_business:"required"
		},
		messages: {
			ad_business:"请输入商品名"
		},
		submitHandler: function(form) {  //通过之后回调 
			if($("#ad_id_hidden").val()==""| $("#ad_id_hidden").val()==0){
				if($("#file_name").val()==""){
						alert("请上传图片!");
						return;
				}
				else{
 	            	add_ad();
					}
			}
			else{
				update_ad();
			}
			$("#ad_show").dialog("close");
		},
		invalidHandler: function(form, validator) {  //不通过回调 
			
		},
		
	}); 
	upload_pic();
	get_ad_message();		
}
function get_ad_message(){  
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Ad/get_ad');?>", 
        dataType:"json",
        success:function(data){   
        	if(data.key==1){
				if(data.array==null)
				{
					data.array="";
				}
				var table = "<table id='table_ad' class='display'><thead><tr><th>广告号</th><th>图片地址</th><th>商品信息</th><th>URL</th><th>操作</th></tr></thead><tbody>";
				$.each(data.array,function(index,value){
					if(value.id==null){
						value.id="";
					}
					if(value.picture==null){
						value.picture="";
					}
					if(value.business==null){
						value.business="";
					}
					table+="<tr><td> "+value.id+"</td><td> "+value.picture+"</td><td> "+value.business+"</td><td> "+value.url+"</td>";
					table+="<th><button type='button' class='btn btn-info btn-sm' onclick='get_ad(\""+value.id+"\")'>修改</button>";
					table+="<button type='button' class='btn btn-info btn-sm' onclick='delete_ad(\""+value.id+"\")'>删除</button>";
					table+="</th></tr>";
				}); 
				table += "</tbody></table>";
				$("#ad_message").html(table);
				var height=$(window).height();
				$("#table_ad").DataTable(
					{
						 "sScrollY": height-300,
						 "oLanguage" : Language_cn
					}
				);
			}
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    }); 
}

function add_ad(){  
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Ad/add_ad');?>", 
        dataType:"json",
        data:{
        	"picture": $("#file_name").val(),
        	"business":$("#ad_business").val(),
        	"url":$("#url").val()
        	},
        success:function(data){   
        	if(data.key==0){
				alert(data.msg);
			}
        	else{
    			alert("增加成功");
    		}
        	get_ad_message();
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}
function get_ad(id){
	$("#ad_show").dialog("open");
	$("#ad_id_hidden").val(id);
	$("#ad_id").attr("readonly",true);
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Ad/get_ad');?>", 
        dataType:"json",
        data:{"id":id},
        success:function(data){   
        	if(data.key==1){
				if(data.array==null)
				{
					alert("无此广告，请重新选择");
					return;
				}
				var value=data.array[0];
				if(value.id!=null){
					$("#ad_id").val(value.id); 
				}
				if(value.picture!=null){
					$("#file_name").val(trim(value.picture));
				}
				if(value.business!=null){
					$("#ad_business").val(trim(value.business));
				}
				if(value.url!=null){
					$("#url").val(trim(value.url));
				}
			}
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}

function update_ad(){  
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Ad/update_ad');?>", 
        dataType:"json",
        data:{
        	"id":$("#ad_id_hidden").val(),
        	"picture": $("#file_name").val(),
        	"business":$("#ad_business").val(),
        	"url":$("#url").val()
        	},
        success:function(data){   
        	if(data.key==0){
				alert(data.msg);
			}
        	else{
    			alert("修改成功");
    		}
        	get_ad_message();
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}

function delete_ad(id){  
	var sure=confirm('确认删除？');
	if(!sure){
		return;
	}
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Ad/delete_ad');?>", 
        dataType:"json",
        data:{
        	"id":id
        	//"id":$("#ad_id_hidden").val()
        },
        success:function(data){   
			if(data.key==0){
				alert(data.msg);
			}
        	else{
    			alert("删除成功");
    		}
        	get_ad_message();
        },   
        error:function(){   
        	alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";  
        }   
    });   
}

function upload_pic(){
	//var fileType = "pic",fileNum = "one";
	    
	var button = $('#upload_button'), interval;
	var confirm_div = $('#upload_file_confirm');
	var file_name=$("#file_name");
	var flag=false;
	new AjaxUpload(button,{
		action: "<?php echo U('Ad/upload_pic');?>",
	 	data:{        	
		},
		name: 'userfile', 
		onSubmit : function(file, ext){
			if (ext && /^(jpg|png|jpeg|mp4)$/.test(ext)){
				this.setData({
            "type_id":$("#file_type_id").val()
            });
			}
		 	else{
				confirm_div.text('文件格式错误，请上传格式为jpg,png,jpeg的图片');
				return false;               
			}  
			confirm_div.text('文件上传中');          
			this.disable();          
			interval = window.setInterval(function(){
				var text = confirm_div.text();
				if (text.length < 14){
					confirm_div.text(text + '.');                    
				} else {
					confirm_div.text('文件上传中');             
				}
			}, 200);
		},
		onComplete: function(file, response){
   
			if(response != "success"){
				
				if(response =='2'){
					//confirm_div.text("文件格式错误，请上传格式为.png .jpg .jpeg 的图片");
				}else{
					
					var path="ad/";
					var index=response.indexOf(path);
					if(index<0){
						confirm_div.text("文件上传失败请重新上传"+response);            
					}else{
						confirm_div.text("上传完成"+response);                        												
						file_name.val("/Hlt/Public/Uploads/"+response);
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
function show_ad_dialog(){
	$("#ad_id_hidden").val(0);
	$("#ad_show").dialog("open");
	$("#ad_id").removeAttr("readonly");
}
</script>
</head>

<body onload="init()">  
	<button type="button" class="btn btn-danger" id="bt_ad_show" onclick="show_ad_dialog()">  
			增加新的广告
    </button> 
    <input type="hidden" id="ad_id_hidden" value=0>
    <div id="ad_message"></div> 
	  
	<div id="ad_show" title="广告信息"> 
		<form id="ad_form">
			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="ad_business" class="col-sm-3 control-label">商品名
 					<label class="Form_necessary">*</label>
 					</label>
 					<input type="text" class="col-sm-6" id="ad_business" name="ad_business" placeholder="请输入商家信息">
				</div>	
				<div class="col-sm-12 form-group">
 					<label for="url" class="col-sm-3 control-label">URL
 					<label class="Form_necessary">*</label>
 					</label>
 					<input type="text" class="col-sm-6" id="url" name="url" placeholder="请输入URL">
				</div>	
				 <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label">
                                                           图片<label class="Form_necessary">*</label>
                    </label>
                    <div class="col-sm-6">
                    	<input type="hidden" id="file_name" name="file_name"> 
                        <div id="upload_file_confirm"></div>
                        <input type="button" class="btn btn-primary" id="upload_button"  value="上传图片" />
                        <br/>
                        <div class="help-inline">*请上传格式为.png .jpg .jpeg的文件</div>
                        <div class="help-inline">*文件大小不要超过12M</div>
                    </div>
                </div>								
   			</div>
		</form> 
	</div>  
</body>
</html>
				</div>
			</div>
		</div>
	</body>
</html>