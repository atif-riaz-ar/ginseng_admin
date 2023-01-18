<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Members extends CI_Controller
{
	public function index()
	{
		$data = array();
		$data['access_token'] = $_SESSION['userSession'];
		$data["per_page"] = $this->config->item('per_page');
		$data["page"] = isset($_GET['page'])? $_GET['page'] : 1;
		$data["userid"] = isset($_GET['userid'])? $_GET['userid'] : "";
		$response = post_curl("admin/members/all", $data);
		$data['list'] = $response['data']['result'];
		$data['counter'] = $response['data']['counter'];
		$data['query'] = "?userid=" . $data['userid'] . "&";
		userTemplate("pages/members/list", $data);
	}

	public function add()
	{
		$data = array();
		if (isset($_POST['sponsor'])) {
			$req['access_token'] = $_SESSION['userSession'];
			$req['userid'] = $_POST['sponsor'];
			$response = post_curl("admin/members/get", $req);
			if (isset($response['data']['member_detail'])) {
				$_SESSION['temp_sponsor'] = $response['data']['member_detail'];
				userTemplate("pages/members/add/step2", $data);
				exit;
			} else {
				$_SESSION['alert'] = array(
					"class" => "danger",
					"content" => "[[LABEL_INVALID_SPONSOR]]"
				);
				userTemplate("pages/members/add/step1", $data);
				exit;
			}
		}
		if (isset($_POST['matrixid'])) {
			$_SESSION['temp_signdata'] = $_POST;
			$req['access_token'] = $_SESSION['userSession'];
			$req['userid'] = $_POST['matrixid'];
			$response = post_curl("admin/members/get", $req);
			if (isset($response['data']['member_detail'])) {
				$_SESSION['temp_placement'] = $response['data']['member_detail'];

				$reqt['access_token'] = $_SESSION['userSession'];
				$reqt['matrix'] = $_POST['matrixid'];
				$reqt['side'] = $_POST['matrix_side'];
				$data = post_curl("member/placement", $reqt)['data'];
				$req['access_token'] = $_SESSION['userSession'];
				$form = post_curl("member/signup", $req);
				$data['packages'] = $form['data']['packages'];
				userTemplate("pages/members/add/step3", $data);
				exit;
			} else {
				$_SESSION['alert'] = array(
					"class" => "danger",
					"content" => "[[LABEL_INVALID_PLACEMENT]]"
				);
				userTemplate("pages/members/add/step2", $data);
				exit;
			}
		}
		if (isset($_POST['f_name'])) {
			$gateway = $_POST['payment_gateway'];
			if ($gateway == "E-WALLET") {
				$req['access_token'] = json_encode($_SESSION['userSession']);
				$req['signup_data'] = json_encode($_POST);
				$order = post_curl("member/ewallet", $req);
				unset($_POST);
				$_SESSION['order_response'] = $order;
				redirect(base_url("members/response"));
				exit;
			}

			if (isset($response['data']['member_detail'])) {
				$_SESSION['temp_placement'] = $response['data']['member_detail'];

				$reqt['access_token'] = $_SESSION['userSession'];
				$reqt['matrix'] = $_POST['matrixid'];
				$reqt['side'] = $_POST['matrix_side'];
				$data = post_curl("member/placement", $reqt)['data'];
				$req['access_token'] = $_SESSION['userSession'];
				$form = post_curl("member/signup", $req);
				$data['packages'] = $form['data']['packages'];
				userTemplate("pages/members/add/step3", $data);
				exit;
			} else {
				$_SESSION['alert'] = array(
					"class" => "danger",
					"content" => "[[LABEL_INVALID_PLACEMENT]]"
				);
				userTemplate("pages/members/add/step3", $data);
				exit;
			}
		}
		userTemplate("pages/members/add/step1", $data);
	}

	public function response()
	{
		unset($_SESSION['temp_sponsor']);
		unset($_SESSION['temp_placement']);
		$data['return'] = $_SESSION['order_response'];
		userTemplate("pages/members/add/response", $data);
	}

	public function edit($userid)
	{
		if(isset($_POST['mobile'])){
			$req = $_POST;
			$req['access_token'] = $_SESSION['userSession'];
			post_curl("admin/members/update/". $userid, $req);
			$_SESSION['alert'] = array(
				"class" => "success",
				"content" => "[[LABEL_MEMBER_UPDATED]]"
			);
			redirect(base_url("members/edit/".$userid));
			exit;
		}
		$req['access_token'] = $_SESSION['userSession'];
		$req['userid'] = $userid;
		$data = post_curl("admin/members/get", $req)['data'];
		userTemplate("pages/members/edit", $data);
	}

}
