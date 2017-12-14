<?php

namespace Home\Controller;

class TopicTypeController extends CommonController {

	public function index(){
		$this->parentname = "题库录入管理";
		$this->childname = "录入题库类别管理";
		$this->display('topic/topic_type');
	}
	
	public function get_topic_type(){
		$data=M("topic_type");
		$topic_condition["id"]=I("id");
		if(I("id")!=null){
			$topic=$data->where($topic_condition)->find();
		}
		else{
			$topic=$data->select();
		}
		json_return(1,"",$topic);
	}
	
	public function add_topic_type(){
		$data=M("topic_type");
		$topic["name"]=I("name");
		$topic["picture"]=I("picture");
		$topic["content"]=I("content");
		$result=$this->insert_record("topic_type", $topic);
		if($result==0){
			json_return(0,"添加失败");
		}
		else{
			json_return(1);
		}
	}
	
	public function update_topic_type(){
		$condition["id"]=I("id");
		$topic=M("topic_type")->where($condition)->find();
		if($topic["name"]==I("name")&& $topic["picture"]==I("picture")){
			json_return(1);
		}
		else{
			$topic["name"]=I("name");
			$topic["picture"]=I("picture");
			$topic["content"]=I("content");
			$result=$this->update_record("topic_type", $topic, $condition);
			if($result==0){
				json_return(0,"修改失败");
			}
			else{
				json_return(1);
			}
		}
	}
	//删除员工信息
	public function delete_topic_type(){
		$condition["id"]=I("id");
		$result=$this->delete_record("topic_type", $condition);
		if($result==0){
			json_return(0,"删除失败");
		}
		else{
			json_return(1);
		}
	}
	public function upload_pic(){
		$this->uploadpicture(CommonController::$upload_type["类别图片"]);
	}
	
	
	
}

?>