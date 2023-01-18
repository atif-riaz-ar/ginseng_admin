$(document).ready(function(){
	$("input").attr("autocomplete", "off");
});

function trigger_notify(){
	Toastify({
		node: $("#notification_body").clone().removeClass("hidden")[0],
		duration: -1,
		newWindow: true,
		close: true,
		gravity: "top",
		position: "right",
		stopOnFocus: true,
	}).showToast();
}

function getUserDetails(ud = null){
	if(ud == null) {
		userid = $("#txtSearch").val();
	} else {
		userid = ud;
	}
	$.ajax({
		type: "POST",
		url: BASE_URL + "ajax/memberajax/details/"+userid,
		data: {
			access_token: TOKEN,
			userid: userid,
			language: LANGUAGE,
		},
		success: function (data) {
			console.log(data);
			$("#render_data").html(data);
			$("#modal_content").addClass("show");
		}
	});
}
