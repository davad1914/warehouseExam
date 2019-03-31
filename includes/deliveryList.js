function showProducts(invoiceId){
    var params = "invoiceId=" + invoiceId;
    //console.log($('#stockName').val());  //consleba kiíratja a raktárhelynek a számát/nevét
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "includes/invoiceListModal.php";
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            $('#showProductsModal').modal('show');
            $('#modal_title').html('Termékek:');
            $('#modal_body').html(this.responseText);
        }
    };
    httpc.send(params);
}