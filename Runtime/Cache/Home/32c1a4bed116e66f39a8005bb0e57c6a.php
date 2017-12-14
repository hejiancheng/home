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
#add_topic_form label.error{
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
	localcollapse="collapse_topic";
	localmenu="menu_CheckTopicicic";
   	get_topic_type();
    get_topic_message();		
}
function get_topic_message(){  
	$.ajax({   
        type:"post",     
        url:"<?php echo U('CheckTopic/get_topic');?>", 
        dataType:"json",
        success:function(data){   
        	if(data.key==1){
				if(data.array==null)
				{
					data.array="";
				}
				var table = "<table id='table_add_topic' class='display'><thead><tr><th>id</th><th>题目类型</th><th>录入时间</th><th>难度系数</th><th>状态</th><th>操作</th></tr></thead><tbody>";
				$.each(data.array,function(index,value){
					if(value.id==null){
						value.id="";
					}
					if(value.name==null){
						value.name="";
					}
					table+="<tr><td> "+value.id+"</td><td> "+value.topic_type+"</td><td> "+value.time+"</td><td> "+value.difficult_type+"</td><td> "+value.state+"</td>";
					table+="<th>";
					if(value.state=="待审核"){
						table+="<button type='button' class='btn btn-danger' onclick='check_state_topic(\""+value.id+"\",1)'>审核</button>";
					}
					if(value.state!="待审核"){
						table+="<button type='button' class='btn btn-danger' onclick='check_state_topic(\""+value.id+"\",2)'>查看题目</button>";
					}
					table+="</th></tr>";
				}); 
				table += "</tbody></table>";
				$("#add_topic_Message").html(table);
				var height=$(window).height();
				$("#table_add_topic").DataTable(
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
function get_topic_type(){
	$.ajax({
	type:"post",
	url:"<?php echo U('CheckTopic/get_type');?>",
	dataType:"json",
	success:function(data){
		content="";
		if(data.key==1){
			$.each(data.array,function(index,value){
				if(value.id!=null){
				
					if(value.id!=""){
						 content+="<option value='" + value.id + "'>" + trim(value.name) + "</option>";
					   
					   
					}
				}
			});
		$("#topic_type").html(content);
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
function init_show(){
	if($("#add_topic_id_hidden").val()=="1"){
		$("#add_topic_show").dialog({
			autoOpen: false,
			height: 600,
		    width: 800,
		    modal: false,
		    buttons: {
		    	"审核通过": function() {
		    		$("#state_topic_id_hidden").val(1);
		    		$("#add_topic_form").submit();
		        },
		        "审核不通过": function() {
		        	$("#state_topic_id_hidden").val(2);
		    		$("#add_topic_form").submit();
		        },
		        "取消": function() {
		        	$( this ).dialog( "close" );
		        }
		    },
		    close: function() {
		    	validator.resetForm();
		    	clearForm($("#add_topic_form"));
		    }
		});
	 
		validator=$("#add_topic_form").validate({
			rules: {
				add_topic_name:"required"
			},
			messages: {
				add_topic_name:"请输入名称"
			},
			submitHandler: function(form) {  //通过之后回调 
				state_topic();
				$("#add_topic_show").dialog( "close" );
			},
			invalidHandler: function(form, validator) {  //不通过回调 
				
			},
			
		});
		  }else{
			  $("#add_topic_show").dialog({
					autoOpen: false,
					height: 600,
				    width: 800,
				    modal: false,
				    buttons: {
				        "取消": function() {
				        	$( this ).dialog( "close" );
				        }
				    },
				    close: function() {
				    	validator.resetForm();
				    	clearForm($("#add_topic_form"));
				    }
				});
			 
		  }

}
function check_state_topic(id,state){
	$("#topic_id_hidden").val(id);
	$("#add_topic_id_hidden").val(state);
	init_show();
	$("#add_topic_show").dialog("open");
	$.ajax({   
        type:"post",     
        url:"<?php echo U('CheckTopic/get_topic');?>", 
        dataType:"json",
        data:{
        	"id":id,
        },
        success:function(data){   
        	if(data.key==1){
        		var value=data.array[0];
        		$("#topic_type").val(value.topic_type);
        		$("#difficult_type").val(value.difficult_type);
        		$("#add_content").val(value.content);
        		$("#goods_picture0").val(value.picture);
        		$("#add_answer_content").val(value.answer_content);
        		 var str=value.topic_answer;
        		var arr_check=str.split(","); 
        		$.each(data.array[0],function(index,value){
        			if(index==0){
        				$("#add_topic_A").val(value.content_answer);
        			}
        			if(index==1){
        				$("#add_topic_B").val(value.content_answer);
        			}
        			if(index==2){
        				$("#add_topic_C").val(value.content_answer);
        			}
        			if(index==3){
        				$("#add_topic_D").val(value.content_answer);
        			}
        			if(index==4){
        				$("#add_topic_E").val(value.content_answer);
        			}
        			if(index==5){
        				$("#add_topic_F").val(value.content_answer);
        			}
        			if(index==6){
        				$("#add_topic_G").val(value.content_answer);
        			}
    			});
        		 for(var i=0;i<arr_check.length;i++){
          		   document.getElementById("checkbox_"+arr_check[i]).checked = true;
          	    } 
			}
        },   
        error:function(){   
            alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";
        }   
    }); 
}
function state_topic(){  
	var sure=confirm('确认审核？');
	if(!sure){
		return;
	}
	$.ajax({   
        type:"post",     
        url:"<?php echo U('CheckTopic/state_topic');?>", 
        dataType:"json",
        data:{
        	"id":$("#topic_id_hidden").val(),
           "state":$("#state_topic_id_hidden").val(),
        },
        success:function(data){   
			if(data.key==0){
				alert(data.msg);
			}
        	else{
    			alert("审核成功");
    		}
			get_topic_message();
        },   
        error:function(){   
        	alert("长时间未操作，请重新登录！");
            window.location.href = "<?php echo U('Index/index');?>";  
        }   
    });   
}
 
</script>
</head>
<body onload="init()">  
 <input type="hidden" id="topic_id_hidden" value=0>
    <input type="hidden" id="add_topic_id_hidden" value=0>
     <input type="hidden" id="state_topic_id_hidden" value=0>
    <div id="add_topic_Message"></div> 
	  
	<div id="add_topic_show" title="增加题目"  style="display:none;"> 
		<form id="add_topic_form">
			<div class="col-sm-12">
			<div class="col-sm-12 form-group">
 					<label for="topic_type" class="col-sm-3 control-label">商品种类
 					<label class="Form_necessary">*</label>
 					</label>
                    <select id="topic_type" class="col-sm-6" name="topic_type">
                    </select>
                   </div>	 
			</div>
			<div class="col-sm-12">
			<div class="col-sm-12 form-group">
 					<label for="difficult_type" class="col-sm-3 control-label">难度系数
 					<label class="Form_necessary">*</label>
 					</label>
                    <select id="difficult_type" class="col-sm-6" name="difficult_type" >
                    	<option value='1'>一级</option>
                        <option value='2'>二级</option>
                        <option value='3'>三级</option>
                        <option value='4'>四级</option>
                        <option value='5'>五级</option>
                    </select>
                   </div>	 
			</div>
			<div class="col-sm-12">
			<div class="col-sm-12 form-group">
 					<label for="goods_picture0" class="col-sm-3 control-label">题目内容图片
 					</label>
 					<input type="text" rows="3" class="col-sm-6" id="goods_picture0" name="goods_picture0" placeholder="如果该题目使用图片,请上传!" readonly="readonly">&nbsp
 					<input type='button' class="btn btn-info btn-sm" style="height:26px;line-height: 1;"  id="upload_goods_pic_button0"  value="浏览">
 					<label id="msg0"  class="Form_necessary"></label>
		   </div> </div>
		   	<div class="col-sm-12">
			<div class="col-sm-12 form-group">
 					<label for="goods_picture0" class="col-sm-3 control-label">题目答案
 					</label>
 				  <input type="checkbox" name="category" id="checkbox_1" value="1" />&nbspA
 				  &nbsp&nbsp<input type="checkbox" id="checkbox_2"   name="category" value="2" />&nbspB
 				  &nbsp&nbsp <input type="checkbox" id="checkbox_3"   name="category" value="3" />&nbspC
 				  &nbsp&nbsp<input type="checkbox"  id="checkbox_4"  name="category" value="4" />&nbspD
 				  &nbsp&nbsp <input type="checkbox"  id="checkbox_5"  name="category" value="5" />&nbspE
 				  &nbsp&nbsp<input type="checkbox"  id="checkbox_6"  name="category" value="6" />&nbspF
 				  &nbsp&nbsp<input type="checkbox" id="checkbox_7"  name="category" value="7" />&nbspG
		   </div> </div>
			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content" class="col-sm-3 control-label">题目内容
 					<label class="Form_necessary">*</label>
 					</label>
 					<textarea type="text" rows=20 style="height:300px"class="col-sm-12" id="add_content" content="add_topic_content" placeholder="请输入题目内容"></textarea>
				</div>											
   			</div>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_answer_content" class="col-sm-3 control-label">题目答案解析
 					<label class="Form_necessary">*</label>
 					</label>
 					<textarea type="text" rows=20 style="height:300px"class="col-sm-12" id="add_answer_content" content="add_answer_content" placeholder="请输入题目答案解析"></textarea>
				</div>											
   			</div>
   		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label class="Form_necessary">*注释：选项至少为2个以上，7个以下</label>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content" class="col-sm-3 control-label">选项A
 					<label class="Form_necessary">*</label>
 					</label>
 					<textarea type="text" rows=20 style="height:100px" class="col-sm-12" id="add_topic_A" content="add_topic_content" placeholder="请输入选项内容"></textarea>
				</div>											
   			</div>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content" class="col-sm-3 control-label">选项B
 					<label class="Form_necessary">*</label>
 					</label>
 					<textarea type="text" rows=20 style="height:100px" class="col-sm-12" id="add_topic_B" content="add_topic_content" placeholder="请输入选项内容"></textarea>
				</div>											
   			</div>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content" class="col-sm-3 control-label">选项C
 					</label>
 					<textarea type="text" rows=20 style="height:100px"  class="col-sm-12" id="add_topic_C" content="add_topic_content" placeholder="请输入选项内容"></textarea>
				</div>											
   			</div>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content" class="col-sm-3 control-label">选项D
 					</label>
 					<textarea type="text" rows=20 style="height:100px"  class="col-sm-12" id="add_topic_D" content="add_topic_content" placeholder="请输入选项内容"></textarea>
				</div>											
   			</div>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content"  class="col-sm-3 control-label">选项E
 					</label>
 					<textarea type="text" rows=20 style="height:100px" class="col-sm-12" id="add_topic_E" content="add_topic_content" placeholder="请输入选项内容"></textarea>
				</div>											
   			</div>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content" class="col-sm-3 control-label">选项F
 					</label>
 					<textarea type="text" rows=20 style="height:100px"  class="col-sm-12" id="add_topic_F" content="add_topic_content" placeholder="请输入选项内容"></textarea>
				</div>											
   			</div>
   			<div class="col-sm-12">
				<div class="col-sm-12 form-group">
 					<label for="add_topic_content" class="col-sm-3 control-label">选项G
 					</label>
 					<textarea type="text" rows=20 style="height:100px"  class="col-sm-12" id="add_topic_G" content="add_topic_content" placeholder="请输入选项内容"></textarea>
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