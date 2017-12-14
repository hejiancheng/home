<?php

namespace Home\Controller;

use Think\Controller;
use Think\Upload;

class CommonHomeController extends Controller {
	
	static public $log_type=array(
			'登陆'=>1, 
			'增加'=>2,
			'删除'=>3,
			'修改'=>4,
			'查询'=>5
	);	
   function _initialize()
	{
		if(  session("?user_id")){
			$data_condition["id"]=session("user_id");
			$data=M("users")->where($data_condition)->find();
			$this->data=$data;
			$this->user_state=1;
		}
	}  
	//生成随机数码
	function mail_d(){
		return rand(100000,999999);
	}
	
function insert_record($table,$data){
		$conn = mysql_connect(C("db_host").':'.C('db_port'),C("db_user"),C("db_pwd")) or die ("数据连接错误!!!");
		mysql_select_db(C("db_name"),$conn);
		//开始一个事务
		mysql_query("BEGIN"); //或者mysql_query("START TRANSACTION");
		$table_controller=M($table);
		$sql = $table_controller->fetchSql(true)->add($data);
		$sql2 = log_record_home(CommonHomeController::$log_type['增加'], "在".$table."表增加一条记录，记录的信息为“".arraytostring($data)."”",$log_data["operator_id"]=1);
		$res = mysql_query($sql);
		$id=mysql_insert_id();//返回上一步 INSERT 操作产生的 ID。如果上一查询没有产生 AUTO_INCREMENT 的 ID，则 mysql_insert_id() 返回 0。
		$res1 = mysql_query($sql2);
		if($res && $res1){
			mysql_query("COMMIT");
			if($id>0){
				return $id;
			}
			else{
				return 1;
			}
		}else{
			mysql_query("ROLLBACK");
			return 0;
		}
	}
	
	function update_record($table,$data,$condition){
		$table_controller=M($table);
		$sql=array();
		$sql[0] = $table_controller->fetchSql(true)->where($condition)->save($data);
		$sql[1]=log_record_home(CommonHomeController::$log_type['修改'], "在".$table."表中根据条件“".array_to_string($condition)."”修改了一条记录，修改后的信息为“".array_to_string($data)."”");
		return transaction($sql);
	}
	
	function delete_record($table,$condition){
		$table_controller=M($table);
		$sql=array();
		$sql[0] = $table_controller->fetchSql(true)->where($condition)->delete();
		$sql[1]=log_record_home(CommonHomeController::$log_type['删除'], "在".$table."表中根据条件“".array_to_string($condition)."”删除了部分记录");
		return transaction($sql);
	}
	
	
	public function uploadpicture($type){
		$upload = new Upload();
		$upload->autoSub = true;
		$upload->maxSize = 300000000;
		switch($type){
			case CommonHomeController::$upload_type["加油电子表格"]:
				$upload->exts = array('xls', 'xlsx',);
				break;
			case CommonHomeController::$upload_type["APP版本控制"]:
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
		if($type==CommonHomeController::$upload_type["加油电子表格"]){
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

}	
?>