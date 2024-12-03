<?php
require_once 'config.php';

$error = null;
$success = null;
$email = null;

$file_path = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';

if (!empty($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (file_put_contents($file_path, $email . PHP_EOL, FILE_APPEND)) {
            $success = "L'adresse <strong>\"$email\"</strong> a été ajoutée à la liste.";
        } else {
            $error = "Erreur : l'insertion a échoué";
        }
        
    } else {
        $error = 'Adresse e-mail invalide';
    }
}

?>

<?php include 'header.php' ?>

<h1>S'inscrire à la newsletter</h1>

<?php if ($error): ?>
    <div class="alert alert-danger">
    <?= $error ?>
    </div>
<?php elseif ($success): ?>
    <div class="alert alert-success">

    <?= $success ?>
    </div>
<?php endif ?>

<form action="/newsletter.php" method="post" class="form-inline">
    <div class="form-group">
        <input type="email" name="email" placeholder="Entrez votre email" class="form-control" value="<?= $email ?>" required />
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>

</form>

<?php include 'footer.php' ?>