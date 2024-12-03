<?php
date_default_timezone_set('Europe/Paris');

define('TITLE', 'Compteur de vues');

define('PAGES', [
    ['filename' => '/index.php', 'title' => 'Accueil'],
    ['filename' => '/dashboard.php', 'title' => 'Dashboard'],
]);

define('DATA_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);

define('REGEX_COUNTER_FILE', '/^counter_(.)*.txt$/');
define('REGEX_DAY_COUNTER_FILE', '/^counter_((\\d){4}-(\\d){2}-(\\d){2}).txt$/');
define('REGEX_YEAR_COUNTER_FILE', '/^counter_((\\d){4}).txt$/');

define('ROLE_ADMIN', "admin");

define('MESSAGE_INSUFFICIENT_PERMISSIONS', "insufficient-permissions");

define('SUPER_SECRETS', [
    'toto95' => [
        'password' => '$2y$10$jlj4Y4BrGkrYwH/21vL98OfLl2KaeNBiQJMuj/20MW34KFmlRrDRa',
        'roles' => [
            ROLE_ADMIN,
        ],
    ],
    'benenuts' => [
        'password' => '$2y$10$3N/kVpdddTANmkLVN9iFiedrJPTTrC8sPrwQBqozVe6aR4mXch7e6',
        'roles' => [],
    ],
]);