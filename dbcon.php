<?php

$conn = mysqli_connect('localhost', 'Rhino', '', 'PHP_FIRST');

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}
