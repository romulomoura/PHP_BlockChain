<?php
	// LOGIC => getting all the products from the db
	$dbhost = "localhost";		
	$dbuser = "root";
	$dbpassword = "";			
	$dbname = "store";
	
	$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
	
	$query = "SELECT * from product";
	 
	$results = mysqli_query($conn, $query);
	
	print_r($results);
?>
<?php
	// UI BOBAGEM => importing the html for the header
	include("header.php");
?>
    <!-- BACKPACKS and BAGS -->
    <section class="section">
      <div class="container">
        <h1 class="title has-text-centered">Menu</h1>
        <h2 class="subtitle has-text-centered">
          A selection of awesome donuts!
        </h2>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <!-- @TODO:  put your products in here -->
		
		<div class="columns">
		<?php
			//2. stick that html into a  WHILE loop
			while( $product = mysqli_fetch_assoc($results) ) {
				echo '<div class="column">';
					echo '<img src="images/burnt-toast-donut.jpg"> <br>';
					echo '<p>' . $product["name"] . '</p>';
					echo '<p>' . $product["product_desc"] . '</p>';
					echo '<p>$' . $product["price"] . '</p>';
					echo '<button class="button is-info is-outlined">Add to Cart</button>';
				echo '</div>';
			}
		?>
		</div> <!-- end bulma code for making columns -->
		
      </div>
    </section>
	<script type="text/javascript">
    </script>
  </body>
</html>

<?php 
	// be a good citizen and close out your database connection here

?>