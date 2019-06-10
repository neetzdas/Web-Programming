<!-- search template using jquery -->
<div class ="leftside">
	<form action="search" id="search" method="POST"> <!-- form for the search -->
    <input  type="text" placeholder="Search...." style="width:9em; margin: 1em 0 1em 1em;">
  	<button type="submit" class="searchButton"><i class="fa fa-search"></i></button> <!-- search button-->
	</form>
	<aside>
		<!-- links of the furniture according to its status -->
		<h2>PRODUCTS</h2>
		<hr>
		<ul>
			<li><a href="furCondition?new">New</a></li>
			<li><a href="furCondition">Second Hand</a></li>
		</ul>
	</aside>
</div>
<!-- jquery code -->
<script type="text/javascript">
	$(document).ready(function() { //ready for the function
	$('#search').submit(function(e) { //after getting submit button
		e.preventDefault();  //preventing the default 
		$.post('../pages/people/search.php',{ //link for displaying the search details
			text: $(this).find('input[type=text]').val() //getting the input as text
		},function(data){
			$("#fur").html(data);
		});
	});
});
</script>
<!-- our Furniture template -->
<main class="admin">
	<section class="left">
		<ul>
			<!-- displaying categories of the category table -->
			<?php
			//querying category table from the database
			$categoriesStmt = $categoryQuery->selectAllFunc();
			foreach ($categoriesStmt as $row_value) {
				echo '<li><a href="ourFurniture&id='. $row_value['id'].'">' . $row_value['name'] . '</a></li>';
			}
			?>
		</ul>
	</section>
	<section class="right">

<!-- displaying the details of all the furniture added -->
	<h1>Furniture</h1>
	<div id="fur">
	<ul class="furniture">

	<?php
	$furnitureQuery = $get_furniture->selectAllFunc(); //querying the furniture table for getting the details 

//for category
	if (isset($_GET['id'])) {
		$furnitureQuery = $get_furniture->selectTwoFunc('categoryId', 'statusForHide', $_GET['id'], 0);
	}
	//for hidden furniture
	else{
		$furnitureQuery = $get_furniture->selectFunc('statusForHide', 0);
	}

	//using for each loop to display the details of the furniture
	foreach ($furnitureQuery as $rowOfFurniture) {
		$categoryStmt = $categoryQuery->selectFunc('id', $rowOfFurniture['categoryId'])->fetch(); //getting category id
		echo '<li>';
		if (file_exists('../images/furniture/' . $rowOfFurniture['id'] . '.jpg')) {
			echo '<a href="../images/furniture/' . $rowOfFurniture['id'] . '.jpg"><img src="../images/furniture/' . $rowOfFurniture['id'] . '.jpg" /></a>';
		}// for showing the image
		//other furniture details
		echo '<div class="details">';
		echo '<h2>' . $rowOfFurniture['name'] . '</h2>';
		echo '<h3>' . $rowOfFurniture['fur_condition'] . '</h3>'; //condition of the furniture
		echo '<h3>' . $categoryStmt['name'] . '</h3>';
		echo '<h4>£' . $rowOfFurniture['price'] . '</h4>'; //price of the furniture
		echo '<p>' . $rowOfFurniture['description'] . '</p>';
		echo '</div>';
		echo '</li>';
	}
	?>
		
	</ul>
</div>
</section>
</main>