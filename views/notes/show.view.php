<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1> <?= $note['body'] ?> </h1>

    <form method="POST" class="mt-6">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value=" <?= $note['id'] ?>">
      <button type="submit" class="text-sm text-red-500">Delete</button>
    </form>
    <a href="/notes" class="underline text-blue-500 mt-6">Back to notes</a>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
