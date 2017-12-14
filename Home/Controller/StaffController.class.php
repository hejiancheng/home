<?php

namespace Home\Controller;

class StaffController extends CommonController {
	
	
	public function index(){
		$this->parentname = "权限账号管理";
		$this->childname = "账号管理";
		$this->display('staff/staff');
	}
	
	
	
	
	
	public function getstaff(){
		$data=M("staff_view");
		$staff_condition["id"]=I("id");
		if(I("id")!=null){
			
			$staff=$data->where($staff_condition)->find();
			echo json_encode($staff);
			return ;
		}
		$staff=$data->where("id <> '".session('staff_id')."'")->select();
		echo json_encode($staff);
	}
	
	public function add(){
		$data=M("staff");
		$staff_condition["id"]=I("id");
		if(I("id")!=null){
				
			$staff=$data->where($staff_condition)->find();
			if($staff!=null){
				echo json_encode(array('num'=>-1));
				return;
			}
		}
		$staff["id"]=I("id");
		$staff["name"]=I("name");
		$staff["role"]=I("role");
		$staff["password"]=md5(I("id"));
		$result=$this->insert_record("staff", $staff);
		echo json_encode(array('num'=>$result));
	}
	
	public function modify(){
		$condition["id"]=I("id");
		$staff=M("staff")->where($condition)->find();
		if($staff["name"]==I("name") && $staff["role"]==I("role")){
			echo json_encode(array('num'=>1));
		}
		else{
			$staff["name"]=I("name");
			$staff["role"]=I("role");
			$result=$this->update_record("staff", $staff, $condition);
			echo json_encode(array('num'=>$result));
		}
	}
	//删除员工信息
	public function delete(){
		$condition["id"]=I("id");
		$result=$this->delete_record("staff", $condition);
		echo json_encode(array('num'=>$result));
	}

	public function unlockstaff(){
		$condition["id"]=I("id");
		$staff["lock"]=0;
		$staff["login_error_num"]=0;
		$result=$this->update_record("staff", $staff, $condition);
		echo json_encode(array('num'=>$result));
	}
	
	public function init_pw_staff(){
		$condition["id"]=I("id");
		$staff=M("staff")->where($condition)->find();
		if($staff["password"]==md5(I("id"))){
			echo json_encode(array('num'=>1));
		}
		else{	
			$staff["password"]=md5(I("id"));
			$result=$this->update_record("staff", $staff, $condition);
			echo json_encode(array('num'=>$result));
		}
	}
}

?>