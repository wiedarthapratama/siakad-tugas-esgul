<?php
$conn = new mysqli("localhost", "root", "password", "tugas11_pweb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>