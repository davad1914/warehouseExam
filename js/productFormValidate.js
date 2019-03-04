$(document).ready(function(){
  //Modal select inputhoz való kódok
    $("a#modalCategory").click(function(){
        var string =    '<label for="modalInput" id="modalBody">Felvenni kívánt kategória:</label>' +
                        '<input type="text" class="form-control" id="modalInput" name="inputCategory">' +
                        '<div class="invalid-feedback">Olyan vagy mint a babám, mindenben megtalálod a hibát lol :/!</div>';
        $('div#modalInputFiled').html(string);
    });
    

    /*$("body").on("change paste keyup","#modalInput",function(e){
        var modalButton = $("#modalSaveButton");
        if(e.target.value.length >= 3){
            modalButton.prop("disabled", false);
        }else{
            modalButton.prop("disabled", true);
        }
    });*/

    $("a#modalUnit").click(function(){
        var string =    '<label for="modalInput">Felvenni kívánt mértékegység:</label>' +
                        '<input type="text" class="form-control" id="unitName" name="unitName">' +
                        '<div class="invalid-feedback">Kitöltése kötelező!</div>' +
                        '<label for="shortUnitName">Felvenni kívánt mértékegység rövidítése:</label>' +
                        '<input type="text" class="form-control" id="shortUnitName" name="shortUnitName">' +
                        '<div class="invalid-feedback">Kitöltése kötelező!</div>';;
        $('div#modalInputFiled').html(string);
        inputChange("#unitName");
    });

    $("a#modalManufacturer").click(function(){
        var string =    '<label for="manufacturerName">Felvenni kívánt gyártó:</label>' +
                        '<input type="text" class="form-control" id="manufacturerName" name="manufacturerName">' +
                        '<div class="invalid-feedback">Kitöltése kötelező!</div>' +
                        '<label for="manufacturerAddress">Gyártó címe (opcionális):</label>' +
                        '<input type="text" class="form-control" id="manufacturerAddress" name="manufacturerAddress">' +
                        '<label for="manufacturerEmail">Gyártó email címe (opcionális):</label>' +
                        '<input type="email" class="form-control" id="manufacturerEmail" name="manufacturerEmail">';
        $('div#modalInputFiled').html(string);
    });

    $("input").on("change paste keyup", function(){
        if($(this).val() != ""){
            $(this).removeClass("is-invalid").addClass("is-valid");
        }else if($(this).val() == ""){
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    });

    $("select").change(function(){
        if($(this).val() != ""){
            $(this).removeClass("is-invalid").addClass("is-valid");
        }else if($(this).val() == ""){
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    });

    $("textarea").on("change paste keyup", function(){
        if($(this).val() != ""){
            $(this).removeClass("is-invalid").addClass("is-valid");
        }else if($(this).val() == ""){
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    });

})

//validáljuk a geci inputokat a még gecibb modal-ba
function validateModal() {

    //category modal inputja!!
    if($("#modalInput").length > 0){
        var modalInput = $("#modalInput").val();
        if(modalInput == ""){
            $("#modalInput").addClass("is-invalid");
        }else{
            $("#kek").prop( "disabled", true );
            $("#modalInput").removeClass("is-invalid");
            $("#kek").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
            //window.location.href = "newProduct.php?msg=success";
            setTimeout(valami, 1000);
            function valami(){
                $( "#insertModal" ).modal('toggle');
                $("#kek").prop( "disabled", false );
                $("#kek").html('Hozzáadás');
                window.location.href = "includes/insertToDatabase.php?action=category&text=" + modalInput;
            }
        }
    }

    //mértékegység modal inputja
    if($("#unitName").length > 0 && $("#shortUnitName").length){
        var modalInput = $("#unitName").val();
        var modalInput2 = $("#shortUnitName").val();
        if(modalInput == ""){
            $("#unitName").addClass("is-invalid");
        }else{
            $("#unitName").removeClass("is-invalid");
        }
        if(modalInput2 == ""){
            $("#shortUnitName").addClass("is-invalid");
        }else{
            $("#shortUnitName").removeClass("is-invalid");
        }
        if(modalInput != "" && modalInput2 != ""){
            $("#kek").prop( "disabled", true );
            $("#unitName").removeClass("is-invalid");
            $("#kek").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
            //window.location.href = "newProduct.php?msg=success";
            setTimeout(valami, 1000);
            function valami(){
                $( "#insertModal" ).modal('toggle');
                $("#kek").prop( "disabled", false );
                $("#kek").html('Hozzáadás');
                window.location.href = "includes/insertToDatabase.php?action=unit&text=" + modalInput + "&text2=" + modalInput2;
            }
        }
    }

    //gyártó modal inputja
    if($("#manufacturerName").length > 0 && $("#manufacturerAddress").length > 0 && $("#manufacturerEmail").length > 0){
        var modalInput = $("#manufacturerName").val();
        var modalInput2 = $("#manufacturerAddress").val();
        var modalInput3 = $("#manufacturerEmail").val();
        if(modalInput == ""){
            $("#manufacturerName").addClass("is-invalid");
        }else{
            $("#manufacturerName").removeClass("is-invalid");
        }
        if(modalInput != ""){
            $("#kek").prop( "disabled", true );
            $("#manufacturerName").removeClass("is-invalid");
            $("#kek").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
            //window.location.href = "newProduct.php?msg=success";
            setTimeout(valami, 1000);
            function valami(){
                $( "#insertModal" ).modal('toggle');
                $("#kek").prop( "disabled", false );
                $("#kek").html('Hozzáadás');
                window.location.href = "includes/insertToDatabase.php?action=manufacturer&text=" + modalInput + "&text2=" + modalInput2 + "&text3=" + modalInput3;
            }
        }
    }}


    //Ez a rész a visszajelző üzeneteket kezeli, megjeleníti, majd eltűnteti, ez lehet error és success message is.
    $('#message').ready(function() {
        $('#message').fadeIn('slow', function(){
        $('#message').delay(8000).fadeOut(); 
     });
    });

//ajax----------------------------------------------------------------------------------------
/*function showUser(str){
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $.ajax( {
                    //<!--insert.php calls the PHP file-->
                    url: "includes/insertToDatabase.php",
                    method: "post",
                    data: srt,
                    dataType: "text",
                    success: function(strMessage) {
                        $("#message").text(strMessage);
                        $("#my-form")[0].reset();
                    }
                });
            }
        };
        //xmlhttp.open("GET","includes/insertToDatabase.php?q="+str,true);
        //xmlhttp.send();
    }
}*/
//---------------------------------------------------------------------------------------