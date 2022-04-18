<?php if (!defined('ABSPATH')) exit; ?>
<div class="wrap">
	<?php
	if (isset($_GET['settings-updated'])) {
		add_settings_error(
			self::SETTING_ERROR,
			'',
			'更新しました。',
			'updated'
		);
	}
	settings_errors(self::SETTING_ERROR);
	?>
	<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
	<form action="options.php" method="post">
		<?php
		settings_fields(self::OPTION_GROUP);
		do_settings_sections(self::OPTION_GROUP);
		submit_button('更新');
		?>
	</form>
	<p>memory_get_usage()=<?= memory_get_usage() ?>
</div>