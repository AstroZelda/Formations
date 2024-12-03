<?php
require_once 'config.php';
session_start();

$title = 'Example PHP !';

function formatage_creneaux(array $creneaux, bool $ouvert): string {
    $creneau_html = "<ul>\n";

    foreach (JOURS as $k => $jour) {
        $couleur = $ouvert ? 'green' : 'darkred';
        $style = (($k + 1) === (int) date('N')) ? "style=\"color:$couleur\"" : '';

        if (isset($creneaux[$k])) {
            $creneaux_formates = formatage_creneau($creneaux[$k]);
            $creneau_html .= "<li $style><strong>$jour</strong> : Ouvert ";
            $creneau_html .= implode(' et ', $creneaux_formates);
            $creneau_html .= "</li>\n";
        } else {
            $creneau_html .= "<li><strong>$jour</strong> : Fermé</li>\n";
        }
    }

    $creneau_html .= '</ul>';
    return $creneau_html;
}

function formatage_creneau(array $creneaux_jour): array {
    $creneaux_formates = [];
    foreach ($creneaux_jour as $creneau) {
        $creneaux_formates[] = "de <strong>{$creneau[0]}h<strong> à </strong>{$creneau[1]}h</strong>";
    }
    return $creneaux_formates;
}

$heure_actuelle = (int)date('G', );
$jour_actuel = (int)date('N', );
$creneaux_jour_actuel = CRENEAUX[$jour_actuel - 1];
$ouvert = false; 

foreach ($creneaux_jour_actuel as $creneau) {
    if ($creneau[0] <= $heure_actuelle && $heure_actuelle < $creneau[1]) {
        $ouvert = true;
        break;
    }
}


?>

<?php include 'header.php'; ?>

<div class="starter-template">
    <h1>Nous contacter</h1>
    <h2>debug</h2>
    <pre>
        <?= print_r($_SESSION); ?>
    </pre>
    <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim, praesentium sint totam dicta
        perferendis provident officiis voluptate tempore cupiditate, quibusdam quo in facilis odit ipsum deserunt
        expedita magnam repellendus similique.</p>
    <?php if ($ouvert): ?>
        <div class="alert alert-success">Il est <?= $heure_actuelle ?>h, le magasin est ouvert</div>
    <?php else: ?>
        <div class="alert alert-danger">Il est <?= $heure_actuelle ?>h, le magasin est fermé</div>
    <?php endif ?>
    <h5>Horaires d'ouverture :</h5>
    <?= formatage_creneaux(CRENEAUX, $ouvert) ?>	
</div>

<?php include 'footer.php'; ?>