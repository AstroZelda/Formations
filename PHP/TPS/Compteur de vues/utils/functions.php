<?php
require_once 'utils/constants.php';

function get_nav_item(string $filename, string $title): string {
    $active = ($_SERVER['SCRIPT_NAME'] === $filename) ? 'active' : '';
    return "<li class=\"nav-item\"><a href=\"$filename\" class=\"nav-link $active\">$title</a></li>";
}

function get_all_nav_items(): string {
    $items = '';

    foreach (PAGES as $page) {
        $items .= get_nav_item($page['filename'], $page['title']) . "\n";
    }

    return $items;
}