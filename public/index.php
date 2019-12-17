<?php
    session_start();
    require '../bootstrap/autoload.php';
    require '../views/index.php';
    session_abort();