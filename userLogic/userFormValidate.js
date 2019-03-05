$(document).ready(function(){
    //inputok átmeneti ellenőrzése
    /*$("input").on("change paste keyup", function(){
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
    });*/


    $("#username").on("change paste keyup", function(){
        var illegalChars = new RegExp( "/^[a-zA-Z0-9]+$/" );
        var username = $("#username");
        var feedback = $("#feedback");
        if(username.val() != ""){
            username.removeClass("is-invalid").addClass("is-valid");
            feedback.removeAttr("class").addClass("valid-feedback").html("Megfelelő Felhasználónév!");
        }else if(illegalChars.test(username)){
            username.removeClass("is-valid").addClass("is-invalid");
            feedback.removeAttr("class").addClass("invalid-feedback").html("Helytelen karaktert tartalmaz!");
            alert("helyes");
        }else{
            username.removeClass("is-valid").addClass("is-invalid");
            feedback.removeAttr("class").addClass("invalid-feedback").html("Helytelen!");
        }
    });


    //Modal létrehozása, egyben ellenőrzése
    $("a#companyModal").click(function(){
          var string =    '<label for="companyName">Felvenni kívánt cég:</label>' +
                          '<input type="text" class="form-control" id="companyName" name="companyName">' +
                          '<div class="invalid-feedback">Kitöltése kötelező!</div>' +
                          '<label for="companyAddress">Cég címe:</label>' +
                          '<input type="text" class="form-control" id="companyAddress" name="companyAddress">' +
                          '<div class="invalid-feedback">Kitöltése kötelező!</div>' +
                          '<label for="companyEmail">Cég email</label>' +
                          '<input type="email" class="form-control" id="companyEmail" name="companyEmail">' +
                          '<div class="invalid-feedback">Kitöltése kötelező!</div>';
          $('div#modalInputFiled').html(string);
      });
  });

  //Modal validation innentől az egész
  function validateModal() {
    //cég modal inputja
        var modalInput = $("#companyName").val();
        var modalInput2 = $("#companyAddress").val();
        var modalInput3 = $("#companyEmail").val();
        if(modalInput == ""){
            $("#companyName").addClass("is-invalid");
        }else{
            $("#companyName").removeClass("is-invalid");
        }
        if(modalInput2 == ""){
            $("#companyAddress").addClass("is-invalid");
        }else{
            $("#companyAddress").removeClass("is-invalid");
        }
        if(modalInput3 == ""){
            $("#companyEmail").addClass("is-invalid");
        }else{
            $("#companyEmail").removeClass("is-invalid");
        }
        if(modalInput != "" && modalInput2 != "" && modalInput3 != ""){
            $("#kek").prop( "disabled", true );
            $("#manufacturerName").removeClass("is-invalid");
            $("#kek").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
            //window.location.href = "newProduct.php?msg=success";
            setTimeout(valami, 1000);
            function valami(){
                $( "#insertModal" ).modal('toggle');
                $("#kek").prop( "disabled", false );
                $("#kek").html('Hozzáadás');
                window.location.href = "userLogic/userSignup.php?action=company&text=" + modalInput + "&text2=" + modalInput2 + "&text3=" + modalInput3;
            }
    }}
  
  
      //Ez a rész a visszajelző üzeneteket kezeli, megjeleníti, majd eltűnteti, ez lehet error és success message is.
      $('#message').ready(function() {
          $('#message').fadeIn('slow', function(){
          $('#message').delay(8000).fadeOut(); 
       });
      });