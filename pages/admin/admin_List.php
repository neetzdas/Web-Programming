<?php
$headingOfPage = "Fran's Furniture - Admin List"; //is the heading of the running page of the site
$adminTab = new FromDatabase('tab_of_admin'); //for the list of the admin from the admin table
$contents = loadTemplate('../../templates/admin/tempFor_admin.php',['get_admin'=>$adminTab]);  //contents to be displayed from the respective template
?>

