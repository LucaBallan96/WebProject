<script type="text/javascript" src="script/menuScript.js"></script>

<?php
	session_start();

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
				echo "<div id='incorso'>Progetti In Corso</div>".$incorso."<div id='terminati'>Progetti Terminati</div>".$terminati;
			} else {
				echo "<p>Nessun progetto disponibile</p>";
			}
		}
		// ULTIMO ARTICOLO
		public function get_last_article() {
			$sql = "SELECT * FROM webproject.stampa ORDER BY date DESC";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<a href='articolo.php?id=".$row['id']."'id='div_two' class='div_group'>
				<div id='div_title_two' class='div_title_group'>
					<div class='title_div'>Ultimo Articolo</div>
				</div>
				<div class='div_container_img'>
					<img src='images/".$row['image']."'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'>".$row[title]."</div>
					</div>
				</div>
		
			</a>";
			}
		}
		// ULTIMO PROGETTO
		public function get_last_project() {
			$sql = "SELECT * FROM webproject.progetti ORDER BY date_begin DESC";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<a href='info_progetto.php?numero=".$row['id']."'id='div_three' class='div_group'>
				<div id='div_title_three'class='div_title_group'>
						<div class='title_div'>Ultimo Progetto</div>
				</div>
				<div class='div_container_img'>
					<img src='images/".$row['image']."'/>
					<div class='div_overlay'>
					
						<div class='div_text_inside_group'>".$row['name']."</div>
					</div>
				</div>
				
			</a>";
			}
		}
		// ULTIMA OFFERTA
		public function get_last_offer() {

			if(isset($_SESSION['username']))
				$username=$_SESSION['username'];
			else $username="";

			//query random 
			$sql = "SELECT * FROM webproject.offerte WHERE offerte.id != ALL (SELECT idOffer FROM webproject.form_offerte WHERE user='".$username."') ORDER BY RAND() LIMIT 1;";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<a href='lavoro.php#".$row['id']."'id='div_four' class='div_group'>
				<div id='div_title_four'class='div_title_group'>
						<div class='title_div'>Offerte</div>
				</div>
				<div  class='div_container_img'>
					<img id='img_offer' src='images/".$row['image']."'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'>".$row['branch']."</br></br>".$row['role']."</br></br>".$row['contract']."</div>
					</div>
				</div>
			</a>";
			}
			else{
				echo "<a href='#'id='div_four' class='div_group'>
				<div id='div_title_four'class='div_title_group'>
						<div class='title_div'>Sedi</div>
				</div>
				<div class='div_container_img'>
					<img src='images/sede.png'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'>Scopri dove siamo</div>
					</div>
				</div>
			</a>";

			}
		}
		// INFO PROGETTO
		public function get_info_progetto($progetto) {
			$sql = "SELECT * FROM webproject.progetti WHERE id='$progetto'";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$dateString = date("d-m-Y", strtotime($row['begin']));
				echo "<h1 id='header'>".$row['name']."</h1>
						<div id='div_image'><img src='images/".$row['image']."'></img></div>
						<div id='div_specifiche'>
							<div class='specifica'>Committente<p class='spec_data'>".$row['client']."</p></div><hr/>
							<div class='specifica'>Tipologia<p class='spec_data'>".$row['type']."</p></div><hr/>
							<div class='specifica'>Località<p class='spec_data'>".$row['location']."</p></div><hr/>
							<div class='specifica'>Direttore dei lavori<p class='spec_data'>".$row['director']."</p></div><hr/>
							<div class='specifica'>Data di inizio<p class='spec_data'>".$dateString."</p></div><hr/>
							<div class='specifica'>Stato<p class='spec_data'>".$row['status']."</p></div>
						</div>
						<div id='div_desc'>".$row['description']."</div>";
			}
		}
		
		// PRENOTAZIONI
		public function get_prenotation(){
			$sql="SELECT * FROM webproject.offerte WHERE webproject.offerte.id = ANY (SELECT idOffer FROM webproject.form_offerte  WHERE form_offerte.user ='".$_SESSION['username']."')";
			
			$result = $this->conn->query($sql);
			echo"<h1>Prenotazioni Effettuate</h1>";
			if($result->num_rows > 0){
				$count=1;
				while($row=$result->fetch_assoc()){
					
					echo "<input id='of".$count."' type='checkbox' class='pro_select' />
						<label class='label_offer' for='of".$count."'>
							<div class='div_img_offer'><img class='img_offer'src='images/".$row['image']."'></div>
							<div class='div_information'>
								<div class='text'>
									".$row['role']." - ".$row['branch']." - ".$row['contract']."</br></br>
									".$row['message']."	</br></br>";
									
									$username=$_SESSION['username'];
									$sql1="SELECT date FROM webproject.form_offerte WHERE idOffer='".$row['id']."'and user='".$username."'";
									$result1=$this->conn->query($sql1);
									$row1=$result1->fetch_assoc();
									echo"Data colloquio - ".$row1['date']."
									</div>
									
							</div>
							
							<form action='form_control.php' method='post'>
							<input id='subsub' type='submit' value='Rimuovi' name='remove_off'> 
							<input class='identity' type='text' name='idOffer' value='".$row['id']."'/>
						</form>
						</label>

						
						
						<div class='divisor'></div>";
					$count=$count+1;
				}
			}
			else{
				echo "
					<p class='exception_offer' align='center'>Nessun offerta prenotata</p>
					<div class='divisor'></div>";
			}
		}
		//RIMOZIONE PRENOTAZIONE
		public function remove_prenotation($idOffer){
			$user=$_SESSION['username'];
			$sql = "DELETE FROM webproject.form_offerte WHERE user='$user'and idOffer='$idOffer'";
			$result = $this->conn->query($sql);
			
		}
		//ARTICOLI

		public function get_articles(){
			$sql="SELECT * FROM webproject.stampa";
			$result = $this->conn->query($sql);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					echo "<a class='link' href='articolo.php?id=".$row['id']."'><div class='container_article'>
					<div class='container_img'>
					<img src='images/".$row['image']."'>
					</div>
		
					<div class='container_text'>
						<div class='text'>
							".$row['title']."
						</div>
					</div>
					
			
			</div>
			</a>";
				}
			}
			else{
				echo "<h2>Nessun Articolo</h2>";
			}
		}

		//ARTICOLO

		public function get_article(){
			$id=$_GET['id'];
			$sql="SELECT * FROM webproject.stampa WHERE id='".$id."'";
			$result = $this->conn->query($sql);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					echo "<div class='title'>".$row['title']."</div>
					<div class='subtitle'>".$row['subtitle']."</div>
					<div class='divisor'></div>
					<div class='informations'>
						Editore - ".$row['house']." &nbsp&nbsp&nbsp | &nbsp&nbsp&nbsp Data - ".$row['date']."
					</div>
					<div class='divisor'></div>
					<div class='container_text_img'>
						<div class='text'>
							".$row['text']."
							<div class='div_author'>Autore - ".$row['author']."</div>
						</div>
						
						<div class='container_img'><img src='images/".$row['image']."'/></div>		
					</div>";
				}
			}
			else{
				echo "<h2>Nessuna informazione trovata</h2>";
			}




			
		}
		//OFFERTE DI LAVORO
		public function get_offer(){
			
			$sql="SELECT COUNT(idOffer) FROM webproject.form_offerte WHERE user='".$_SESSION['username']."'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			echo "<div id='container_prenotazioni'>
			Benvenuto ".$_SESSION['username']."</br></br>
			Offerte prenotate - ".$row['COUNT(idOffer)']." </br></br>
			<a href='prenotazioni.php'>Vedi prenotazioni</a>
			</div>
			
			<div class='title'>Lavora con Noi</div>
	
			";
			$user=$_SESSION['username'];
			
			$sql="SELECT * FROM webproject.offerte WHERE webproject.offerte.id != ALL ((SELECT idOffer FROM webproject.form_offerte  WHERE form_offerte.user ='".$user."') UNION (SELECT idOffer FROM webproject.date_offerte  WHERE date_offerte.idOffer NOT IN (SELECT idOffer FROM webproject.date_offerte  WHERE date_offerte.jobs!='0')))";
			$result = $this->conn->query($sql);
			if($result->num_rows > 0){
				$count=0;
				while($row=$result->fetch_assoc()){

					$sql2="SELECT* FROM webproject.date_offerte WHERE idOffer='".$row['id']."'and jobs >0";
					$result2= $this->conn->query($sql2);
					$dates=array();
					while($row2=$result2->fetch_assoc()){
						$dates[]=$row2['date'];
					}

					

					echo "
					<div class='divisor'></div>
					<input id='".$row['id']."' type='checkbox' class='pro_select' />
						<label class='label_offer' for='".$row['id']."'>
						
						
						<div class='div_img_offer'><img class='img_offer'src='images/".$row['image']."'></div>
							<div class='div_information'>
								<div class='text'>
									".$row['role']." - ".$row['branch']." - ".$row['contract']."</br></br>
									".$row['message']."		
								</div>
							</div>
							
							</label>




							<div class='form_offer'>
							<form id='f".$count."' action='form_control.php' method='post'>
								<input class='identity' type='text' name='id' value='".$row['id']."'/>
								<div class='div_container_form'>
									<div class='general_informations'>
										Nome: <input class='in_form' type='text' name='firstname'><br></br>
										Cognome: <input class='in_form' type='text' name='lastname'><br><br>
										<div class='div_genre'>
											Genre: 
											<div class='container_radio'>
												<input type='radio' name='gender' value='male'> Male &nbsp&nbsp&nbsp
												<input type='radio' name='gender' value='female'> Female&nbsp&nbsp&nbsp
											</div>
										</div>
										<br>Birthday: <input class='in_form' type='date' name='bday'><br></br>
										Mail: <input class='in_form' type='text' name='mail'><br></br>
										Data colloquio: <select class='date_input' name='date' >";
										for($j=0; $j<count($dates); $j++)
											echo"<option value='".$dates[$j]."'>".$dates[$j]."</option>";
	
										echo"</select><br></br>
									</div>
									&nbsp&nbsp&nbspMessaggio:</br></br>
									<textarea rows='11' class='textmessage' name='textmessage' form='f".$count."'> </textarea>
									<input class='submit' type='submit' value='Submit' name='candidate'>  
								</div>	
							</form>
						</div>  
						


							



						";
					$count=$count+1;
				}
			}
			else{
				echo "
					<p class='exception_offer' align='center'>Nessun offerta disponibile</p>
					<div class='divisor'></div>";
			}
		}

		// INSERIMENTO CANDIDATI
		public function insert_candidate(){
			
						$idOffer=$_POST['id'];
						$firstname=$_POST['firstname'];
						$lastname=$_POST['lastname'];
						$genre=$_POST['gender'];
						$bday=$_POST['bday'];
						$mail=$_POST['mail'];
						$file=$_POST['file'];
						$textmessage=$_POST['textmessage'];
						$date=$_POST['date'];
						$username=$_SESSION['username'];
						
						//update jobs con lucchetto per accessi concorrenti

						$sql1="LOCK TABLES webproject.date_offerte";
						$sql2="SELECT jobs FROM webproject.date_offerte WHERE idOffer='".$idOffer."' and date='".$date."'";
						$sql3="UNLOCK TABLES";
						$sql4="UPDATE webproject.date_offerte SET jobs=jobs-1 WHERE idOffer='".$idOffer."' and date='".$date."'";
						$sql5 = "INSERT INTO webproject.form_offerte VALUES ('$username','$idOffer','$firstname','$lastname','$bday','$mail','$genre','$date','$textmessage')";
						
						$result1=$this->conn->query($sql1);
						$result2=$this->conn->query($sql2);
							
						$row2=$result2->fetch_assoc();
						
						if($row2['jobs']>0){

								$result4=$this->conn->query($sql4);//diminuisco jobs
								$result5 = $this->conn->query($sql5);//inserisco candidato
								$result3=$this->conn->query($sql3);//rilascio lucchetto
								return true;
							}
						else{
								$result3=$this->conn->query($sql3);//rilascio lucchetto
								//eccezione jobs = 0
								return false;
							}
						
						
			
					}
					
		// PROGETTI ADMIN
		public function get_progetti_admin() {
			$sql = "SELECT DISTINCT * FROM webproject.progetti";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count=1;
				while($row = $result->fetch_assoc()) {
					echo "<input id='project_select".$count."' class='pro_select' type='radio' name='pro_select' onclick='uncheck_radio(this)'/>
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
							<form id='project_select".$count."_form' class='modify_proj_form' action='form_control.php' method='post'>
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
										<div>Data di inizio:<input type='date' name='begin' min='1900-01-01' max='2100-01-01' value='".$row['begin']."' required/></div>
									</div>
									<textarea class='project_description' name='description' form='project_select".$count."_form'>".$row['description']."</textarea>
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
			$be=$_POST['begin'];
			$de=$_POST['description'];
			$im=$_POST['image'];
			if($im=='') { // non avviene in new_proj perché è required
				if(isset($_POST['old_image']))
					$im=$_POST['old_image'];
			}
			if(isset($_POST['modify_proj'])) // quando avviene una modifica di un progetto esistente
				$id=$_POST['modify_proj'];
			else { // quando avviene l'inserimento di un nuovo progetto
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
			$sql = "INSERT INTO webproject.progetti VALUES ('$id','$im','$na','$st','$cl','$ty','$lo','$di','$be','$de')";
			$result = $this->conn->query($sql);
		}

		// IMPIEGATI AZIENZA
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
									<div>Data di nascita:<input type='date' name='birth' min='1900-01-01' max='2000-01-01' value='".$row['birth']."'/></div>
									<div>Età:<input type='number' name='age' value='".$row['age']."' min='18' max='99'/></div>
									<div>E-mail:<input type='email' value='".$row['mail']."' name='mail'/></div>
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
			} else
				echo "<p>Nessun impiegato disponibile</p>";
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

		// ARTICOLI ADMIN
		public function get_articoli_admin() {
			$sql = "SELECT DISTINCT * FROM webproject.articoli";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count=1;
				while($row = $result->fetch_assoc()) {
					echo "<div class='article_div'>
							<div class='article_image' style='background-image:url(../../images/".$row['image'].")'></div>
							<div class='article_info_div'>
								<div class='article_info'>Data:<div>".$row['date']."</div></div>
								<div class='article_info'>Autore:<div>".$row['author']."</div></div>
								<div class='article_info'>Stampa:<div>".$row['house']."</div></div>
								<div class='article_info'>Titolo:<div>".$row['title']."</div></div>
								<div class='article_info'>Sottotitolo:<div>".$row['subtitle']."</div></div>
							</div>
							<input id='mod_art_checkbox".$count."' class='mod_art_control' type='checkbox'/>
							<label for='mod_art_checkbox".$count."' class='modify_article_btn'></label>
							<form id='mod_a".$count."' class='mod_art_form' action='form_control.php' method='post'>
								<div class='article_image' style='background-image:url(../../images/".$row['image'].")'>
									<div class='change_art_img'>Cambia: <input type='file' name='image' accept='.jpg, .jpeg, .png'/></div>
								</div>
								<div class='article_info_div'>
									<div class='article_info'>Data:<input type='date' min='1900-01-01' max='".date('Y-m-d')."' name='date' value='".$row['date']."' required/></div>
									<div class='article_info'>Autore:<input type='text' name='author' placeholder='Autore' value='".$row['author']."' required/></div>
									<div class='article_info'>Stampa:<input type='text' name='house' placeholder='Ente di stampa' value='".$row['house']."' required/></div>
									<div class='article_info'>Titolo:<input type='text' name='title' placeholder='Titolo' value='".$row['title']."' required/></div>
									<div class='article_info'>Sottotitolo:<input type='text' name='subtitle' placeholder='Sottotitolo' value='".$row['subtitle']."' required/></div>
								</div>
								<input class='identity' type='text' name='modify_article' value='".$row['id']."'/>
								<input class='identity' type='text' name='old_image' value='".$row['image']."'/>
								<input class='save_mod_art' type='submit' value='Salva'/>
								<input class='reset_mod_art' type='reset' value='Reset'/>
								<textarea class='article_text' name='text' form='mod_a".$count."'>".$row['text']."</textarea>
							</form>
							<input id='rem_art_checkbox".$count."' class='rem_art_control' type='checkbox'/>
							<label for='rem_art_checkbox".$count."' class='remove_article_btn'></label>
							<form class='rem_art_form' action='form_control.php' method='post'>
								<div>Vuoi eliminare definitivamente questo articolo e tutte le informazioni in esso contenute?</div>
								<input class='identity' type='text' name='remove_article' value='".$row['id']."'/>
								<input type='submit' class='rem_art_form_btn' value='Elimina'/>
							</form>
							<div class='article_text'>".$row['text']."</div>
						</div>";
					$count++;
				}
			} else
				echo "<p>Nessun articolo disponibile</p>";
		}

		public function remove_articolo($art) {
			$sql = "DELETE FROM webproject.articoli WHERE id='$art'";
			$result = $this->conn->query($sql);
		}
		
		public function modify_articolo() {
			$id=$_POST['modify_article'];
			$sql = "DELETE FROM webproject.articoli WHERE id='$id'";
			$result = $this->conn->query($sql);
			$this->insert_articolo();
		}

		public function insert_articolo() {
			$da=$_POST['date'];
			$au=$_POST['author'];
			$ho=$_POST['house'];
			$ti=$_POST['title'];
			$su=$_POST['subtitle'];
			$te=$_POST['text'];
			$im=$_POST['image'];
			if($im=='') {
				$im=$_POST['old_image']; // nell'inserimento di un nuovo articolo è required
			}
			if(isset($_POST['modify_article'])) // quando avviene una modifica di un articolo esistente
				$id=$_POST['modify_article'];
			else { // quando avviene l'inserimento di un nuovo articolo
				$i=1;
				$found=false;
				while(!$found) {
					$sql = "SELECT id FROM webproject.articoli WHERE id='$i'";
					$result = $this->conn->query($sql);
					if($result->num_rows > 0)
						$i++;
					else {
						$id=$i;
						$found=true;
					}
				}
			}
			$sql = "INSERT INTO webproject.articoli VALUES ('$id','$da','$au','$ho','$ti','$su','$te','$im')";
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

		public function set_accesses() {
			$user=$_SESSION['username'];
			$sql = "SELECT * FROM webproject.utenti WHERE username='$user'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			$ac=$row['accesses']+1;
			$sql = "UPDATE webproject.utenti SET accesses='$ac' WHERE username='$user'";
			$result = $this->conn->query($sql);
		}

		// INFO UTENTE
		public function get_user_info() {
			$user=$_SESSION['username'];
			$sql = "SELECT * FROM webproject.utenti WHERE username='$user'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			echo "<fieldset id='user_data'>
					<div class='data_input'>Numero di accessi a questo sito: ".$row['accesses']."</div>
					<label class='data_input'>Username: <input type='text' name='username' placeholder='Inserisci username' value='".$row['username']."' autofocus required/></label>
					<input id='change_password_checkbox' type='checkbox' name='change_password'/>
					<label class='data_input' id='change_password_label' for='change_password_checkbox'>Cambia password</label>
					<div id='change_div'>
						<label class='data_input'>Vecchia password: <input type='text' name='old_password' placeholder='Inserisci la password corrente'/></label>
						<label class='data_input'>Nuova password: <input type='password' name='new_password' placeholder='Inserisci la nuova password'/></label>
						<label class='data_input'>Conferma password: <input type='password' name='rep_new_password' placeholder='Ripeti la nuova password'/></label>
					</div>
					<label class='data_input'>E-mail: <input type='email' name='mail' placeholder='Inserisci e-mail' value='".$row['mail']."' required/></label>
				</fieldset>
				<div id='div_buttons'>
					<input class='btns' name='modify_user' type='submit' value='Salva modifiche'/>
					<input class='btns' type='reset' id='cancel_btn' value='Annulla modifiche'/>
				</div>";
		}

		// INFO UTENTE ADMIN
		public function get_utenti_admin() {
			$sql = "SELECT * FROM webproject.utenti WHERE role='normal'";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count=1;
				while($row = $result->fetch_assoc()) {
					echo "<div class='user_div'>
							<div class='user_data'>".$row['username']."</div>
							<div class='user_data'>P: ".$row['password']."</div>
							<div class='user_data'>Numero accessi al sito: ".$row['accesses']."</div>
							<a class='user_data' href='mailto:".$row['mail']."'>".$row['mail']."</a>
							<input id='mod_u_checkbox".$count."' class='mod_u_control' type='checkbox'/>
							<label for='mod_u_checkbox".$count."' class='mod_u_label'></label>
							<form class='mod_u_form' action='form_control.php' method='post'>
								<input type='text' class='identity' name='old_user' value='".$row['username']."'/>
								<input type='text' class='identity' name='old_accesses' value='".$row['accesses']."'/>
								<input type='text' class='mod_u_form_data' name='admin_mod_user' placeholder='Username' value='".$row['username']."' required/>
								<input type='text' class='mod_u_form_data' name='admin_mod_u_pass' placeholder='Password' value='".$row['password']."' required/>
								<input type='email' class='mod_u_form_data' name='admin_mod_u_mail' placeholder='E-mail' value='".$row['mail']."' required/>
								<input type='submit' class='mod_u_form_btn' value='Salva'/>
								<input type='reset' class='mod_u_form_btn' value='Annulla'/>
							</form>
							<input id='rem_u_checkbox".$count."' class='rem_u_control' type='checkbox'/>
							<label for='rem_u_checkbox".$count."' class='rem_u_label'></label>
							<form class='rem_u_form' action='form_control.php' method='post'>
								<div>Vuoi eliminare definitivamente questo account?</div>
								<input type='text' class='identity' name='admin_rem_user' value='".$row['username']."'/>
								<input type='submit' class='mod_u_form_btn' value='Elimina'/>
							</form>
						</div>";
					$count++;
				}
			} else
				echo "<p>Nessun impiegato disponibile</p>";
		}

		// RIMOZIONE UTENTE
		public function remove_user($username) {
			$sql = "DELETE FROM webproject.utenti WHERE username='$username'";
			$result = $this->conn->query($sql);
			$sql = "DELETE FROM webproject.form_offerte WHERE user='$username'";
			$result = $this->conn->query($sql);
		}

		// MODIFICA UTENTE
		public function modify_user() {
			if(isset($_POST['modify_user'])) { // funzione invocata da utente
				$us=$_POST['username'];
				$op=$_POST['old_password'];
				$np=$_POST['new_password'];
				$rp=$_POST['rep_new_password'];
				$ma=$_POST['mail'];

				$username=$_SESSION['username'];
				$sql = "SELECT * FROM webproject.utenti WHERE username='$username'";
				$result = $this->conn->query($sql);
				$row = $result->fetch_assoc();
				$ro=$row['role'];
				$ac=$row['accesses'];
				if(isset($_POST['change_password'])) { // cambio password on
					if($op=='' || $np=='' || $rp=='') {
						return 1; // campi dati nulli
					}
					else if($np!=$rp) {
						return 2; // nuova password e conferma password non coincidono
					}
					else if($op!=$row['password']) {
						return 3; // vecchia password è errata
					}
				}
				else { // cambio password off
					$np=$row['password'];
				}
			}
			else { // funzione invocata da admin
				$us=$_POST['admin_mod_user'];
				$np=$_POST['admin_mod_u_pass'];
				$ma=$_POST['admin_mod_u_mail'];
				$ro='normal';
				$ac=$_POST['old_accesses'];
				$username=$_POST['old_user'];
			}
			if($us!=$username) { // modificato nome utente
				$sql = "SELECT * FROM webproject.utenti WHERE username='$us'";
				$result = $this->conn->query($sql);
				if($result->num_rows > 0) {
					return 4; // nome utente non disponibile
				}
			}
			$sql = "DELETE FROM webproject.utenti WHERE username='$username'";
			$result = $this->conn->query($sql);
			$sql = "INSERT INTO webproject.utenti VALUES ('$us','$np','$ma','$ro','$ac')";
			$result = $this->conn->query($sql);
			$sql = "UPDATE webproject.form_offerte SET user='$us' WHERE user='$username'";
			$result = $this->conn->query($sql);
			return 0;
		}

		// NUOVO UTENTE
		public function insert_user() {
			$us=$_POST['new_user'];
			$pa=$_POST['password'];
			$re=$_POST['rep_password'];
			$ma=$_POST['mail'];
			$ro='normal';
			if($pa!=$re)
				return 1;
			else {
				$sql = "SELECT * FROM webproject.utenti WHERE username='$us'";
				$result = $this->conn->query($sql);
				if($result->num_rows > 0)
					return 2;
				else {
					$sql = "INSERT INTO webproject.utenti VALUES ('$us','$pa','$ma','$ro','1')";
					$result = $this->conn->query($sql);
					return 0;
				}
			}
		}
	}

?>