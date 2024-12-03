<?php
require_once 'config.php';

$path = __DIR__ . '/resources/menu_resto.tsv';
$file = fopen($path, 'r');
$menu = parse_file($file);

function parse_file($file): array {
    $data = [];
    $current_section = null;

    while ($line = fgets($file)) {
        $split = explode("\t", $line);

        if (!isset($current_section) || empty($split[1])) {
            $current_section = $line;
        } else {
            $data[$current_section][] = [
                "name" => $split[0],
                "ingredients" => $split[1],
                "price" => $split[2],
            ];
        }
    }

    return $data;
}

function build_menu_html(array $menu): string {
    $html = '';

    foreach ($menu as $section => $dishes) {
        $html .= "<h2 style=\"margin-top:10px\">$section</h2>\n";
        foreach ($dishes as $k => $dish) {
            $backround_class = ((int) $k % 2 == 0) ? "bg-light" : '';
            $price = number_format((int) $dish['price'], 2, ',', ' ');
            $html .= "<div class=\"row $backround_class\">\n";
            $html .= "<div class=\"col-3\">{$dish['name']}</div>\n";
            $html .= "<div class=\"col-7\">{$dish['ingredients']}</div>\n";
            $html .= "<div class=\"col-2 text-right\"><strong>$price €</strong></div>\n";
            $html .= "</div>\n";
        }

    }

    return $html;
}

?>

<?php include 'header.php' ?>

<h1>Le menu</h1>
<?= build_menu_html($menu) ?>

<?php include 'footer.php' ?>