$("#chk_box").change(function(){
	if($("#chk_box").prop('checked') == true){
		$(".checkbox").prop('checked', true);
	} else {
		$(".checkbox").prop('checked', false);
	}
})
