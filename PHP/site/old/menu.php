<?php require_once 'nav_functions.php';

foreach ($pages as $page) {
    extract($page);
    echo get_nav_item($filename, $title);
}