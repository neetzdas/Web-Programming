<?php
  require '../../database/dbConnect.php'; //connecting to the database that is in database folder
  require '../../functions/loadTemplate.php'; // connection to the load template function 
  require '../../functions/saveFuncCategory.php';// connecting to the testing function of category
  require '../../functions/saveFuncOffer.php'; // connecting to the testing function of offer
  require '../../classes/FromDatabase.php'; //connection to the class functions

//gets different pages from the admin folder
  if(isset($_GET['page'])){
    require '../../pages/admin/'.$_GET['page'].'.php';
  }
  else
  {
    require '../../pages/admin/admin_Home.php'; //if other pages not found home page of admin is redirected
  }
  
  //variables for loading the templates
    $varsOfTempls =[
      'headingOfPage'=> $headingOfPage,
      'contents'=> $contents
    ];
    echo loadTemplate('../../templates/admin/tempFor_adminLayout.php',$varsOfTempls); //displaying the layout page of the admin
?>
