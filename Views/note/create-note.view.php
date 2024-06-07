<?php view('partial/header.php') ?>
<?php view('partial/nav.php') ?>
<?php view('partial/banner.php',["name_Banner" => "Create Notes"]) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/store">


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 col-span-full mb-4">
                <div>
                    <label for="Note" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                    <div class="mt-2">
                        <input type="text" id="Note" name="Note" value="<?= $_POST['Note'] ??  ""  ?>" class="block w-full rounded-md border-0 py-1.5 pl-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="her yor write the title of your note" />
                    </div>
                </div>
            </div>


            <div class="col-span-full">
                <label for="Discription" class="block text-sm font-medium leading-6 text-gray-900">Discription</label>
                <div class="mt-2">
                    <textarea id="Discription" name="Discription" rows="3" class="pl-3 block w-full rounded-md border-0 py-1.5 **pl-4** text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="her to write your discription"><?= $_POST['Discription'] ??  ""  ?></textarea>

                </div>
                <!-- this line is  -->
                <p class="mt-3 text-sm leading-6 text-red-600"> <?= $error['Note'] ?? '' ?> </p>

                <!-- the same is -->
                <?php if (isset($error['Discription'])) : ?>
                    <p class="mt-3 text-sm leading-6 text-red-600"><?= $error['Discription'] ?></p>
                <?php endif; ?>

            </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>


        </form>

    </div>
</main>
<?php view('partial/foter.php') ?>