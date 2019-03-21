<?php
$userCompanyQueryString = "SELECT * FROM own_companies WHERE company_id =".$_SESSION["user_company"];
$userCompanyData = $db->getRow($userCompanyQueryString);
$userDataQueryString = "SELECT * FROM users WHERE user_id =".$_SESSION["user_id"];
$userData = $db->getRow($userDataQueryString);
$billProducts = "";
$amountPrice = 0;

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
	"Phone: 111-222-333 | Fax: 111-444-555",
	"www.google.com",
	"info@lightpear.com"
]);

// 2B - INVOICE INFO
$invoice->set("invoice", [
	["Számla száma", "CB-123-456"],
	["Kiállítva", date("Y-m-d")]
]);

// 2C - BILL TO
$invoice->set("billto", [
	$userData["username"],
	"Street Address", 
	"City, State, Zip"
]);

// 2D - SHIP TO
$invoice->set("shipto", [
	"Customer Name",
	"Street Address", 
	"City, State, Zip"
]);

// 2E - ITEMS
// YOU CAN JUST DUMP THE ENTIRE ARRAY IN USING SET, BUT HERE IS HOW TO ADD ONE AT A TIME... 
for($i = 1; $i < $_SESSION["count"]; $i++){
	$invoice->add("items", [$_SESSION["productName"][$i],"", $_SESSION["productQuantity"][$i], $_SESSION["productPrice"][$i]." Ft", $_SESSION["productPrice"][$i] * $_SESSION["productQuantity"][$i]." Ft"]);
	$amountPrice += $_SESSION["productPrice"][$i] * $_SESSION["productQuantity"][$i];
}
//$items = $billProducts;
//foreach ($items as $i) { $invoice->add("items", $i); }

/*
$_SESSION["productName"][$count] = $productArray["product_name"];
$_SESSION["productNumber"][$count] = $productNumber;
$_SESSION["productQuantity"][$count] = $productQuantity;
$_SESSION["stockName"][$count] = $stockName;
$_SESSION["aisle"][$count] = $aisle;
$_SESSION["rack"][$count] = $rack;
$_SESSION["shelf"][$count] = $shelf;
$_SESSION["bin"][$count] = $bin;
*/

// 2F - TOTALS
$invoice->set("totals", [
	["Összesen", $amountPrice." Ft"]
]);

// 2G - NOTES, IF ANY
$invoice->set("notes", [
	"Ez a számla a bevételezési bizonylatot helyettesíti!",
	"A rendzser állítja ki automatikusan!"
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
 $invoice->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "receive" . DIRECTORY_SEPARATOR . $pdfFileName);
/*****************************************************************************/
// 3D - DOCX OUTPUT
// DEFAULT FORCE DOWNLOAD| 1 FORCE DOWNLOAD | 2 SAVE ON SERVER
// $invoice->outputDOCX();
// $invoice->outputDOCX(1, "invoice.docx");
// $invoice->outputDOCX(2, __DIR__ . DIRECTORY_SEPARATOR . "invoice.docx");
/*****************************************************************************/
?>