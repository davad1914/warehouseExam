<?php
$userCompanyQueryString = "SELECT * FROM own_companies WHERE company_id =".$_SESSION["user_company"];
$userCompanyData = $db->getRow($userCompanyQueryString);
$userDataQueryString = "SELECT * FROM users WHERE user_id =".$_SESSION["user_id"];
$userData = $db->getRow($userDataQueryString);
$billProducts = "";
$amountPrice = 0;
$invoiceNumber = $_SESSION["user_id"].$_SESSION["user_company"].date('ymdhms').rand(10000, 99999);

/*
 * INVOICR : THE PHP INVOICE GENERATOR (HTML, DOCX, PDF)
 * Visit https://code-boxx.com/invoicr-php-invoice-generator for more
 *
 * ! YOU CAN DELETE THE ENTIRE EXAMPLE FOLDER IF YOU DON'T NEED IT... !
 */

/* [STEP 1 - CREATE NEW INVOICR OBJECT] */
require_once "../invoicR/invoicr.php";
$invoice = new Invoicr();


/* [STEP 2 - FEED ALL THE INFORMATION] */
// 2A - COMPANY INFORMATION
// OR YOU CAN PERMANENTLY CODE THIS INTO THE LIBRARY ITSELF
$invoice->set("company", [
    "../img/logo/logo.png",
    $userCompanyData["company_name"],
    $userCompanyData["company_address"],
    "Telefonszám: ".$userCompanyData["company_phone_number"],
    $userCompanyData["company_website"],
    $userCompanyData["company_email"]
]);

// 2B - INVOICE INFO
$invoice->set("invoice", [
    ["Számla száma", $invoiceNumber],
    ["Kiállítva", date("Y-m-d")]
]);

// 2C - BILL TO
$invoice->set("billto", [
    $_POST['customerName'],
    $_POST['country'],
    $_POST['streetAddress'].', '.$_POST['zip'].', '.$_POST['city']
]);

// 2D - SHIP TO
$invoice->set("shipto", [
    $_POST['customerName'],
    $_POST['country'],
    $_POST['streetAddress'].', '.$_POST['zip'].', '.$_POST['city']
]);

// 2E - ITEMS
// YOU CAN JUST DUMP THE ENTIRE ARRAY IN USING SET, BUT HERE IS HOW TO ADD ONE AT A TIME...
for($i = 1; $i < $_SESSION["basketCount"] + 1; $i++){
    $productsInfoQuery = "SELECT * FROM products WHERE id=(SELECT product_id FROM where_is_the_product WHERE where_is_the_product.id = ".$_SESSION['basketProductId'][$i].")";
    $productInfo = $db->getRow($productsInfoQuery);
    $invoice->add("items", [$_SESSION["basketProduct"][$i],"", $_SESSION["basketQuantity"][$i], $productInfo['product_price']." Ft", $productInfo['product_price'] * $_SESSION["basketQuantity"][$i]." Ft"]);
    $amountPrice += (int)($productInfo['product_price']) * (int)($_SESSION["basketQuantity"][$i]);
}
//$items = $billProducts;
//foreach ($items as $i) { $invoice->add("items", $i); }

// 2F - TOTALS
$invoice->set("totals", [
    ["Összesen", $amountPrice." Ft"]
]);

// 2G - NOTES, IF ANY
$invoice->set("notes", [
    "A számla csak teszt, nem minősül érvényes számlának!",
    "A rendzser állítja ki automatikusan, hibák joga fent áll!"
]);


/* [STEP 3 - OUTPUT] */
// 3A - CHOOSE TEMPLATE, DEFAULTS TO SIMPLE IF NOT SPECIFIED
$invoice->template("lime");

/*****************************************************************************/
// 3B - OUTPUT IN HTML
// DEFAULT DISPLAY IN BROWSER | 1 DISPLAY IN BROWSER | 2 FORCE DOWNLOAD | 3 SAVE ON SERVER
// $invoice->outputHTML();
// $invoice->outputHTML(1);
// $invoice->outputHTML(2, "invoice.html");
// $invoice->outputHTML(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.html");
/*****************************************************************************/
// 3C - PDF OUTPUT
// DEFAULT DISPLAY IN BROWSER | 1 DISPLAY IN BROWSER | 2 FORCE DOWNLOAD | 3 SAVE ON SERVER
// $invoice->outputPDF();
// $invoice->outputPDF(1);
// $invoice->outputPDF(2, "invoice.pdf");
$invoice->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "delivery" . DIRECTORY_SEPARATOR . $pdfFileName);
/*****************************************************************************/
// 3D - DOCX OUTPUT
// DEFAULT FORCE DOWNLOAD| 1 FORCE DOWNLOAD | 2 SAVE ON SERVER
// $invoice->outputDOCX();
// $invoice->outputDOCX(1, "invoice.docx");
// $invoice->outputDOCX(2, __DIR__ . DIRECTORY_SEPARATOR . "invoice.docx");
/*****************************************************************************/
?>