<?php view ('partial/header.php') ?>
<?php view('partial/nav.php') ?>
<?php view('partial/banner.php',["name_Banner" => "Notes"]) ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

    <p class="mb-6">
      <a href="/note/create" class="text-blue-500 hover:undeline">Create note</a>
    </p>

    <ul>
      <?php
      foreach ($notes as $note) : ?>

        <li>
          <a href="/show?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($note['Note']) ?>
          </a>
        </li>

      <?php endforeach ?>
    </ul>



  </div>
</main>
<?php view('partial/foter.php') ?>