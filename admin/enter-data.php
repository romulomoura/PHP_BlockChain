<?php
	
	
?>
<!DOCTYPE html5>
<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<style type="text/css">
		.mdl-grid {
			max-width:1024px;
			margin-top:40px;
		}
		
		h1 {
			font-size:36px;
		}
		h2 {
			font-size:30px;
		}
	</style>

</head>
<body>

	<div class="mdl-grid">
	  <div class="mdl-cell mdl-cell--12-col">
	  	<h1> Block creation </h1>
		<h2> To create a block inform any data </h2>

		<!-- form -->
		<!-- @TODO: Update your form action/method here -->
		<form action="add-block.php" method="POST">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<!-- @TODO: update NAME and ID! -->
				<input name="data" class="mdl-textfield__input" type="text" id="sample3">
				<label class="mdl-textfield__label" for="sample3">Data for chain</label>
			</div>
			<br>
				  
		  <!-- @TODO: Update the link  -->
		  <button href="show-products.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
			+ Add Block
		  </button>
		</form>
		
		<br>
		
		<a href="show-products.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			< Go Back 
		</a>
	  </div>
	</div>
	
</body>
</html>