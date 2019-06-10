<!-- standard function to load the subtemplate of the regular template. -->
<?php
	function loadTemplate($filename, $varsOftemps){ 
		extract($varsOftemps); //extracts the variables of the templates used in the index file
		ob_start(); //remembering every outputs
		require $filename; 
		$contents = ob_get_clean(); //deleting the current output buffer after getting its contents
		return $contents;
	}
?>