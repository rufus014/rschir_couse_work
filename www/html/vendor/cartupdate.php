<?php
session_start();
include './connect.php';

$user = $_SESSION['user']['id'];
$book = $_POST['id'];
$count = $_POST['count'];

$sql = "UPDATE cart SET book_count = ? WHERE users_id = ? AND book_id = ?";
$updatecart = $connect->prepare($sql);
$updatecart->execute([$count, $user, $book]);