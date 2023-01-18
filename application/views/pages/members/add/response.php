<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
	<h2 class="text-lg font-medium mr-auto">
		[[LABEL_MEMBERS_RESPONSE]]
	</h2>
	<div class="w-full sm:w-auto flex mt-4 sm:mt-0">
		<a href="<?php echo base_url("members"); ?>" class="btn btn-primary shadow-md mr-2">[[LABEL_MEMBERS_LIST]]</a>
	</div>
</div>
<div class="intro-y box mt-5">
	<div class="p-10 overflow-auto">

		<div class="p-5">
			<?php if ($return['response'] == 'error') { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-danger">
							<?php echo $return['message'] ?>
						</div>
					</div>
				</div>
				<div class="row pt-3">
					<div class="col-md-12">
						<?php foreach ($return['data'] as $error) {
							?>
							<div class="row"><strong>&emsp;<?php echo $error; ?></strong></div>
							<?php
						} ?>
					</div>
				</div>
			<?php } ?>
			<?php if ($return['response'] == 'success') { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success">
							<?php echo $return['message']; ?>
						</div>
					</div>
				</div>
				<div class="row pt-3">
					<div class="col-md-12">
						<div class="card">
							<div class="table-responsive">
								<table class="table">
									<tr>
										<th>[[LABEL_ORDER_NUMBER]]</th>
										<td><?php echo $return['data']['order_num']; ?></td>
									</tr>
									<tr>
										<th>[[LABEL_ORDER_AMOUNT]]</th>
										<td><?php echo $return['data']['amount']; ?></td>
									</tr>
									<tr>
										<th>[[LABEL_ORDER_TOTAL_BV]]</th>
										<td><?php echo $return['data']['total_bv']; ?></td>
									</tr>
									<tr>
										<th>[[LABEL_ORDER_STATUS]]</th>
										<td><?php echo $return['data']['status']; ?></td>
									</tr>
									<tr>
										<th>[[LABEL_ORDER_PAYMENT_MODE]]</th>
										<td><?php echo $return['data']['payment_mode']; ?></td>
									</tr>
									<tr>
										<th>[[LABEL_ORDER_PLACEMENT_TIME]]</th>
										<td><?php echo $return['data']['trans_time']; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
