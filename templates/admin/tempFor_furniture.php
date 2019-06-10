<?php
  session_start(); //it creates a session for calling the session save handlers of the templates.
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in is true
  ?> 
	<!-- for the list of furniture and their details -->
	<h2>Furniture</h2>
	<a class="new" href="add_Furniture">Add new furniture</a> <!--link for adding new furniture -->
<!-- code for making the table and giving headings to the columns -->
	<?php
		echo '<table border = 1>';
		echo '<thead>';
		echo '<tr>';
		echo '<th style="width: 5%">SNo.</th>';
		echo '<th>Name</th>';
		echo '<th style="width: 10%">Condition</th>';
		echo '<th style="width: 10%">Price</th>';
		echo '<th style="width: 5%">Hide</th>';
		echo '<th style="width: 5%">Edit</th>';
		echo '<th style="width: 5%">Add As Offer</th>';
		echo '<th style="width: 5%">Delete</th>';
		echo '</tr>';

//querying all the details of the furniture from the database
		$furnitureQuery = $select_furniture->selectAllFunc();
		
		$fur_sn=1;
		//using for each loop for displaying details of each row
		foreach ($furnitureQuery as $rowOfFurniture) {
			echo '<tr>';
			echo '<td>' . $fur_sn++. '</td>';
			echo '<td>' . $rowOfFurniture['name'] . '</td>';
			echo '<td>' . $rowOfFurniture['fur_condition'] . '</td>';
			echo '<td>£' . $rowOfFurniture['price'] . '</td>';
//hiding the furniture link
			if($rowOfFurniture['statusForHide'] == 0){
			    echo '<td><a style="float: right" href="edit_Furniture&hide_Id='.$rowOfFurniture['id'].'">
                <img src="../../images/hide.jpg" width="20px" height="20px"> </a></td>';
            }
            //displaying furniture after hiding link
            else{
            	echo '<td><a style="float: right" href="edit_Furniture&show_Id='.$rowOfFurniture['id'].'">
                <img src="../../images/show.png" width="20px" height="20px"> </a></td>';
           	}
 //editing the furnitre link
			echo '<td><a style="float: right" href="edit_Furniture&edit_Id=' . $rowOfFurniture['id'].'"><img src="../../images/edit.png" width="20px" height="20px"></a></td>';
			echo '<td><a style="float: right" href="manage_Offer&editOf_id=' . $rowOfFurniture['id'].'"><img src="../../images/addOffer.png" width="20px" height="20px"></a></td>'; //editing furniture as offer link
			?>
			<td align="center"><a href="#" onclick="javascript: if(confirm('Are you sure?')){
					document.location='edit_Furniture&del_Id=<?php echo $rowOfFurniture['id']?>';}"./><img src="../../images/delete.jpg" width="20" height="20"></a>
			</td> <!--deleting the furniture link -->
			
			<?php
				echo'</tr>';
			}

			echo '</thead>';
			echo '</table>';
		}
			?>