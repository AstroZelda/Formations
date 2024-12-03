<?php
function get_if_nav(string $filename, string $return): string {
    if ($_SERVER['SCRIPT_NAME'] === $filename) {
        return $return;
    }

    return '';
}

function get_nav_item(string $filename, string $title): string {
    $class = get_if_nav($filename, ' class="active"');
    return "<li$class><a href=\"$filename\">$title</a></li>";
}

$pages = [
    ['filename' => '/index.php', 'title' => 'Accueil'],
    ['filename' => '/contact.php', 'title' => 'Contact'],
    ['filename' => '/planification.php', 'title' => 'Planification'],
    ['filename' => '/jeu.php', 'title' => 'Jeu'],
    ['filename' => '/commande_glace.php', 'title' => 'Commande de glace'],
    ['filename' => '/menu_resto.php', 'title' => 'Menu'],
    ['filename' => '/newsletter.php', 'title' => 'Newsletter'],
    ['filename' => '/cookies.php', 'title' => 'Cookies'],
];