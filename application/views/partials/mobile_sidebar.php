<ul>
	<?php
	$render_menu = array();
	foreach ($_SESSION['menus'] as $key => $menu) {
		$render_menu[$key] = $menu;
		foreach ($menu['children'] as $k => $child) {
			$render_menu[$key]['children'][$k] = $child;
			if ($child['page_link'] == $this->uri->uri_string) {
				$render_menu[$key]['parent']['class'] = "menu--active";
				$render_menu[$key]['children'][$k]['sub_class'] = "menu--active";
			} else {
				$render_menu[$key]['children'][$k]['sub_class'] = "";
			}
		}
	}
	?>
	<li>
		<a href="<?php echo base_url(); ?>" class="menu <?php echo in_array($this->uri->uri_string, array(
				"",
				"home",
				"home/index"
		)) ? "menu--active" : ""; ?>">
			<div class="menu__icon"><i data-lucide="home"></i></div>
			<div class="menu__title"> [[HOME]]</div>
		</a>
	</li>
	<?php
	foreach ($render_menu as $key => $menu) {
		?>
		<li>
			<a href="javascript:;"
			   class="menu <?php echo isset($menu['parent']['class']) ? $menu['parent']['class'] : ""; ?>">
				<div class="menu__icon">
					<i data-lucide="<?php echo $menu['parent']['icon']; ?>"></i>
				</div>
				<div class="menu__title">
					[[<?php echo $menu['parent']['name'] ?>]]
					<div class="menu__sub-icon <?php echo isset($menu['parent']['class']) ? "transform rotate-180" : ""; ?>">
						<i data-lucide="chevron-down"></i>
					</div>
				</div>
			</a>
			<ul class="<?php echo isset($menu['parent']['class']) ? "menu__sub-open" : "" ?>">
				<?php
				foreach ($menu['children'] as $sub) {
					?>
					<li>
						<a href="<?php echo base_url($sub['page_link']); ?>"
						   class="menu <?php echo $sub['sub_class'] ?>">
							<div class="menu__icon">
								<i data-lucide="<?php echo $sub['icon']; ?>"></i>
							</div>
							<div class="menu__title">
								[[<?php echo $sub['name']; ?>]]
							</div>
						</a>
					</li>
				<?php } ?>
			</ul>
		</li>
		<?php
	}
	?>
</ul>
