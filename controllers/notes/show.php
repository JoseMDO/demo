<?php
$config = require base_path('config.php');
$db = new Database($config['database']);
$id = $_GET['id'];
$note = $db->query('select * from notes where id = :id', [':id' => $id])->findOrFail();
$currentUserID = 1;

authorize($note['user_id'] === $currentUserID);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);