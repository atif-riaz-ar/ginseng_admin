var cellhtml = '';
var colNum = [];
var upline_id = $("#txtSearch").val();

$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip({
		html: true
	});
	var target = $("#txtSearch").val();
	drawGroupTree(target);
});

function goUp() {
	if (upline_id > 0) {
		window.location = BASE_URL + "network/binary/" + upline_id;
	}
}

function drawGroupTree(member_id) {
	$.ajax({
		url: API_URL + "network/admin_binary",
		type: 'POST',
		data: {
			access_token: TOKEN,
			target: member_id,
			userid: member_id,
			language: LANGUAGE,
		},
		success: function (response) {
			try {
				$("#error-msg").html('');
				if (response == "") {
					$("#error-msg").html('<div class="alert alert-danger">' + "Unknown error" + '</div>');
				} else {
					var jsonData = JSON.parse(response).data;
					$("#txtSearch").val(jsonData.top.data.userid);
					upline_id = jsonData.top.upline_id;
					cellhtml = createCell(jsonData.top.data);
					$("#cell-1-1").html(cellhtml);
					let upline = 0;
					$.each(jsonData.level2, function (key, item) {
						if (item.type == 'blank') {
							cellhtml = createEmptyCell(item.upline_userid, item.upline_side);
							$("#cell-" + 2 + "-" + item.col).html(cellhtml);
						} else if (item.type == "person") {
							cellhtml = createCell(item.data);
							$("#cell-" + 2 + "-" + item.col).html(cellhtml);
						} else {
							$("#cell-" + 2 + "-" + item.col).html("");
						}
					});
					$.each(jsonData.level3, function (key, item) {
						if (item.type == 'blank') {
							cellhtml = createEmptyCell(item.upline_userid, item.upline_side);
							$("#cell-" + 3 + "-" + item.col).html(cellhtml);
						} else if (item.type == "person") {
							cellhtml = createCell(item.data);
							$("#cell-" + 3 + "-" + item.col).html(cellhtml);
						} else {
							$("#cell-" + 3 + "-" + item.col).html("");
						}
					});
					$.each(jsonData.level4, function (key, item) {
						if (item.type == 'blank') {
							cellhtml = createEmptyCell(item.upline_userid, item.upline_side);
							$("#cell-" + 4 + "-" + item.col).html(cellhtml);
						} else if (item.type == "person") {
							colNum.push(item.col)
							cellhtml = createCell(item.data);
							$("#cell-" + 4 + "-" + item.col).html(cellhtml);
						} else {
							$("#cell-" + 4 + "-" + item.col).html("");
						}
					});
					$.each(jsonData.level5, function (key, item) {
						colNum.map((e) => {
							if (item.type == 'blank') {
								if (item.col == e * 2 - 1 || item.col == e * 2) {
									cellhtml = createEmptyCell(item.upline_userid, item.upline_side);
									$("#cell-" + 5 + "-" + item.col).html(cellhtml);
								}
							} else if (item.type == "person") {
								cellhtml = createCell(item.data);
								$("#cell-" + 5 + "-" + item.col).html(cellhtml);
							} else {
								$("#cell-" + 5 + "-" + item.col).html("");
							}
						})
					});
					colNum = [];
					var wid = ($("#binary_card").width()-$("#refreshGTB")[0].clientWidth) / 2;
					$("#refreshGTB").scrollLeft(wid)
				}
			} catch (err) {
				$("#error-msg").html('<div class="alert alert-danger">' + err + '</div>');
			}
		}
	});
}

function clickDraw(member_id) {
	$("#refreshGTB").load(location.href + " #refreshGTB");
	setTimeout(function () {
		drawGroupTree(member_id);
	}, 500)
}

function createCell(data) {
	var toolTip = createToolTip(data);
	return '<div class="grid_class group-row-box">' +
		'   <a href="#" class="att">' + toolTip +
		'   	<a class="group-ion rocket"  attri="' + data.userid + '" onclick="triggerTip(this, ' + data.userid + ')" onmouseover="triggerTip(this, ' + data.userid + ')">' +
		'			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="user" data-lucide="user" class="lucide lucide-user block mx-auto"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>' +
		'		</a>' +
		'      	<a style="cursor: pointer" href="' + BASE_URL + 'network/binary/' + data.userid + '">' +
		'          	<span>' + data.userid + '</span><br>' +
		'          	<span class="group-left-right">L : ' + data.bleft_node + '</span>' +
		'          	<span class="group-left-right"> | </span>' +
		'          	<span class="group-left-right">R : ' + data.bright_node + '</span>' +
		'      	</a>' +
		'   </a>' +
		'</div>';
}

function createEmptyCell(upline_userid, upline_side) {
	return '<div class="grid_class group-row-box"><a href="javascript:void(0)" class="att">' +
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="plus-square" data-lucide="plus-square" class="lucide lucide-plus-square block mx-auto"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>' +
		'</a></div>';
}

function createToolTip(bv) {
	var toolTip = "<p class='custom_tooltip tip_" + bv.userid + " d-none' onmouseleave='hide_tip()'>" +
		bv.f_name + " " + bv.l_name +
		'<br>- - - - - - - -<br>' +
		LABEL_ACCUMULATED + "<br>" +
		bv.accu_left_node.padEnd(8, " ") + " | " + bv.accu_right_node.padStart(9, " ") +
		'<br> <br>' +
		LABEL_TODAY_ADDITION + '<br>' +
		bv.addition_left_node.padEnd(8, " ") + " | " + bv.addition_right_node.padStart(9, " ") +
		'<br> <br>' +
		LABEL_TODAY_MATCHING + '<br>' + bv.deduction_left_node.padEnd(8, " ") + " | " + bv.deduction_right_node.padStart(9, " ") +
		'<br> <br>' +
		LABEL_TODAY_BALANCE + '<br>' +
		bv.bleft_node.padEnd(8, " ") + " | " + bv.bright_node.padStart(9, " ") + '</p>';
	return toolTip;
}

$(".rocket").on('click mousedown touchstart', function () {
	var attr = $(this).attr('attri');
	triggerTip(this, attr);
});

$(document).not("p").click(function () {
	hide_tip();
});

function hide_tip() {
	$(".custom_tooltip").addClass("d-none");
	$(".custom_tooltip").removeClass("zIndex");
}

function triggerTip(dis, userid) {
	hide_tip();
	$(".tip_" + userid).addClass("zIndex");
	$(".tip_" + userid).removeClass("d-none");
}
