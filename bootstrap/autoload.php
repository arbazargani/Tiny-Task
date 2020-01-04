<?php
    /*
    * necessary files/packages prefix for autoloader.
    */
    $prefix = [
        'files' => 'core',
        'packages' => 'vendor'
    ];

	/*
	* autoload necessary files.
	*/
	$files = [
		'config.php',
		'functions.php',
		'jobs.php'
	];
	foreach ($files as $file) {
		    require_once "../".$prefix['files']."/$file";
	}

    /*
    * autoload vendors.
    */
    $vendors = [
//        'jdf.php',
    ];
    foreach ($vendors as $vendor) {
            require_once "../".$prefix['packages']."/$vendor";
    }