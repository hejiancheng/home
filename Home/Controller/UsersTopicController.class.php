<?php

namespace Home\Controller;
class UsersTopicController extends CommonHomeController{
    public function user_topic(){
    	if(I("topic_type")!=null && I("topic_type")!=0){
    		$condition["topic_type"]=I("topic_type");
    	}
    	$condition["state"]=3;    	
    	$num=I("num");
    	$r=M("topic")->where($condition)->order('rand()')->limit($num)->select();
    	$data=M("topic_answer_item");
    	$str_answer=array();
    	$answer=array();
    	foreach ($r as $k=>$v){
    		$con["topic_id"]=$v["id"];
    		$r_answer=$data->where($con)->order("sequence asc")->select();
    		foreach ($r_answer as $key =>$value){
    			if( $str_answer[$k]==""){
    				$str_answer[$k]=$value["content"];
    			}else{
    				$str_answer[$k]=$str_answer[$k].";".$value["content"];
    			}
    		}
    		
    	}
    	foreach ($r as $k=>$v){
    		$answe[$k]["questionId"]=$k+1;
    		$answe[$k]["questionTitle"]=$v["content"];
    		$answe[$k]["questionItems"]=$str_answer[$k];
    		$answe[$k]["topic_id"]=$v["id"];
    		$answe[$k]["questionAnswer"]=$v["topic_answer"];
    		$answe[$k]["answer_content"]=$v["answer_content"];
       }
       $data_top["content"]=json_encode($answe);
       $data_top["time"]=date("Y-m-d H:i:s");
       $data_top["user_id"]=session("user_id");
      $r_top=$this->insert_record("topic_record",$data_top);
       if($r_top!=null){
       	json_return(1);
       }else{
       	json_return(0);
       }
    }
    public function get_topic(){
    	$con["user_id"]=session("user_id");
    	$r=M("topic_record")->where($con)->order("time desc")->find();
    	if($r!=null){
    	$r_top=json_decode($r["content"]);
    	if($r_top!=null){
    		json_return(1,$r["id"],$r_top);
    	}else{
    		json_return(0,"该题库没有题目！请你重新选择！");
    	}
    	}else{
    		json_return(0,"请你重新选择！");
    	}
    	
    }
    public function submit_answer(){
    	$con["id"]=I("id");
    	$r=M("topic_record")->where($con)->find();
    	$data_d=array();
    	$data["answer"]=I("answer");
    	
    	foreach ($data["answer"] as $k =>$v){
    	   $data_d[$k]["num"]=$k;
    	   foreach ($v as $key=>$value){
    	   	if($value==1){
    	   	   if($data_d[$k]["answer"]==null){
    	   	   	$data_d[$k]["answer"]=$key+1;
    	   	   }else{
    	   	   	$data_d[$k]["answer"]=$data_d[$k]["answer"]."%".($key+1);
    	   	   }
    	   	}
    	   }
    	  
    	}
    	$data["answer"]=json_encode($data_d);
    	$data["state"]=1;
    	if($r["state"]==1){
    		json_return(1,"你已经提交过了；去看看结果吧");
    		return ;
    	}
    	$r_sub=$this->update_record("topic_record", $data, $con); 
     
      if($r_sub!=null){
      	if($this->opera_topic($con["id"]) !=null){
      		json_return(1,"提交成功！");
      	}else{
      		json_return(1,"提交成功！");
      	}
      	
      }else{
      	json_return(0,"提交失败！");
      }
    }
    
    //传入刷题id，得到本次刷题的详细答题结果
    public function opera_topic($id){
    	header("Content-Type: text/html; charset=utf-8");
    	$arr_id=$id;
    	$data=M("topic_record");
    	$arr_result=array();
    		$data_record=$data->where("id =".$arr_id)->find();
    		$content=json_decode($data_record["content"]);
    		$content =  json_decode( json_encode( $content),true);
    		$answer=json_decode($data_record["answer"]);
    		$answer=json_decode( json_encode( $answer),true);
    		foreach ($content as $k =>$v){
    			$arr_result[$k]["topic_record_id"]=$id;
    			$arr_result[$k]["topic_id"]=$v["topic_id"];
    			$ans_q=explode(",",$v["questionAnswer"]);
    			sort($ans_q);
    		    $ans_user=explode("%",$answer[$k]["answer"]); 
    		    sort($ans_user);
    		    $ans_q=explode(" ",implode($ans_q));
    		    $ans_user=explode(" ",implode($ans_user));
    		    $ans_q=implode($ans_q);
    		    $ans_user=implode($ans_user);
    		    if($ans_q==$ans_user && $ans_user !=null){
    		     $arr_result[$k]["topic_id_re"]=true;
    		    }else{
    		     $arr_result[$k]["topic_id_re"]=false;
    		    }
    			} 
       
    	return  M("topic_result")->addAll($arr_result);
    }    
 	public function get_exam_topic(){
 		$id=I("id");
 		$data=M("topic_record")->where("id=".$id)->find();
 		$content=json_decode($data["content"]);
 		$content=json_decode( json_encode( $content),true);
 		$anwser=json_decode($data["answer"]);
 		$anwser=json_decode( json_encode($anwser),true);
 		foreach ($content as $k =>$v){
 			$content[$k]["answer"]=$this->result_exam($anwser[$k]["answer"],"%");
 			$content[$k]["questionAnswer"]=$this->result_exam($content[$k]["questionAnswer"],",");
 		}
 	   json_return(1,"",$content);
   }  
   public function result_exam($str,$a){
   	 $arr=explode($a, $str);
   	 foreach ($arr as $k=>$v){
   	 	if($v==1){
   	 		$arr[$k]=A;
   	 	 }
   	 	 if($v==2){
   	 	 	$arr[$k]=B;
   	 	 }
   	 	 if($v==3){
   	 	 	$arr[$k]=C;
   	 	 }
   	 	 if($v==4){
   	 	 	$arr[$k]=D;
   	 	 }
   	 	 if($v==5){
   	 	 	$arr[$k]=E;
   	 	 }
   	 	 if($v==6){
   	 	 	$arr[$k]=F;
   	 	 }
   	 	 if($v==7){
   	 	 	$arr[$k]=G;
   	 	 }
   	 }
   	 return implode(" ",$arr);
   }
   public function  my_topic_analyze(){
   	  $user_id=session("user_id");
   	  $topic_detail=M("topic_detail_view");  
   	  $con["user_id"]=$user_id;
   	  $all_num=$topic_detail->where($con)->count(); 
   	  $con["topic_id_re"]=1;	
   	  $all_r_num=$topic_detail->where($con)->count();
      $topic_type=M("topic_type")->select();
      $data=array();
      $all_c_num=$all_num-$all_r_num;
      $i=0;
      $data["tu"][0]["name"]="一共错误题目".$all_c_num."个";
      $data["tu"][0]["value"]=$all_c_num;
      $data["tu"][1]["name"]="一共正确题目".$all_r_num."个";
      $data["tu"][1]["value"]=$all_r_num;
      foreach ($topic_type as $k=>$v){
      	$con_c["user_id"]=$user_id;
      	$con_c["topic_type"]=$v["id"];
      	$n=	$topic_detail->where($con_c)->count();
      	if($n!=0){
      	$data["tu2"][$i]["name"]=$v["name"].(number_format($n/$all_num,4)*100)."%";
      	$data["tu2"][$i]["value"]=$n;
      	$i++;
      	}
      }
      $j=0;
       foreach ($topic_type as $k=>$v){
      	$con_c["user_id"]=$user_id;
      	$con_c["topic_type"]=$v["id"];
      	$con_c["topic_id_re"]=1;
      	$n=	$topic_detail->where($con_c)->count();
      	if($n!=0){
      	$data["tu1"][$j]["name"]=$v["name"].$n."个";
      	$data["tu1"][$j]["value"]=$n;
      	$j++;
      }
      } 
      json_return(1,"",$data);
   }
}	
?>