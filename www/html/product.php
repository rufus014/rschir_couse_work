<?php 
session_start();

include './vendor/bookinfo.php';
include './vendor/commentsinfo.php';

$product_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?=$books[$product_id - 1]['name']?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="./assets/css/base.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/product.css">
        <link rel="shortcut icon" href="../icons/book-shelf.png" type="image/png">
    </head>
    <body>

        <?php include_once './templates/header.php';?>

        <main>
            <div id="book" data-bookid = <?= $product_id?>>
                <section id="photo">
                    <div>
                        <img src=<?=$books[$product_id - 1]['image']?>>
                    </div>
                </section>

                <section id="description">
                    <div id="text">
                        <h1><?= $books[$product_id - 1]['name']?></h1>
                        <h2><?= $books[$product_id - 1]['author']?></h2>
                        <br>
                        <p id="annotation"><span >Аннотация:</span><br>
                            <?= $books[$product_id - 1]['annotation']?>
                        </p>
                        <div id="info">
                            <div id="list">
                                <p>Издательство</p>
                                <p>Серия</p>
                                <p>Год издания</p>
                                <p>Кол-во страниц</p>
                                <p>Формат</p>
                                <p>Тип обложки</p>
                                <p>Тираж</p>
                                <p>Вес, г</p>
                            </div>
                            <div id="parametrs">
                                <p><?=$books[$product_id - 1]['pub_name']?></p>
                                <p><?=$books[$product_id - 1]['series_name']?></p>
                                <p><?=$books[$product_id - 1]['book_year']?></p>
                                <p><?=$books[$product_id - 1]['pages']?></p>
                                <p><?=$books[$product_id - 1]['book_format']?></p>
                                <p><?=$books[$product_id - 1]['cover_name']?></p>
                                <p><?=$books[$product_id - 1]['edition']?></p>
                                <p><?=$books[$product_id - 1]['weight']?></p>
                            </div>
                        </div>
                        <div id="price">
                            <p><?=$books[$product_id - 1]['price']?>р.</p>
                            <button id="cart_btn">В корзину</button>
                        </div>
                    </div>
                </section>
            </div>
            <div id="comment">
                <h3>Комментарий:</h3>
                    <div id="com">
                        <div>
                            <p id="userName"><?php     
                                if(isset($_SESSION['user'])){
                                    echo $_SESSION['user']['login'];
                                }
                                else {
                                    echo 'Войдите, чтобы оставить комментари';
                                } ?>
                            </p>
                            <select id="grade"> 
                                <option value="1">оценка 1*</option>
                                <option value="2">оценка 2*</option>
                                <option value="3">оценка 3*</option>
                                <option value="4">оценка 4*</option>
                                <option value="5">оценка 5*</option>
                                <option value="6">оценка 6*</option>
                                <option value="7">оценка 7*</option>
                                <option value="8">оценка 8*</option>
                                <option value="9">оценка 9*</option>
                                <option value="10">оценка 10*</option>
                            </select>
                            <textarea id="textarea" placeholder="текст комментария"></textarea>
                        </div>
                        <button id="commentButton"><img src="./icons/check.png"></button>
                    </div>
                <div id="com_area">
                    <h5>Здесь будут появляться коментарии:</h5>
                    <?php 
                        foreach($comments as $comment):
                            if($comment['book_id'] == $product_id):?>
                                <p><?= $comment['login'] . "(" . $comment['grade'] . "*): " . $comment['book_com']?></p>
                    <?php   endif; 
                        endforeach;?>
                </div>
            </div>
        </main>
        <script src="./assets/js/product.js" type="text/javascript"></script>
    </body>

    <?php include_once './templates/footer.php'?>

</html>