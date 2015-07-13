<?php 
/* To-do LIST
 * 1) 확실한 허가/인증방식 반영
 * 2) http/1.1 304: memcache, fileCache 등 API 캐싱 반영
 * 3) fileCache의 경우 CDN 연동 및 TTL 테스트!
 * 4) 로그인 세션에 대한 추가 고민: 추가적인 hash()를 통한 세밀한 세션관리!
 * */

ini_set("display_errors", false);
session_start();

$isLogin="false";
$apiAuth=false;

if(isset($_SESSION['is_login'])){
	$isLogin="true";
	$apiAuth=true;
}
?>