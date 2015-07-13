<?php
ini_set("display_errors", false);
session_start();
header('Content-Type: application/json');
// require("../Class/Auth.class.php");
require("../DB/Db.class.php");



$get=$_POST;
$sql = "SELECT reseller_id 
				FROM durian_reseller
				where reseller_id=:reseller_id
				and reseller_pw=:reseller_pw";
$params['reseller_id'] =$get['reseller_id'];
$params['reseller_pw'] =$get['reseller_pw'];

$db = new Db(); 
$data = $db->row($sql, $params);



/* API Print */
if($data){
	/* session 생성
	 * [to-be]
	 * 나중에 session hash code = cookie 비교, 한 번 더하기!
	 * http://reseller.smartskin.co.kr/Api/login.php?reseller_id=godosoft&reseller_pw=godosoft!QAZ@WSX
	 * */
	$_SESSION['is_login'] = true;
	$_SESSION['resellerSessionId'] = $get['reseller_id'];
	$result['status'] = "200";
	$result['result'] = $data;
}else{
	$_SESSION['is_login'] = false;
	$result['status'] = "400";
	$result['result'] = "failed";
}
echo json_encode($result);
?>