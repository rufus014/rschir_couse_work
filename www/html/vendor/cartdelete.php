<?php
session_start();
include './connect.php';

$user = $_SESSION['user']['id'];
$book = $_POST['id'];

$sql = "DELETE FROM cart WHERE users_id = ? AND book_id = ?";
$updatecart = $connect->prepare($sql);
$updatecart->execute([$user, $book]);