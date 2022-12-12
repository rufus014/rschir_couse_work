<?php
session_start();
include './connect.php';

$user = $_SESSION['user']['id'];
$book = $_POST['id'];
$grade = $_POST['grade'];
$text = $_POST['text'];

$sql = "INSERT INTO comments (users_id, book_id, grade, book_com)
        VALUES (?, ?, ?, ?)";
$updatecart = $connect->prepare($sql);
$updatecart->execute([$user, $book, $grade, $text]);