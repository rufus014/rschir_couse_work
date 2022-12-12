<?php 
    session_start();
    
    include './vendor/bookinfo.php';
    include './vendor/carouselinfo.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>На полку</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="./assets/css/base.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/card.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/carousel.css">
        <script src="./assets/js/carousel.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="icons/book-shelf.png" type="image/png">
    </head>
    <body>
    
    <?php include_once './templates/header.php'?>
    <?php include './templates/carousel.php' ?>


        <section class="book-blok">
            <?php foreach ($books as $book): ?>
            <div class="card" data-bookid=<?=$book['book_id']?>>
                <a href="<?= "./product.php?id=" . $book['book_id']?>">
                    <div><img src=<?= $book['image'] ?>  class="book-img" alt="book"></div>
                    <p><?= $book['name'] ?></p>
                </a>
                <p><?= $book['price'] ?>р.</p>
            </div>
            <?php endforeach; ?>
        </section>

        <?php include_once './templates/footer.php' ?>
        <script src="./assets/js/carousel.js" type="text/javascript"></script>

    </body>

</html>
