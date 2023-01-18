<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
	<h2 class="text-lg font-medium mr-auto">
		[[LABEL_SPONSORED_NETWORK]]
	</h2>
</div>
<div class="intro-y box mt-5">
	<div class="section mt-2">
		<div class="card">
			<div class="card-body">
				<form name="frmSearch" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="input-wrapper">
							<input type="text" name="txtSearch" id="txtSearch"
								   value="<?php echo isset($txtSearch) ? $txtSearch : '1000000'; ?>"
								   class="form-control"
								   placeholder="[[LABEL_USERID_USERNAME]]"/>
						</div>
					</div>
					<div class="form-group basic mt-2">
						<div class="w-full flex mt-4">
							<button type="submit" class="w-full btn btn-primary shadow-md mr-2">[[SUBMIT]]
							</button>
						</div>
					</div>
				</form>
				<div class="transactions mt-5">
					<span onclick="getUserDetails(<?php echo isset($txtSearch) ? $txtSearch : '1000000'; ?>)"
						  class="clickable text-md px-1 rounded-md bg-primary text-white mr-1">
						[[CHECK_USER_DETAILS]]
					</span>
				</div>
			</div>

			<div class="transactions mt-5">

				<?php if (count($members) > 0) {
					?>
					<table class="table table-report -mt-2">
						<?php
						foreach ($members as $member) { ?>
							<tr class="intro-x">
								<td>
									<a href="<?php echo base_url("network/sponsored/" . $member['userid']); ?>"
									   class="intro-x" style="box-shadow: 0 1px 3px 0 rgb(0 0 0 / 9%);">
										<div class="detail">
											<div>
												<strong class="flex items-center">
													<?php echo $member['userid']; ?>
													- <?= $member['rank_name'] ?>
												</strong>
												<p>
													Date Join: <?php echo formatDate($member['join_date'], false); ?>
													Sponsored: <?php echo $member['sponsored']; ?>
												</p>
											</div>
										</div>
										<div class="right">
											<div class="price">
												<ion-icon name="chevron-forward-outline"></ion-icon>
											</div>
										</div>
									</a>
								</td>
							</tr>
						<?php }
						?>
					</table>
					<?php
				} ?>
			</div>
		</div>
	</div>
</div>
