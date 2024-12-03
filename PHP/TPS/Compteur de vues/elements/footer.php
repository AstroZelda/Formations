<?php
require_once 'utils/counter_functions.php';
require_once 'class/DoubleCounter.php';

$counter = new DoubleCounter();

if (!isset($_SESSION['previous_page']) || $_SERVER['SCRIPT_NAME'] !== $_SESSION['previous_page']) {
  $counter->increment();
}

$_SESSION['previous_page'] = $_SERVER['SCRIPT_NAME'];

?>

</div> <!-- container -->
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted"><?= $counter->get_count('page') ?> visited.</span>
  </div>
</footer>

<script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>