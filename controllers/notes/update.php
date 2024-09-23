<?php


use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserID = 1;


$id = $_POST['id'];
$note = $db->query('select * from notes where id = :id', [':id' => $id])->findOrFail();


authorize($note['user_id'] === $currentUserID);

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1000 characters is required.';
}

$errors = [];

if (count($errors)) {
    return view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id'=> $id,
    'body'=> $_POST['body'],
]);

header('location: /notes');
die();