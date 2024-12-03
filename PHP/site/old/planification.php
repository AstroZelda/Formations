<?php
require_once 'config.php';

$title = 'Example PHP !';

$jour = isset($_POST['jour']) ? (int)$_POST['jour'] : null;
$heure = isset($_POST['heure']) ? (int)$_POST['heure'] : null;

$options_jours = '';
foreach (JOURS as $k => $_jour) {
    $selected = ($jour === $k) ? 'selected' : '';
    $options_jours .= "<option value=\"$k\" $selected>$_jour</option>\n";
}

function get_creneaux_jour(int $jour):array {
    return CRENEAUX[$jour];
}

function is_ouvert(int $jour, int $heure):bool {
    $creneaux = get_creneaux_jour($jour);
    foreach ($creneaux as $creneau) {
        if ($creneau[0] <= $heure && $heure < $creneau[1]) {
            return true;
        }    
    }
    return false;
}

$succès = null;
$erreur = null;

if (isset($jour) && !isset($heure)) {
    $erreur = "L'heure doit être spécifiée !";
} elseif (!isset($jour) && isset($heure)) {
    $erreur = "Le jour doit être spécifié !";
} elseif (isset($jour) && isset($heure)) {
    $ouvert = is_ouvert($jour, $heure);
    if ($ouvert) {
        $succes = "Votre rendez-vous est réservé pour " . get_jour($jour) . " à {$heure}h";
    } else {
        $erreur = "Le magasin est fermé le " . get_jour($jour) . " à {$heure}h";
    }
}

function get_jour(int $jour):string {
    return JOURS[$jour];
}

?>


<?php include 'header.php'; ?>


<h1>Planifier une visite</h1>
<p>Si vous souhaitez venir nous voir, vous pouvez réserver !</p>
<?php if (isset($erreur)): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php elseif (isset($succes)): ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
<?php endif ?>

<form class="row" action="/planification.php" method="POST">
    <div class="form-floating col-5 mt-3">
        <label for="selectJour">Jour :</label>
        <select class="form-select" id="selectJour" name="jour">
            <?= $options_jours ?>
        </select>
    </div>

    <div class="form-floating col-5 mt-3">
        <label for="selectHeure">Heure :</label>
        <input type="number" id="selectHeure" name="heure" <?= isset($heure) ? "value=\"$heure\"" : '' ?>></label>
    </div>

    <div class="col-2 mt-3">
        <button type="submit" class="btn btn-primary">Confirmer</button>
    </div>
</form>


<?php include 'footer.php'; ?>