<?php
session_start();
$_SESSION['role'] = 'administrateur';

?>

<?php include 'header.php'; ?>

<div class="starter-template">
    <h1>Page d'accueil</h1>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae temporibus nemo tenetur,
        repudiandae iste adipisci delectus incidunt totam quasi. Possimus, tenetur! Sint, alias voluptates vero
        nulla saepe voluptatum quisquam tempore.</p>
</div>

<?php include 'footer.php'; ?>