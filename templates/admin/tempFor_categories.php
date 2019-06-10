<?php
	session_start(); //it creates a session for calling the session save handlers of the templates.
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in is true
	?>
<!-- for the list of categories -->
	<h2>Categories</h2>
	<a class="new" href="manage_Category">Add new category</a> <!-- link for adding category -->

	<?php
		echo '<table border = 1>';
		echo '<thead>';
		echo '<tr>';
		echo '<th style="width: 5%">SNo.</th>';
		echo '<th>Name</th>';
		echo '<th style="width: 5%">Edit</th>';
		echo '<th style="width: 5%">Delete</th>';
		echo '</tr>';

		$categoriesStmt = $select_category->selectAllFunc(); //qurying all the details from the category table
		$category_sn = 1;
// using for each loop for diplaying details f the category
		foreach ($categoriesStmt as $rowOf_category) {
			echo '<tr>';
			echo '<td>' . $category_sn++ . '</td>';
			echo '<td>' . $rowOf_category['name'] . '</td>';
			//actions taken
			echo '<td><a style="float: right" href="manage_Category&edit_Id=' . $rowOf_category['id'].'"><img src="../../images/edit.png" width="20px" height="20px"></a> </a></td>';?> <!-- edit link of the category-->
			<td align="center"><a href="#" onclick="javascript: if(confirm('Are you sure?')){
					document.location='manage_Category&del_Id=<?php echo $rowOf_category['id']?>';}"./><img src="../../images/delete.jpg" width="20" height="20"></a> <!-- link for  deleting the category-->
			</td>

			<?php 
			echo'</tr>';
		}
		echo '</thead>';
		echo '</table>';
	}
?>