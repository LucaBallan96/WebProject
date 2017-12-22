<?php
    $servername = "localhost:3306";
	$username = "root";
	$password = "tecweb2017";
    // Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM webproject.progetti";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
    	while($row = $result->fetch_assoc()) {
	    	echo "<a href='info_progetto.php' class='project'>
					<img class='pr_image' src='images/".$row['image']."'/>
					<div class='pr_title'><div>".$row['name']."</div></div>
		        </a>";
		}
		$result->free();
	} else {
		echo "<p>Nessun progetto disponibile</p>";
	}
	$conn->close();
?>