<?php
	/*
	* define views defaults.
	*/
	if (isset($_GET['view']) && !empty($_GET['view'])) {
		if (file_exists("../views/template.task." . $_GET['view'] . ".php")) {
			return true;
		} else {
			return false;
		}
		
	} else {
		return false;
	}
