function addToBasket(product,quantity){
    var params = "whereId=" + product + "&productQuantity=" + quantity + "&orderQuantity=" + $('#product_order_quantity').val();
    var httpc = new XMLHttpRequest();
    var url = "productLogic/insertToBasket.php";
    httpc.open("POST", url, true);

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
        }
    };
    httpc.send(params);
}

function basketModal(product, quantity){
    $('#basket_modal').modal('show')
    $('#modal_title').html('Termék felvétele kosárba');
    $('#modal_body').html(
        '<label for="product_quantity">Darabszám:</label>' +
        '<input class="form-control" id="product_order_quantity" type="number" name="quantity" min="1" max="' + quantity + '">'
    );
    $('#modal_footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button><button type="button" class="btn btn-primary" onclick="addToBasket(' + product + ',' + quantity + ')">Felvitel</button>');
}