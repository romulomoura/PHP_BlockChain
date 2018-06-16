<?php
	
	// get the inputs from the form
	$data = $_POST["data"];
	$number = $_POST["number"];
	
	$hashRetorno = "";
	$numberRetorno = 0;
	
		$hash = hash('sha256', $data . $number);
		
		//create 4 block of chain
		for ($i = 0; $i < 4; $i++) {
			
			if (ValidateBlock($data, $number, $hash)==true) {
				echo "<p> Block created and saved at the DATABASE </p> <br>";	
				//echo "Hash retorno: " . $data . "<br>";
				//echo "Num retorno: " .$number . "<br>";
				
				
			}		
			else {
				echo "<br> Block are not valid! <br>";
			}
			// 1. WHAT IS YOUR INFO?
			// 		host ? db name? db user? db password?
			$dbhost = "localhost";		// address of your database
			$dbuser = "root";
			$dbpassword = "";			// on MAMP, this is "root"
			$dbname = "coin";
				
			// 2.  CONNECT TO THE DATABASE
			$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
				
			// 3.  MAKE a SQL QUERY 
				
			// make the query
			$query = "SELECT * from blocks ORDER BY id DESC LIMIT 1";
				
			// 4. SEND QUERY TO DB & GET RESULTS 
			$results = mysqli_query($conn, $query);
				
			$block = mysqli_fetch_assoc($results);
			$data = $block["hash"];
			$number = $block["number"];
			$hash = hash('sha256', $data . $number);
				
				
		}
		
		
	function ValidateBlock($dataChain, $numberChain, $hashChain){
			
			for ($i = 0; $i < 500000; $i++) {
				
   			    if (strcmp(substr($hashChain, 0, 4),"0000") == 0) {
				
						// 		host ? db name? db user? db password?
						$dbhost = "localhost";		// address of your database
						$dbuser = "root";
						$dbpassword = "";			// on MAMP, this is "root"
						$dbname = "coin";
						
						// 2.  CONNECT TO THE DATABASE
						$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
					    $query = 
						'INSERT INTO blocks (data, number, hash) ' .
						'VALUES ("' . $dataChain . '","' . $i . '","' . $hashChain . '")';
					
						// 3. get results
						$results = mysqli_query($conn, $query);
						
						if ($results) {
							echo "<p> Block created and saved at the DATABASE </p> <br>";
							return true;
							break;
						}
						else {
							echo "BAD! <br>";
							echo mysqli_error($conn);
							return false;
							break;
						}
				}					
				else{
						
					//echo substr($hash, 0, 4) . "Aqui 2<br>";
					$hashChain = hash('sha256', $dataChain . $i);
					
				}
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
	
		
		<a href="show-blocks.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			< Show Chain
		</a>
	  </div>
	</div>
	
</body>
</html>


<?php
		
	// 6. DISCONNECT FROM DATABSE
	//mysqli_free_result($results); // clean up your row variable
	//mysqli_close($conn);	// close connection to db
?>