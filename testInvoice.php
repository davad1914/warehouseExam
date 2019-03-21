<?php
include('invoicR/phpinvoice.php');
$invoice = new phpinvoice();
  /* Header Settings */
  //$invoice->setLogo("images/sample1.jpg");   //logo image path
  $invoice->setColor("#007fff");      // pdf color scheme
  $invoice->setType("Sale Invoice");    // Invoice Type
  $invoice->setReference("INV-55033645");   // Reference
  $invoice->setDate(date('M dS ,Y',time()));   //Billing Date
  $invoice->setTime(date('h:i:s A',time()));   //Billing Time
  $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
  $invoice->setFrom(array("Seller Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740"));
  $invoice->setTo(array("Purchaser Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740"));
  /* Adding Items in table */
  $invoice->addItem("AMD Athlon X2DC-7450","2.4GHz/1GB/160GB/SMP-DVD/VB",6,0,580,0,3480);
  /* Add totals */
  $invoice->addTotal("Total",9460);
  $invoice->addTotal("VAT 21%",1986.6);
  $invoice->addTotal("Total due",11446.6,true);
  /* Set badge */ 
  $invoice->addBadge("Payment Paid");
  /* Add title */
  $invoice->addTitle("Important Notice");
  /* Add Paragraph */
  $invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");
  /* Set footer note */
  $invoice->setFooternote("Light pear kft.");
  /* Render */
  $invoice->render('kek.pdf','I'); 
  /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
?>