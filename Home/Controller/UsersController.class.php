<?php

namespace Home\Controller;
class UsersController extends CommonHomeController{
   //发送邮箱
	public function send_email(){
		$mail_num=I("content");;//接受邮箱账号
		$title="学习网邮箱验证码";
		$mail_d=$this->mail_d();
		$content="欢迎你注册学习网；你的邮箱验证码是：".$mail_d;
		if(SendMail($mail_num,$title,$content)){
			session("mail_d",$mail_d);
			session("time",date("Y-m-d H:i:s"));
			json_return(1);
		}   
		else{
			json_return(0);
		}
	}
	//用戶验证
	public function  d_user_name(){
		$con["name"]=I("user_username");
		$result=M("users")->where($con)->find();
		if($result!=null){
			json_return(0,"该用户已经存在");
		}else{
			json_return(1);
		}
	}
	//用户注册
   public function reg_user(){
	$s=strtotime(date("Y-m-d H:i:s"))-strtotime(session("time"));
	if($s>60){
   		 json_return(0,"邮箱验证码超时");
   		return ;   		
   	} 
   	$em=session("mail_d");
   if($em==I("d_name_email")){

   	$con["e_mail"]=I("name_email");
   	$result=M("users")->where($con)->find();
   	if($result["e_mail"]==I("name_email")){
   		json_return(0,"该邮箱已经存在");
   	}
      	else{
   		$data["password"]=I("password");
   		$data["e_mail"]=I("name_email");
   		$data["name"]=I("name");
   		$data["last_login_ip"]=get_client_ip();
   		$data["last_login_time"]=date("Y-m-d H:i:s");
   		$data["create_time"]=date("Y-m-d H:i:s");
   		$r=M("users")->add($data);
   		if($r==0){
   			json_return(0,"注册失败！");
   		}else{
   			logrecord(CommonHomeController::$log_type['增加'], "在users表增加一条记录，记录的信息为“".arraytostring($data)."”",$r);
   			json_return(1);
   		}
       }
    					}
    else{
    	json_return(0,"请正确输入验证码！");
 }
   	  }
   	  //登录
  public function login(){
  	$name=I("name");
  	$password=md5(I("password"));
  	$con["name"]=$name;
  	$result=M("users")->where($con)->find();
  	if($result!=null){
  		if($result["password"]==$password){
  			session(null);
  			session("user_id",$result["id"]);
  		   json_return(1);	
  		}else{
  			json_return(0,"密码错误!");
  		}
  		
  	}else{
  	json_return(0,"用戶不存在！");
  	return ;
  	}
  }
  public function d_password_user(){
   $con["name"]=I("username");
   $r= M("users")->where($con)->find();
    if($r!=null){
    	$string=$r["e_mail"];
    	$string1=explode("@", $string);
    	$string1=strstr($string, '@', TRUE);
    	$string2=strstr($string, '@');
    	$string1[strlen($string1)-1]="*";
    	$string1[strlen($string1)-2]="*";
    	$string1[strlen($string1)-3]="*";
    	$string1[strlen($string1)-4]="*";
    	$string=$string1.$string2;
    session("name",$r["name"]);
    session("email",$string);
    json_return(1);
    }else{
    json_return(0,"用户不存在！");
    }
  }
  public function find_send_email(){
  	$con["name"]=session("name");
  	$r= M("users")->where($con)->find();
  	$mail_num=$r["e_mail"];;//接受邮箱账号
  	$title="学习网邮箱验证码";
  	$mail_d=$this->mail_d();
  	$content="你的邮箱验证码是：".$mail_d;
  	if(SendMail($mail_num,$title,$content)){
  		json_return(1,$mail_d);
  	}
  	else{
  		json_return(0);
  	}
  }
  public function update_password(){
  $con["name"]=session("name");
  $data["password"]=I("password");
  $r= M("users")->where($con)->find();
  if($r["password"]==md5(  $data["password"])){
  	json_return(1);
  }else{
  if($r!=null){
     M("users")->where($con)->save($data);
  	json_return(1);
  }else{
  	json_return(0,"系统错误！请重试");
  }
  }}

}	
?>