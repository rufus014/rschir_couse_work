<?php
session_start();
include './connect.php';
include './cartinfo.php';

$user = $_SESSION['user']['id'];
$book = $_POST['id'];

if(isset($carts)){
    foreach($carts as $cart){
        if($cart['users_id'] == $user && $cart['book_id'] == $book){
            $sql = "UPDATE cart SET book_count = ? WHERE users_id = ? AND book_id = ?";
            $updatecart = $connect->prepare($sql);
            $updatecart->execute([$cart['book_count'] + 1, $user, $book]);
            break;
        }
        else 
        {
            $sql = "INSERT INTO cart (users_id, book_id, book_count) VALUES (?, ?, 1);";
            $updatecart = $connect->prepare($sql);
            $updatecart->execute([$user, $book]);
            break;
        }
    }
}
else 
{
    $sql = "INSERT INTO cart (users_id, book_id, book_count) VALUES (?, ?, 1);";
    $updatecart = $connect->prepare($sql);
    $updatecart->execute([$user, $book]);
}
