<?php
	class DBConnection {
		private $conn;
		public function __construct(){ 
			// Create connection
			$this->conn = new mysqli("localhost:3306", "root", "tecweb2017");
			// Check connection
			if ($this->conn->connect_error) {
				die("Connection failed: ".$this->conn->connect_error);
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

		//OFFERTE DI LAVORO
		public function get_offer(){
			$sql = "SELECT DISTINCT * FROM webproject.offerte";
			$result = $this->conn->query($sql);
			if($result->num_rows > 0){
				$count=1;
				while($row=$result->fetch_assoc()){
					echo "<input id='of".$count."' type='checkbox' class='pro_select' />
						<label class='label_offer' for='of".$count."'>
							<div class='div_img_offer'><img class='img_offer'src='images/".$row['image']."'></div>
							<div class='div_information'>
								<div class='text'>
									".$row['role']." - ".$row['branch']." - ".$row['contract']."</br></br>
									".$row['message']."		
								</div>
							</div>
							<div class='form_offer'>
								<form id='f".$count."' action='form_control.php' method='post'>
									<div class='div_container_form'>
										<div class='general_informations'>
											Nome: <input class='in_form' type='text' name='firstname'><br></br>
											Cognome: <input class='in_form' type='text' name='lastName'><br><br>
											<div class='div_genre'>
												Genre: 
												<div class='container_radio'>
													<input type='radio' name='gender' value='male'> Male &nbsp&nbsp&nbsp
													<input type='radio' name='gender' value='female'> Female&nbsp&nbsp&nbsp
												</div>
											</div>
											<br>Birthday: <input class='in_form' type='date' name='bday'><br></br>
											Mail: <input class='in_form' type='text' name='mail'><br></br>
											Curriculum: <input class='in_form' type='file' name='file'></br></br>
										</div>
										&nbsp&nbsp&nbspMessaggio:</br></br>
										<textarea rows='11' class='textmessage' name='textmessage' form='f".$count."'> </textarea>
										<input class='submit' type='submit' value='Submit'>  
									</div>	
								</form>
							</div>  	
						</label>
						<div class='divisor'></div>";
					$count=$count+1;
				}
			}
			else{
				echo "<div class='divisor'></div>
					<p class='exception_offer'>Nessun offerta disponibile</p>
					<div class='divisor'></div>";
			}
		}

		// PROGETTI ADMIN
		public function get_progetti_admin() {
			$sql = "SELECT DISTINCT * FROM webproject.progetti";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count=1;
				while($row = $result->fetch_assoc()) {
					echo "<input id='project_select".$count."' class='pro_select' type='radio' name='pro_select'/>
						<label class='project_label' for='project_select".$count."'>
							<div class='project_title'>".$row['name']."
								<input type='checkbox' id='removeproj".$count."' class='remove_control'/>
								<label class='remove_proj_btn' for='removeproj".$count."'></label>
								<div class='remove_form_div'>
									<form class='remove_form' action='form_control.php' method='post'>
										<fieldset class='remove_fieldset'>
											<legend>Rimuovere definitivamente il progetto ".$row['name']." e tutti i suoi dati?</legend>
											<div class='yes_no_div'>
												<input id='yes_proj".$count."' class='radio_choice' type='radio' name='remove_proj' value='".$row['id']."' checked/>
												<label for='yes_proj".$count."'>Si, rimuovi</label>
												<input id='no_proj".$count."' class='radio_choice' type='radio' name='remove_proj' value='no'/>
												<label for='no_proj".$count."'>No, mantieni</label>
											</div>
										</fieldset>
										<input class='apply_btn' type='submit' value='Applica'/>
									</form>
								</div>
							</div>
							<form id='mp".$count."' class='modify_proj_form' action='form_control.php' method='post'>
								<input class='identity' type='text' name='modify_proj' value='".$row['id']."'/>
								<input class='identity' type='text' name='name' value='".$row['name']."'/>
								<input class='identity' type='text' name='old_image' value='".$row['image']."'/>
								<div class='project_info'>
									<div class='project_img'>
										<div class='current_proj_img' style='background-image:url(../../images/".$row['image'].")'></div>
										<div class='change_proj_img'>Cambia: <input type='file' name='image' accept='.jpg, .jpeg, .png'/></div>
									</div>
									<div class='project_data'>
										<div>Stato:";
					if($row['status']=='In corso')
						echo				"<label><input type='radio' name='status' value='In corso' checked/> In corso</label>
											<label><input type='radio' name='status' value='Terminato'/> Terminato</label>";
					else echo				"<label><input type='radio' name='status' value='In corso'/> In corso</label>
											<label><input type='radio' name='status' value='Terminato' checked/> Terminato</label>";
					echo				"</div>
										<div>Committente:<input type='text' name='client' value='".$row['client']."'/></div>
										<div>Tipologia:<input type='text' name='type' value='".$row['type']."'/></div>
										<div>Luogo:<input type='text' name='location' value='".$row['location']."'/></div>
										<div>Direttore dei lavori:<input type='text' name='director' value='".$row['director']."'/></div>
									</div>
									<textarea class='project_description' name='description' form='mp".$count."'>".$row['description']."</textarea>
								</div>
								<div class='proj_form_btns'>
									<input class='submit_btn' type='submit' value='Salva modifiche'/>
									<input class='reset_btn' type='reset' value='Annulla modifiche'/>
								</div>
							</form>
						</label>";
					$count++;
				}
			}
			else {
				echo "<p>Nessun progetto disponibile</p>";
			}
		}

		public function remove_progetto($proj) {
			$sql = "DELETE FROM webproject.progetti WHERE id='$proj'";
			$result = $this->conn->query($sql);
		}
		
		public function modify_progetto() {
			$id=$_POST['modify_proj'];
			$sql = "DELETE FROM webproject.progetti WHERE id='$id'";
			$result = $this->conn->query($sql);
			$this->insert_progetto();
		}

		public function insert_progetto() {
			$na=$_POST['name'];
			$st=$_POST['status'];
			$cl=$_POST['client'];
			$ty=$_POST['type'];
			$lo=$_POST['location'];
			$di=$_POST['director'];
			$de=$_POST['description'];
			$im=$_POST['image'];
			if($im=='') { // non avviene in new_proj perché è required
				if(isset($_POST['old_image']))
					$im=$_POST['old_image'];
			}
			if(isset($_POST['modify_proj'])) // quando avviene una modifica di un impiegato esistente
				$id=$_POST['modify_proj'];
			else { // quando avviene l'inserimento di un nuovo impiegato
				$i=1;
				$found=false;
				while(!$found) {
					$sql = "SELECT id FROM webproject.progetti WHERE id='$i'";
					$result = $this->conn->query($sql);
					if($result->num_rows > 0)
						$i++;
					else {
						$id=$i;
						$found=true;
					}
				}
			}
			$sql = "INSERT INTO webproject.progetti VALUES ('$id','$im','$na','$st','$cl','$ty','$lo','$di','$de')";
			$result = $this->conn->query($sql);
		}

		//IMPIEGATI AZIENZA
		public function get_impiegati_azienda() {
			$branches=array('Direzione','Ufficio','Relazioni pubbliche','Progettazione','Cantiere','Magazzino');
			for($i=0; $i<count($branches); $i++) {
			
				$sql = "SELECT DISTINCT * FROM webproject.impiegati WHERE impiegati.branch='".$branches[$i]."'" ;
				$result = $this->conn->query($sql);
				if($result->num_rows > 0){
					echo "<div class='subsubtitle'>".$branches[$i]."</div>  
					<div class='divisor'></div>";
					while($row=$result->fetch_assoc()){
						echo "<div class='div_impiegato'>
						<img class='img_impiegato' src='images/".$row['image']."'/></br></br>
						Nome - ".$row['firstname']."</br> 
						Cognome - ".$row['lastname']."</br>
						Ruolo - ".$row['role']."</br>
						Data di nascita - ".$row['birth']."</br>
						Età - ".$row['age']."</br>
						Inizio - ".$row['begin']."</br>
						</div>";
					
					}
				}
				else{
					echo "<div class='subsubtitle'>".$branches[$i]."</div>  
						<div class='divisor'></div>
						<p class='exception_impiegati'>Nessun impiegato in ".$branches[$i]."</p>";
				}
			}
			
		}
		
		// IMPIEGATI ADMIN
		public function get_impiegati_admin() {
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
							<form class='modify_form' action='form_control.php' method='post'>
								<fieldset class='modify_personal_info'>
									<legend>Informazioni personali</legend>
									<input class='identity' type='text' name='modify_imp' value='".$row['id']."'/>
									<input class='identity' type='text' name='old_image' value='".$row['image']."'/>
									<div>Nome:<input type='text' name='firstname' value='".$row['firstname']."' required/></div>
									<div>Cognome:<input type='text' name='lastname' value='".$row['lastname']."' required/></div>
									<div>Data di nascita:<input type='date' name='birth' value='".$row['birth']."'/></div>
									<div>Età:<input type='number' name='age' value='".$row['age']."' min='18' max='99'/></div>
									<div>e-mail:<input type='email' value='".$row['mail']."' name='mail'/></div>
									<div class='file_select'>Foto:<input type='file' name='image' accept='.jpg, .jpeg, .png'/></div>
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
							<form class='remove_form' action='form_control.php' method='post'>
								<fieldset class='remove_fieldset'>
									<legend>Rimuovere definitivamente ".$row['firstname']." ".$row['lastname']." e tutti i suoi dati?</legend>
									<div class='yes_no_div'>
										<input id='yes".$count."' class='radio_choice' type='radio' name='remove_imp' value='".$row['id']."' checked/>
										<label for='yes".$count."'>Si, rimuovi</label>
										<input id='no".$count."' class='radio_choice' type='radio' name='remove_imp' value='no'/>
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
				echo "<div id='left_container'>".$left."</div><div id='right_container'>".$right."</div>";
			} else {
				echo "<p>Nessun impiegato disponibile</p>";
			}
		}

		public function remove_impiegato($imp) {
			$sql = "DELETE FROM webproject.impiegati WHERE id='$imp'";
			$result = $this->conn->query($sql);
		}
		
		public function modify_impiegato() {
			$id=$_POST['modify_imp'];
			$sql = "DELETE FROM webproject.impiegati WHERE id='$id'";
			$result = $this->conn->query($sql);
			$this->insert_impiegato();
		}

		public function insert_impiegato() {
			$fn=$_POST['firstname'];
			$ln=$_POST['lastname'];
			$ro=$_POST['role'];
			$bi=$_POST['birth'];
			$ag=$_POST['age'];
			$ma=$_POST['mail'];
			$br=$_POST['branch'];
			$be=$_POST['begin'];
			$im=$_POST['image'];
			if($im=='') {
				if(isset($_POST['old_image']))
					$im=$_POST['old_image'];
				else
					$im='default_user.jpg';
			}
			if(isset($_POST['modify_imp'])) // quando avviene una modifica di un impiegato esistente
				$id=$_POST['modify_imp'];
			else { // quando avviene l'inserimento di un nuovo impiegato
				$i=1;
				$found=false;
				while(!$found) {
					$sql = "SELECT id FROM webproject.impiegati WHERE id='$i'";
					$result = $this->conn->query($sql);
					if($result->num_rows > 0)
						$i++;
					else {
						$id=$i;
						$found=true;
					}
				}
			}
			$sql = "INSERT INTO webproject.impiegati VALUES ('$id','$fn','$ln','$ro','$bi','$ag','$ma','$br','$be','$im')";
			$result = $this->conn->query($sql);
		}

		// VALIDAZIONE CREDENZIALI
		public function validate($user, $psw) {
			$sql = "SELECT * FROM webproject.utenti WHERE username='$user'";
			$result = $this->conn->query($sql);
			if($result->num_rows > 0) {
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

?>