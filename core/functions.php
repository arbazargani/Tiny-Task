<?php
	/*
	* define some simple helper functions.
	*/
	function Connect_db() {
		$handle = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
		if ($handle->connect_error) {
			die ("<pre>Connection failed: " . $handle->connect_error."</pre>");
		}
		return $handle;
	}
	function Check_db() {
		$handle = Connect_db();
		$query = "CREATE TABLE IF NOT EXISTS `tasks` (
						    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
						    `title` TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
						    `description` LONGTEXT COLLATE utf8mb4_unicode_ci,
						    `state` int(11) NOT NULL DEFAULT '0',
						    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
						    `expired_at` TIMESTAMP
							) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
		if(!$handle->query($query)) {
			die ("Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error);
		}
	}
	function Add_task($title, $description, $state, $expired_at = NULL) {
		$handle = Connect_db();
		if(is_null($expired_at)) {
			$query = "INSERT INTO `tasks` (`title`, `description`, `state`, `created_at`) 
			VALUES ('$title', '$description', '$state', current_timestamp())";
		} else {
			$query = "INSERT INTO `tasks` (`title`, `description`, `state`, `created_at`, `expired_at`) 
			VALUES ('$title', '$description', '$state', current_timestamp(), '$expired_at')";
		}
		if(!$handle->query($query)) {
			die ("Task creation failed: (" . $mysqli->errno . ") " . $mysqli->error);
		}
	}
	function Fetch_task() {
		$handle = Connect_db();
		$query = "SELECT * FROM tasks;";
		$rows = $handle->query($query);
		$tasks = mysqli_fetch_all($rows,MYSQLI_ASSOC);
		return $tasks;
	}