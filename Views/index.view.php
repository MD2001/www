<?php view ('partial/header.php')?>
<?php view ('partial/nav.php')?>
<?php view('partial/banner.php') ?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    Welcome, this is the Home page .
  <?=dd($_SESSION);?>

  </div>
  </main>
  <?php view ('partial/foter.php')?>