/* ===========================================================================================
 * Util & Object
 * 날짜 관련 : moment.js
 * - 힘을 합쳐서 더 큰 유틸리티 모음집을 만들어봐요~
 * - 좋은 library 있으면 공유/검토/반영을 해봐요!
 * =========================================================================================== */
function Util () {}

/* Properties 모음집
 * ================
 * */
Util.userAgent = navigator.userAgent;
Util.cookie = document.cookie;
Util.host = location.host;
Util.currentUrl = location.href;



/* 유틸리티 Function 모음집
 * =====================
 * */
Util.alert = function(msg){
	//To-be: 필요시 native alert 버리기!
	alert(msg);
};

Util.confirm = function(msg){
	var r=confirm(msg);
	if (r==true){
	    return true;
	}else{
		return false;
	}
};

Util.random = function(min,max) {
    return Math.floor((Math.random() * max) + min);
};

Util.setCookie = function(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
};

Util.comma = function(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
};

Util.uncomma = function(str) {
	str = String(str);
    return str.replace(/[^\d]+/g, '');
};

Util.ratio = function(value) {
	return value*100;
};

Util.getParameter = function(url, name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(url);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
};




/* ===========================================================================================
 * Action Area - 모두 모두 모두 실행!
 * =========================================================================================== */
if($SESSION.is_login){
	isLogin($SESSION.is_login);
}

navigationIndex($GET.view);

if($SESSION.resellerSessionId){
	idPrints(
		[".sessionId"]
	);
}

$('#login').click(function(){
	var action=false;
	var val={};
	val.id=$('#id').val();
	val.pw=$('#pw').val();
	
	var x;
	for (x in val) {
	    if(val[x].length<1){
	    	Util.alert('값이 없습니다.');
	    	action=false;
	    }else{
	    	action=true;
	    }
	}
	if(action){
		login(val.id, val.pw);
	}
})




/* ===========================================================================================
 * Common & All Page - function & Class
 * =========================================================================================== */
function idPrints(arr){
	$(arr).each(function(i){
		$(arr[i]).text($SESSION.resellerSessionId);
	});
}
function isLogin(val){
	if(!val===true){
		
	}
}

function login(id,pw){
	$.ajax({
		url: "/Api/login.php",
		type: "POST",
		data:{
			reseller_id:id,
			reseller_pw:pw,
		},
		success: function(data){
			if(data.status=="200"){
				Util.alert(data.result.reseller_id+"님 안녕하세요.");
				location.replace(Util.currentUrl);
			}else{
				Util.alert("계정정보가 올바르지 않습니다.");
			}
		}
	});
}

function logout(msg){
	if(msg){
		Util.alert(msg);
	}
	location.href="/Api/logout.php";
}

function navigationIndex(page){
	if(!page){
		$('.navbar-nav li:first-child').addClass("active");
		return false;
	}
	$('.navbar-nav li').each(function(){
		var el=$(this);
		var pIndex=el.attr('data-pageIndex')
		if(page==pIndex)
			el.addClass("active");
	});
}