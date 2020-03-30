<?php
    // require 'router.php';

    session_start();
    require '../bootstrap/autoload.php';

    // require 'routes.php';
    // $action = $_SERVER['REQUEST_URI'];
    // dispatch($action);


    require '../views/index.php';
    session_abort();