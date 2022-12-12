let addToCartBtn = document.getElementById('cart_btn');
let bookId = document.getElementById('book').getAttribute('data-bookid');

let comBtn = document.getElementById('commentButton');
let grade = $('#grade').val();
let comText = document.getElementById("textarea");

//add book to cart
addToCartBtn.onclick = function() {
    jQuery.ajax({
        type: "POST",
        url: "./vendor/cartadd.php",
        dataType: "JSON",
        data: {
            "id": bookId
        }
    });
}

//add comments for book
comBtn.onclick = function() {
    jQuery.ajax({
        type: "POST",
        url: "./vendor/commentsadd.php",
        dataType: "JSON",
        data: {
            "id": bookId,
            "grade": grade,
            "text": comText.value
        },
    });
    document.location.reload();
}