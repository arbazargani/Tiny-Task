<?php
	/*
	* define application variables.
	*/
	define('SERVER_OS', 'linux');
	if (SERVER_OS == 'linux') {
		define('MYSQL_HOST', '127.0.0.1'); // @linux	
	} else {
		define('MYSQL_HOST', 'localhost'); // @windows
	}
	define('MYSQL_PORT', '');
	define('MYSQL_USERNAME', 'root');
	define('MYSQL_PASSWORD', '');
	define('MYSQL_DATABASE', 'taskbook');
	define('DEBUG_MODE', FALSE);
