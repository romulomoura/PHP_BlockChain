<?php
	
	// 	1. separate out your post & get request
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		//	2. write code for GET request
		//echo "<h1> I GOT GET REQUEST! </h1>";
		
		$id = $_GET["id"];
		
		// 1. WHAT IS YOUR INFO?
		// 		host ? db name? db user? db password?
		$dbhost = "localhost";		// address of your database
		$dbuser = "root";
		$dbpassword = "";			// on MAMP, this is "root"
		$dbname = "coin";
		
		// 2.  CONNECT TO THE DATABASE
		$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
		// 3.  MAKE a SQL QUERY 
		$query = "SELECT * from blocks where id=" . $id;
		
		$results = mysqli_query($conn, $query);
		
	
		
		// you can do this becuse there's only 1 result that 
		// comes from the database
		$block = mysqli_fetch_assoc($results);		
		
		print_r($block);
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 	3. write code for POST request
		//echo "<h1> I GOT POST REQUEST! </h1>";
				
		// get the data from the form
		$id = $_POST["block_id"];
		
		// 1. WHAT IS YOUR INFO?
		// 		host ? db name? db user? db password?
		$dbhost = "localhost";		// address of your database
		$dbuser = "root";
		$dbpassword = "";			// on MAMP, this is "root"
		$dbname = "coin";
		
		// 2.  CONNECT TO THE DATABASE
		$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
		
		// 3.  MAKE a SQL QUERY 
		$query = 	"DELETE FROM blocks ";
		$query .= 	"WHERE id=" . $id;
	
		$results = mysqli_query($conn, $query);
		
		if ($results) {
			echo "OKAY! <br>";
			
			// command to redirect back to show-products page.
			header("Location: show-blocks.php");
			
		}
		else {
			echo "BAD! <br>";
			echo mysqli_error($conn);
		}

	}
	
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
	  	<h1> Delete Block </h1>
		<h2> Are you sure you want to delete? </h2>

		<h3> Id: <?php echo $block["id"] ?> </h3>
		<h3> Data: <?php echo $block["data"] ?> </h3>
		<h3> Number: <?php echo $block["number"] ?> </h3>
		<h3> Hash: <?php echo $block["hash"] ?> </h3>
		<!-- form -->
		<!-- @TODO: Update your form action/method here -->
		<form action="delete-block.php" method="POST">
			<input 
				name="block_id" 
				value="<?php echo $id; ?>"
				hidden=true
			>
			
		  <!-- @TODO: Update the link  -->
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
			Yes
		  </button>
		</form>
		
		<br>
		
		<a href="show-blocks.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			No
		</a>
	  </div>
	</div>
	
</body>
</html>