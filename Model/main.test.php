<?php
// header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require("../Library/API.class.php");
require("../Library/AUTHORIZE.class.php");
require("../Library/Db.class.php");



/* $apiAuth
 * ======== */
$get=$_GET;
$result['status'] = "400";
$result['result'] = "";
if(!$apiAuth){
	$result['result'] = "api authorization is failed!";
	echo json_encode($result);
	exit;
}




// $db = new Db();
// $sql = "SELECT reseller_name, reseller_id, reseller_info_json, reseller_product_json, reg_date 
// 				FROM durian_reseller
// 				where reseller_id=:reseller_id";
// $params['reseller_id'] =$get['reseller_id']; 
// $data = $db->row($sql, $params);
// $data['reseller_info_json']=json_decode($data['reseller_info_json']);
// $data['reseller_product_json']=json_decode($data['reseller_product_json']);





/* API Print */
if($data){
	$result['status'] = "200";
	$result['result'] = $data;
}
echo json_encode($result);
?>