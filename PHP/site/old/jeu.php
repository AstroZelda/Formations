<?php
$title = 'Example PHP !';
$aDeviner = 150;
$chiffre = isset($_POST['chiffre']) && $_POST['chiffre'] != '' ? (int) $_POST['chiffre'] : null;
$erreur = null;
$succes = null;

if (isset($chiffre)) {
    if ($chiffre > $aDeviner) {
        $erreur = "C'est moins que $chiffre !";
    } elseif ($chiffre < $aDeviner) {
        $erreur = "C'est plus que $chiffre !";
    } else {
        $succes = "Félicitations ! Le nombre secret était <strong>$aDeviner</strong> !";
    }
}
?>

<?php include 'header.php'; ?>

<div class="starter-template">
    <h1>Jeu</h1>
    <p>Essayez de deviner le nombre secret !</p>
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

    <form action="/jeu.php" method="POST">
        <div class="form-group">
            <input type="number" class="form-control" name="chiffre" placeholder="Entrer un chiffre"
                value="<?= $chiffre ?>">
        </div>
        <button type="submit" class="btn btn-primary">Deviner</button>
    </form>

</div>

<?php include 'footer.php'; ?>