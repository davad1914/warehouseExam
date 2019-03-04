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
  
      $("a#companyModal").click(function(){
          var string =    '<label for="companyName">Felvenni kívánt cég:</label>' +
                          '<input type="text" class="form-control" id="companyName" name="companyName">' +
                          '<div class="invalid-feedback">Kitöltése kötelező!</div>' +
                          '<label for="companyAddress">Cég címe:</label>' +
                          '<input type="text" class="form-control" id="companyAddress" name="companyAddress">' +
                          '<label for="companyEmail">Cég email</label>' +
                          '<input type="email" class="form-control" id="companyEmail" name="companyEmail">';
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
  
  });

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
        if(modalInput2 == ""){
            $("#companyEmail").addClass("is-invalid");
        }else{
            $("#companyEmail").removeClass("is-invalid");
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
    }}
  
  
      //Ez a rész a visszajelző üzeneteket kezeli, megjeleníti, majd eltűnteti, ez lehet error és success message is.
      $('#message').ready(function() {
          $('#message').fadeIn('slow', function(){
          $('#message').delay(8000).fadeOut(); 
       });
      });