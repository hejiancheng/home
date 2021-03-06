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
#operation_form label.error{
	margin-left: 10px;
	min-width: 120px;
	display: inline;
	position: absolute;
	color: red;
	line-height: 22px;
}
</style>
<script type="text/javascript">
function init(){
	localcollapse="collapse_employee";
	localmenu="menu_Operation";
	$("#operation_show").dialog({
		autoOpen: false,
		height: 550,
	    width: 550,
	    modal: false,
	    buttons: {
	    	"确定": function() {
	    		$("#operation_form").submit();
	        },
	        "取消": function() {
	        	$( this ).dialog( "close" );
	        }
	    },
	    close: function() {
	    	validator.resetForm();
	    	clearForm($("#operation_form"));	    	
	    }
	});

	validator=$("#operation_form").validate({
		rules: {			
			operation_name:"required"
		},
		messages: {
			operation_name:"请输入名称"
		},
		submitHandler: function(form) {  //通过之后回调 
			if($("#operation_id").val()=="" | $("#operation_id").val()==0){				
				addoperation();
			}
			else{				
				updateoperation();
			}
			$("#operation_show").dialog( "close" );
		},
		invalidHandler: function(form, validator) {  //不通过回调 
			
		},
		
	});
	getoperationmessage();
}
function showchild(id){	
	var parentClassElement=document.getElementById("operation"+id);
	var name=parentClassElement.className;	
	var childClassElements = getElementsByClassName("child_operation"+id);
	if(name.indexOf("icon-minus-sign") >= 0){
		parentClassElement.setAttribute("class", "icon-plus-sign");
		for(var i=0; i<childClassElements.length; i++) {
			childClassElements[i].style.display="none";
		}
	}
	else{
		parentClassElement.setAttribute("class", "icon-minus-sign");
		for(var i=0; i<childClassElements.length; i++) {
			childClassElements[i].style.display="";
		}
	}
	
}
function getoperationmessage(){  	
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Operation/getoperation');?>", 
        dataType:"json",
        success:function(data){   
        	if(data==null)
    		{
        		data="";
    		}
        	var table="<table id='table_operation' class='display'><thead><tr><th>名称</th><th>顺序</th><th>标识</th><th>操作</th></tr></thead>";
        	$.each(data,function(index,value){
        		if(value.id==null){
					value.id="";
				}
        		if(value.name==null){
					value.name="";
				}
        		if(value.parent_id==null){
					value.parent_id="";
				}
				if(value.url==null){
					value.url="";
				}
				if(value.sequence==null){
					value.sequence=0;
				}				
				table+="<tbody><tr><td onclick='showchild("+value.id+")'><i id='operation"+value.id+"' class='icon-plus-sign text-left'></i> "+value.name+"</td><th>"+value.sequence+"</th><td style='width:200px'>"+value.url+"</td>";
				table+="<th><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal' onclick='getoperation("+value.id+")'>修改</button>";
				if(value.parent_id==0){
					table+="<button type='button' class='btn btn-info btn-sm' onclick='addchildoperation("+value.id+")'>增加子模块</button>"
				}
				table+="<button type='button' class='btn btn-info btn-sm' onclick='deleteoperation("+value.id+")'>删除</button></th></tr></tbody>";
				table+="<tbody id='child_operation"+value.id+"'></tbody>";
				getchildoperation(value.id);
			}); 
        	table+="</table>";
        	$("#operation_parentid").val(0);
        	$("#operationMessage").html(table);
        	var height=$(window).height();
			$("#table_operation").DataTable(
				{
					 "sScrollY": height-300,
					 "oLanguage" : Language_cn,
					 "info":false,
					 "lengthChange":false,
					 "bPaginate": false
				}
			);
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    }); 
}

function getchildoperation(parentid){  
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Operation/getchildoperation');?>", 
        dataType:"json",
        data:{"parentid":parentid},
        success:function(data){   
        	if(data==null)
    		{
        		return;
    		}
        	var table="";
        	$.each(data,function(index,value){
        		if(value.id==null){
					value.id="";
				}
        		if(value.name==null){
					value.name="";
				}
        		if(value.parent_id==null){
					value.parent_id="";
				}
				if(value.sequence==null){
					value.sequence=0;
				}
				table+="<tr style='display:none' class='child_operation"+parentid+" bg-info' id='operation"+value.id+"'><td class='text-center'>"+value.name+"</td><th>"+value.sequence+"</th><td>"+value.url+"</td>";
				table+="<th><button type='button' class='btn btn-info btn-sm'  data-toggle='modal' data-target='#myModal' onclick='getoperation("+value.id+")'>修改</button>";
				table+="<button type='button' class='btn btn-info btn-sm' onclick='deleteoperation("+value.id+")'>删除</button></th></tr>";
			}); 
        	$("#child_operation"+parentid).html(table);
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}

function getoperation(id){  
	$("#operation_show").dialog("open");
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Operation/getoperation');?>", 
        dataType:"json",
        data:{"id":id},       
        success:function(data){   
        	if(data==null)
    		{
        		alert("无此日志类型，请重新选择");
        		return;
    		}
        	if(data.id!=null){
        		$("#operation_id").val(data.id);
			}
			if(data.name!=null){
				$("#operation_name").val(trim(data.name));
			}
			if(data.sequence!=null){
				$("#operation_sequence").val(trim(data.sequence));
			}
			if(data.url!=null){
				$("#operation_url").val(trim(data.url));
			}
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}

function deleteoperation(id){  
	var result=confirm('确认删除？');
	if(!result){
		return;
	}
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Operation/deleteoperation');?>", 
        dataType:"json",
        data:{
        	"id":id
        	},
        success:function(data){   
        	if(data==null | data.num<1)
        	{
        		if(data.num==-1){
        			alert("请先删除子分类");
        		}
        		else{
        			alert("删除失败");
        		}
        	}
        	else{
        		alert("删除成功");
        	}
        	getoperationmessage();
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}

function updateoperation(){  	
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Operation/updateoperation');?>", 
        dataType:"json",
        data:{
        	"id":$("#operation_id").val(),
        	"name":$("#operation_name").val(),
        	"sequence":$("#operation_sequence").val(),
        	"url":$("#operation_url").val()
        	},
        success:function(data){   
        	if(data==null | data.num<1)
        	{
        		alert("修改失败");
        		return;
        	}
        	alert("修改成功");
        	getoperationmessage();
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}

function addchildoperation(parentid){
	$("#operation_parentid").val(parentid);
	document.getElementById("bt_operation_showadd").click();
}

function addoperation(){  	
	$.ajax({   
        type:"post",     
        url:"<?php echo U('Operation/addoperation');?>", 
        dataType:"json",
        data:{
        	"parentid":$("#operation_parentid").val(),
        	"name":$("#operation_name").val(),
        	"sequence":$("#operation_sequence").val(),
        	"url":$("#operation_url").val()
        	},
        success:function(data){   
        	if(data==null | data.num<1)
        	{
        		alert("增加失败");
        	}
        	alert("增加成功");
        	getoperationmessage();
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    });   
}
function showdialogadd(){
	$("#operation_id").val("");
	$("#operation_show").dialog("open");
}
</script>
</head>
<body onload="init()">  
	<button type="button" class="btn btn-danger" onclick="showdialogadd()" id="bt_operation_showadd">  
			增加主模块 
    </button> 
    <input type="hidden" id="operation_id" value=0>
    <input type="hidden" id="operation_parentid" value=0>
    <div id="operationMessage"></div>
    <div id="operation_show" title="模块信息"> 
		<form id="operation_form">
			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="operation_name" class="col-sm-3 control-label">名称
 					<label class="Form_necessary">*</label>
 					</label>
 					<input type="text" class="col-sm-6" id="operation_name" name="operation_name" placeholder="请输入名称">
				</div>
				<div class="col-sm-12 form-group">
 					<label for="operation_sequence" class="col-sm-3 control-label">显示顺序
 					
 					</label>
 					<input type="text" class="col-sm-6" id="operation_sequence" name="operation_sequence" placeholder="请输入顺序">
				</div>
				<div class="col-sm-12 form-group">
 					<label for="operation_url" class="col-sm-3 control-label">标识 					
 					</label>
 					<input type="text" class="col-sm-6" id="operation_url" placeholder="请输入标识">
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