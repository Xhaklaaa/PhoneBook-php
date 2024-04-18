<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['phone'])) {
    $name = strip_tags($_POST['name']);
    $phone = strip_tags($_POST['phone']);
    $result = addContact($name, $phone);
    if ($result !== true) {
        session_start();
        $_SESSION['error'] = $result;
    }
}

header('Location: index.php');
exit;