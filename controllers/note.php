<?php




$config = require("config.php");
$db = new Database($config['database']);

$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [':id' => $id])->fetch();



if (!$note) {
    abort();
}

$currentUserID = 1;

if ($note['user_id'] !== $currentUserID) {
    abort(Response::FORBIDDEN);
}

$heading = "Note {$id}";

require "views/note.view.php";