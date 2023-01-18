<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
	<h2 class="text-lg font-medium mr-auto">
		[[LABEL_SETTINGS_LIST]]
	</h2>
</div>
<div class="intro-y box mt-5">
	<?php $this->load->view("includes/alert"); ?>
	<div class="p-10 overflow-auto">
		<form method="post">
			<table class="table" style="width: 100% !important;">
				<thead>
				<tr>
					<th>[[CONSTANT]]</th>
					<th>[[LIVE_KEY]]</th>
					<th>[[PRODUCTION_KEY]]</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($list as $key => $item) { ?>
					<tr>
						<td><?php echo $item['item']; ?></td>
						<td>
							<input type="text" class="form-control" name="data[<?php echo $item['id'] ?>][value]"
								   value="<?php echo $item['value'] ?>">
						</td>
						<td>
							<input type="text" class="form-control" name="data[<?php echo $item['id'] ?>][dummy]"
								   value="<?php echo $item['dummy'] ?>">
						</td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-primary shadow-md mr-2 w-full mt-4">
							[[SAVE]]
						</button>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
