<?php

namespace Home\Controller;

class CheckTopicController extends CommonController {

	public function index(){
		$this->parentname = "题库录入管理";
		$this->childname = "审核题目管理";
		$this->display('topic/check_topic');
	}
	public function get_type(){
			$result=M("topic_type")->select();
			json_return(1,"",$result);
	}
	public  function  get_topic(){
		  $data=M("topic");
		  if(I("id")!=null){
		  	$result=$data->where("id =".I("id"))->find();
		  	$detail=M("topic_answer_item")->where("topic_id =".I("id"))->select();
              foreach ($detail as $key => $value){
              	$result[$key]["content_answer"]=$value["content"];
              	$result[$key]["sequence"]=$value["sequence"];
              }
              
		  }else{
		    $result=$data->where("state !=0")->select();
		    foreach ($result as $k => $v){
		    	$r=M("topic_type")->where("id =".$v["topic_type"])->find();
		    	$result[$k]["topic_type"]=$r["name"];
		    	$result[$k]["state"]=$this->state($result[$k]["state"]);
		    }
		  }
		  json_return(1,"",$result);
	}
	public function state($state){
		switch ($state){
			case 0:
  				return  "未提交";
            break;
			case 1:
  				return "待审核";
  			break;
			case 2:
  				return "未通过";
  			break;
  			case 3:
  				return "通过";
  			break;
			default:
  				return "未知状态";
		}
	}

    public function  state_topic(){

    	$condition["id"]=I("id");
    	if(I("state")==1){
    		$data_topic["state"]=3;
    	}
    	if(I("state")==2){
    		$data_topic["state"]=2;
    	}
    	$topic_id=$this->update_record("topic",$data_topic,$condition);
      if($topic_id==1){
 	  	json_return(1);
 	  }else{
 	  	json_return(0,"提交失败！！");
 	  }
    }
}

?>