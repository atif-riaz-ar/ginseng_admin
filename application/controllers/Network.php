<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Network extends CI_Controller
{
	public function binary($userid = "")
	{
		$data = array();
		$data['txtSearch'] = $userid == "" ? (isset($_POST['txtSearch']) ? $_POST['txtSearch'] : "1000000") : $userid;
		userTemplate("pages/network/binary", $data);
	}

	public function sponsored($userid = "")
	{
		$req['access_token'] = $_SESSION['userSession'];
		$req['target'] = ($userid == "" ? "1000000" : $userid);
		if (isset($_POST['txtSearch'])) {
			$req['target'] = $data['txtSearch'] = $_POST['txtSearch'];
		}
		$response = post_curl("network/admin_sponsored", $req);
		$data['members'] = $response['data'];
		userTemplate("pages/network/sponsored", $data);
	}
}
