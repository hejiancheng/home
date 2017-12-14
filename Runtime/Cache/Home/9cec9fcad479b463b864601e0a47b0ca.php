<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

      <title>课程列表</title>


    <link data-turbolinks-track="true" href="/Hlt/Public/css/application-259d88b7df3d30d7eec66f46114169d9.css" media="all" rel="stylesheet" />
    <link data-turbolinks-track="true" href="/Hlt/Public/css/sign_in_modal-3160308d45c1acdf19162e7886744068.css" media="all" rel="stylesheet" />
    <link data-turbolinks-track="true" href="/Hlt/Public/css/gaoxiaobang-da3a2db2fecddd160bc3e3c4a3a3bc38.css" media="all" rel="stylesheet" />
    <script data-turbolinks-track="true" src="/Hlt/Public/js/application-fb8562c33e2e6c7d207653c10215fc91.js"></script>
     <script type="text/javascript" src="/Hlt/Public/js/jquery.min.js"></script>
    <meta content="authenticity_token" name="csrf-param" />
<meta content="HfyB28ni5Qj/hP5e8BrOFEnWbp74KJ0mHJ2R98WyF40=" name="csrf-token" />
	<link rel="apple-touch-icon" sizes="57x57" href="/Hlt/Public/images/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/Hlt/Public/images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/Hlt/Public/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/Hlt/Public/images/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/Hlt/Public/images/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/Hlt/Public/images/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/Hlt/Public/images/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/Hlt/Public/images/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/Hlt/Public/images/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/Hlt/Public/images/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/Hlt/Public/images/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="/Hlt/Public/images/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/Hlt/Public/images/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/Hlt/Public/images/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
  </head>
  <body>

    <div class="bg-gray login_home search clearfix">
  <header class="white-header" id="header">
  <div class="container">
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
        

<script>
  
</script>


        </div>
    </div>
  </div>
</header>
<div class="header-occupation"></div>
  <div class="container content search">
    <div class="row">
      <div class="col-xs-2">
        <div class="sidebar-nav">
  <div class="sidebar-nav-sub">
    <ul class="nav nav-stacked nav-pills">
      <li class=""><a>全部</a></li>

      <li class=""><a href="<?php echo U('Home/all_topic');?>">刷题记录</a></li>
      
      <li class=""><a href="/?discover=true">错题解析</a></li>
      
      <li class=""><a href="<?php echo U('Home/my_topic_analyze');?>">我的做题分析</a></li>
    </ul>
  </div>
  
</div>
      </div>
      <div class="col-xs-10">


        <div class="search-result">
              <div class="course-row-viewport">
                <ul class="list-unstyled course-row">
                    <?php if($data_state == 1): if(is_array($data_list)): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <style>
    .course-card .course-intro > p > em {
        color: transparent;
        -webkit-transition: color .4s ease-in-out .2s;
        -moz-transition: color .4s ease-in-out .2s;
        -ms-transition: color .4s ease-in-out .2s;
        -o-transition: color .4s ease-in-out .2s;
        transition: color .4s ease-in-out .2s;
    }

    .course-card:hover .course-intro > p > em {
        color: red;
    }
    .course-card h4 em {
        color: red;
    }
</style>
<a class="course-card thumbnail" href="javascript:topic_record(<?php echo ($vo["id"]); ?>)">
  <div class="caption guide">
     <p>刷题时间:</p> <p style="margin-left: 40px ;color: red"><?php echo ($vo["time"]); ?></p>
    <div class="float-blk">
          <h4><em>名师评价</em></br></h4>

      <div class="course-intro">
            <p><em></em>暂时还没有开发，敬请期待！</p>
      </div>
      <div class="course-review">
        <span class="star">
  <span class="star-fill">
          <input class="button btn btn-primary btn-lg" type="button" style="padding: 3px 6px;font-size: 12px;" value="点击查看"   />
  </br>
  </span>
  <span class="score">本次刷题准确率</span>
</span>
          <span class="count pull-right" data-toggle="tooltip" >
            <?php echo ($vo["r"]); ?>%
          </span>
      </div>
    </div>
  </div>
  <div class="course-favorite instructive_course_57_collection">
        <span class="glyphicon glyphicon-heart favorite-heart" data-course-id="57" data-school-id=""></span>

  </div>
</a>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                                <?php else: ?>
                          <h1 style="margin-left: 50px">无数据，快去练练题吧</h1><?php endif; ?>
  </ul>
              </div>
        </div>
      
      </div>
    </div>
  </div>
</div>



<script src="/Hlt/Public/js/search-eb91564f053f04f52cd3482a53871224.js"></script>

<div style="display: none;">
  <script type="text/javascript">
  function topic_record(id){
	  window.location.href = "<?php echo U('UsersHome/exam_record');?>?id="+id;  
  }
  </script>
   </body>
</html>