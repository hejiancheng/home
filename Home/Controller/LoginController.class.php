<?php

namespace Home\Controller;

class LoginController {
	public function staffinit(){
		$date=M("staff");
		$condition['role'] = C("系统管理员");
		$num=$date->where($condition)->count();
		if($num==0){
			$staff["id"]="admin";
			$staff["password"]=md5("admin");
			$staff["name"]="系统管理员";
			$staff["role"]=C("系统管理员");
			$result = $date->add($staff);
			if($result==1){
				return 1;
			}
			else{
				return 0;
			}
		}
		else{
			return 1;
		}
	}
	
	public function login(){
		if($this->staffinit()){
			$date=M("staff");
			$date->startTrans();
			$condition['id'] = I("staff_id");
			$staff=$date->where($condition)->find();
			if($staff==null){
				if(I("login_equipment")=="phone"){
					$this->android_return("0","用户名或密码错误");
				}
				else{
					echo json_encode(array('num'=>-1));
				}
				return;
			}
			else{
				if($staff["lock"]==1){
					if(I("login_equipment")=="phone"){
						$this->android_return("0","用户名或密码错误");
					}
					else{
						echo json_encode(array('num'=>-2));
					}
					return;
				}
				if($staff["password"]!=I("staff_password")){
					$staff["last_login_time"]=date("Y-m-d H:i:s");
					$staff["last_login_ip"]=get_client_ip();
					$staff["login_error_num"]=$staff["login_error_num"]+1;
					if($staff["login_error_num"]>=5){
						$staff["lock"]=1;
					}
					$result = $date->where($condition)->save($staff);
					if($result>=1){
						$log_result=logrecord(CommonController::$log_type["登陆"], "密码错误，登陆IP为：".$staff["last_login_ip"],$staff["id"]);
						if($log_result<1){
							$date->rollback();
							if(I("login_equipment")=="phone"){
								$this->android_return("0","系统连接问题，请重试或联系开发人员");
							}
							else{
								echo json_encode(array('num'=>0));
							}
						}
						else{
							$date->commit();
							if(I("login_equipment")=="phone"){
								$this->android_return("0","用户已锁定，请与管理人员联系解锁");
							}
							else{
								echo json_encode(array('num'=>-2));
							}
						}
					}
					else{
						$date->rollback();
						if(I("login_equipment")=="phone"){
							$this->android_return("0","系统连接问题，请重试或联系开发人员");
						}
						else{
							echo json_encode(array('num'=>0));
						}
					}
					return;
				}
				else{
					$staff["last_login_time"]=date("Y-m-d H:i:s");
					$staff["last_login_ip"]=get_client_ip();
					$staff["login_error_num"]=0;
					$result = $date->where($condition)->save($staff);
					if($result>=1){
						session('staff_id',I("staff_id"));
						session("staff_name",$staff["name"]);
						session("role",$staff["role"]);
						$log_result=logrecord(CommonController::$log_type["登陆"], "登陆成功，登陆IP为：".$staff["last_login_ip"]);
						if($log_result<1){
							$date->rollback();
							if(I("login_equipment")=="phone"){
								$this->android_return("0","系统连接问题，请重试或联系开发人员");
							}
							else{
								echo json_encode(array('num'=>0));
							}
						}
						else{
							
							$date->commit();
							if(I("login_equipment")=="phone"){
							$json["key"]                = 1;
							$json["msg"]                = "";
							$json["role"]                = $staff["role"];
							$json["cookie"]                = session_id();
							echo json_encode($json);
							}
							else{
								echo json_encode(array('num'=>$result));
							}
						}
	
					}
					else{
						$date->rollback();
						if(I("login_equipment")=="phone"){
							$this->android_return("0","系统连接问题，请重试或联系开发人员");
						}
						else{
							echo json_encode(array('num'=>0));
						}
					}
					return;
				}
			}
		}
		else{
			if(I("login_equipment")=="phone"){
				$this->android_return("0","系统连接问题，请重试或联系开发人员");
			}
			else{
				echo json_encode(array('num'=>0));
			}
		}
	}
}

?>