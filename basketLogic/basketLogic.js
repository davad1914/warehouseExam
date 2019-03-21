function deleteBasketItem(item){
    $('#basket_modal').modal('show');
    $('#modal_title').html('Törlés megerősítése');
    $('#modal_body').html("Biztosan töri az elemet a kosarából?");
    $('#modal_footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><a href="basketLogic/removeFromBasket.php?item=' + item + '" class="btn btn-danger">Törlés</a>');
}