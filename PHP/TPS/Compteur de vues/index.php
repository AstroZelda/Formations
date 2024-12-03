<?php
session_start();
require_once 'utils/constants.php';

$message_text = $_GET['message'] ?? null;
$error = null;

if (!empty($message_text)) {
    if ($message_text === MESSAGE_INSUFFICIENT_PERMISSIONS) {
        $error = "Impossible d'accéder à cette page sans ";
        $error .= isset($_GET['required-role'])
            ? "le rôle <strong>{$_GET['required-role']}</strong>."
            : "les permissions appropriées.";
    }
}

?>

<?php include 'elements/header.php' ?>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger mt-5"><?= $error ?></div>
<?php endif ?>

<h1 class="mt-5">Title</h1>
<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae inventore rem exercitationem. Error,
    rem ducimus veritatis doloribus explicabo repellat, odio quam nostrum iste molestias quidem alias, reprehenderit
    placeat magni earum!</p>
<p>Bottom text</p>

<?php include 'elements/footer.php' ?>