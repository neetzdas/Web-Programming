<?php
  require '../database/dbConnect.php'; //connection to the database in phpmyadmin
  require '../functions/loadTemplate.php'; //connecting the loadTemplate function
  require '../classes/FromDatabase.php'; //connecting to the class of database table 

//redirecting to the different pages after getting the respective templates
  if(isset($_GET['page']))
  {
    require '../pages/people/'.$_GET['page'].'.php';   
  }
  else
  {
    require '../pages/people/homePage.php'; //redirecting to the homepage of the site if other pages not found
  }

//variables for loading templates
  $varsOftemps = [
    'headingOfPage'=> $headingOfPage,
    'contents'=> $contents
  ];

  echo loadTemplate('../templates/people/tempFor_layout.php',$varsOftemps); //displaying contents by loading sub template
?>
