<?php

namespace Home\Controller;

class AdController extends CommonController {
	public function index(){
		$this->parentname = "广告管理";
		$this->childname = "首页广告管理";
		$this->display('ad/ad');
	}
	
	//查
	public function get_ad(){
		$data=M("ad");
		$ad_condition["id"]=I("id");
		if(I("id")!=null){
			$ad=$data->where($ad_condition)->find();
		}
		else{
			$ad=$data->select();
		}
		json_return(1,"",$ad);
	}
	//增
	public function add_ad(){
		$ad["picture"]=I("picture");
		$ad["business"]=I("business");
		$ad["url"]=I("url");
		$ad["creator"]=session("staff_id");
		$ad["create_time"]=date("Y-m-d H:i:s");
		$result=$this->insert_record("ad", $ad);
		if($result==0){
			json_return(0,"添加失败");
		}
		else{
			json_return(1);
		}
	}
	//改
	public function update_ad(){
 		$condition["id"]=I("id");
 		$ad=D("ad")->create($_POST,1);
		$result=$this->update_record("ad", $ad, $condition);
		if($result==0){
			json_return(0,"更新失败");
		}
		else{
			json_return(1);
		}
	}
	//删
	public function delete_ad(){
		$condition["id"]=I("id");
		$result=$this->delete_record("ad", $condition);
		if($result==0){
			json_return(0,"删除失败");
		}
		else{
			json_return(1);
		}
	}
	
	public function upload_pic(){ 
		$this->uploadpicture(CommonController::$upload_type["广告图片"]);
	}
}

?>