<form>
    <div class="form-row">
        <div class="col">
            <label for="customerName">Szállítási név</label>
            <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Vezetéknév Keresztnév" required>
            <div class="invalid-feedback" id="customerNameFeedback">
                Szállítási név kitöltése kötelező!
            </div>
        </div>
        <div class="col">
            <label for="country">Ország</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Ország">
            <div class="invalid-feedback" id="countryFeedback">
                Ország kitöltése kötelező!
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-2">
            <label for="zip">Irányítószám</label>
            <input type="number" class="form-control" id="zip" name="zip" placeholder="Irányítószám">
            <div class="invalid-feedback" id="zipFeedback">
                Kitöltése kötelező!
            </div>
        </div>
        <div class="col-3">
            <label for="city">Város</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Város">
            <div class="invalid-feedback" id="cityFeedback">
                Kitöltése kötelező
            </div>
        </div>
        <div class="col">
            <label for="streetAddress">Utca/házszám</label>
            <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Példa utca">
            <div class="invalid-feedback" id="streetAddressFeedback">
                Utca/Házszám kitöltése kötelező!
            </div>
        </div>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="sameCheck" id="sameCheck">
        <label class="custom-control-label" for="sameCheck">Megeggyezik a szállítási címmel</label>
    </div>
    <!------------------------------------------------------------------ Szamlazasi cim ----------------------------------------------------------------->
    <div class="form-row">
        <div class="col">
            <label for="billCustomerName">Szállítási név</label>
            <input type="text" class="form-control" id="billCustomerName" name="billCustomerName" placeholder="Vezetéknév Keresztnév">
            <div class="invalid-feedback" id="billCustomerNameFeedback">
                Szállítási név kitöltése kötelező!
            </div>
        </div>
        <div class="col">
            <label for="billCountry">Ország</label>
            <input type="text" class="form-control" name="billCountry" id="billCountry" placeholder="Ország">
            <div class="invalid-feedback" id="billCountryFeedback">
                Ország kitöltése kötelező!
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-2">
            <label for="billZip">Irányítószám</label>
            <input type="number" class="form-control" id="billZip" name="billZip" placeholder="Irányítószám">
            <div class="invalid-feedback" id="billZipFeedback">
                Kitöltése kötelező!
            </div>
        </div>
        <div class="col-3">
            <label for="billCity">Város</label>
            <input type="text" class="form-control" id="billCity" name="billCity" placeholder="Város">
            <div class="invalid-feedback" id="billCityFeedback">
                Kitöltése kötelező!
            </div>
        </div>
        <div class="col">
            <label for="billStreetAddress">Utca/házszám</label>
            <input type="text" class="form-control" id="billStreetAddress" name="billStreetAddress" placeholder="Példa utca">
            <div class="invalid-feedback" id="billStreetAddressFeedback">
                Utca/Házszám kitöltése kötelező!
            </div>
        </div>
    </div>
</form>