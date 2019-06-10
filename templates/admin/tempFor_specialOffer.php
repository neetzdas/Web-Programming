<?php
	session_start(); //starting the session to load the pages and carry out the required action
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in
?>
<!-- template for listing the special offers and theie details -->
	<h2>List Of Offers</h2>
	<a class="new" href="manage_Offer">Add new offer</a> <!-- linking for adding new offer -->
		<!--  displaying table and its headings-->
		<?php
			echo '<table border = 1>';
			echo '<thead>';
			echo '<tr>';
			echo '<th style="width: 5%">SNo.</th>';
			echo '<th>Name</th>';
			echo '<th style="width: 10%">Price</th>';
			echo '<th style="width: 12%">Posted Date</th>';
			echo '<th style="width: 12%">Valid upto</th>';
			echo '<th style="width: 5%">Delete</th>';
			echo '</tr>';

			$offerStmt = $select_offer->selectAllFunc(); //querying the offer table to get the details
			$offer_sn = 1;
			foreach ($offerStmt as $rowOfOffer) { //using for for each loop to display the details of the offers
				echo '<tr>';
				echo '<td>' . $offer_sn++ . '</td>';
				echo '<td>' . $rowOfOffer['name'] . '</td>';
				echo '<td>£' . $rowOfOffer['price'] . '</td>';
				echo '<td>' . $rowOfOffer['postedDate'] . '</td>'; //posting date of the offer
				echo '<td>' . $rowOfOffer['endingDate'] . '</td>'; //valid date of the offer

		?>	<!-- link for deleting the offer -->
				<td align="center"><a href="#" onclick="javascript: if(confirm('Are you sure?')){
					document.location='manage_Offer&del_Id=<?php echo $rowOfOffer['offer_id']?>';}"./><img src="../../images/delete.jpg" width="20" height="20"></a>
				</td>
			<?php
			echo'</tr>';
			}
			echo '</thead>';
			echo '</table>';
		}
	?>