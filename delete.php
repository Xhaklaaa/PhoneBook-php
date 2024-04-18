<?php

require 'functions.php';

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    deleteContact($index);
}

header('Location: index.php');
exit;