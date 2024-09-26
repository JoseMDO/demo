<?php

$_SESSION['name'] = 'Jose';

view("index.view.php", [
    'heading' => 'Home',
]);