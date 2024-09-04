<?php




$config = require("config.php");
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [':id' => $id])->fetch();


if (!$note) {
    abort();
}

if ($note['user_id'] !== 1) {
    abort(403);
}

$heading = "Note {$id}";

require "views/note.view.php";