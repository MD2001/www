<?php view ('partial/header.php')?>
<?php view ('partial/nav.php')?>
<?php view('partial/banner.php',["name_Banner" => "Note"]) ?>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

  <p class="mb-6">
    <a href="/notes?id=<?= $notes['user_id']?>" class="text-blue-600 hover:underline "> Go back...</a>
  </p>

   <p> <?=htmlspecialchars($notes['Discription'])?></p>

   <form action="/note" method="POST">
   <input type="hidden"name="_method" value="DELETE">
    <input type="hidden" name="id" value="<?=$notes["id"]?>">
    <button type="submit" class="mt-6 text-red-600 text-sm"> Delete</button>
   </form>
  </div>
  </main>
  <?php view ('partial/foter.php')?>