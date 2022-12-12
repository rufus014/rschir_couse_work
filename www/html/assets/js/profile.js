let colInput = document.getElementsByClassName('count');
let plusBtn = document.getElementsByClassName('plus');
let minusBtn = document.getElementsByClassName('minus');
let deleteBtn = document.getElementsByClassName('deleteBtn');
let bookId = document.getElementsByClassName('book');

//increase book in cart
for (let i = 0; i < plusBtn.length; i++) {
    plusBtn[i].onclick = function() {
        jQuery.ajax({
            type: "POST",
            url: "./vendor/cartupdate.php",
            dataType: "JSON",
            data: {
                "id": bookId[i].getAttribute('data-bookid'),
                "count": +colInput[i].value + +1
            }
        });
        document.location.reload();
    }
}

//decrease book in cart
for (let i = 0; i < minusBtn.length; i++) {
    minusBtn[i].onclick = function() {
        if(colInput[i].value > 1){
            jQuery.ajax({
                type: "POST",
                url: "./vendor/cartupdate.php",
                dataType: "JSON",
                data: {
                    "id": bookId[i].getAttribute('data-bookid'),
                    "count": +colInput[i].value - +1
                },
                success: function(msg){
                    alert("Data saved")
                }
            });
            document.location.reload();
        }
    }
}

//delete book from cart
for (let i = 0; i < deleteBtn.length; i++) {
    deleteBtn[i].onclick = function() {
        jQuery.ajax({
            type: "POST",
            url: "./vendor/cartdelete.php",
            dataType: "JSON",
            data: {
                "id": bookId[i].getAttribute('data-bookid'),
            }
        });
        document.location.reload();
    }
}

