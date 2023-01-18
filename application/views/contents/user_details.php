<?php
$member_detail = $data['member_detail'];
$banks = $data['banks'];
$reports = $data['reports'];
?>
<div class="p-5 model_content border-b border-slate-200/60 dark:border-darkmode-400 rounded-md">


	<div id="faq-accordion-1" class="accordion border-b border-slate-200/60 dark:border-darkmode-400">
		<?php $this->load->view("contents/user_details/member_info", array('member_detail' => $member_detail)); ?>
		<?php $this->load->view("contents/user_details/balances", array('reports' => $reports)); ?>
		<?php $this->load->view("contents/user_details/bank", array('banks' => $banks)); ?>
		<?php $this->load->view("contents/user_details/summaries", array('reports' => $reports)); ?>
		<?php $this->load->view("contents/user_details/account_info", array('reports' => $reports)); ?>
	</div>


</div>
