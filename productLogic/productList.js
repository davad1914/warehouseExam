function addFilters() {

    var params = "searchInput="+ $('#searchInput').val() + "&manufacturer=" + $('#manufacturerSelect').val() + "&category=" + $('#categorySelect').val();
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "productLogic/productListFilters.php";
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            $('.productListView').html(httpc.responseText);
            $('#paginator').addClass('d-none');
        }
    };
    httpc.send(params);

    $('input#aisleNumber').addClass("is-invalid");
    $('div#modalMessage').html("Üres mező!");
}