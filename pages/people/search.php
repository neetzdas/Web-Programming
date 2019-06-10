<?php
	require '../../database/dbConnect.php'; //connecting to database
	require '../../classes/FromDatabase.php'; //connecting to the database class
	$search_furniture = new FromDatabase('furniture'); //details to be displayed from this table for search
	$categoryFind = new FromDatabase('category');

//after entering the keyword for searching	
	if(isset($_POST['text'])){ 
		$keyword = $_POST['text']; //posting search 
		$results = $search_furniture->searchFunc('name' ,'statusForHide', $keyword, 0); //querying the searched furniture
		?>
		<!-- code for siplaying the details of the search  -->
	<section class="right">
	<ul class="furniture">

		<?php
		foreach ($results as $search_row) { //using for each
		echo '<li>';
		$category_stmt = ($categoryFind->selectFunc('id', $search_row['categoryId']))->fetch(); //for category name
		if (file_exists('../../images/furniture/' . $search_row['id'] . '.jpg')) {
			echo '<a href="../images/furniture/' . $search_row['id'] . '.jpg"><img src="../images/furniture/' . $search_row['id'] . '.jpg" /></a>'; // displaying image
		}
		//other details
		echo '<div class="details">';
		echo '<h2>' . $search_row['name'] . '</h2>'; //title of the furniture
		echo '<h3>' . $search_row['fur_condition'] . '</h3>'; //condition of the furniture
		echo '<h3>' . $category_stmt['name'] . '</h3>'; //which category it belongs to
		echo '<h4>£' . $search_row['price'] . '</h4>'; //price of the furniture
		echo '<p>' . $search_row['description'] . '</p>'; //description given on the furniture
		echo '</div>';
		echo '</li>';

	}
}
?>
</ul>
</section>

