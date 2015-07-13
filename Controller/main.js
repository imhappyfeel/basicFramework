/* API Call : In session
 * ===================== */
if($SESSION.user_id){
	$.ajax({
		url: "/Model/main.userInfo.php",
		type: "GET",
		data:{},
		success: userInfo
	});
}


/* API Call : Not in session
 * ===================== */
$.ajax({
	url: "./Model/main.test.php",
	type: "GET",
	data:{},
	success: JavascriptTemplate
});








/* Controller
 * Extentd Util
 * ================ */
function userInfo(){
	
}

function JavascriptTemplate(data){
	var context=data;
	var source=$("#hello").html();
	var template=Handlebars.compile(source);
	
	//Helper 사용 가능
	Handlebars.registerHelper('sample_helper', function() {
		var sample_helper="status = 200";
		if(this.status==400)
			sample_helper="status = 400"
		
		return new Handlebars.SafeString(sample_helper);
	});
	
	//Merge& Print
	var html=template(context);
	$('#hello_html').html(html);
}