<?php

function strLength($str,$charset='utf-8'){
	if($charset=='utf-8') $str = iconv('utf-8','gb2312',$str);
	$num = strlen($str);
	$cnNum = 0;
	for($i=0;$i<$num;$i++){
		if(ord(substr($str,$i+1,1))>127){
			$cnNum++;
			$i++;
		}
	}
	$enNum = $num-($cnNum*2);
	$number = ($enNum/2)+$cnNum;
	return ceil($number);
}
/**
 * 邮件发送函数
 */
    function sendMail($to, $title, $content) {
     
        Vendor('PHPMailer.PHPMailerAutoload');     
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,"尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject =$title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
        return($mail->Send());
    }
 
function logrecord($LogTypeId,$LogContent,$staff_id=""){
	$log=M("log");
	if($staff_id!=""){
		$logdata["operator_id"]=$staff_id;
	}
	else{
		if(session('staff_id')==""){
			return 0;
		}
		$logdata["operator_id"]=session('staff_id');
	}
	$logdata["type"]=$LogTypeId;
	$logdata["content"]=$LogContent;
	$logdata["time"]=date("Y-m-d H:i:s");
	$result = $log->add($logdata);
	if($result>=1){
		return 1;
	}
	else{
		return 0;
	}
}
function arraytostring($array){
	$result="";
	foreach ($array as $i=>$v){
		$str =is_array($v) ?arraytostring($v):$v;
		$result.=$i.":".$str.";";
	}
	return $result;
}
function log_record($Log_type_id,$Log_content,$staff_id=""){
	$log=M("log");
	if($staff_id!=""){
		$log_data["operator_id"]=$staff_id;
	}
	else{
		if(session('staff_id')==""){
			return "";
		}
		$log_data["operator_id"]=session('staff_id');
	}
	$log_data["type"]=$Log_type_id;
	$log_data["content"]=$Log_content;
	$log_data["time"]=date("Y-m-d H:i:s");
	$result = $log->fetchSql(true)->add($log_data);
	return $result;
}
function log_record_home($Log_type_id,$Log_content,$user_id=""){
	$log=M("log");
	if($user_id!=""){
		$log_data["operator_id"]=$user_id;
	}
	else{
		if(session('user_id')==""){
			return "";
		}
		$log_data["operator_id"]=session('user_id');
	}
	$log_data["type"]=$Log_type_id;
	$log_data["content"]=$Log_content;
	$log_data["time"]=date("Y-m-d H:i:s");
	$result = $log->fetchSql(true)->add($log_data);
	return $result;
}
function array_to_string($array){
	$result="";
	foreach ($array as $i=>$v){
		$str =is_array($v) ?array_to_string($v):$v;
		$result.=$i.":".$str.";";
	}
	return $result;
}
function array_num($arr){
	if(is_array($arr)){
		foreach($arr as $value){
			if(!is_array($value)){
				return 1;
			}

		}
		return 2;
	}
	else{
		return 0;
	}
}

function json_return($key = 1, $msg = "成功", $arr = array())
{
	$json["key"] = $key;
	$json["msg"] = $msg;
	if(isset($arr)){
		if(array_num($arr)==2)
		{
			$json["array"] = $arr;
		}
		else{
			$array=array();
			$array[0]=$arr;
			$json["array"] = $array;
		}
	}
	else{
		$json["array"] = $arr;
	}
	echo json_encode($json);
}

function transaction($sql_list){
	$conn = mysql_connect(C("db_host"),C("db_user"),C("db_pwd")) or die ("数据连接错误!!!");
	mysql_select_db(C("db_name"),$conn);
	//开始一个事务
	mysql_query("BEGIN"); //或者mysql_query("START TRANSACTION");
	if(is_array($sql_list)){
		$sql=array();
		for($i=0;$i<sizeof($sql_list);$i++){
			$sql[$i]=mysql_query($sql_list[$i]);
		}
		foreach ($sql as $value){
			if(!$value){
				mysql_query("ROLLBACK");
				return 0;
			}
		}
		mysql_query("COMMIT");
		return 1;
	}
	return 0;
}
function mysql_execProc($procname){
	$conn = mysql_connect(C("db_host"), C("db_user"), C("db_pwd"));
	if( $conn === false )
	{
		echo "Unable to connect.</br>";
		die( print_r( mysql_error(), true));
	}
	mysql_select_db('hlt',$conn);
	$result = mysql_query("call ".$procname);
	mysql_close();
	return $result;
}
?>