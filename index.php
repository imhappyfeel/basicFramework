<?php
/* ====================================================
 * Uneedcomms Co.,Ltd
 * 2015-07-09
 * Simple web Service framework
 * ====================================================
 * [.htaccess: 필요 시]
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php?view=/$1 [QSA,L]
</IfModule>
 * ====================================================
 * [Main Page Example]
 * http://localhost/basicFramework/?view=main
 * ====================================================
 * */
require("./Library/API.class.php");
require("./Library/AUTHORIZE.class.php");

$get=$_GET;
$getJson=json_encode($get);
$postJson=json_encode($_POST);
$cookieJson=json_encode($_COOKIE);



/* User info - Policy 대부분은 Session에 저장함
 * ex) user_id, user_name, policies
 * ========================================
 * */

if(!$_SESSION)
	$session=[];
$sessionJson=json_encode($session);




/* Title 정의
 * Page Controller 정의
 * Dynamic Js Controller 정의 */
$view=$get['view'];
$title="uneedcomms";
$DynamicJs="main";
$include_uri="./View/main.html";
if($view){
	$include_uri="./View/$view.html";
	$title.=" > ".$view;
	$DynamicJs=$view;
}
?>
<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://smartskin.co.kr/images/favicon.ico">
    <title><?=$title?></title>
    <link href="./Res/dist/css/bootstrap.css" rel="stylesheet">
<!--     <link href="./Res/dist/css/bootstrap-theme.css" rel="stylesheet"> -->
<!--     <link href="./Res/dist/css/theme.css" rel="stylesheet"> -->
    
    <!-- Smartskin Custom & Misc Css -->
    <link href="./Res/dist/css/custom.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
			var $GET=<?=$getJson?>;
			var $POST=<?=$postJson?>;
			var $COOKIE=<?=$cookieJson?>;
			var $SESSION=<?=$sessionJson?>;
    </script>
  </head>

  <body role="document">
  
  	
  	<!-- HEADER -->
  	<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					
					Header
					
				</div>
			</div>
		</div>
  	
  	
  	<?php include($include_uri); ?>
  	
		
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					
					Footer
					
				</div>
			</div>
		</div>
		
		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    
    <script src="./Res/dist/js/bootstrap.min.js"></script>
    <script src="./Res/assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- exteral Library -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
		<!-- javasript templates -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
    <script src="./Res/js/common.Util.js"></script>
    
    <!-- Dynamic js Controller (Scope) : 항상 최 하단! -->
    <script src="./Controller/<?=$DynamicJs?>.js"></script>
  </body>
</html>