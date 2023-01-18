<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
	<h2 class="text-lg font-medium mr-auto">
		[[LABEL_MEMBERS_ADD]]
	</h2>
	<div class="w-full sm:w-auto flex mt-4 sm:mt-0">
		<a href="<?php echo base_url("members"); ?>" class="btn btn-primary shadow-md mr-2">[[LABEL_MEMBERS_LIST]]</a>
	</div>
</div>
<div class="intro-y box mt-5">
	<div class="p-10 overflow-auto">
		<div class="p-5">
			<?php $this->load->view("includes/alert"); ?>
			<div class="preview">
				<form method="post">
					<div class="input-form">
						<input id="sponsor" type="text" name="sponsor" class="form-control" placeholder="[[SPONSOR]]" required>
					</div>
					<button type="submit" class="btn btn-primary mt-5">[[GET_DETAILS]]</button>
				</form>
			</div>
		</div>
	</div>
</div>
