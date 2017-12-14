<?php

namespace Home\Controller;
class UsersHomeController extends CommonHomeController{
	public function index(){
		$ad = M("ad");
		$ad_arr = $ad->order('id desc')->limit(4)->select();
		$this->ad_arr=$ad_arr;
		$ad = M("topic_type");
		$topic_type_arr = $ad->order('id desc')->limit(4)->select();
		$this->topic_type_arr=$topic_type_arr;
		$this->display("home/index");
	}
	public function  exam_record(){
		$id=I("id");
		$this->id=$id;
		$this->display("home/exam_record");
	}
	public function get_province(){
		//得到省份信息
		$province_list=M("position_province")->select();
		json_return(1,"",$province_list);
	}
   public function update_info(){
   	if(!session("?user_id")){
   		json_return(0,"请先注册！");
   		return;
   	}
    $data["name"]=I("name");	
    $data["surname"]=I("surname");
    $data["spell_name"]=I("spell_name");
    $data["province_id"]=I("province_id");
    if(I("sex")=="male"){
    	$data["sex"]=1;
    }else{
    	$data["sex"]=0;
    }
    
    $data["both"]=I("both");	
    $data["education"]=I("education");
    $data["university"]=I("university"); 	
    $data["major"]=I("major"); 	
    $data["year"]=I("year");
    $data["month"]=I("month");
    $condition["user_id"]=session("user_id");
    $r=M("users_info")->where($condition)->save($data);
    if($r!=null){
    	json_return(1,"保存信息成功！");
    }else{
    	json_return(0,"保存信息失败");
    }
   }
   public function get_user_info(){
   	$condition["user_id"]=session("user_id");
   	$r=M("users_info")->where($condition)->find();
   	if($r!=null){
   		json_return(1,"",$r);
   	}else{
   		json_return(0,"你不是会员");
   	}
   }
}	
?>