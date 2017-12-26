<?php
	class DBConnection {
		private $conn;
		private static $servername="localhost:3306";
		private static $username="root";
		private static $password="tecweb2017";
		public function __construct(){ 
			// Create connection
			$this->conn = new mysqli("localhost:3306", "root", "tecweb2017");
			// Check connection
			if ($this->conn->connect_error) {
				die("Connection failed: " . $this->conn->connect_error);
			}
		}
		function __destruct() {
			$this->conn->close();
		}  	

		// LISTA PROGETTI
		public function get_progetti() {
			$sql = "SELECT DISTINCT * FROM webproject.progetti";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$incorso="";
				$terminati="";
				while($row = $result->fetch_assoc()) {
					if($row['status']=='in corso') {
						$incorso=$incorso."<a href='info_progetto.php?numero=".$row['id']."' class='project'>
								<img class='pr_image' src='images/".$row['image']."'/>
								<div class='pr_name'><div>".$row['name']."</div></div>
							</a>";
					}
					else if($row['status']=='terminato')
						$terminati=$terminati."<a href='info_progetto.php?numero=".$row['id']."' class='project'>
								<img class='pr_image' src='images/".$row['image']."'/>
								<div class='pr_name'><div>".$row['name']."</div></div>
							</a>";
				}
				$result->free();
				echo "<h1 id='header1'>PROGETTI IN CORSO</h1>".$incorso."<h1 id='header2'>PROGETTI TERMINATI</h1>".$terminati."<div id='pad_over_footer'></div>";
			} else {
				echo "<p>Nessun progetto disponibile</p>";
			}
		}

		// INFO PROGETTO
		public function get_info_progetto($progetto) {
			$sql = "SELECT * FROM webproject.progetti WHERE id=$progetto";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<h1 id='header'>".$row['name']."</h1>
						<div id='div_image'><img src='images/".$row['image']."'></img></div>
						<div id='div_specifiche'>
							<p class='specifica'>Committente ".$row['client']."</p><hr/>
							<p class='specifica'>Tipologia ".$row['type']."</p><hr/>
							<p class='specifica'>Località ".$row['location']."</p><hr/>
							<p class='specifica'>Direttore dei lavori ".$row['director']."</p><hr/>
							<p class='specifica'>Stato ".$row['status']."</p>
						</div>
						<div id='div_desc'>".$row['description']."</div>";
			}
		}
	}
?>