<?php

namespace Home\Controller;

class AddTopicController extends CommonController {

	public function index(){
		$this->parentname = "题库录入管理";
		$this->childname = "录入题库题目管理";
		$this->display('topic/add_topic');
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
		    $result=$data->select();
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
	public function  add_topic(){
		$data=M("topic");
		$data_topic["creater"]=session("staff_id");
		$data_topic["content"]=I("add_topic_content");
		$data_topic["time"] =date("Y-m-d H:i:s");
		$data_topic["topic_type"]=I("topic_type");
		$data_topic["topic_answer"]=I("answer");
		$data_topic["picture"]=I("picture");
		$data_topic["answer_content"]=I("add_answer_content");
		$data_topic["difficult_type"]=I("difficult_type");
		$topic_id=$data->add($data_topic);
	   $sql=array();
	   if($topic_id ==null){
	   	json_return(0,"添加失败！");
	   	return ;
	   }
	   $data_answer=M("topic_answer_item");
	   $data_topic_answer_item["topic_id"]=$topic_id;
	   for ($i=0;$i<7;$i++){
	   	if($i==0 && I("add_topic_A")!=null){
	   		$data_topic_answer_item["content"]=I("add_topic_A");
	   		$data_topic_answer_item["sequence"]=$i+1;
	   		$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
	   	}
	   	if($i==1 && I("add_topic_B")!=null){
	   		$data_topic_answer_item["content"]=I("add_topic_B");
	   		$data_topic_answer_item["sequence"]=$i+1;
	   		$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
	   	}
	   	if($i==2 && I("add_topic_C")!=null){
	   		$data_topic_answer_item["content"]=I("add_topic_C");
	   		$data_topic_answer_item["sequence"]=$i+1;
	   		$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
	   	}
	   	if($i==3 && I("add_topic_D")!=null){
	   		$data_topic_answer_item["content"]=I("add_topic_D");
	   		$data_topic_answer_item["sequence"]=$i+1;
	   		$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
	   	}
	   	if($i==4 && I("add_topic_E")!=null){
	   		$data_topic_answer_item["content"]=I("add_topic_E");
	   		$data_topic_answer_item["sequence"]=$i+1;
	   		$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
	   	}
	   	if($i==5 && I("add_topic_F")!=null){
	   		$data_topic_answer_item["content"]=I("add_topic_F");
	   		$data_topic_answer_item["sequence"]=$i+1;
	   		$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
	   	}
	  	if($i==6 && I("add_topic_G")!=null){
	  		$data_topic_answer_item["content"]=I("add_topic_G");
	  		$data_topic_answer_item["sequence"]=$i+1;
	  		$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
	  	}
	   }
	  $r=transaction($sql);
	  if($r==1){
	  	json_return(1);
	  }else{
	  	json_return(0,"添加选项失败！");
	  }
	  
	}
	public function  update_topic(){
		$data_topic["creater"]=session("staff_id");
		$data_topic["content"]=I("add_topic_content");
		$data_topic["time"] =date("Y-m-d H:i:s");
		$data_topic["topic_type"]=I("topic_type");
		$data_topic["topic_answer"]=I("answer");
		$data_topic["picture"]=I("picture");
		$data_topic["state"]=0;
		$data_topic["answer_content"]=I("add_answer_content");
		$data_topic["difficult_type"]=I("difficult_type");
		$condition["id"]=I("id");
		$topic_id=$this->update_record("topic",$data_topic,$condition);
		$sql=array();
		if($topic_id !=1){
			json_return(0,"修改失败！");
			return ;
		}
		$data_answer=M("topic_answer_item");
		$condition_d["topic_id"]=I("id");
		$r_delect=$this->delete_record("topic_answer_item", $condition_d);
		$data_topic_answer_item["topic_id"]=$condition_d["topic_id"];
		for ($i=0;$i<7;$i++){
			if($i==0 && I("add_topic_A")!=null){
				$data_topic_answer_item["content"]=I("add_topic_A");
				$data_topic_answer_item["sequence"]=$i+1;
				$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
			}
			if($i==1 && I("add_topic_B")!=null){
				$data_topic_answer_item["content"]=I("add_topic_B");
				$data_topic_answer_item["sequence"]=$i+1;
				$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
			}
			if($i==2 && I("add_topic_C")!=null){
				$data_topic_answer_item["content"]=I("add_topic_C");
				$data_topic_answer_item["sequence"]=$i+1;
				$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
			}
			if($i==3 && I("add_topic_D")!=null){
				$data_topic_answer_item["content"]=I("add_topic_D");
				$data_topic_answer_item["sequence"]=$i+1;
				$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
			}
			if($i==4 && I("add_topic_E")!=null){
				$data_topic_answer_item["content"]=I("add_topic_E");
				$data_topic_answer_item["sequence"]=$i+1;
				$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
			}
			if($i==5 && I("add_topic_F")!=null){
				$data_topic_answer_item["content"]=I("add_topic_F");
				$data_topic_answer_item["sequence"]=$i+1;
				$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
			}
			if($i==6 && I("add_topic_G")!=null){
				$data_topic_answer_item["content"]=I("add_topic_G");
				$data_topic_answer_item["sequence"]=$i+1;
				$sql[$i]=$data_answer->fetchSql(true)->add($data_topic_answer_item);
			}
		}
		$r=transaction($sql);
		if($r==1){
			json_return(1);
		}else{
			json_return(0,"添加选项失败！");
		}
		 
	}
     public  function delete_topic(){
     	$condition["id"]=I("id");
     	$condition_1["topic_id"]=I("id");
 	  $r_1=$this->delete_record("topic", $condition);
 	  $r_2=$this->delete_record("topic_answer_item", $condition_1);
 	  if($r_1 ==1 && $r_2==1){
 	  	json_return(1);
 	  }else{
 	  	json_return(0,"删除失败！！");
 	  }
     }	
    public function  state_topic(){

    	$condition["id"]=I("id");
    	$data_topic["state"]=1;
    	$topic_id=$this->update_record("topic",$data_topic,$condition);
      if($topic_id==1){
 	  	json_return(1);
 	  }else{
 	  	json_return(0,"提交失败！！");
 	  }
    }
	public function upload_pic(){
			$this->uploadpicture(CommonController::$upload_type["题目图片"]);
		
	}
}

?>