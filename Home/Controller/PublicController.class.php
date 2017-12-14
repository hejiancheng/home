<?php

namespace Home\Controller;

class PublicController extends CommonController {
	
	public function home(){
		$this->parentname = "首页";
		$this->childname = "首页";
		$this->display('staff/staff');
	}
	
	public function getuserinfo(){
		if(!session("?staff_name")){
			$date=M("staff");
			//从session中获取
			$condition['id'] = session('staff_id');
			$name=$date->where($condition)->getField('name');
			session("staff_name",$name);
		}
		echo json_encode(session("staff_name"));
	}
	
	//清除session并退出系统
	public function logout(){
		session('[start]');
		session('[destroy]');
		$this->redirect("Index/index");
	}
	
	public function updatepassword(){
		$oldpassword=I('oldpassword');
		$newpassword=I('newpassword');
		$date=M("staff");
		$condition['id'] = session("staff_id");
		$staff=$date->where($condition)->find();
		if($staff==null){
			echo json_encode(array('num'=>-1));
			return;
		}
		else{
			if($staff["password"]!=$oldpassword){
				echo json_encode(array('num'=>-2));
			}
			else{
				$new_staff["password"]=$newpassword;
				$new_staff["last_login_time"]=date("Y-m-d H:i:s");
				$new_staff["last_login_ip"]=get_client_ip();
				$result=$this->update_record("staff", $new_staff, $condition);
				echo json_encode(array('num'=>$result));
			}
		}
	}
	public function uploadpic(){
		$this->uploadpicture(CommonController::$upload_type["数字签名"]);
	}
	
	public function getstaffoperation(){
		if(I("parent_id")==null){
			if(session("?menu")){
				echo json_encode(session("menu"));
				return;
			}
		}
		else{
			if(session("?childmenu.".I("parentid"))){
				echo json_encode(session("childmenu.".I("parentid")));
				return;
			}
		}
		$staffdata=M("staff");
		$staffcondition['id'] = session("staff_id");
		$staff=$staffdata->where($staffcondition)->find();
		$roleid=$staff["role"];
		if($staff==null){
			return;
		}
		else{
			$operationdata=M("operation");
			$operationcondition['parent_id'] = I("parentid");
			$operation=$operationdata->where($operationcondition)->order('sequence')->select();
			for($i = 0, $size = sizeof($operation); $i < $size; ++$i)
			{
				$num=$this->getoperationnum($roleid, $operation[$i]["id"]);
				if($num>0){
					$operationnodes[$i]["id"]=$operation[$i]["id"];
					$operationnodes[$i]["url"]=$operation[$i]["url"];
					$operationnodes[$i]["name"]=$operation[$i]["name"];
				}
			}
			if(I("parentid")==null){
				session("menu",$operationnodes);
			}
			else{
				session("childmenu.".I("parentid"),$operationnodes);
			}
		}
		echo json_encode($operationnodes);
	}
	
	private function getoperationnum($roleid,$operationid){
		$operationdata=M("operation");
		$operationcondition['id'] = $operationid;
		$operation=$operationdata->where($operationcondition)->find();
		if($operation!=null){
			$role_operationdata=M("role_operation");
			if($operation["parent_id"]==0){
				$childcondition['parent_id'] = $operationid;
				$childoperations=$operationdata->where($childcondition)->select();
				$num=0;
				$size=sizeof($childoperations);
				for($i=0;$i<$size;$i++){
					$role_operationcondition["role_id"]=$roleid;
					$role_operationcondition["operation_id"]=$childoperations[$i]["id"];
					if($role_operationdata->where($role_operationcondition)->count()>0){
						$num++;
					}
				}
				if($num==0){
					return 0;
				}elseif ($num==$size){
					return 1;
				}
				return 2;
			}
			else{
				$role_operationcondition["role_id"]=$roleid;
				$role_operationcondition["operation_id"]=$operationid;
				return $role_operationdata->where($role_operationcondition)->count();
			}
		}
		else{
			return 0;
		}
	}
}

?>