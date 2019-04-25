$(document).ready(function(){
    var isChecked = false;
    $('#sameCheck').on("click", function(){

        if(isChecked == false){
            //console.log('siker');
            $('#billCustomerName').prop('disabled', true);
            $('#billCountry').prop('disabled', true);
            $('#billZip').prop('disabled', true);
            $('#billCity').prop('disabled', true);
            $('#billStreetAddress').prop('disabled', true);
            removeFeedback();
            isChecked = true;
        }else{
            //console.log('most ne');
            $('#billCustomerName').prop('disabled', false);
            $('#billCountry').prop('disabled', false);
            $('#billZip').prop('disabled', false);
            $('#billCity').prop('disabled', false);
            $('#billStreetAddress').prop('disabled', false);
            isChecked = false;
        }
    });
    $("input.form-control").on("change paste keyup", function(){
        if($(this).val() != ""){
            $(this).removeClass("is-invalid").addClass("is-valid");
        }else if($(this).val() == ""){
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    });

    $('#saveDeliveryButton').click(function(){
        var error = 0;
        //Szállítási név ellenőrzése
        var customerName = $('#customerName').val();
        if(customerName == ""){
            $('#customerName').addClass('is-invalid');
            error++;
        }

        //Ország ellenőrzése
        var country = $('#country').val();
        if(country == ""){
            $('#country').addClass('is-invalid');
            error++;
        }

        //Irányítószám ellenörzése
        var number = new RegExp('[0-9]');
        var zip = $('#zip').val();
        if(zip == ""){
            $('#zip').addClass('is-invalid');
            error++;
        }else if(!zip.match(number)){
            $('#zip').addClass('is-invalid');
            $('#zipFeedback').html('Csak szám lehet!');
            error++;
        }

        //Város ellenőrzése
        var city = $('#city').val();
        if(city == ""){
            $('#city').addClass('is-invalid');
            error++;
        }

        //Város ellenőrzése
        var streetAddress = $('#streetAddress').val();
        if(streetAddress == ""){
            $('#streetAddress').addClass('is-invalid');
            error++;
        }

        if(isChecked == false){
                //Szállítási név ellenőrzése
                var billCustomerName = $('#billCustomerName').val();
                if(billCustomerName == ""){
                    $('#billCustomerName').addClass('is-invalid');
                    error++;
                }

                //Ország ellenőrzése
                var billCountry = $('#billCountry').val();
                if(billCountry == ""){
                    $('#billCountry').addClass('is-invalid');
                    error++;
                }

                //Irányítószám ellenörzése
                var number = new RegExp('[0-9]');
                var billZip = $('#billZip').val();
                if(billZip == ""){
                    $('#billZip').addClass('is-invalid');
                    error++;
                }else if(!billZip.match(number)){
                    $('#billZip').addClass('is-invalid');
                    $('#billZipFeedback').html('Csak szám lehet!');
                    error++;
                }

                //Város ellenőrzése
                var billCity = $('#billCity').val();
                if(billCity == ""){
                    $('#billCity').addClass('is-invalid');
                    error++;
                }

                //Város ellenőrzése
                var billStreetAddress = $('#billStreetAddress').val();
                if(billStreetAddress == ""){
                    $('#billStreetAddress').addClass('is-invalid');
                    error++;
                }
        }

        //console.log(isChecked);
        //console.log(error);
        if(error === 0){
            //ajaxal elküldjük az adatokat
            var params =
                'customerName=' + $('#customerName').val() +
                '&country=' + $('#country').val() +
                '&zip=' + $('#zip').val() +
                '&city=' + $('#city').val() +
                '&streetAddress=' + $('#streetAddress').val() +
                '&billCustomerName=' + $('#billCustomerName').val() +
                '&billCountry=' + $('#billCountry').val() +
                '&billZip=' + $('#billZip').val() +
                '&billCity=' + $('#billCity').val() +
                '&billStreetAddress=' + $('#billStreetAddress').val() +
                '&isChecked=' + isChecked;
            var httpc = new XMLHttpRequest(); // simplified for clarity
            var url = "basketLogic/createDeliveryFromBasket.php";
            httpc.open("POST", url, true); // sending as POST

            httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            httpc.onreadystatechange = function() { //Call a function when the state changes.
                if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
                    //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
                    window.location = 'orderList.php';
                }
            };
            httpc.send(params);
        }
    });

});

function removeFeedback(){
    $('#billCustomerName').removeClass('is-invalid');
    $('#billCountry').removeClass('is-invalid');
    $('#billZip').removeClass('is-invalid');
    $('#billCity').removeClass('is-invalid');
    $('#billStreetAddress').removeClass('is-invalid');

    $('#billCustomerName').removeClass('is-valid');
    $('#billCountry').removeClass('is-valid');
    $('#billZip').removeClass('is-valid');
    $('#billCity').removeClass('is-valid');
    $('#billStreetAddress').removeClass('is-valid');
}