<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserID = 1;


$id = $_GET['id'];
$note = $db->query('select * from notes where id = :id', [':id' => $id])->findOrFail();
authorize($note['user_id'] === $currentUserID);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
