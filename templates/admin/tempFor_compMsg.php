<?php
  session_start(); //it creates a session for calling the session save handlers of the templates.
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in is true
  ?>
  <!-- list of the replied queries that are completed by the admin -->
    <h2>Checked Enquiries</h2>

<!-- displaying the details of the replied enquiries -->
    <?php
    echo "<table border='1'>";
    echo '<thead>';
    echo '<tr>';
    echo '<th>SNo.</th>';
    echo '<th>Enquiry</th>';
    echo '<th style="width: 20%">Posted By</th>';
    echo '<th style="width: 20%">Completed By Admin</th>';
    echo '</tr>';

  $checkedMsgList = $checkedMsgStmt->selectFunc('statusForCompletion',1); //quering the details of the enquiries that are completed
   $compMsg_sn = 1;
   //using for and each loop for displaying the details of the completed enquirires
    foreach ($checkedMsgList as $rowOfCheckedMsg ) {
      $admin_stmt = $admin_list->selectFunc('admin_id',$rowOfCheckedMsg['admin_id'])->fetch(); //getting admin id after query
      echo '<tr>';
      echo '<td>' . $compMsg_sn++. '</td>';
      echo '<td>' . $rowOfCheckedMsg['enquiryMsg'] . '</td>';
      echo '<td>' . $rowOfCheckedMsg['firstName'] .' '.$rowOfCheckedMsg['familyName'] . '</td>';
      echo '<td align="center">' . $admin_stmt['userName'] . '</td>';
    }
    echo '</thead>';
    echo '</table>';
    
}
?>