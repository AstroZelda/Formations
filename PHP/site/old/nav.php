<?php require_once 'nav_functions.php'; ?>

<nav class="navbar navbar-inverse mb-4">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= $pages[0]['filename'] ?>"><?= TITLE ?? ' -Missing title- ' ?></a>
            </div>
            <div id="navbar" class="navbar-collapse">
                <ul class="nav navbar-nav list-group-horizontal gap-2">
                    <?php include 'menu.php' ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</nav>