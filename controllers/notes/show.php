<?php

$config = require("config.php");
$db = new Database($config['database']);
$id = $_GET['id'];
$note = $db->query('select * from notes where id = :id', [':id' => $id])->findOrFail();
$heading = "Note {$id}";
$currentUserID = 1;

authorize($note['user_id'] === $currentUserID);

require "views/notes/show.view.php";