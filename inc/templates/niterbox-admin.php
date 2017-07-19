<h1>Niterbox Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields('niterbox-settings-group'); ?>
	<?php do_settings_sections('js_niterbox'); ?>
	<?php submit_button(); ?>
</form>