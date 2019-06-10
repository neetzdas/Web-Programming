<?php
  session_start(); //it creates a session for calling the session save handlers of the templates.
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in is true
  ?> 
  <!-- list of uncompleted enquiries  -->
    <h2>List of Enquiries</h2>
    <a class="new" href="checkedEnquiryList">Replied Enquiries</a> <!-- link for  the list of replied messages -->
    <?php
    echo "<table border='1'>";
    echo '<thead>';
    echo '<tr>';
     echo '<th style="width: 5%">SNo.</th>';
    echo '<th>Enquiry Message</th>';
    echo '<th style>Posted By</th>';
    echo '<th>Posted Date</th>';
    echo '<th style="width: 5%">Complete</th>';
    echo '<th style="width: 5%">Delete</th>';
    echo '</tr>';

  $enquiry_stmt = $enquiry_list->selectFunc('statusForCompletion',0); //quering the details of the enquiries that are completed
   
  $admin_stmt = $admin_sel->selectFunc('userName',$_SESSION['userName']); //getting username

  $enquiry_sn = 1;
  //using for and each loop for displaying the details of the completed enquirires
  foreach ($admin_stmt as $rowOfAdmin) {
      foreach ($enquiry_stmt as $rowOfEnquiry) {
      echo '<tr>';
      echo '<td>' . $enquiry_sn++. '</td>';
      echo '<td>' . $rowOfEnquiry['enquiryMsg'] . '</td>';
      echo '<td>' . $rowOfEnquiry['firstName'] .' '.$rowOfEnquiry['familyName'] . '</td>';
      echo '<td>' . $rowOfEnquiry['postedDate'].'</td>';
      //actions to be taken 
      echo '<td><form method="post" action="enquiry_List&check_id='.$rowOfEnquiry['enquiry_id'].'&adminId='.$rowOfAdmin['admin_id'].'">
        <input type="submit" name="submit_btn" value="Complete" />
        </form></td>';
        ?>
        <td align="center"><a href="#" onclick="javascript: if(confirm('Are you sure?')){
          document.location='enquiry_List&del_Id=<?php echo $rowOfEnquiry['enquiry_id']?>';}"./><img src="../../images/delete.jpg" width="20" height="20"></a> <!--deleting the enquiries -->
         </td>
      <?php 
      echo '</tr>';
    }
  }

    echo '</thead>';
    echo '</table>';

//code for the checking the messages after getting the enquiry id
    if (isset($_GET['check_id'])) {
     $criteriaForCheck = [
      'statusForCompletion' => 1, //status to complete
      'admin_id' => $_GET['adminId'], //for admin id
      'enquiry_id' => $_GET['check_id'] //is the enquiry id
     ];

     $updateStmt->updateFunc($criteriaForCheck,'enquiry_id'); //upadting query
     header('Location: checkedEnquiryList');
}

}

//code for deleting the enquiries after getting their id
if (isset($_GET['del_Id'])) {
      $deleteEnquiry = $updateStmt->deleteFunc('enquiry_id', $_GET['del_Id']); //deleting query
      echo "<script>alert('Enquiry Deleted!');
      window.location.href='enquiry_List';</script>";
    }
?>