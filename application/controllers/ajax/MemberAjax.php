<?php

class MemberAjax extends CI_Controller
{
	public function details($userid)
	{
		$req['access_token'] = $_SESSION['userSession'];
		$req['userid'] = $userid;
		$response = post_curl("admin/members/get", $req);
		$data['modal_body'] = $this->load->view("contents/user_details", $response, true);
		$this->load->view("modals/general", $data);
	}
}
