<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
	public function system()
	{
		$data = array();
		if (count($_POST) > 0) {
			foreach ($_POST['data'] as $id => $d){
				foreach ($d as $col => $value){
					$req[$col.'_'.$id] = $value;
				}
			}
			$response = post_curl("admin/settings/add", $req);
			if ($response['response'] == "success") {
				$_SESSION['alert'] = array(
					"class" => "success",
					"content" => "[[LABEL_RECORD_UPDATE]]"
				);
			} else {
				$_SESSION['alert'] = array(
					"class" => "danger",
					"content" => "[[LABEL_RECORD_FAILED]]"
				);
			}
			redirect(base_url("settings/system"));
			exit;
		}
		$req['access_token'] = $_SESSION['userSession'];
		$response = post_curl("admin/settings/all", $req);
		$data['list'] = $response['data'];
		userTemplate("pages/settings/list", $data);
	}
}
