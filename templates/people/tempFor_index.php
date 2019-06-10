<!-- index template -->
<main class="home">		
	<h2 align="center" style="color: #a65959;">WELCOME TO FRAN'S FURNITURE!</h2>
	<p>We're a family run furniture shop based in Northampton. We stock a wide variety of modern and antique furniture including laps, bookcases, beds and sofas.</p>

<!-- offers display on the home page -->
	<h2>Offers Available</h2>
	<ul class="furniture">

	<?php
//querying the offer table for displaying their details
	$offerQuery = $get_offer->selectAllFunc();
	foreach ($offerQuery as $rowOfOffer) {
		//getting the category id for category name
		$categoryStmt = $categoryQuery->selectFunc('id', $rowOfOffer['categoryId'])->fetch();
		echo '<li>';

		if (file_exists('../images/offer/' . $rowOfOffer['offer_id'] . '.jpg')) {
			echo '<a href="../images/offer/' . $rowOfOffer['offer_id'] . '.jpg"><img src="../images/offer/' . $rowOfOffer['offer_id'] . '.jpg" /></a>';
		}//offer image display

//other details
		echo '<div class="details">';
		echo '<h2>' . $rowOfOffer['name'] . '</h2>'; //title of the furniture that is put as offer
		echo '<h3>' . $categoryStmt['name'] . '</h3>';
		echo '<h4>£' . $rowOfOffer['price'] . '</h4>';
		echo '<p>' . $rowOfOffer['description'] . '</p><br>';
		//dates of the offer posted and its validity
		echo '<strong><p align= right>Posted Date: '.$rowOfOffer['postedDate'].'<br>Valid Upto: '.$rowOfOffer['endingDate'].'</p></strong>';

		echo '</div>';
		echo '</li>';
	}
	?>

</ul>
</main>