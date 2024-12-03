<?php
require_once 'utils/functions.php';
require_class('Creneau');
require_class('Form');

$creneau = new Creneau(9, 12);
$creneau1 = new Creneau(14, 16);

?>

<?php include 'elements/header.php' ?>

<h1 class="mt-5">Title</h1>
<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae inventore rem exercitationem. Error,
    rem ducimus veritatis doloribus explicabo repellat, odio quam nostrum iste molestias quidem alias, reprehenderit
    placeat magni earum!</p>
<p>Bottom text</p>

<hr>

<h2>Ouverture :</h2>
<form>
    <div class="form-group">
        <?= Form::radio('test-radio', 'radio 1') ?>
        <?= Form::radio('test-radio', 'radio 2') ?>
        <?= Form::radio('test-radio', 'radio 3') ?>
    </div>
    
    <div class="form-group">
        <?= Form::checkbox('test-checkbox', 'checkbox 1') ?>
        <?= Form::checkbox('test-checkbox', 'checkbox 2') ?>
        <?= Form::checkbox('test-checkbox', 'checkbox 3') ?>
    </div>
</form>



<?php include 'elements/footer.php' ?>