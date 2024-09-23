<?php


dd($_SESSION['name'] = "Jose");

view("about.view.php", [
    'heading' => 'About Us',
]);