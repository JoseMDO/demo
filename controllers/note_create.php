<?php

$heading = "New Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    dd($_POST);
}

require "views/note_create.view.php" ;