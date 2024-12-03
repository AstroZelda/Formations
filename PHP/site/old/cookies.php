<?php
require_once 'config.php';

if (!empty($_GET['action']) && $_GET['action'] === 'deconnexion') {
    unset($_COOKIE['username']);
    setcookie('username', '', time() - 10);
}

$name_post = !empty($_POST['username']) ? htmlspecialchars($_POST['username']) : null;
$name = null;

if (!empty($name_post)) {
    setcookie('username', $name_post, time() + 60 * 60 * 24);
    $name = $name_post;
} else {
    $name = $_COOKIE['username'] ?? null;
}

$display_name = $name ?? 'invité';

?>

<?php include 'header.php' ?>

<h1>Bonjour, <?= $display_name ?> !</h1>
<a href="cookies.php?action=deconnexion">se déconnecter</a>
<h2>Qui êtes-vous ?</h2>
<form action="/cookies.php" method="post" class="form-inline">
    <div class="form-group">
        <input type="text" name="username" placeholder="Entrez votre nom" class="form-control" value="<?= $name ?>" required />
    </div>
    <button type="submit" class="btn btn-primary">Confirmer</button>

</form>

<?php include 'footer.php' ?>