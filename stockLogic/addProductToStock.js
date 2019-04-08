var count = 1;

//////////////////////////////////////////////////insertelések///////////////////////////////////////////////////////////////

function insertAisle() {
    if($('#aisleNumber').val() != ""){
        var params = "aisleName="+$('#aisleNumber').val() + "&aisleCompany=" + $('#stockName').val();
        var httpc = new XMLHttpRequest(); // simplified for clarity
        var url = "stockLogic/insertStockModal.php";
        httpc.open("POST", url, true); // sending as POST

        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        httpc.onreadystatechange = function() { //Call a function when the state changes.
            if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
                //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
                $('#aisle').prepend(this.responseText);
                $("button#modalInsertButton").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
                setTimeout(successModalAction, 700);
                setRack();
            }
        };
        httpc.send(params);
    }else{
        $('input#aisleNumber').addClass("is-invalid");
        $('div#modalMessage').html("Üres mező!");
    }
};

function insertRack() {
    if($('#rackNumber').val() != ""){
    var params = "rackName="+$('input#rackNumber').val() + "&rackAisle=" + $('#aisle').val() + "&action=insertRack";
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "stockLogic/insertStockModal.php";
    console.log($('input#rackNumber').val());
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            $('#rack').prepend(this.responseText);
            $("button#modalInsertButton").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
            setTimeout(successModalAction, 700);
            setShelf();
        }
    };
    httpc.send(params);
    }else{
        $('input#rackNumber').addClass("is-invalid");
        $('div#modalMessage').html("Üres mező!");
    }
};

function insertShelf(){
    if($('#shelfNumber').val() != ""){
        var params = "shelfName="+$('input#shelfNumber').val() + "&shelfRack=" + $('#rack').val() + "&action=insertShelf";
        var httpc = new XMLHttpRequest(); // simplified for clarity
        var url = "stockLogic/insertStockModal.php";
        console.log($('input#shelfNumber').val());
        httpc.open("POST", url, true); // sending as POST
    
        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        httpc.onreadystatechange = function() { //Call a function when the state changes.
            if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
                //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
                $('#shelf').prepend(this.responseText);
                $("button#modalInsertButton").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
                setTimeout(successModalAction, 700);
                setBin();
            }
        };
        httpc.send(params);
    }else{
        $('input#shelfNumber').addClass("is-invalid");
        $('div#modalMessage').html("Üres mező!");
    }
}

function insertBin(){
    if($('#binNumber').val() != ""){
        var params = "binName="+$('input#binNumber').val() + "&binShelf=" + $('#shelf').val() + "&action=insertBin";
        var httpc = new XMLHttpRequest(); // simplified for clarity
        var url = "stockLogic/insertStockModal.php";
        console.log($('input#binNumber').val());
        httpc.open("POST", url, true); // sending as POST
    
        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        httpc.onreadystatechange = function() { //Call a function when the state changes.
            if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
                //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
                $('#bin').prepend(this.responseText);
                $("button#modalInsertButton").html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Töltés...');
                setTimeout(successModalAction, 700);
            }
        };
        httpc.send(params);
    }else{
        $('input#shelfNumber').addClass("is-invalid");
        $('div#modalMessage').html("Üres mező!");
    }
}


/////////////////////////////////////////////////setelések/////////////////////////////////////////////////////////////

//Amikor kiválasztunk egy raktárak, akkor beállítja az utcák select-jét!
function setAisle(){
    var params = "stockId=" + $('#stockName').val();
    //console.log($('#stockName').val());  //consleba kiíratja a raktárhelynek a számát/nevét
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "stockLogic/insertStockModal.php";
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            $('#aisle').html(this.responseText);
            $('#smallAisle').html('<a href="" onclick="showAisleModal()" data-toggle="modal" data-target="#insertModal">Hozzáadás</a>');
            setRackEmpty();
            setShelfEmpty();
            setBinEmpty();
        }
    };
    httpc.send(params);
};

//Amikor kiválasztjuk az utcát akkor beállítja az álványokat
function setRack(){
var params = "aisleId=" + $('#aisle').val() + "&action=setRack";
    //console.log($('#stockName').val());  //consleba kiíratja a raktárhelynek a számát/nevét
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "stockLogic/insertStockModal.php";
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            $('#rack').html(this.responseText);
            $('#smallRack').html('<a href="" onclick="showRackModal()" data-toggle="modal" data-target="#insertModal">Hozzáadás</a>');
            setShelfEmpty();
            setBinEmpty();
        }
    };
    httpc.send(params);
};

function setShelf(){
    var params = "rackId=" + $('#rack').val() + "&action=setShelf";
    //console.log($('#stockName').val());  //consleba kiíratja a raktárhelynek a számát/nevét
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "stockLogic/insertStockModal.php";
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            $('#shelf').html(this.responseText);
            $('#smallShelf').html('<a href="" onclick="showShelfModal()" data-toggle="modal" data-target="#insertModal">Hozzáadás</a>');
            setBinEmpty();
        }
    };
    httpc.send(params);
}

function setBin(){
    var params = "shelfId=" + $('#shelf').val() + "&action=setBin";
    //console.log($('#stockName').val());  //consleba kiíratja a raktárhelynek a számát/nevét
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "stockLogic/insertStockModal.php";
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            $('#bin').html(this.responseText);
            $('#smallBin').html('<a href="" onclick="showBinModal()" data-toggle="modal" data-target="#insertModal">Hozzáadás</a>');
        }
    };
    httpc.send(params);
}

///////////////////////////////////////////////Set empty the select input/////////////////////////////////////////////////

    function setRackEmpty(){
        $("#rack").html('<option value="">Válassz raktárt!</option>');
    };

    function setShelfEmpty(){
        $("#shelf").html('<option value="">Válassz polcot!</option>');
    };

    function setBinEmpty(){
        $("#bin").html('<option value="">Válassz dobozt!</option>');
    };


////////////////////////////////////////////all data//////////////////////////////////////////////////////////////

//Az összes terméket amit eddig felvettünk tárolja session-ben
function allData(){
    if(
        $('#productNumber').val() != "" &&
        $('#productQuantity').val() != "" &&
        $('#stockName').val() != "" &&
        $('#aisle').val() != "" &&
        $('#rack').val() != "" &&
        $('#shelf').val() != "" &&
        $('#bin').val() != ""
    ){
        var params =
            "productNumber=" + $('#productNumber').val() +
            "&productQuantity=" + $('#productQuantity').val() +
            "&stockName=" + $('#stockName').val() +
            "&aisle=" + $('#aisle').val() +
            "&rack=" + $('#rack').val() +
            "&shelf=" + $('#shelf').val() +
            "&bin=" + $('#bin').val() +
            "&count=" + count +
            "&action=insertToSession";
        //console.log($('#stockName').val());  //consleba kiíratja a raktárhelynek a számát/nevét
        var httpc = new XMLHttpRequest(); // simplified for clarity
        var url = "stockLogic/insertStockModal.php";
        httpc.open("POST", url, true); // sending as POST

        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        httpc.onreadystatechange = function() { //Call a function when the state changes.
            if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
                //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
                $('#inputEnd').removeClass('d-none');
                //alert(this.responseText);
                count++;
            }
        };
        httpc.send(params);
    }else {
        ///////////////////////////////////////////////////////////!!!!!///////////////////////////////
        errorModal2();
        console.log("siker");
    }
}

//////////////////////////////////////////////modal-ok//////////////////////////////////////////////////////////////////
function modal(){
    var params = "productNumber=" + $('#productNumber').val() + "&action=checkProductNumber";

    //console.log($('#stockName').val());  //consleba kiíratja a raktárhelynek a számát/nevét
    var httpc = new XMLHttpRequest(); // simplified for clarity
    var url = "stockLogic/insertStockModal.php";
    httpc.open("POST", url, true); // sending as POST

    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    httpc.onreadystatechange = function() { //Call a function when the state changes.
        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
            //alert(httpc.responseText); // some processing here, or whatever you want to do with the response
            //$('#responseText').html(this.responseText);
            $('#responseText').html(this.responseText);
        }
    };
    httpc.send(params);
}

function showAisleModal(){
    $('#modalBody').html
        (
            '<div class="form-group">' + 
                '<label for="aisleNumber">Utca megnevezése:</label>' +
                '<input placeholder="Megnevezés" type="text" class="form-control" id="aisleNumber">' +
                '<div class="valid-feedback" id="modalMessage"></div>' +
            '</div>'
        );
    $('#modalFooter').html
        (
            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>' +
            '<button type="button" class="btn btn-primary" onclick="insertAisle()" id="modalInsertButton">Felvitel</button>'
        );
    $('#modalTitle').html('Utca felvitele');
}

function showRackModal(){
    $('#modalBody').html
    (
        '<div class="form-group">' + 
            '<label for="rackNumber">Álvány megnevezése:</label>' +
            '<input placeholder="Megnevezés" type="text" class="form-control" id="rackNumber">' +
            '<div class="valid-feedback" id="modalMessage"></div>' +
        '</div>'
    );
    $('#modalFooter').html
        (
            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>' +
            '<button type="button" class="btn btn-primary" onclick="insertRack()" id="modalInsertButton">Felvitel</button>'
        );
    $('#modalTitle').html('Álvány felvitele');
}

function showShelfModal(){
    $('#modalBody').html
    (
        '<div class="form-group">' + 
            '<label for="shelfNumber">Polc megnevezése:</label>' +
            '<input placeholder="Megnevezés" type="text" class="form-control" id="shelfNumber">' +
            '<div class="valid-feedback" id="modalMessage"></div>' +
        '</div>'
    );
    $('#modalFooter').html
        (
            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>' +
            '<button type="button" class="btn btn-primary" onclick="insertShelf()" id="modalInsertButton">Felvitel</button>'
        );
    $('#modalTitle').html('Polc felvitele');
}

function showBinModal(){
    $('#modalBody').html
    (
        '<div class="form-group">' + 
            '<label for="binNumber">Doboz megnevezése:</label>' +
            '<input placeholder="Megnevezés" type="text" class="form-control" id="binNumber">' +
            '<div class="valid-feedback" id="modalMessage"></div>' +
        '</div>'
    );
    $('#modalFooter').html
        (
            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>' +
            '<button type="button" class="btn btn-primary" onclick="insertBin()" id="modalInsertButton">Felvitel</button>'
        );
    $('#modalTitle').html('Doboz felvitele');
}

function errorModal(){
    Swal.fire({
        type: 'error',
        title: 'Hiba',
        text: 'Töltsd ki a cikkszám mezőt!'
      });
}

function errorModal2(){
    Swal.fire({
        type: 'error',
        title: 'Hiba',
        text: 'Minden mező kitöltése kötelező!'
    });
}

function warningModal(){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
      });
      
      swalWithBootstrapButtons.fire({
        title: 'Nem létezik!',
        text: "Ez a cikkszám nem szerepel az adatbázisban, fel szeretné venni a terméket?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Felvitel',
        cancelButtonText: 'Vissza',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
            window.location.assign("newProduct.php?productNumber=" + $("input#productNumber").val());
        }
      });
}

function successModalAction(){
    $('#insertModal').modal('hide');
    setTimeout(closeModal, 300);
}

function closeModal(){
    $('#modalTitle').html('Hiba');
    $('#modalBody').html('Forduljon rendszergazdájához!');
    $('#modalFooter').html('');
}
