<?php
require_once 'class/Guestbook.php';
require_once 'class/Message.php';

$username = $_POST['username'] ?? '';
$message_text = $_POST['message'] ?? '';

$guestbook = new Guestbook();

if (isset($_POST['username']) || isset($_POST['message'])) {

    $message = new Message($username, $message_text);
    $errors = $message->get_errors();

    $success = null;
    $error = null;

    if ($message->is_valid()) {
        $saved = $guestbook->add_message($message);

        if ($saved) {
            unset($username);
            unset($message_text);
            $success = "Message envoyé avec succès !";
        } else {
            $error = "Échec lors de l'envoi du message, veuillez réessayer.";
        }
    }
}

$messages = $guestbook->get_messages();
$messages_html_array = [];

foreach (array_reverse($messages) as $message_value) {
    $messages_html_array[] = $message_value->to_html();
}

$messages_html = implode("\n", $messages_html_array);
?>

<?php include 'elements/header.php' ?>

<?php if (!empty($error)) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php elseif (!empty($success)) : ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif ?>

<h1 class="mt-5">Livre d'or</h1>

<form action="/index.php" method="post" class="mb-3">
    <!-- Username Input -->
    <div class="mb-3">
        <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" name="username"
            id="username" placeholder="Votre pseudo" value="<?= htmlspecialchars($username ?? '') ?>">
        <?php if (isset($errors['username'])): ?>
            <div class="invalid-feedback"><?= $errors['username'] ?></div>
        <?php endif; ?>
    </div>

    <!-- Message Input -->
    <div class="mb-3">
        <textarea class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" name="message" id="message"
            placeholder="Votre message" rows="4"><?= htmlspecialchars($message_text ?? '') ?></textarea>
        <?php if (isset($errors['message'])): ?>
            <div class="invalid-feedback"><?= $errors['message'] ?></div>
        <?php endif; ?>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<h1>Vos messages :</h1>
<?= $messages_html ?>

<div class="d-flex align-items-center text-center">
    <hr class="flex-grow-1">
    <span class="mx-3 text-secondary">&hearts;</span>
    <hr class="flex-grow-1">
</div>

<?php include 'elements/footer.php' ?>