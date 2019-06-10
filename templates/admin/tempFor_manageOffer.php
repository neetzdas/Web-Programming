<?php
	session_start(); //starting the session to load the pages and carry out the required action
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in
?>
<!-- add offer template or edit existing furniture as offer template  -->
	<h2>Add Offer</h2>
	<form action="manage_Offer" method="POST" enctype="multipart/form-data">
		<fieldset>

			<input type="hidden" name="id" value="<?php if (isset($_GET['editOf_id'])) echo $rowOfOffer['id']; ?>" /> <!-- getting the id nad it is hidden-->

			<label>Name</label>
			<input type="text" name="name" value="<?php if (isset($_GET['editOf_id'])) echo $rowOfOffer['name']; ?>" /> <!-- field for title of the offer -->

			<label>Category</label> <!-- field for category name of the offer -->
			<select name="categoryId">
				<?php
					$stmtOfCategory = $categoryQueryStmt->selectAllFunc(); //querying the category name 
					foreach ($stmtOfCategory as $rowVal) {
                    echo '<option value="'.$rowVal['id'].'">'.$rowVal['name'].'</option>';
                }
				?>
			</select>

			<label>Description</label> <!-- field for decription of the offer -->
			<textarea name="description"><?php if (isset($_GET['editOf_id'])) echo $rowOfOffer['description']; ?></textarea>

			<label>Price</label> <!-- field for price of the offer -->
			<input type="text" name="price" value="<?php if (isset($_GET['editOf_id'])) echo $rowOfOffer['price']; ?>" />

			<label>Image</label> <!-- field for uploading image of the offer -->
			<input type="file" name="image" />
			
			<!-- getting the image if there exists after getting the edit id -->
			<?php
				if (isset($_GET['editOf_id'])) {
					if (file_exists('../../images/furniture/' . $rowOfOffer['id'] . '.jpg')) {
						echo '<img style="width: 200px; clear: both" src="../../images/furniture/' . $rowOfOffer['id'] . '.jpg" />';
					}
				}
			?>

			<label>Posted Date</label>	<!-- field for posted date of the offer -->
			<input type="date" name="postedDate"/>

			<label>End Date</label>
			<input type="date" name="endingDate"/> <!-- field for ending date of the offer -->

			<input type="submit" name="submit_btn" value="Add Offer" /> <!-- field for add submit button of the offer -->
		</fieldset>
	</form>
<?php } ?>