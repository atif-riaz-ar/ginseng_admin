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
					<div class="input-form mt-5">
						<label for="user">[[SPONSOR]]</label>
						<input type="text" id="user" name="user" class="form-control"
							   value="<?php echo $_SESSION['temp_sponsor']['userid'] ?>" readonly>
						<input type="hidden" name="id" value="<?php echo $_SESSION['temp_sponsor']['id'] ?>">
					</div>

					<div class="input-form mt-5">
						<label for="matrixid">[[PLACEMENT]]</label>
						<input id="matrixid" type="text" name="matrixid" class="form-control"
							   placeholder="[[PLACEMENT]]" required>
					</div>

					<div class="input-form mt-5">
						<label for="matrix_side">[[MATRIX_SIDE]]</label>
						<select required id="matrix_side" name="matrix_side" class="form-control">
							<option value="L">[[LEFT]]</option>
							<option value="R">[[RIGHT]]</option>
							<option value="A">[[AUTO]]</option>
						</select>
					</div>

					<div class="input-form mt-5">
						<label for="user">[[DOWNLINE_TYPE]]<br></label>
						<input type="radio" name="downline_type" id="downline_type_0" value="0" checked="checked">
						<span class="input-mini">[[LABEL_OUTSIDER]]</span>
						&emsp;
						<input type="radio" name="downline_type" id="downline_type_1" value="1">
						<span class="input-mini">[[LABEL_OWNSELF]]</span>
					</div>

					<button type="submit" class="btn btn-primary mt-5">[[GET_FORM]]</button>
				</form>
			</div>
		</div>
	</div>
</div>
