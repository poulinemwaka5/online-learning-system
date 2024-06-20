<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'Oline';

$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}
