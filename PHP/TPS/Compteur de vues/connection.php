<?php session_start();
require_once 'utils/constants.php';

$error = null;
$login = null;
$logged = false;

if (isset($_GET['action']) && $_GET['action'] === 'disconnect') {
    unset($_SESSION['login']);
    unset($_SESSION['roles']);

} elseif (isset($_POST['login']) && isset($_POST['password'])) {
    $temp_login = $_POST['login'];
    $temp_password = $_POST['password'];

    if (isset(SUPER_SECRETS[$temp_login]) && password_verify($temp_password, SUPER_SECRETS[$temp_login]['password'])) {
        $login = $temp_login;
        $_SESSION['login'] = $temp_login;
        $_SESSION['roles'] = SUPER_SECRETS[$temp_login]['roles'];
        $logged = true;
    } else {
        $error = 'Le login et/ou le mot de passe sont invalides';
    }

} elseif (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $logged = true;
}

?>

<?php include 'elements/header.php' ?>

<?php if (!$logged): ?>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title">Connexion</h5>
                <form action="/connection.php" method="post">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif ?>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if ($logged): ?>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title">Vous êtes connecté, <strong><?= $login ?></strong>.</h5>
                <form action="/connection.php" method="get">
                    <input type="hidden" name="action" value="disconnect">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Se déconnecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>


<?php include 'elements/footer.php' ?>