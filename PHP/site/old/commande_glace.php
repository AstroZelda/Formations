<?php
$title = 'Example PHP !';
$erreur = null;
$succes = null;

$cornets = [
    ['nom' => 'Standard', 'prix' => '1', 'texte' => 'cornet simple'],
    ['nom' => 'Pot', 'prix' => '0', 'texte' => 'pot'],
    ['nom' => 'Chocolat', 'prix' => '1.5', 'texte' => 'cornet au chocolat'],
];

$parfums = [
    ['nom' => 'Vanille', 'prix' => '2', 'texte' => 'une boule vanille'],
    ['nom' => 'Fraise', 'prix' => '1.5', 'texte' => 'une boule fraise'],
    ['nom' => 'Citron', 'prix' => '2.3', 'texte' => 'une boule citron'],
];

$cornet_selectionne = $_POST['cornet'] ?? 0;
$parfums_selectionnes = $_POST['parfums'] ?? [];

function separation_valeurs(array $valeurs): string {
    if (count($valeurs) === 0) { 
        return '';
    } elseif (count($valeurs) === 1) { 
        return $valeurs[0];
    } elseif (count($valeurs) === 2) {
        return "{$valeurs[0]} et {$valeurs[1]}";
    } else {
        $resultat = $valeurs[0];

        foreach (array_slice($valeurs, 1, -1) as $valeur) {
            $resultat .= ", $valeur";
        }

        $resultat .= ' et ' . end($valeurs) . '.';
        return $resultat;
    }
}

if (count($parfums_selectionnes) > 0) {
    $prix = $cornets[$cornet_selectionne]['prix'];

    foreach ($parfums_selectionnes as $parfum) {
        $prix += $parfums[$parfum]['prix'];
    }

    $prix_formate = number_format($prix, 2, ',',' ');
    
    $parfums_selectionnes_info = [];
    foreach ($parfums_selectionnes as $parfum) {
        $parfums_selectionnes_info[] = $parfums[$parfum]['texte'];
    }

    $parfums_formates = separation_valeurs($parfums_selectionnes_info);

    $succes = "Vous avez choisi un {$cornets[$cornet_selectionne]['texte']} avec $parfums_formates" ;
    $succes .= "<br><br>Votre commande coûtera <strong>{$prix_formate}€</strong>";
} elseif (isset($_POST['cornet']) || isset($_POST['parfums'])) {
    $erreur = "Veuillez sélectionner au moins 1 parfum.";
}

?>

<?php include 'header.php'; ?>

<div class="starter-template">
    <h1>Formulaire de commande de glace :</h1>
    <hr>

    <?php if ($erreur): ?>
        <div class="alert alert-danger">
            <?= $erreur ?>
        </div>
    <?php elseif ($succes): ?>
        <div class="alert alert-success">
            <?= $succes ?>
        </div>
    <?php endif ?>

    <form class="row" action="/commande_glace.php" method="POST">
        <div class="col-6">
            <fieldset>
                <legend>Type de cornet :</legend>

                <?php
                foreach ($cornets as $key => $cornet) {
                    extract($cornet); // [$nom, $prix]
                    $checked = $key == $cornet_selectionne ? ' checked' : '';
                    echo "<div class=\"form-check\">\n";
                    echo "<input class=\"form-check-input\" type=\"radio\" name=\"cornet\" id=\"$nom\" value=\"$key\" $checked>\n";
                    echo "<label class=\"form-check-label\" for=\"$nom\">$nom</label>\n";
                    echo "</div>\n";
                }
                ?>
            </fieldset>
        </div>
        <div class="col-6">
            <fieldset>
                <legend>Parfums :</legend>

                <?php
                foreach ($parfums as $key => $parfum) {
                    extract($parfum); // [$nom, $prix]
                    $checked = in_array($key, $parfums_selectionnes) ? ' checked' : '';
                    echo "<div class=\"form-check\">";
                    echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"parfums[]\" id=\"parfum_$nom\" value=\"$key\"$checked>\n";
                    echo "<label class=\"form-check-label\" for=\"parfum_$nom\">$nom</label>\n";
                    echo "</div>";
                }
                ?>
            </fieldset>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Confirmer la commande</button>
        </div>
    </form>
</div>
<!-- 
    <pre>
    <?= print_r($_POST) ?>
    </pre>

    <pre>
    <?= print_r($parfums_selectionnes) ?>
    </pre> -->

<?php include 'footer.php'; ?>