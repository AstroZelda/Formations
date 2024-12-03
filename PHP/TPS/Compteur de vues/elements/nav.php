<?php 
require_once 'utils/functions.php';
require_once 'utils/constants.php';

$login = $_SESSION['login'] ?? null;
$is_admin = false;

if (isset($_SESSION['roles']) && in_array(ROLE_ADMIN, $_SESSION['roles'])) {
  $is_admin = true;
}

$connection_text = '';

if (isset($login)) {
  $connection_text .= $login;
  if ($is_admin) {
    $connection_text .= ' - <strong>ADMIN</strong>';
  }
} else {
  $connection_text .= 'Connexion';
}
?>


<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php"><?= TITLE ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0"> 
            <?= get_all_nav_items() ?>
        </ul>
        <a href="/connection.php" class="nav-link ms-auto text-white"><?= $connection_text ?></a>
      </div>
    </div>
  </nav>
</header>