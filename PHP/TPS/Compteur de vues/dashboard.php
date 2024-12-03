<?php
session_start();  
require_once 'utils/constants.php';

if (!isset($_SESSION['roles'])  || !in_array(ROLE_ADMIN, $_SESSION['roles'])) {
    header('Location: /index.php?message='. MESSAGE_INSUFFICIENT_PERMISSIONS .'&required-role=' . ROLE_ADMIN);
}

require_once 'class/Counter.php';
$counter = new Counter();

function display_years_and_days(): string {
    global $counter;
    $html = '';
    $years = $counter->get_years();
    foreach ($years as $year) {
        $html .= display_year($year);
        $html .= display_days($year);
    }

    return $html;
}

function display_year(string $year): string {
    global $counter;
    $year_count = $counter->get_specific_file_count($year);

    $html = "<div class=\"row\">\n";
    $html .= "<div class=\"col-1 text-end\">></div>\n";
    $html .= "<div class=\"col-9\"><h5>$year</h6></div>\n";
    $html .= "<div class=\"col-1 text-end\"><h5>$year_count</h6></div>\n";
    $html .= "</div>\n";

    return $html;
}

function display_days(string $year): string {
    global $counter;
    $html = '';
    $days = $counter->get_days_of_year($year);

    foreach ($days as $k => $day) {
        $html .= display_day($day, $k & 1);
    }

    return $html;
}

function display_day(string $day, bool $color): string {
    global $counter;
    $day_count = $counter->get_specific_file_count($day);
    $backround_class = $color ? "bg-light" : '';

    $html = "<div class=\"row $backround_class\">\n";
    $html .= "<div class=\"col-2 text-end\">></div>\n";
    $html .= "<div class=\"col-8\"><h7>$day</h7></div>\n";
    $html .= "<div class=\"col-1 text-end\"><h7>$day_count</h7></div>\n";
    $html .= "</div>\n";

    return $html;
}

?>

<?php include 'elements/header.php' ?>

<h1 class="mt-5">Dashboard</h1>
<hr>
<div class="row">
    <div class="col-5">
        <h3>Nombre de visites :</h3>
        <hr>
        <div class="row">
            <div class="col-10">
                <h4>Global</h4>
            </div>
            <div class="col-1 text-end">
                <h4><?= $counter->get_global_file_count() ?></h4>
            </div>
        </div>

        <?= display_years_and_days() ?>
    </div>
</div>

<?php include 'elements/footer.php' ?>