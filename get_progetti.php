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
	$sql = "SELECT * FROM progetti.in_corso";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
    	while($row = $result->fetch_assoc()) {
	    	echo "<div class='project'>
					<img class='pr_image' src='images/".$row['image']."'/>
					<div class='pr_title'><div>".$row['title']."</div></div>
		        </div>";
		}
		$result->free();
	} else {
		echo "<p>Nessun progetto disponibile</p>";
	}
	$conn->close();
?>