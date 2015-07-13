<?php
ini_set("display_errors", false);
header('Content-Type: application/json');

session_start();
session_destroy();
header('Location: '.$_SERVER['HTTP_REFERER']);

// $result['status'] = "200";
// $result['result'] = "logout Success!";
// if(isset($_SESSION['is_login'])){
// 	$result['status'] = "400";
// 	$result['result'] = $_SESSION;
// }
// echo json_encode($result);
?>