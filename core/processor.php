<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            Add_task($_POST['title'],$_POST['description'],0);
        } else {
            $have_error = 1;
            $error = 'title is required.';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {

                if ($_GET['action'] == 'check') {
                    Check_task($_GET['id']);
                    header('location: /');
                }
                if ($_GET['action'] == 'delete') {
                    Delete_task($_GET['id']);
                    header('location: /');
                }
            } else {
                die('action not authorized. <a href="/"> -back</a>');
            }
        }
    }