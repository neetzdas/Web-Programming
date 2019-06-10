<?php
	session_start(); //starting the session to load the pages and carry out the required action
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in
?>
<!-- template of adding furniture -->
	<h2>Add Furniture</h2>
	<form action="add_Furniture" method="POST" enctype="multipart/form-data">
		<fieldset>
			<label>Name</label>
			<input type="text" name="name" /> <!-- field for the name of the furniture -->

			<label>Description</label>
			<textarea name="description"></textarea> <!-- field for the decsription of the furniture -->

			<label>Price</label>
			<input type="text" name="price" /> <!-- field for the price of the furniture -->

			<label>Category</label> <!-- field for the category name of the furniture -->
			<select name="categoryId">
				<?php
					$stmtForCategory = $categoryQueryStmt->selectAllFunc(); //quering from category table for its details
					foreach ($stmtForCategory as $rowVal) {
						echo '<option value="' . $rowVal['id'] . '">' . $rowVal['name'] . '</option>'; //for the categories in the ctaegory table
					}
				?>
			</select>

			<label>Image</label>
			<input type="file" name="image"/> <!-- field for the uploading image of the furniture -->

			<label>Condition of Furniture</label> <!-- field for the condition of the furniture -->
			<select name="fur_condition">
			<option>NEW</option>
			<option>SECOND-HAND</option>
			</select>
			
			<input type="submit" name="add_submitBtn" value="Add" /> <!-- submit button for the adding the furniture -->
		</fieldset>
	</form>
<?php
	}
?>

