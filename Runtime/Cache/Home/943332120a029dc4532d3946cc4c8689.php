<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

      <title>我的做题分析</title>


    <link data-turbolinks-track="true" href="/Hlt/Public/css/application-259d88b7df3d30d7eec66f46114169d9.css" media="all" rel="stylesheet" />
     <script type="text/javascript" src="/Hlt/Public/js/jquery.min.js"></script>
      <script type="text/javascript" src="/Hlt/Public/js/echarts.js"></script>
  </head>
    
   <script type="text/javascript">
   function init(){
	   $.ajax({   
	        type:"post",     
	        url:"<?php echo U('UsersTopic/my_topic_analyze');?>", 
	        dataType:"json",
	        success:function(data){   
	        	if(data.key==0){
	        		alert(data.msg);
	        		
	        	}else{
	        		var myChart1= echarts.init(document.getElementById('main'));
	        	       myChart1.setOption({
	        	           series : [
	        	               {
	        	                   name: '访问来源',
	        	                   type: 'pie',
	        	                   roseType: 'angle',
	        	                   radius: '50%',
	        	                   data:data.array["tu2"]
	        	               }
	        	           ]
	        	       });
	        	      var myChart = echarts.init(document.getElementById('main_1'));
	        	       myChart.setOption({
	        	           series : [
	        	               {
	        	                   name: '访问来源',
	        	                   type: 'pie',
	        	                   roseType: 'angle',
	        	                   radius: '50%',
	        	                   data:data.array["tu1"]
	        	               }
	        	           ]
	        	       }) 
	        	        var myChart2 = echarts.init(document.getElementById('main_3'));
       					myChart2.setOption({
        			   series : [
             				  {
                			   name: '访问来源',
                 				  type: 'pie',
                  				 roseType: 'angle',
                  		 		radius: '80%',
                  	 		data:data.array["tu"]
               }
           ]
       }) 
	        	}
	        },   
	        error:function(){   
	        	
	            alert("出错");   
	            window.location.href="<?php echo U('Home/index');?>";
	        }   
	    });
   }
  
    </script>
  <body onload="init()">
  <header class="white-header" id="header">
    <div class="row">
      <div class="col-xs-12">
        <div class="pull-left">
          <div class="logo">
            <a href="index.html"><img alt="Logo color"   src="/Hlt/Public/images/logo-color.png" /></a>
            
          </div>
        <div class="dropdown">
        <a href="index.html" class="btn btn btn-default"> 首页 </a>
                  </div>
       <div class="dropdown">
        <a href="course_list.html" class="btn btn btn-default"> 刷题</a>
                  </div>
      <!--   <div class="dropdown">
        <a href="index.html" class="btn btn btn-default"> 留言板块  </a>
                  </div> -->
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
    </div>
  </div>
</header>
                                   
     <div id="main_3" style="width: 100%;height:400px;margin-top: 100px"></div></br>   
       <p style="text-align: center" >总题目正确个数和错误个数</p>  
<div  style="width: 100%;float: left;">
          <div style="width: 48%;height:400px;float: left; " >
            <div id="main" style="width: 100%;height:400px;"></div>  
               <p style="text-align: center">各类题目占比例</p>    
          </div>
          <div style="width: 48%;height:400px;float: left;margin-left: 10px" > 
             <div id="main_1" style="width: 100%;height:400px;"></div> 
                 <p style="text-align: center">各类正确题目个数 </p> 
          </div>
   </div>
         
   </body>
</html>