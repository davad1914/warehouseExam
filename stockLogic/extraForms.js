var count = 1;
function addForms(){
    count++;
    var form = '<hr>' +
                '<div class="form-row">'+
                    '<div class="form-group col-md"> '+
                    '<label for="productNumber'+ count +'">Cikkszám</label> '+
                        '<div class="input-group mb-3"> '+
                        '<input type="text" class="form-control" placeholder="Cikkszám" aria-label="productNumber" aria-describedby="productNumber" name="productNumber'+count+'" id="productNumber'+count+'"> '+
                            '<div class="input-group-append"> '+
                            '<button class="btn btn-outline-secondary" type="button" id="stockPlaceButton'+count+'">Kész</button> '+
                            '</div> '+
                        '</div> '+
                    '</div> '+
                    '<div class="form-group col-md"> '+
                        '<label for="stockName'+count+'">Raktár</label> '+
                            '<select class="form-control" id="stockName'+count+'"> '+
                                '<?php if(isset($stockPlaces) && count($stockPlaces) > 0) : ?> '+
                                    '<option>Válassz!</option> '+
                                '<?php foreach($stockPlaces as $listItem) : ?> '+
                                    '<option value="<?php echo $listItem["stock_id"] ?>"><?php echo $listItem["stock_name"] ?></option> '+
                                '<?php endforeach; ?> '+
                                '<?php else : ?> '+
                        '<option>Nincs raktár felvéve!</option> '+
                        '<?php endif; ?> </select> '+
                    '</div> '+
                '</div> '+
                '<div class="form-row "> '+
                '<div class="form-group col-6 col-lg-3">'+
                '<label for="aisle'+count+'">Utca</label> '+
                '<select name="aisle'+count+'" id="aisle'+count+'" class="form-control"> '+
                '<option value="">Válassz!</option> '+
                '</select> '+
                '</div> '+
                '<div class="form-group col-6 col-lg-3"> '+
                '<label for="rack'+count+'">Álvány</label> '+
                '<select name="rack'+count+'" id="rack'+count+'" class="form-control"> '+
                '<option value="">Válassz!</option> '+
                '</select> '+
                '</div> '+
                '<div class="form-group col-6 col-lg-3"> '+
                '<label for="shelf'+count+'">Polc</label> '+
                '<select name="shelf'+count+'" id="shelf'+count+'" class="form-control">'+
                '<option value="">Válassz!</option> '+
                '</select> '+
                '</div> '+
                '<div class="form-group col-6 col-lg-3"> '+
                '<label for="bin'+count+'">Doboz</label>'+
                '<select name="bin'+count+'" id="bin'+count+'" class="form-control">'+
                '<option value="">Válassz!</option>'+
                '</select>'+
                '</div>'+
                '</div>';
    $('#extraForms').append(form);
    console.log(count);
}