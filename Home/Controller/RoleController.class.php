<?php

namespace Home\Controller;

class RoleController extends CommonController {
	
	public function index(){
		$this->parentname = "权限账号管理";
		$this->childname = "角色管理";
		$this->display('Staff/role');
	}
	
	
	
	public function getoperation(){
		$data=M("role_operation");
		$roleid=I("roleid");
		$operation=$data->where("role_id=".$roleid)->select();
		echo json_encode($operation);
	}
	
	
	
	public function getrole(){
		$roleid=I('roleid');
		$date=M("role");
		if($roleid!=null)
		{
			$condition['id'] = $roleid;
			$role=$date->where($condition)->find();
		}
		else
		{
			$role=$date->select();
		}
		echo json_encode($role);
	}
	
	public function addrole(){
		$date=M("role");
		$role["name"]=I('name');
		$role["level"]=I("level");
		$date->startTrans();
		$result = $date->add($role);
		if($result>=1){
			$log_result=logrecord(CommonController::$log_type["增加"], "增加信息为“".arraytostring($role)."”的角色");
			if($log_result>=1){
				$operations=explode(",", I("operations"));
				if(!$this->addoperation($result, $operations)){
					$date->rollback();
					$result=-1;
				}
				else{
					$date->commit();
				}
			}
			else{
				$date->rollback();
				$result=-1;
			}
		}
		else{
			$date->rollback();
		}
		echo json_encode(array('num'=>$result));
	}
	
	public function updaterole(){
		$role["name"]=I('name');
		$role["level"]=I("level");
		$roleid=I("roleid");
		$condition['id'] = $roleid;
		$date=M("role");
		$roledata=$date->where($condition)->find();
		$date->startTrans();
		if($roledata["name"]!=I('name') | $roledata["level"]!=I('level'))
		{
			$result = $date->where($condition)->save($role);
		}
		else{
			$result=1;
		}
		if($result>=1){
			$log_result=logrecord(CommonController::$log_type["修改"], "修改ID为“".I('roleid')."”的角色，修改后的信息为“".arraytostring($role)."”");
			if($log_result>=1){
				$operations=explode(",", I("operations"));
				if(!$this->addoperation($roleid, $operations)){
					$result=-1;
					$date->rollback();
				}
				else{
					$date->commit();
				}
			}		
			else{
				$date->rollback();
				$result=-1;
			}
		}
		echo json_encode(array('num'=>$result));
	}
	
	private function addoperation($roleid,$operations){
		$operationdata=M("role_operation");
		$operationdata->startTrans();
		if($roleid>0){
			$condition['role_id'] = $roleid;			
 			$operationdata->where($condition)->delete();
 			$del_log_result=logrecord(CommonController::$log_type["删除"], "在role_operation表中根据条件“".arraytostring($condition)."”删除了部分记录");
 			if($del_log_result<1){
 				$operationdata->rollback();
 				return 0;
 			}
			for($i=0,$size=sizeof($operations);$i<$size;$i++){
				$role_operation["role_id"]=$roleid;
				if($operations[$i]!=""){
					$operations[$i]+=0;
					$role_operation["operation_id"]=$operations[$i];
					$value=$operationdata->add($role_operation);
					if($value<=0){
						$operationdata->rollback();
						return 0;
					}
					else{
						$log_result=logrecord(CommonController::$log_type["增加"], "增加信息为“".arraytostring($role_operation)."”的角色操作");
						if($log_result<1){
							$operationdata->rollback();
							return 0;
						}
					}
				}
			}
			$operationdata->commit();
			session('menu',null);
			session('childmenu',null);
			return 1;
		}
		else{
			$operationdata->rollback();
			return 0;
		}
	}
	
	public function deleterole(){
		$condition['id'] = I('roleid');
		$result =$this->delete_record("role", $condition);
// 		$date=M("role");
// 		$result = $date->where($condition)->delete();
// 		logrecord(CommonController::$log_type["删除"], "删除ID为“".I('roleid')."”的角色");
		echo json_encode(array('num'=>$result));
	}
}

?>