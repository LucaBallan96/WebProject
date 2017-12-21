<?php
	class DBConnection {
		private $conn;
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
			$sql = "SELECT * FROM webproject.progetti";
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
						$terminati=$terminati."<a href='info_progetto.php' class='project'>
								<img class='pr_image' src='images/".$row['image']."'/>
								<div class='pr_name'><div>".$row['name']."</div></div>
							</a>";
				}
				$result->free();
				echo "<h1 id='header1'>PROGETTI IN CORSO</h1>".$incorso."<h1 id='header2'>PROGETTI TERMINATI</h1>".$terminati;
			} else {
				echo "<p>Nessun progetto disponibile</p>";
			}
		}

		// INFO PROGETTO
		public function get_info_progetto($progetto) {
			if($progetto==1) {}
				//echo "porcoddio";
			else if($progetto==7) {}
				//echo "porcamadonna";
			else {}
				//echo "madonnasilura";
		}
	}
?>