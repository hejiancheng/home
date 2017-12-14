<?php

namespace Home\Controller;
class HomeController extends CommonHomeController{
	public function index(){
		$ad = M("ad");
		$ad_arr = $ad->order('id desc')->limit(4)->select();
		$this->ad_arr=$ad_arr;
		$ad = M("topic_type");
		$topic_type_arr = $ad->order('id desc')->limit(4)->select();
		$this->topic_type_arr=$topic_type_arr;
	
		$this->display("home/index");
	
	}
	public function login_user(){
		if(session("?mail_d")){
			session("mail_d",null);
		$this->success("注册成功",U('Home/login_user'),3);
		}else{
			$this->display("home/login");
		}
	}
	public function forget(){
		$this->display("home/forget");
	}
	public function all_topic(){
		$condition["user_id"]=session("user_id");
		$condition["state"]=1;
		$condition["content"]=array('exp','is not null');
		$data=M("topic_record")->where($condition)->select();
		$data_r=M("topic_result");
		foreach ($data as $k=>$v){
			$r=0;$n=0;
			$arr=$data_r->where("topic_record_id =".$v["id"])->select();
			foreach ($arr as $key =>$value){
				if($value["topic_id_re"]){
					$r=$r+1;
				}
				$n=$n+1;
			}
			if($n!=0){
			$data[$k]["r"]=number_format($r/$n,4)*100;
			}else{
				$data[$k]["r"]=0;
			}
		}
		if($data!=null){
			$this->data_list=$data;
			$this->data_state=1;
		}else{
			$this->data_state=0;
		}
		$this->display("home/all_topic_list");
	}
	public function eaxm(){
		
			$this->USER_ID = session('user_id');
			if (! isset($this->USER_ID)) {
				$this->display("home/login");
			}else{
				$this->display("home/eaxm");
			}
	
	}
	public function reg(){
		$this->display("home/reg");
	}
	public   function forget_reset_email(){
		if(  session("?name")){
		$this->forget_reset();
		}else{
			$this->login_user();
		}
	}
   private  function forget_reset(){
    $this->display("home/forget_reset");
   }
   public function forget_check(){
   	if(  session("?name")){
   		   	$this->email=session("email");
    		$this->display("home/forget_check");
   	}else{
   		$this->login_user();
   	}

   }
   public function forget_success(){
   	if(session("?name")){
   	   $this->display("home/forget_success");
   	}else{
   		$this->login_user();
   	}
   
   }
   public function member_set(){
   	$condition["user_id"]=session("user_id");
   	$data_condition["id"]=session("user_id");
   	$data=M("users")->where($data_condition)->find();
   	$data_info=M("users_info")->where($condition)->find();
   	$this->data=$data;
   	$this->data_info=$data_info;
   	$this->display("home/member_set");
   }
   
   public function course_list(){
   	$r=M("topic_type")->select();
   	$this->r=$r;
   	$this->display("home/course_list");
   }
   public function exit_login(){
    session(null);
    $this->index();
   }
}	
?>