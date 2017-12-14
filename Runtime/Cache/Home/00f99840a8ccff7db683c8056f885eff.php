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
            <a href="index.html"><img alt="Logo color" data-at2x="/assets/images/logo-color@2x.png" src="/Hlt/Public/images/logo-color.png" /></a>
            
          </div>
        <div class="dropdown">
        <a href="index.html" class="btn btn btn-default"> 首页 </a>
                  </div>
         <div class="dropdown">
            <a data-toggle="dropdown" href="course_list.html" class="btn btn-default">
              <span class="glyphicon glyphicon-align-justify"></span>
              课程
            </a>
            <div class="dropdown-menu course-catagory">
  <div class="catagory-links">
    <h6><span>发现课程</span></h6>
    <hr>
    <div class="row main-catagory">
      <div class="col-xs-4">
        <a href="/?discover=true">
          <span class="icon icon-selected-star"></span>
          &nbsp;&nbsp;发现课程
        </a>
      </div>
      <div class="col-xs-4">
        <a href="/courses?q%5Bs%5D=created_at+desc">
            <span class="icon icon-new"></span>
            &nbsp;&nbsp;最新课程
</a>      </div>
      <div class="col-xs-4">
        <!--<a href="/courses?q%5Bcertificate_type_eq%5D=enterprise">-->
            <!--<span class="icon icon-certificate-x"></span>-->
            <!--&nbsp;&nbsp;企业证书-->
        <!--</a>-->
      </div>
    </div>
    <h6><span>学科类别</span></h6>
    <hr>
    <div class="row sub-catagory">
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=26" title="移动开发">移动开发</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=1" title="云计算">云计算</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=2" title="互联网营销">互联网营销</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=3" title="交互设计">交互设计</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=7" title="编程开发">编程开发</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=6" title="大数据">大数据</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=8" title="创新创业">创新创业</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=12" title="办公软件">办公软件</a>
          </div>
          <div class="col-xs-3">
            <a href="/Hlt/Public/courses?q%5Bcategory_id_eq%5D=32" title="项目管理">项目管理</a>
          </div>
      <div class="col-xs-3">
        <a href="course_list.html">全部课程...</a>
      </div>
    </div>
 
</div>
</div>
          </div>
       <div class="dropdown">
        <a href="exam.html" class="btn btn btn-default"> 刷题</a>
                  </div>
        <div class="dropdown">
        <a href="index.html" class="btn btn btn-default"> 留言板块  </a>
                  </div>
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
    <span><a data-remote="true" href="login.html">登录</a></span>
    <span>|</span>
        <span><a href="reg.html">注册</a></span>

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
      <li class=""><a href="/?discover=true">发现课程</a></li>

      <li class=""><a href="/courses?q%5Bs%5D=created_at+desc">最新课程</a></li>
    </ul>
  </div>
  <div class="sidebar-nav-sub">
    <ul class="nav nav-stacked nav-pills">
      <li class="false"><a href="course_list.html">全部</a></li>
          <li class=""><a href="/Hlt/Public/courses?cat_id=26&amp;q%5Bcategory_id_eq%5D=26">移动开发</a></li>
    </ul>
  </div>
      <div class="ads">
        <a click_source="ads_banner" href="http://www.kaikeba.com/topics/C3" target="_blank" title="C3沙龙专区"><img alt="C3沙龙专区" class="img-responsive" src="/Hlt/Public/images/middle_middle_ibm-new.jpg" /></a>
      </div>
  <div class="mobile-app">
    <a href="http://www.kaikeba.com/topics/mobile-app.html">
      <img src="/Hlt/Public/images/mobile_app_sm.png" class="img-responsive" alt="移动端APP">
    </a>
  </div>
</div>
      </div>
      <div class="col-xs-10">


        <div class="search-result">
              <div class="course-row-viewport">
                <ul class="list-unstyled course-row">
                      <li>
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
<a class="course-card thumbnail" href="course_detail.html">
  <img alt="Normal  php        " class="img-responsive" src="/Hlt/Public/images/normal__PHP_____-__.png" style="min-height: 140px" />
  <div class="caption guide">
    <div class="float-blk">
          <h4><em>PH</em>P程序设计</h4>

      <div class="price">
            <span class="value">￥ 399</span>
      </div>



      <div class="course-info">
        <p><span class="label-course label-guide-course">导学课</span></p>
            <p><span class="icon icon-date"></span>&nbsp;暂无班次</p>
                <img alt="Badge" class="verified-badge pull-right" data-at2x="/assets/images/badge@2x.png" src="/Hlt/Public/images/badge.png" />
      </div>

      <div class="course-intro">
            <p>深刻解读了<em>PH</em>P开发中的编程思想、核心技术以及实际中的开发技巧，帮助您快速提升编程技能。</p>
      </div>
      <div class="course-review">
        <!--<span class="score">7.8分</span>-->
        <span class="star">
  <span class="star-fill">
        <span class="icon icon-star-fill active"></span>
        <span class="icon icon-star-fill active"></span>
        <span class="icon icon-star-fill active"></span>
        <span class="icon icon-star-fill active"></span>
        <span class="icon icon-star-fill"></span>
  </span>
  <span class="score">(7.8分)</span>
</span>


          <span class="count pull-right" data-toggle="tooltip" title="参与人数">
            <span class="icon icon-masses"></span>
            6299
          </span>
      </div>
    </div>
  </div>
  <div class="course-favorite instructive_course_57_collection">
        <span class="glyphicon glyphicon-heart favorite-heart" data-course-id="57" data-school-id=""></span>

  </div>
</a>
                      </li>
  </ul>
              </div>
        </div>
        <div class="pages text-center">
            <div class="pagination">
    <ul class="pagination">
    
    
        <li class="page active">
  <a href="course_list.html?q%5Bname_or_institution_name_cont%5D=PHP&amp;utf8=%E2%9C%93">1</a>
</li>

        <li class="page">
  <a href="course_list.html?page=2&amp;q%5Bname_or_institution_name_cont%5D=PHP&amp;utf8=%E2%9C%93" rel="next">2</a>
</li>


    <li class="next_page">
  <a href="course_list.html?page=2&amp;q%5Bname_or_institution_name_cont%5D=PHP&amp;utf8=%E2%9C%93" rel="next">下一页</a>
</li>

    <li class="last next">
  <a href="course_list.html?page=4&amp;q%5Bname_or_institution_name_cont%5D=PHP&amp;utf8=%E2%9C%93">最后一页</a>
</li>

    </ul>
  </div>

        </div>
      </div>
    </div>
  </div>
</div>



<script src="/Hlt/Public/js/search-eb91564f053f04f52cd3482a53871224.js"></script>

<script type="text/javascript">
    var google_conversion_id = 983566162;
    var google_conversion_language = "en";
    var google_conversion_format = "2";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "wTJBCL7Q9gcQ0o6A1QM";
    var google_remarketing_only = false;
</script>
<div style="display: none;">
  <script type="text/javascript" src="/Hlt/Public/js/conversion.js">
  </script>

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
  </script>
  <script src="js/monitorView-2.0.js"></script>

  </body>
</html>