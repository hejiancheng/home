<?php

namespace Home\Controller;

use Think\Controller;
use Think\Upload;

class CommonController extends Controller {
	
	static public $log_type=array(
			'登陆'=>1, 
			'增加'=>2,
			'删除'=>3,
			'修改'=>4,
			'查询'=>5
	);
	static public $upload_type=array(
			'广告图片'=>"ad",
			'类别图片'=>"topic_type",
			'题目图片'=>"topic",
	);
	
	protected $USER_ID;
	
   function _initialize()
	{
		$this->USER_ID = session('staff_id');
		if (! isset($this->USER_ID)) {
			if(I("login_equipment")=="phone"){
				echo json_encode(array('num'=>-200));
			}
			else{
				$this->redirect("Index/index");
			}
			
		}
	}
	
	public function android_return($key = 1, $msg = "成功", $arr = array())
	{
		$json["key"] = $key;
		$json["msg"] = $msg;
		$json["array"] = $arr;
		echo json_encode($json);
	}
	
	function auto_insert_record($table,$data){
		$table_controller=M($table);
		$table_controller->startTrans();
		$result = $table_controller->add($data);
	
		if($result>=1){
			$log_result=logrecord(CommonController::$log_type['增加'], "在".$table."表增加一条记录，记录的信息为“".arraytostring($data)."”");
			if($log_result>=1){
				$table_controller->commit();
				return $result;
			}
			else{
				$table_controller->rollback();
				return 0;
			}
		}
		else{
			$table_controller->rollback();
			return 0;
		}
	}
	
	function insert_record($table,$data){
		$table_controller=M($table);
		$table_controller->startTrans();
		$result = $table_controller->add($data);
		
		if($result>=1){
			$log_result=logrecord(CommonController::$log_type['增加'], "在".$table."表增加一条记录，记录的信息为“".arraytostring($data)."”");
			if($log_result>=1){
				$table_controller->commit();
				return 1;
			}
			else{
				$table_controller->rollback();
				return 0;
			}
		}
		else{
			$table_controller->rollback();
			return 0;
		}
	}
	
	function update_record($table,$data,$condition){
		$table_controller=M($table);
		$table_controller->startTrans();
		$result = $table_controller->where($condition)->save($data);
	
		if($result>=1){
			$log_result=logrecord(CommonController::$log_type['修改'], "在".$table."表中根据条件“".arraytostring($condition)."”修改了一条记录，修改后的信息为“".arraytostring($data)."”");
			if($log_result>=1){
				$table_controller->commit();
				return 1;
			}
			else{
				$table_controller->rollback();
				return 0;
			}
		}
		else{
			$table_controller->rollback();
			return 0;
		}
	}
	
	function delete_record($table,$condition){
		$table_controller=M($table);
		$table_controller->startTrans();
		$result = $table_controller->where($condition)->delete();
	
		if($result>=1){
			$log_result=logrecord(CommonController::$log_type['删除'], "在".$table."表中根据条件“".arraytostring($condition)."”删除了部分记录");
			if($log_result>=1){
				$table_controller->commit();
				return 1;
			}
			else{
				$table_controller->rollback();
				return 0;
			}
		}
		else{
			$table_controller->rollback();
			return 0;
		}
	}
	
	public function uploadpicture($type){
		$upload = new Upload();
		$upload->autoSub = true;
		$upload->maxSize = 300000000;
		switch($type){
			case CommonController::$upload_type["加油电子表格"]:
				$upload->exts = array('xls', 'xlsx',);
				break;
			case CommonController::$upload_type["APP版本控制"]:
				$upload->exts = array('apk');
				break;
			default:
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'ico');
				break;
		}	
		$upload->saveName = time().'_'.mt_rand();
		$path = "./Public/Uploads/".$type."/";
		$upload->rootPath = $path; //设置上传的目录
		$upload->savePath = ""; //设置附件上传（子）目录
		if (!is_dir($path)){//判断目录是否存在
			mkdir($path);
		}
		$info=$upload->upload();
		$file_newname = $type."/".$info['userfile']['savepath'].$info['userfile']['savename'];
		if($type==CommonController::$upload_type["加油电子表格"]){
			$file_newname="导入成功,共导入".$this->Import_Execl($file_newname)."条记录";
		}
		switch($info['userfile']['error'])
		{
			case 0:
				echo $file_newname;
				break;
			case 1:
				echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
				break;
			case 2:
				echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
				break;
			case 3:
				echo "文件只有部分被上传";
				break;
			case 4:
				echo "没有文件被上传";
				break;
			default:
				echo $info['userfile'];
				break;
		}
	}
	
	function get_type_bydb(){
		$parentid=I("parentid");
		$date=M(I("name"));
		if($parentid!=null && $parentid!=0){
			$type=$date->where("parentid=".$parentid)->select();
		}
		else{
			$type=$date->select();
		}
		echo json_encode($type);
	}
	
	function get_type_byarray(){
		echo json_encode(C(I("name")));
	}
	
	public function check_role($operation){
		if(session("?role"))
		{
			$condition["operation_id"]=$operation;
			$condition["role_id"]=session("role");
			$role_operation=M("role_operation")->where($condition)->select();
			if(sizeof($role_operation)>0){
				return true;
			}
		}
		return false;
	}

}	
?>