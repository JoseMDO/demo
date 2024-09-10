<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1> <?= $note['body'] ?> </h1>
    <a href="/notes" class="underline text-blue-500 mt-6">Back to notes</a>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
