<?php

use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserID = 1;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd($currentUserID);
    $id = $_POST['id'];
    $note = $db->query('select * from notes where id = :id', [':id' => $id])->findOrFail();
    authorize($note['user_id'] === $currentUserID);
    $db->query('delete from notes where id = :id', ["id" => $id]);

    header('location: /notes');
    exit();

} else {
    $id = $_GET['id'];
    $note = $db->query('select * from notes where id = :id', [':id' => $id])->findOrFail();
    authorize($note['user_id'] === $currentUserID);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}
