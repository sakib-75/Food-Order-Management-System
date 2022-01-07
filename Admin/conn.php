<?php

$conn = new mysqli('localhost', 'root', '', 'food');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>