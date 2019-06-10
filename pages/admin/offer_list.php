<?php
$headingOfPage = "Fran's Furniture - Offers List"; //title of the running page
$offerTab = new FromDatabase('tab_of_offer'); //for the list of offers

$contents = loadTemplate('../../templates/admin/tempFor_specialOffer.php',['select_offer'=>$offerTab]); //contents to be displayed from the respective template

?>

