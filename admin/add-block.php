<?php
	
	// get the inputs from the form
	$data = $_POST["data"];
	
	$hash = hash('sha256', $data);
	
	// 1. WHAT IS YOUR INFO?
	// 		host ? db name? db user? db password?
	$dbhost = "localhost";		// address of your database
	$dbuser = "root";
	$dbpassword = "";			// on MAMP, this is "root"
	$dbname = "coin";
	
	// 2.  CONNECT TO THE DATABASE
	$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
	
	$query = 
		'INSERT INTO blocks (data, hash) ' .
		'VALUES ("' .$data . '","' . $hash . '")';
	
	// 3. get results
	$results = mysqli_query($conn, $query);
	
	if ($results) {
		echo "<p> BLOCK SAVED AT THE DATABASE </p> <br>";
	}
	else {
		echo "BAD! <br>";
		echo mysqli_error($conn);
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
	
		
		<a href="show-blocks.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			< Go Back 
		</a>
	  </div>
	</div>
	
</body>
</html>


<?php
		
	// 6. DISCONNECT FROM DATABSE
	//mysqli_free_result($results); // clean up your row variable
	mysqli_close($conn);	// close connection to db
?>