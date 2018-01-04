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
			$sql = "SELECT DISTINCT * FROM webproject.progetti";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$incorso="";
				$terminati="";
				while($row = $result->fetch_assoc()) {
					$stringa="<a href='info_progetto.php?numero=".$row['id']."' class='project'>
							<img class='pr_image' src='images/".$row['image']."'/>
							<div class='pr_name'><div>".$row['name']."</div></div>
						</a>";
					if($row['status']=='In corso') {
						$incorso=$incorso.$stringa;
					}
					else if($row['status']=='Terminato')
						$terminati=$terminati.$stringa;
				}
				$result->free();
				echo "<h1 id='header1'>PROGETTI IN CORSO</h1>".$incorso."<h1 id='header2'>PROGETTI TERMINATI</h1>".$terminati;
			} else {
				echo "<p>Nessun progetto disponibile</p>";
			}
		}

		// INFO PROGETTO
		public function get_info_progetto($progetto) {
			$sql = "SELECT * FROM webproject.progetti WHERE id='$progetto'";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<h1 id='header'>".$row['name']."</h1>
						<div id='div_image'><img src='images/".$row['image']."'></img></div>
						<div id='div_specifiche'>
							<div class='specifica'>Committente<p class='spec_data'>".$row['client']."</p></div><hr/>
							<div class='specifica'>Tipologia<p class='spec_data'>".$row['type']."</p></div><hr/>
							<div class='specifica'>Località<p class='spec_data'>".$row['location']."</p></div><hr/>
							<div class='specifica'>Direttore dei lavori<p class='spec_data'>".$row['director']."</p></div><hr/>
							<div class='specifica'>Stato<p class='spec_data'>".$row['status']."</p></div>
						</div>
						<div id='div_desc'>".$row['description']."</div>";
			}
		}

		// IMPIEGATI ADMIN
		public function get_impiegati() {
			$sql = "SELECT DISTINCT * FROM webproject.impiegati";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count=1;
				$left="";
				$right="";
				$roles=array('Presidente','Vicepresidente','Segretario','Ingegnere','Architetto','Geometra','Progettista','Muratore','Carpentiere','Magazziniere');
				while($row = $result->fetch_assoc()) {
					$stringa="<div class='div_impiegato'>
						<input type='checkbox' id='modify".$count."' class='modify_control'/>
						<label class='modify_btn' for='modify".$count."'></label>
						<div class='modify_form_div'>
							<form class='modify_form' action='' method='post'>
								<fieldset class='modify_personal_info'>
									<legend>Informazioni personali</legend>
									<div>Nome:<input type='text' name='firstname' value='".$row['firstname']."' required/></div>
									<div>Cognome:<input type='text' name='lastname' value='".$row['lastname']."' required/></div>
									<div>Data di nascita:<input type='date' name='birth' value='".$row['birth']."'/></div>
									<div>Età<input type='number' name='age' value='".$row['age']."' min='18' max='99'/></div>
									<div>e-mail<input type='email' value='".$row['mail']."' name='mail'/></div>
									<div class='file_select'>Foto:<input type='file' name='image' value='../../images/".$row['image']."'/></div>
									<div>Settore:<input type='text' name='branch' value='".$row['branch']."'/></div>
									<div>Anno di inizio:<input type='number' name='begin' value='".$row['begin']."' min='1900' max='2018'/></div>
								</fieldset>
								<fieldset class='modify_company_info'>
									<legend>Ruolo nell'azienda:</legend>";
					for($i=0; $i<count($roles); $i++) {
						if($row['role']==$roles[$i])
							$stringa=$stringa."<div><label><input type='radio' name='role' value='".$roles[$i]."' checked/> ".$roles[$i]."</label></div>";
						else
							$stringa=$stringa."<div><label><input type='radio' name='role' value='".$roles[$i]."'/> ".$roles[$i]."</label></div>";
					}
					$stringa=$stringa."</fieldset>
								<div class='submit_reset_div'>
									<input class='submit_btn' type='submit' value='Salva modifiche'/>
									<input class='reset_btn' type='reset' value='Annulla modifiche'/>
								</div>
							</form>
						</div>
						<input type='checkbox' id='remove".$count."' class='remove_control'/>
						<label class='remove_btn' for='remove".$count."'></label>
						<div class='remove_form_div'>
							<form class='remove_form' action='' method='post'>
								<fieldset class='remove_fieldset'>
									<legend>Rimuovere definitivamente ".$row['firstname']." ".$row['lastname']." e tutti i suoi dati?</legend>
									<div class='yes_no_div'>
										<input id='yes".$count."' class='radio_choice' type='radio' name='remove' value='yes' checked/>
										<label for='yes".$count."'>Si, rimuovi</label>
										<input id='no".$count."' class='radio_choice' type='radio' name='remove' value='no'/>
										<label for='no".$count."'>No, mantieni</label>
									</div>
								</fieldset>
								<input class='apply_btn' type='submit' value='Applica'/>
							</form>
						</div>
						<div class='imp_image' style='background-image:url(../../images/".$row['image'].")'></div>
						<div class='imp_info'>
							<div class='imp_name'><div>".$row['firstname']." ".$row['lastname']."</div></div>
							<div class='imp_birth'><div>".$row['birth']."</div></div>
							<div class='imp_role'><div>".$row['role']."</div></div>
							<div class='imp_mail'><div><a href='mailto:".$row['mail']."'>".$row['mail']."</a></div></div>
						</div>
					</div>
					<input type='checkbox' id='check".$count."' class='check_control'/>
					<label class='btn' for='check".$count."'>
						<div class='magic'>
							<div class='imp_more'><div>".$row['age']." anni</div></div>
							<div class='imp_more'><div>Settore: ".$row['branch']."</div></div>
							<div class='imp_more'><div>Impiegato dell'azienda dal ".$row['begin']."</div></div>		
						</div>
						<div class='more_info'><div>+</div></div>
					</label>";
					if($count%2!=0)
						$left=$left.$stringa;
					else
						$right=$right.$stringa;
					$count++;
				}
				$result->free();
				echo "<div id='left_container'>".$left."</div><div id='right_container'>".$right."</div>";
			} else {
				echo "<p>Nessun impiegato disponibile</p>";
			}
		}
		
		// VALIDAZIONE CREDENZIALI
		public function validate($user, $psw) {
			$sql = "SELECT * FROM webproject.utenti WHERE username='$user'";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				if($row['password']==$psw) {
					if($row['role']=='normal')
						return 1;
					else if($row['role']=='admin')
						return 2;
				}
			}
			return 0;
		}
	}

	if(isset($_POST['u'])) {
    	$conn=new DBConnection();
    	$num=$conn->validate($_POST['u'], $_POST['p']);
    	if($num==2)
        	header('Location: admin.php');
    	else if($num==0)
        	header('Location: login.php?error=0');
    	else if($num==1)
			header('Location: login.php?error=1');
	}
?>