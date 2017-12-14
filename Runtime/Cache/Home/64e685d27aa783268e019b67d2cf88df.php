<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>小腾学习网站首页</title>
    <script data-turbolinks-track="true" src="/Hlt/Public/js/application-fb8562c33e2e6c7d207653c10215fc91.js"></script>
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
    <link href="/Hlt/Public/css/bootstrap.min-8fb290f8babcc5e9f414858c033c7f0d.css" media="screen" rel="stylesheet" />
    <link href="/Hlt/Public/css/flexslider5-a38a0d5dcb9aaf913de1a8d36f3ee87d.css" media="screen" rel="stylesheet" />
    <link href="/Hlt/Public/css/global-debfc8ec0a7e4f27bc779fbae38e8375.css" media="screen" rel="stylesheet" />
    <link href="/Hlt/Public/css/anonymous_index5-687a0671e5da4886ba342f19828b4557.css" media="screen" rel="stylesheet" />
    <link href="/Hlt/Public/css/header_index5-164b41c7428ea8a790b352ecafdff0a1.css" media="screen" rel="stylesheet" />
    <link href="/Hlt/Public/css/footer_index5-9584f4808f250f7a809ccc2b49b4d6fa.css" media="screen" rel="stylesheet" />
    <link href="/Hlt/Public/css/banner_slider5-29883169fc4a8245c310d28c17cd3db1.css" media="screen" rel="stylesheet" />
  </head>

  <body class="anonymous_index" >
        
<header class="banner-header" id="header">
  <div class="gray-top">
    <div class="container">
      <div class="row">
      
        <div class="pull-right">
          <!--<span><a href="http://bbs.kaikeba.com">论坛</a></span>-->
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
     <?php if($user_state == 1 ): ?><span><a>已登录</a></span>
            <span>|</span>
        <span><a href="<?php echo U('Home/exit_login');?>">退出</a></span>
        <?php else: ?>
          <span><a  href="<?php echo U('Home/login_user');?>">登录</a></span>
         <span>|</span>
        <span><a href="<?php echo U('Home/reg');?>">注册</a></span><?php endif; ?>
        
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
  function test()
  {
  window.location.href="<?php echo U('Home/reg');?>";
  }
</script>


        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
       
        <div class="navlist">
          <ul>
            <li><a href="index.html" class="select-navlist"> 首页 </a></li>
            <li><a href="<?php echo U('Home/course_list');?>"> 刷题</a></li>
        <!--     <li><a href="http://w.kaikeba.com" target="_blank"> 留言板块 </a></li> -->
            <li><a href="<?php echo U('Home/member_set');?>" target="_blank"> 我的信息 </a></li>
 </ul>
        </div>

      </div>
    </div>
  </div>
  <div class="shadow"></div>
</header>


<div class="anonymous_index bannerslider">
  <div class="flexslider zd1">
    <ul class="slides">
          <li data-thumb="<?php echo ($ad_arr[0]['picture']); ?> ">
            <a href="#" target="_blank" click_source="top_banner_login" class="flex-img-holder">
            <div class="flex-img-holder" style="background-image: url(<?php echo ($ad_arr[0]['picture']); ?> )">
            </div></a> </li>
          <li data-thumb="<?php echo ($ad_arr[1]['picture']); ?> ">
            <a href="#" target="_blank" click_source="top_banner_login" class="flex-img-holder">
            <div class="flex-img-holder" style="background-image: url(<?php echo ($ad_arr[1]['picture']); ?> )">
            </div></a> </li>
          <li data-thumb="<?php echo ($ad_arr[2]['picture']); ?> ">
            <a href="#" target="_blank" click_source="top_banner_login" class="flex-img-holder">
            <div class="flex-img-holder" style="background-image: url(<?php echo ($ad_arr[2]['picture']); ?> )">
            </div></a> </li>
          <li data-thumb="<?php echo ($ad_arr[3]['picture']); ?> ">
            <a href="#" target="_blank" click_source="top_banner_login" class="flex-img-holder">
            <div class="flex-img-holder" style="background-image: url(<?php echo ($ad_arr[3]['picture']); ?> )">
            </div></a> </li>
    </ul>
  
      </div>
    </div>
<hr class="index-mk">
<div class="container discover-therewey" style=" position:relative">
  <ul class="tab-control">
    <li><a href="#">网站介绍</a></li>
  </ul>
</div>

<div class="threeways mb4" >
  <div class="flexslider">
    <div class="container">
      <div class="row">
        <ul class="slides">
          <li>
            <div id="feature">
              <div class="container">
                <div class="row">
                  <div class="col-xs-6 wwid"><img src="/Hlt/Public/images/feature-1.png" alt="feature"></div>
                  <div class="col-xs-6">
                    <div class="feature-desc">
                      <h1 class="feature-txt-gury" id="classtitle">全免费，无限制 <br>快速刷题网站</h1>
                      <ul class="list-unstyled">
                        <li>网站注册登录可进行刷题，选择刷题数量，</li>
                        <li>科目进行刷题，刷题过程记录时间。</li>
                        <li>刷题完成可进行刷题记录查看正确答案和解析。</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>


        </ul>
      </div>
    </div>
  </div>
</div>


<hr class="index-mk">

<div class="discover-course">
<h1 class="text-center">发现课程</h1>

<h1 class="text-center">练一练&nbsp<a href="course_list.html" style="font-size : 20px;color : #525c66;  " target="_blank">查看所有题库</a></h1>
<div class="four-courses">
  <div class="container">
    <div class="row">
    <?php if(is_array($topic_type_arr)): $i = 0; $__LIST__ = $topic_type_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-3 img-black">
        <a href="http://ibm.kaikeba.com">
          <div class="course">
            <div class="img-course-collaborate text-center">
              <img src="<?php echo ($vo["picture"]); ?>" alt="" width="100%">
            </div>
            <h4 class="text-center"><?php echo ($vo["name"]); ?>专区</h4>
            <div class="company-logo text-center">
              <span> <?php echo ($vo["name"]); ?></span> <span class="company-line">|</span> <span>题库专区</span>
            </div>
          </div>
        </a>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
</div>

<hr class="index-mk">

<div class="register-guide text-center">
  <h1>看到这里的女神、男神~经都会......</h1>
  <div class="footer-sign">
    <a class="footer-sign-icon" href="reg.html">注册</a>
  </div>
</div>
<script src="/Hlt/Public/js/login_home.js"></script>
<script type="text/javascript" src="/Hlt/Public/js/global.js"></script>
<script type="text/javascript" src="/Hlt/Public/js/retina.custom.js"></script>
<script type="text/javascript" src="/Hlt/Public/js/anonymous_index5.js"></script>

</body>
  </body>
</html>