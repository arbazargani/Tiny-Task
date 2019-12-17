<?php
	/*
	* autoload necessary files.
	*/
	$files = [
		'core/config.php',
		'core/functions.php',
		'core/jobs.php'
	];
	foreach ($files as $file) {
		require_once "../$file";
	}