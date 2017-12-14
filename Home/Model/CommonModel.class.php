<?php

namespace Home\Model;

use Think\Model;

class CommonModel extends Model {
	
	protected $_auto = array(
			array('entry_time','mydate','1','callback'),
			array('staff_id','mystaff','1','callback')
	);
	
	protected function mydate(){
		return date("Y-m-d H:i:s");
	}
	
	protected function mystaff(){
		return session('staff_id');
	}
	
	public function getSql(){
		$fields=array();
		$values=array();
		foreach ($this->data as $key=>$val){
			$fields[] = $key;
			$values[] = $val;
		}
		return "Insert into [" . $this->getTableName() .'] (['.implode('],[', $fields).']) VALUES (\''.implode('\',\'', $values).'\')';
	}
}

?>