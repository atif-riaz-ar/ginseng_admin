function openTagForm(id) {
	$("#chinese").val($(".cn_" + id).html());
	$("#english").val($(".en_" + id).html());
	$("#target_row").val(id);
	$("#tag_content").addClass("show");
}

$("#save_btn").click(function (){
	$.ajax({
		type: "POST",
		url: API_URL + "admin/tags/update",
		data: {
			access_token: TOKEN,
			language: LANGUAGE,
			chinese: $("#chinese").val(),
			english: $("#english").val(),
			id: $("#target_row").val(),
		},
		success: function (data) {
			var id = $("#target_row").val();
			$(".cn_" + id).html($("#chinese").val());
			$(".en_" + id).html($("#english").val());
			$("#tag_content").removeClass("show");
		}
	});
})
