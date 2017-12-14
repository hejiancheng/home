<?php

namespace Home\Controller;

class OperationController extends CommonController {
	
	
	public function index(){
		
		$this->parentname = "权限账号管理";
		$this->childname = "模块管理";
		$this->display('Staff/operation');
	}
	
	public function getoperation(){
		$id=I('id');
		$date=M("operation");
		if($id!=null)
		{
			$condition['id'] = $id;
			$condition_operation=$date->where($condition)->find();
		}
		else
		{
			$condition['parent_id'] = 0;
			$condition_operation=$date->where($condition)->order('sequence')->select();
		}
		echo json_encode($condition_operation);
	}
	
	public function getallchildoperation(){
		if(session("?allchildoperation")){
			echo json_encode(session("allchildoperation"));
		}
		else{
			$date=M("operation");
			$alloperation=$date->order('sequence')->select();
			for($i = 0, $size = sizeof($alloperation); $i < $size; ++$i)
			{
				$operationnodes[$i]["id"]=$alloperation[$i]["id"];
				$operationnodes[$i]["pId"]=$alloperation[$i]["parent_id"];
				$operationnodes[$i]["name"]=$alloperation[$i]["name"];
			}
			session("allchildoperation",$operationnodes);
			echo json_encode($operationnodes);
		}
	}
	
	public function getchildoperation(){
		$parentid=I('parentid');
		$date=M("operation");
		if($parentid!=null)
		{
			$condition['parent_id'] = $parentid;
			$operation=$date->where($condition)->order('sequence')->select();
			echo json_encode($operation);
		}
	}
	
	private function getchildnum($parentid){
		$date=M("operation");
		if($parentid!=null)
		{
			$condition['parent_id'] = $parentid;
			$num=$date->where($condition)->count();
			return $num;
		}
	}
	
	public function addoperation(){
		$operation["name"]=I('name');
		$operation["sequence"]=I('sequence');
		$operation["url"]=I('url');
		$operation["parent_id"]=I('parentid');
		$result=$this->insert_record("operation",$operation);
		if($result==1){
			session('menu',null);
			session('childmenu',null);
			session("allchildoperation",null);
		}
		echo json_encode(array('num'=>$result));
	}
	
	public function updateoperation(){
		$operation["name"]=I('name');
		$operation["sequence"]=I('sequence');
		$operation["url"]=I('url');
		$condition['id'] = I('id');
		$result =$this->update_record("operation", $operation, $condition);
		if($result==1){
			session('menu',null);
			session('childmenu',null);
			session("allchildoperation",null);
		}
		echo json_encode(array('num'=>$result));
	}
	
	public function deleteoperation(){
		$parentid=I('id');
		$childnum=$this->getchildnum($parentid);
		if($childnum>0)
		{
			echo json_encode(array('num'=>-1));
		}
		else
		{
			$condition['id'] = I('id');
			$result=$this->delete_record("operation", $condition);
			if($result==1){
				session('menu',null);
				session('childmenu',null);
				session("allchildoperation",null);
			}
			echo json_encode(array('num'=>$result));
		}
	}
}

?>