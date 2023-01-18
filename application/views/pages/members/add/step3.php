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
						<div class="alert alert-success">
							<?php echo $available['userid'] ?>
							[[LABEL_AVAILABLE_SLOT_UNDER]] <?php echo $desired['userid'] ?> <br>
							[[LABEL_USER_PLACEMENT_WILLBE]] <?php
							if ($side == "L") echo "[[LEFT]]";
							if ($side == "R") echo "[[RIGHT]]";
							if ($side == "A") echo "[[AUTO]]";
							?>
						</div>
					</div>

					<div class="input-form mt-5">
						<div class="input-wrapper">
							<label class="col-md-12 control-label" for="txtSponsorId">[[LABEL_SPONSORID]]</label>
							<div class="col-md-12">
								<input type="text" id="user" name="user" class="form-control"
									   value="<?php echo $_SESSION['temp_sponsor']['userid'] ?>" readonly>
								<input type="hidden" name="id" value="<?php echo $_SESSION['temp_sponsor']['id'] ?>">
								<p style="color:red;">[[MSG_MEMBER_PROFILE]]</p>
							</div>
						</div>
					</div>

					<input type="hidden" id="user" name="user"
						   value="<?php echo $_SESSION['temp_sponsor']['userid'] ?>">
					<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['temp_sponsor']['id'] ?>">
					<input type="hidden" id="sponsor_user" name="sponsor_user"
						   value="<?php echo $_SESSION['temp_sponsor']['userid'] ?>">
					<input type="hidden" id="sponsor_id" name="sponsor_id"
						   value="<?php echo $_SESSION['temp_sponsor']['id'] ?>">
					<input type="hidden" id="matrix_user" name="matrix_user" value="<?php echo $available['userid'] ?>">
					<input type="hidden" id="matrix_id" name="matrix_id" value="<?php echo $available['id'] ?>">
					<input type="hidden" id="matrix_side" name="matrix_side" value="<?php echo $side ?>">
					<input type="hidden" id="myEmail" name="myEmail"
						   value="<?php echo $_SESSION['temp_sponsor']['email']; ?>">
					<input type="hidden" id="myFirstName" name="myFirstName"
						   value="<?php echo $_SESSION['temp_sponsor']['f_name']; ?>">
					<input type="hidden" id="myLastName" name="myLastName"
						   value="<?php echo $_SESSION['temp_sponsor']['l_name']; ?>">
					<input type="hidden" id="myMobile" name="myMobile"
						   value="<?php echo $_SESSION['temp_sponsor']['mobile']; ?>">
					<input type="hidden" id="downline_type" name="downline_type"
						   value="<?php echo $_POST['downline_type']; ?>">

					<div class="main_account_area">
						<div class="input-form mt-5">
							<div class="input-wrapper">
								<div class="col-md-12">
									<h3>[[NEW_MEMBER_INFO_BELOW]]</h3>
								</div>
							</div>
						</div>
						<div class="input-form mt-5">
							<label class="col-md-12 control-label d-none" for="txtEmail">[[LABEL_EMAIL]]</label>
							<div class="col-md-12">
								<input required placeholder="[[LABEL_EMAIL]]" type="email"
									   class="form-control" name="email" id="txtEmail"
									   value="<?php echo $_POST['downline_type'] == 0 ? "" : $_SESSION['temp_sponsor']['email']; ?>">
							</div>
						</div>

						<div class="input-form mt-5">
							<label class=" d-none col-md-12 control-label"
								   for="txtFirstName">[[LABEL_FIRST_NAME]]</label>
							<div class="col-md-12">
								<input required placeholder="[[LABEL_FIRST_NAME]]" type="text" class="form-control"
									   name="f_name" id="txtFirstName"
									   value="<?php echo $_POST['downline_type'] == 0 ? "" : $_SESSION['temp_sponsor']['f_name']; ?>">
							</div>
						</div>


						<div class="input-form mt-5">
							<label class="d-none col-md-12 control-label"
								   for="txtLastName">[[LABEL_LAST_NAME]]</label>
							<div class="col-md-12">
								<input required type="text" class="form-control" name="l_name" id="txtLastName"
									   placeholder="[[LABEL_LAST_NAME]]"
									   value="<?php echo $_POST['downline_type'] == 0 ? "" : $_SESSION['temp_sponsor']['l_name']; ?>">
							</div>
						</div>

						<div class="input-form mt-5">
							<label class="col-md-12 control-label d-none" for="selCountry">[[LABEL_COUNTRY]]</label>
							<div class="col-md-12">
								<select required name="country" id="selCountry" class="form-control"
										style="padding-left: 10px !important;">
									<?php foreach ($countries as $country) { ?>
										<option data-code="<?php echo $country['id']; ?>" <?php echo ($_POST['downline_type'] == 0) ? ($country['id'] == 194 ? "selected" : "") : ($country['id'] == $_SESSION['temp_sponsor']['country'] ? "selected" : ""); ?>
												value="<?php echo $country['id'] ?>">
											<?php echo $country['full_name'] ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="input-form mt-5">
							<label class="d-none control-label col-md-12"
								   for="txtMobileNo">[[LABEL_MOBILE]]</label>
							<div class="col-md-12">
								<table width="100%">
									<tbody>
									<tr>
										<td style="width: 40px">
											<span class="input-group-addon my_cc">65</span>
										</td>
										<td>
											<input required type="text" placeholder="[[LABEL_MOBILE]]"
												   class="form-control" name="mobile" id="txtMobileNo" value="">
										</td>
									</tr>
									</tbody>
								</table>
								<p style="color:red;">[[MBM_MOBILE_MSG]]</p>
							</div>
						</div>

						<div class="input-form mt-5">
							<label class="col-md-12 control-label d-none" for="selCountry">[[LABEL_PACKAGES]]</label>
							<div class="col-md-12">
								<select required name="package_id" id="package_id" class="form-control"
										style="padding-left: 10px !important;">
									<?php foreach ($packages as $package) { ?>
										<option value="<?php echo $package['id'] ?>">
											<?php echo $package['name'] ?> ($<?php echo $package['unit_price'] ?>)
										</option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="input-form mt-5">
							<label class="col-md-12 control-label d-none" for="selCountry">[[LABEL_PACKAGES]]</label>
							<div class="col-md-12">
								<select required name="payment_gateway" class="form-control"
										style="padding-left: 10px !important;">
									<option value="E-WALLET">
										E-WALLET
									</option>
								</select>
							</div>
						</div>

						<button type="submit" class="btn btn-primary mt-5">[[SUBMIT]]</button>
				</form>
			</div>
		</div>
	</div>
</div>
