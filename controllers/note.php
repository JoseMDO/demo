<?php

$config = require("config.php");
$db = new Database($config['database']);
$id = $_GET['id'];
$note = $db->query('select * from notes where id = :id', [':id' => $id])->fetch();
$heading = "Note {$id}";
$currentUserID = 1;

if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserID) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";