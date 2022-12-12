<?php

require_once 'connect.php';

$sql = "SELECT book.book_id, book.image, book.name, author.author, book.annotation,publisher.pub_name, series.series_name, book_year.book_year, book.book_format, cover_type.cover_name, book.pages, book.weight, book.edition, book.price
        FROM book
        INNER JOIN author ON author.author_id = book.author_id
        INNER JOIN publisher ON publisher.pub_id = book.pub_id
        INNER JOIN series ON series.series_id = book.series_id
        INNER JOIN book_year ON book_year.year_id = book.year_id
        INNER JOIN cover_type ON cover_type.cover_id = book.cover_id";

$check_book = $connect->query($sql);

while($temp = $check_book->fetch(PDO::FETCH_ASSOC)){
    $books[] = $temp;
}