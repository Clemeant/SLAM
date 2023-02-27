<?php namespace utility;

	function includeAll($dirname){
		if ($dir = opendir($dirname)) {
			while (false !== ($file = readdir($dir))) {
				if (is_file($dirname.$file) && $file != "." && $file != "..") {
					include_once($dirname.$file);
				}
			}
			closedir($dir);
		}
	}

?>