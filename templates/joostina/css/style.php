<?php
if(extension_loaded('zlib'))
	{
		ob_start('ob_gzhandler');
	}
		header("Content-type: text/css");
?>
@import url('reset.css');
@import url('typography.css');
@import url('template.css');
@import url('components.css');
@import url('modules.css');
@import url('mambots.css');
@import url('js.css');
@import url('error.css');
@import url('edit.css');
@import url('editor.css');
@import url('devices.css');
<?php
if(extension_loaded('zlib'))
	{
		ob_end_flush();
	}
?>