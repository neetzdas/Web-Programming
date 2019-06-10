<!-- template for the furniture condition of the furniture -->
<main class="admin">
	<section class="right">
		<?php
		//after getting new
			if(isset($_GET['new'])){
				echo '<h1>New Furnitures</h1>';
				echo '<ul class="furniture">';
//querying the furniture table having new furniture status
				$furnitureQuery = $get_furniture->selectTwoFunc('statusForHide', 'fur_condition' ,0, 'NEW');
//using foreach loop to display the details
				foreach ($furnitureQuery as $furnitureRow) {
					$category = $categoryQuery->selectFunc('id', $furnitureRow['categoryId'])->fetch();
					echo '<li>';

					if (file_exists('../images/furniture/' . $furnitureRow['id'] . '.jpg')) {
						echo '<a href="../images/furniture/' . $furnitureRow['id'] . '.jpg"><img src="../images/furniture/' . $furnitureRow['id'] . '.jpg" /></a>'; //displaying the image
					}
					//displaying other details
					echo '<div class="details">';
					echo '<h2>' . $furnitureRow['name'] . '</h2>';
					echo '<h3>' . $category['name'] . '</h3>';
					echo '<h4>£' . $furnitureRow['price'] . '</h4>';
					echo '<p>' . $furnitureRow['description'] . '</p>';

					echo '</div>';
					echo '</li>';
				}
			}
			//displaying the details of the the furniture having second hand furniture status
			else {
				echo '<h1>Second Hand Furnitures</h1>';
				echo '<ul class="furniture">';
//querying the furniture table having second hand furniture status
				$furnitureQuery = $get_furniture->selectTwoFunc('statusForHide', 'fur_condition' ,0, 'SECOND-HAND');
//using foreach loop to display the details
				foreach ($furnitureQuery as $furnitureRow) {
					$category = $categoryQuery->selectFunc('id', $furnitureRow['categoryId'])->fetch();
					echo '<li>';

					if (file_exists('../images/furniture/' . $furnitureRow['id'] . '.jpg')) {
						echo '<a href="../images/furniture/' . $furnitureRow['id'] . '.jpg"><img src="../images/furniture/' . $furnitureRow['id'] . '.jpg" /></a>';
					}//displaying the image
					//other details
					echo '<div class="details">';
					echo '<h2>' . $furnitureRow['name'] . '</h2>';
					echo '<h3>' . $category['name'] . '</h3>';
					echo '<h4>£' . $furnitureRow['price'] . '</h4>';
					echo '<p>' . $furnitureRow['description'] . '</p>';

					echo '</div>';
					echo '</li>';
				}
			}
?>
		</ul>
	</section>
</main>