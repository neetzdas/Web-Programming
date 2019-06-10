<?php
	session_start(); //starting the session to load the pages and carry out the required action
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in
?>

	<h2>Category</h2>
	<form action="manage_Category" method="POST">
		<fieldset>
			<input type="hidden" name="id" value="<?php if(isset($rowOfCategory['id']))echo $rowOfCategory['id']; ?>" /> <!-- getting the id and it is hidden -->

			<label>Enter the category name</label>
			<input type="text" name="name" placeholder="Category name" required="" value="<?php if(isset($rowOfCategory['name'])) echo $rowOfCategory['name']; ?>"/> <!-- field for the name of the category -->
			
			<input type="submit" name="submitBtn" value="Save Category"/> <!-- the add field -->
		</fieldset>
	</form>

<?php } ?>
