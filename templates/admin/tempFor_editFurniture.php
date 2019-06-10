<?php
	session_start(); //starting the session to load the pages and carry out the required action
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in
		$furnitureStmt = $select_Furniture->selectFunc('id', $_GET['edit_Id'])->fetch(); //getting the edit id
?>
<!-- formtemplateof edit furniture  -->
	<h2>Edit Furniture</h2>
	<form action="edit_Furniture" method="POST" enctype="multipart/form-data">
		<fieldset>
			<input type="hidden" name="id" value="<?php echo $furnitureStmt['id']; ?>" /> 

			<label>Name</label> <!-- field for the name of the furniture -->
			<input type="text" name="name" value="<?php echo $furnitureStmt['name']; ?>" />

			<label>Description</label> <!-- field for the decsription of the furniture -->
			<textarea name="description"><?php echo $furnitureStmt['description']; ?></textarea>

			<label>Price</label>
			<input type="text" name="price" value="<?php echo $furnitureStmt['price']; ?>" />

			<label>Category</label>
			<select name="categoryId">
				<?php
					$stmtOfCategory = $categoryQueryStmt->selectAllFunc(); //quering from category table for its details
					foreach ($stmtOfCategory as $rowVal) {
                    	echo '<option value="'.$rowVal['id'].'"'; //for the categories in the ctaegory table
                    if ($furnitureStmt['categoryId']==$rowVal['id']) 
                        {echo 'selected';}
                        echo'>';
                        echo $rowVal['name'];
                        echo '</option>';
                }
				?>
			</select>
				
				<?php
					if (file_exists('../../images/furniture/' . $furnitureStmt['id'] . '.jpg')) {
						echo '<img style="width: 200px; clear: both" src="../../images/furniture/' . $furnitureStmt['id'] . '.jpg" />';
					} //for displaying the image if there exists 
				?>

				<label>Image</label> <!-- field for the uploading image of the furniture -->
				<input type="file" name="image" />

				<label>Condition of Furniture</label><!-- field for the condition of the furniture -->
				<select name="fur_condition">
					<option>NEW</option>
					<option>SECOND-HAND</option>
				</select>

				<input type="submit" name="edit_submitBtn" value="Save Furniture" />  <!-- submit button for the editing the furniture -->
			</fieldset>
		</form>
		<?php }  ?> 
	
	
