<?php
	session_start(); //starting the session to load the pages and carry out the required action
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in
?>
<!-- for the list of the admins -->
	<h2>List Of Admin</h2>
	<a class="new" href="manage_Admin">Add new admin</a>  <!-- link for the adding new admin -->
		<?php
			echo '<table border = 1>'; //table
			echo '<thead>'; //table heading
			echo '<tr>';
			echo '<th style="width: 5%">SNo.</th>';
			echo '<th>Name</th>';
			echo '<th>Email</th>';
			echo '<th>Phone Number</th>';
			echo '<th style="width: 5%">Delete</th>';
			echo '</tr>';

			//selecting all the details from the admin table 
			$adminStmt = $get_admin->selectAllFunc();
			$admin_sn = 1; //for the serail num of the admin
			foreach ($adminStmt as $rowOfAdmin) { //using for each to display the details of the admin
				echo '<tr>';
				echo '<td>' . $admin_sn++ . '</td>';
				echo '<td>' . $rowOfAdmin['fullName'] . '</td>'; //name of the admin
				echo '<td>' . $rowOfAdmin['email'] . '</td>';
				echo '<td>' . $rowOfAdmin['contactNum'] . '</td>';?>
				<!-- actions to carry out -->
				<td align="center"><a href="#" onclick="javascript: if(confirm('Are you sure?')){
					document.location='manage_Admin&del_Id=<?php echo $rowOfAdmin['admin_id']?>';}"./><img src="../../images/delete.jpg" width="20" height="20"></a>
				</td>

				<?php echo'</tr>';
			}

			echo '</thead>';
			echo '</table>';
		}
?>