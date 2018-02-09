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
				$incorso2="";
				$terminati2="";
				while($row = $result->fetch_assoc()) {
					$stringa="<a href='info_progetto.php?numero=".$row['id']."' class='grid_project' title='Visualizza le informazioni sul progetto ".$row['name']."'>
							<img class='grid_pr_image' src='images/".$row['image']."' />
							<div class='grid_pr_name_div'><div class='grid_pr_name'>".$row['name']."</div></div>
							<div class='grid_pr_location'>".$row['location']."</div>
						</a>";
					$stringa2="<div class='list_project' title='Visualizza le informazioni sul progetto ".$row['name']."'>
							<div class='list_pr_image'><img src='images/".$row['image']."'/></div>
							<a href='info_progetto.php?numero=".$row['id']."' class='list_pr_name_a'><div class='list_pr_name'>".$row['name']."</div><div class='list_pr_location'>".$row['location']."</div></a>
						</div>";
					if($row['status']=='In corso') {
						$incorso=$incorso.$stringa;
						$incorso2=$incorso2.$stringa2;
					}
					else if($row['status']=='Terminato') {
						$terminati=$terminati.$stringa;
						$terminati2=$terminati2.$stringa2;
					}
				}
				$result->free();
				echo "<div id='container_grid'><div id='incorso'>Progetti In Corso</div>".$incorso."<div id='terminati'>Progetti Terminati</div>".$terminati."</div>";
				echo "<div id='container_list'><div id='incorso2'>Progetti In Corso</div>".$incorso2."<div id='terminati2'>Progetti Terminati</div>".$terminati2."</div>";
			} else {
				echo "<p>Nessun progetto disponibile</p>";
			}
		}
		// ULTIMO ARTICOLO
		public function get_last_article() {
			$sql = "SELECT * FROM webproject.articoli ORDER BY date DESC";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<div class='contprimo'><a href='articolo.php?id=".$row['id']."' id='div_two' class='div_group' title='Leggi l&#39articolo più recente'>
				<div id='div_title_two' class='div_title_group'>
					<div class='title_div'>Ultimo Articolo</div>
				</div>
				<div class='div_container_img'>
					<img src='images/".$row['image']."' alt='Ultimo articolo inserito'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'><span class='sp'>".$row['title']."</span></div>
					</div>
				</div>
		
			</a></div>";
			}
			else{
				echo "<div class='contprimo'><a href='azienda.php' title='Storia e sede della nostra azienda' id='div_four' class='div_group'>
				<div id='div_title_four' class='div_title_group'>
						<div class='title_div'>Azienda</div>
				</div>
				<div class='div_container_img'>
					<img src='images/sede.png' alt='Sede dell&#39azienda'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'><span class='sp'>Scopri dove siamo</span></div>
					</div>
				</div>
			</a></div>";}
		}
		// ULTIMO PROGETTO
		public function get_last_project() {
			$sql = "SELECT * FROM webproject.progetti ORDER BY begin DESC";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				echo "<div class='contprimo'><a href='info_progetto.php?numero=".$row['id']."'id='div_three' class='div_group' title='Visualizza l&#39ultimo progetto iniziato'>
				<div id='div_title_three' class='div_title_group'>
						<div class='title_div'>Ultimo Progetto</div>
				</div>
				<div class='div_container_img'>
					<img src='images/".$row['image']."'alt='Ultimo progetto inserito'/>
					<div class='div_overlay'>
					
						<div class='div_text_inside_group'><span class='sp'>".$row['name']."</span></div>
					</div>
				</div>
				
			</a></div>";
			}else{
				echo "<div class='contprimo'><a href='azienda.php' title='Storia e sede della nostra azienda' id='div_four' class='div_group'>
				<div id='div_title_four' class='div_title_group'>
						<div class='title_div'>Azienda</div>
				</div>
				<div class='div_container_img'>
					<img src='images/sede.png'alt='Sede dell&#39azienda'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'><span class='sp'>Scopri dove siamo</span></div>
					</div>
				</div>
			</a></div>";}
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
				echo "<div class='contprimo'><a href='lavoro.php#".$row['id']."'id='div_four' class='div_group' title='Visualizza una o più offerte di lavoro'>
				<div id='div_title_four'class='div_title_group'>
						<div class='title_div'>Offerte</div>
				</div>
				<div  class='div_container_img'>
					<img id='img_offer' src='images/".$row['role'].".png'alt='Ultima offerta inserito'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'><span class='sp'>".$row['branch']."</span></br></br><span class='sp'>".$row['role']."</span></br></br><span class='sp'>".$row['contract']."</span></div>
					</div>
				</div>
			</a></div>";
			}
			else{
				echo "<div class='contprimo'><a href='azienda.php' title='Storia e sede della nostra azienda' id='div_four' class='div_group'>
				<div id='div_title_four' class='div_title_group'>
						<div class='title_div'>Azienda</div>
				</div>
				<div class='div_container_img'>
					<img src='images/sede.png'alt='Sede dell&#39azienda'/>
					<div class='div_overlay'>
						<div class='div_text_inside_group'>Scopri dove siamo</div>
					</div>
				</div>
			</a></div>";

			}
		}
		// INFO PROGETTO
		public function get_info_progetto($progetto) {
			$sql = "SELECT * FROM webproject.progetti WHERE id='$progetto'";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				//$dateString = date("d-m-Y", strtotime($row['begin']));
				echo "<h1 id='header'>".$row['name']."</h1>
						<div id='div_image' title='".$row['image']."'><img src='images/".$row['image']."'/></div>
						<div id='div_specifiche'>
							<div class='specifica'>Committente<p class='spec_data'>".$row['client']."</p></div><hr/>
							<div class='specifica'>Tipologia<p class='spec_data'>".$row['type']."</p></div><hr/>
							<div class='specifica'>Località<p class='spec_data'>".$row['location']."</p></div><hr/>
							<div class='specifica'>Direttore dei lavori<p class='spec_data'>".$row['director']."</p></div><hr/>
							<div class='specifica'>Data di inizio<p class='spec_data'>".$row['begin']."</p></div><hr/>
							<div class='specifica'>Stato<p class='spec_data'>".$row['status']."</p></div>
						</div>
						<div id='div_desc'>".$row['description']."</div>";
			}
		}
		//MESSAGGI
		public function get_messages(){
			$username=$_SESSION['username'];
			$sql="SELECT message FROM webproject.messaggi WHERE user='".$username."'";
			$result=$this->conn->query($sql);
			if($result->num_rows >0){
				$count=0;
				while($row=$result->fetch_assoc()){
					
					$a=$row['message'];
					if(strpos($a,'modifiche')!==false){
						echo "<input id='".$count."' type='checkbox' class='pro_close' />
						<label class='label_close' for='".$count."'>
							<div class='div_close' title='chiudi notifica'>&nbspx&nbsp
							</div>
						</label>
						<div class='cont_message'>
							<div class='textc'>
								".$row['message']."		
							</div>
						
						</div>";
					}
					elseif(strpos($a,'rimossa')!==false){
						echo "<input id='".$count."' type='checkbox' class='pro_close' />
						<label class='label_close' for='".$count."'>
							<div class='div_close_2' title='chiudi notifica'>&nbspx&nbsp
							</div>
						</label>
						<div class='cont_message_2'>
							<div class='textc'>
							".$row['message']."
								</div>
							
						</div>";
					}
					$count=$count+1;
				}
			}
		}
		// PRENOTAZIONI
		public function get_prenotation(){
			
			$sql="SELECT * FROM webproject.offerte WHERE webproject.offerte.id = ANY (SELECT idOffer FROM webproject.form_offerte  WHERE form_offerte.user ='".$_SESSION['username']."')";
			
			$result = $this->conn->query($sql);
			echo"<h1 class='title'>Prenotazioni Effettuate</h1>";
			if($result->num_rows > 0){
				$count=1;
				while($row=$result->fetch_assoc()){
					
					echo "<input id='of".$count."' type='checkbox' class='pro_select' />
						<label class='label_offer' for='of".$count."'>
							<div class='div_img_offer'><img class='img_offer'src='images/".$row['role'].".png' alt='offerta come ".$row['role']."'></div>
							<div class='div_information'>
								<div class='text'>
									".$row['role']." - ".$row['branch']." - ".$row['contract']."</br></br>
									".$row['message']."	</br></br>";
									
									$username=$_SESSION['username'];
									$sql1="SELECT date FROM webproject.form_offerte WHERE idOffer='".$row['id']."' and user='".$username."'";
									$result1=$this->conn->query($sql1);
									$row1=$result1->fetch_assoc();
									echo"Data colloquio:  ".$row1['date']."
									</div>
									
							</div>
							
							<form action='form_control.php' method='post'>
							<input id='subsub' type='submit' value='' title='rimuovi questa offerta dalle prenotazioni' name='remove_off' > 
							<input class='identity' type='text' name='idOffer' value='".$row['id']."'/>
							<input class='identity' type='text' name='mydate' value='".$row1['date']."'/>
						</form>
						</label>

						
						
						<div class='divisor'></div>";
					$count=$count+1;
				}
			}
			else{
				echo "<p class='exception_offer' align='center'>Nessun'offerta prenotata</p>
					<div class='divisor'></div>";
			}
		}
		//RIMOZIONE PRENOTAZIONE
		public function remove_prenotation($idOffer,$mydate){
			$user=$_SESSION['username'];
			$sql = "DELETE FROM webproject.form_offerte WHERE user='$user'and idOffer='$idOffer'";
			$sql1= "UPDATE webproject.date_offerte SET jobs=jobs+1 WHERE idOffer='$idOffer' and date='$mydate'";
			
			$result = $this->conn->query($sql);
			$result1 = $this->conn->query($sql1);
		}
		//ARTICOLI

		public function get_articles(){
			$sql="SELECT * FROM webproject.articoli";
			$result = $this->conn->query($sql);
			if($result->num_rows>0){
	
				while($row=$result->fetch_assoc()){
					echo "<div class='cont_ex'><a class='link' href='articolo.php?id=".$row['id']."' title='".$row['title']."'><div class='container_article'>
					<div class='container_img'>
					<img src='images/".$row['image']."' alt='immagine articolo'/>
					</div>
		
					<div class='container_text'>
						<div class='text'>
							".$row['title']."
						</div>
					</div>
					
			
					</div>
			</a></div>";
				}
			}
			else{
				echo "<h2>Nessun Articolo</h2>";
			}
		}

		//ARTICOLO

		public function get_article(){
			$id=$_GET['id'];
			$sql="SELECT * FROM webproject.articoli WHERE id='".$id."'";
			$result = $this->conn->query($sql);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					echo "<h1 class='title'>".$row['title']."</h1>
					<h2 class='subtitle'>".$row['subtitle']."</h2>
					<div class='divisor'></div>
					<div class='informations'>
						Editore - ".$row['house']." &nbsp&nbsp&nbsp | &nbsp&nbsp&nbsp Data - ".$row['date']."
					</div>
					<div class='divisor'></div>
						
					<div class='container_text_img'>
					<div class='container_img'><img src='images/".$row['image']."' alt='immagine articolo'/></div>
						<div class='text'>
							".$row['text']."
							<div class='div_author'>Autore - ".$row['author']."</div>
						</div>
						
						
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
			<a href='prenotazioni.php' title='Visualizza le offerte per cui hai prenotato un colloquio'>Vedi prenotazioni</a>
			</div>
			
			<div class='title'>Lavora con Noi</div>
			<div id='container_filter' ><label id='search_label' title='Inserisci un testo per filtrare le offerte secondo ruolo, settore di impiego o contratto'>Cerca : <input id='text_search' type='text' placeholder='filtra per ruolo, settore o contratto' oninput='offer_filter(this.value)'/></label></div>
			";
			$user=$_SESSION['username'];
			
			$sql="SELECT * FROM webproject.offerte WHERE webproject.offerte.id != ALL ((SELECT idOffer FROM webproject.form_offerte  WHERE form_offerte.user ='".$user."') UNION (SELECT idOffer FROM webproject.date_offerte  WHERE date_offerte.idOffer NOT IN (SELECT idOffer FROM webproject.date_offerte  WHERE date_offerte.jobs!='0')) UNION (SELECT id FROM webproject.offerte WHERE offerte.id NOT IN (SELECT idOffer FROM webproject.date_offerte)))";
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

					

					echo "<input id='".$row['id']."'  type='checkbox' class='pro_select' />
						<label id='offer_label".$row['id']."' class='label_offer' tabindex='0' for='".$row['id']."' title='Offerta di lavoro come ".$row['role']." nel settore ".$row['branch']."'>
						
							<div class='div_img_offer'><img class='img_offer'src='images/".$row['role'].".png' alt='Immagine offerta di lavoro come ".$row['role']."'></div>
							<div class='div_information'>
								<div class='text'>
									".$row['role']." - ".$row['branch']." - ".$row['contract']."</br></br>
									".$row['message']."		
								</div>
							</div>
						</label>
						
						<div class='form_offer'>
							<form id='f".$count."' action='form_control.php' method='post'>
							<fieldset>
							<legend>Prenotazione ad un colloquio</legend>
								<input class='identity' type='text' name='id' value='".$row['id']."'/>
								<div class='div_container_form'>
									<div class='cont_general'><div class='general_informations'>
									<label>Nome: <input class='in_form' type='text' name='firstname' placeholder=' Nome' pattern='[a-zA-Z\s]{1,30}' title='Inserisci il tuo nome' required></label><div class='divisor'></div><br>
									<label>Cognome: <input class='in_form' type='text' name='lastname' placeholder=' Cognome' pattern='[a-zA-Z\s]{1,30}' title='Inserisci il tuo cognome' required></label><div class='divisor'></div><br>
										<div class='div_genre'>
											Genere: 
											<div class='container_radio'>
												<label title='Uomo'><input type='radio' name='gender' value='male' checked> Uomo</label> &nbsp&nbsp&nbsp
												<label title='Donna'><input type='radio' name='gender' value='female'> Donna</label>&nbsp&nbsp&nbsp
											</div>
										</div>
										<div class='divisor'></div>
										<label><br>Data di nascita: <input class='in_form' type='date' name='bday' placeholder=' yyyy-mm-gg' min='1900-01-01' max='2000-01-01' pattern='(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))' title='Inserisci la data di nascita: il formato è yyyy-mm-gg' required></label><div class='divisor'></div><br>
										<label>E-Mail: <input class='in_form' type='email' name='mail' placeholder=' E-mail' maxlength='50' pattern='[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,3}$'' title='E-mail: il formato è quello standard. Sono accettati i simboli . + - _ e %' required></label><div class='divisor'></div><br>
										<label>Data colloquio: <select class='date_input' name='date' title='Seleziona la data per un colloquio tra quelle disponibili'>";
										for($j=0; $j<count($dates); $j++)
											echo "<option value='".$dates[$j]."'>".$dates[$j]."</option>";
	
										echo "</select></label><div class='divisor'></div><br>
										<label>Messaggio:</br></br>
										<textarea class='texta' rows='11' class='textmessage' name='textmessage' form='f".$count."' placeholder='Inserisci un messaggio' maxlength='1000' title='Inserisci un messaggio che descriva le tue qualità'> </textarea></label>
										<input class='submit' type='submit' value='Invia' name='candidate' title='Invia il modulo'>  
									</div></div>
									
									
								</div>	</fieldset>
							</form>
						</div>";
					$count=$count+1;
				}
			}
			else{
				echo "<p class='exception_offer' align='center'>Nessuna offerta disponibile</p>
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
						$textmessage=htmlentities($_POST['textmessage'], ENT_QUOTES);
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
						<label class='project_label' for='project_select".$count."' title='Visualizza e modifica i dati del progetto ".$row['name']."'>
							<div class='project_title'>".$row['name']."
								<input type='checkbox' id='removeproj".$count."' class='remove_control'/>
								<label class='remove_proj_btn' for='removeproj".$count."' title='Apri o chiudi il form di rimozione'></label>
								<div class='remove_form_div'>
									<form class='remove_form' action='form_control.php' method='post'>
										<fieldset class='remove_fieldset'>
											<legend>Rimuovere definitivamente il progetto ".$row['name']." e tutti i suoi dati?</legend>
											<div class='yes_no_div'>
												<input id='yes_proj".$count."' class='radio_choice' type='radio' name='remove_proj' value='".$row['id']."' checked/>
												<label for='yes_proj".$count."' title='Rimuovi'>Si, rimuovi</label>
												<input id='no_proj".$count."' class='radio_choice' type='radio' name='remove_proj' value='no'/>
												<label for='no_proj".$count."' title='Mantieni'>No, mantieni</label>
											</div>
										</fieldset>
										<input class='apply_btn' type='submit' value='Applica' title='Applica la scelta'/>
									</form>
								</div>
							</div>
							<form id='project_select".$count."_form' class='modify_proj_form' action='form_control.php' method='post' enctype='multipart/form-data'>
								<input class='identity' type='text' name='modify_proj' value='".$row['id']."'/>
								<input class='identity' type='text' name='name' value='".$row['name']."'/>
								<input class='identity' type='text' name='old_image' value='".$row['image']."'/>
								<div class='project_info'>
									<div class='project_img'>
										<div class='current_proj_img'><img src='images/".$row['image']."'/></div>
										<div class='change_proj_img'>Cambia: <input type='file' name='image' accept='.jpg, .jpeg, .png' title='Inserisci una nuova foto per il progetto'/></div>
									</div>
									<div class='project_data'>
										<div>Stato:";
					if($row['status']=='In corso')
						echo				"<label title='Progetto in corso'><input type='radio' name='status' value='In corso' checked/> In corso</label>
											<label title='Progetto terminato'><input type='radio' name='status' value='Terminato'/> Terminato</label>";
					else echo				"<label title='Progetto in corso'><input type='radio' name='status' value='In corso'/> In corso</label>
											<label title='Progetto terminato'><input type='radio' name='status' value='Terminato' checked/> Terminato</label>";
					echo				"</div>
										<div>Committente:<input type='text' name='client' value='".$row['client']."' placeholder='Committente' pattern='.{1,50}' title='Committente del progetto: massimo 50 caratteri'/></div>
										<div>Tipologia:<input type='text' name='type' value='".$row['type']."' placeholder='Tipo di opera' pattern='.{1,30}' title='Tipologia del progetto: massimo 30 caratteri'/></div>
										<div>Luogo:<input type='text' name='location' value='".$row['location']."' placeholder='Paese o città' pattern='.{1,30}' title='Località del progetto: massimo 30 caratteri'/></div>
										<div>Direttore dei lavori:<input type='text' name='director' value='".$row['director']."' placeholder='Direttore' pattern='.{1,30}' title='Direttore dei lavori: massimo 30 caratteri'/></div>
										<div>Data di inizio:<input type='date' name='begin' min='1900-01-01' max='2100-01-01' value='".$row['begin']."' title='Data di inizio del progetto' required/></div>
									</div>
									<textarea class='project_description' name='description' form='project_select".$count."_form' placeholder='Descrizione del progetto' maxlength='1000' title='Inserisci la descrizione del progetto'>".$row['description']."</textarea>
								</div>
								<div class='proj_form_btns'>
									<input class='submit_btn' type='submit' value='Salva modifiche' title='Salva i dati del progetto'/>
									<input class='reset_btn' type='reset' value='Annulla modifiche' title='Resetta i dati inseriti'/>
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
			$num=0;
			$sql = "SELECT * FROM webproject.progetti WHERE id='$proj'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			$img = $row['image'];
			$sql = "SELECT * FROM webproject.progetti WHERE image='$img'";
			$result = $this->conn->query($sql);
			if (!($result->num_rows>1)) {
				if(!unlink('images/'.$img))
					$num=6; // errore eliminazione immagine
			}
			$sql = "DELETE FROM webproject.progetti WHERE id='$proj'";
			$result = $this->conn->query($sql);
			return $num;
		}
		
		public function modify_progetto() {
			$id=$_POST['modify_proj'];
			$sql = "DELETE FROM webproject.progetti WHERE id='$id'";
			$result = $this->conn->query($sql);
			return $this->insert_progetto();
		}

		public function insert_progetto() {
			$num=0;
			$na=htmlentities($_POST['name'], ENT_QUOTES);
			$st=$_POST['status'];
			$cl=htmlentities($_POST['client'], ENT_QUOTES);
			$ty=htmlentities($_POST['type'], ENT_QUOTES);
			$lo=htmlentities($_POST['location'], ENT_QUOTES);
			$di=htmlentities($_POST['director'], ENT_QUOTES);
			$be=$_POST['begin'];
			$de=htmlentities($_POST['description'], ENT_QUOTES);
			$im=$_POST['image'];
			$im="";
			$gia_pres=false;
			if($_FILES['image']['name']=="") { // IMMAGINE NON SELEZIONATA
				$im=$_POST['old_image']; // sta avvenendo modifica
				$gia_pres=true;
			}
			else // IMMAGINE SELEZIONATA
				$im=basename($_FILES['image']['name']);
			if(isset($_POST['old_image']) && !($im==$_POST['old_image'])) { // MODIFICA && IMAGE DIVERSA
				$old=$_POST['old_image'];
				$sql = "SELECT * FROM webproject.progetti WHERE image='$old'";
				$result = $this->conn->query($sql);
				if (!($result->num_rows > 0)) {
					if(!unlink('images/'.$old))
						$num=6; // errore eliminazione immagine vecchia
				}
			}
			$target_dir = 'images/';
			$target_file = $target_dir.$im;
			if (file_exists($target_file)) {
				$gia_pres=true;
			}
			else if(!$gia_pres) { // caricamento nuova immagine
				$uploaded=move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
				if(!$uploaded)
					$num=5; // errore caricamento
				chmod($target_file, 0777);
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
			return $num;
		}

		// IMPIEGATI AZIENZA
		public function get_impiegati_azienda() {
			$branches=array('Direzione','Ufficio','Relazioni pubbliche','Progettazione','Cantiere','Magazzino');
			for($i=0; $i<count($branches); $i++) {
			
				$sql = "SELECT DISTINCT * FROM webproject.impiegati WHERE impiegati.branch='".$branches[$i]."'" ;
				$result = $this->conn->query($sql);
				if($result->num_rows > 0){
					echo "<h3 class='subsubtitle'>".$branches[$i]."</h3>  
					<div class='divisor'></div>";
					while($row=$result->fetch_assoc()){
						echo "<div class='div_impiegato' title='".$row['role']." ".$row['firstname']." ".$row['lastname']."' >
						<img class='img_impiegato' src='images/".$row['image']."' alt='impiegato ".$row['firstname']." ".$row['lastname']."'/></br></br>
						<span class='spg'>Nome  </span></br><span class='spgr'>".$row['firstname']."</span></br> 
						<span class='spg'>Cognome  </span></br><span class='spgr'>".$row['lastname']."</span></br>
						<span class='spg'>Ruolo  </span></br><span class='spgr'>".$row['role']."</span></br>
						<span class='spg'>Data di nascita  </span></br><span class='spgr'>".$row['birth']."</span></br>
						<span class='spg'>Età  </span></br><span class='spgr'>".$row['age']."</span></br>
						<span class='spg'>Inizio  </span></br><span class='spgr'>".$row['begin']."</span></br>
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
						<label class='modify_btn' for='modify".$count."' title='Apri o chiudi il form di modifica'></label>
						<div class='modify_form_div'>
							<form class='modify_form' action='form_control.php' method='post' enctype='multipart/form-data'>
								<fieldset class='modify_personal_info'>
									<legend>Informazioni personali</legend>
									<input class='identity' type='text' name='modify_imp' value='".$row['id']."'/>
									<input class='identity' type='text' name='old_image' value='".$row['image']."'/>
									<div>Nome:<input type='text' name='firstname' value='".$row['firstname']."' placeholder='Nome' pattern='[a-zA-Z\s]{1,30}' title='Nome dell&#39impiegato: massimo 30 caratteri alfabetici' required/></div>
									<div>Cognome:<input type='text' name='lastname' value='".$row['lastname']."' placeholder='Cognome' pattern='[a-zA-Z\s]{1,30}' title='Cognome dell&#39impiegato: massimo 30 caratteri alfabetici' required/></div>
									<div>Data di nascita:<input type='date' name='birth' min='1900-01-01' max='2000-01-01' value='".$row['birth']."' title='Inserisci la data di nascita dell&#39impiegato'/></div>
									<div>Età:<input type='number' name='age' value='".$row['age']."' min='18' max='99' placeholder='Età' title='Inserisci l&#39età dell&#39impiegato'/></div>
									<div>E-mail:<input type='email' value='".$row['mail']."' name='mail' placeholder='E-mail' maxlength='50' pattern='[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,3}$' title='E-mail dell&#39impiegato: il formato è quello standard. Sono accettati i simboli . + - _ e %'/></div>
									<div class='file_select'>Foto:<input type='file' name='image' accept='.jpg, .jpeg, .png' title='Inserisci una foto dell&#39impiegato'/></div>
									<div>Settore:<input type='text' name='branch' value='".$row['branch']."' placeholder='Settore di impiego' pattern='[a-zA-Z0-9\s]{1,30}' title='Settore dell&#39impiegato: massimo 30 caratteri alfanumerici'/></div>
									<div>Anno di inizio:<input type='number' name='begin' value='".$row['begin']."' min='1900' max='2018' placeholder='Anno di inizio' title='Inserisci l&#39anno di inizio dell&#39impiegato'/></div>
								</fieldset>
								<fieldset class='modify_company_info'>
									<legend>Ruolo nell&#39azienda:</legend>";
					for($i=0; $i<count($roles); $i++) {
						if($row['role']==$roles[$i])
							$stringa=$stringa."<div><label title='".$roles[$i]."'><input type='radio' name='role' value='".$roles[$i]."' checked/> ".$roles[$i]."</label></div>";
						else
							$stringa=$stringa."<div><label title='".$roles[$i]."'><input type='radio' name='role' value='".$roles[$i]."'/> ".$roles[$i]."</label></div>";
					}
					$stringa=$stringa."</fieldset>
								<div class='submit_reset_div'>
									<input class='submit_btn' type='submit' value='Salva modifiche' title='Salva i dati dell&#39impiegato'/>
									<input class='reset_btn' type='reset' value='Annulla modifiche' title='Resetta i dati inseriti'/>
								</div>
							</form>
						</div>
						<input type='checkbox' id='remove".$count."' class='remove_control'/>
						<label class='remove_btn' for='remove".$count."' title='Apri o chiudi il form di rimozione'></label>
						<div class='remove_form_div'>
							<form class='remove_form' action='form_control.php' method='post'>
								<fieldset class='remove_fieldset'>
									<legend>Rimuovere definitivamente ".$row['firstname']." ".$row['lastname']." e tutti i suoi dati?</legend>
									<div class='yes_no_div'>
										<input id='yes".$count."' class='radio_choice' type='radio' name='remove_imp' value='".$row['id']."' checked/>
										<label for='yes".$count."' title='Rimuovi'>Si, rimuovi</label>
										<input id='no".$count."' class='radio_choice' type='radio' name='remove_imp' value='no'/>
										<label for='no".$count."' title='Mantieni'>No, mantieni</label>
									</div>
								</fieldset>
								<input class='apply_btn' type='submit' value='Applica' title='Applica la scelta'/>
							</form>
						</div>
						<div class='imp_image'><img src='images/".$row['image']."'/></div>
						<div class='imp_info'>
							<div class='imp_name'><div>".$row['firstname']." ".$row['lastname']."</div></div>
							<div class='imp_birth'><div>".$row['birth']."</div></div>
							<div class='imp_role'><div>".$row['role']."</div></div>
							<div class='imp_mail'><div><a href='mailto:".$row['mail']."' title='Invia una mail a ".$row['firstname']." ".$row['lastname']."'>".$row['mail']."</a></div></div>
						</div>
					</div>
					<input type='checkbox' id='check".$count."' class='check_control'/>
					<label class='btn' for='check".$count."' title='Visualizza ulteriori informazioni'>
						<div class='magic'>
							<div class='imp_more'><div>".$row['age']." anni</div></div>
							<div class='imp_more'><div>Settore: ".$row['branch']."</div></div>
							<div class='imp_more'><div>Impiegato dell&#39azienda dal ".$row['begin']."</div></div>		
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
			$num=0;
			$sql = "SELECT * FROM webproject.impiegati WHERE id='$imp'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			$img = $row['image'];
			$sql = "SELECT * FROM webproject.impiegati WHERE image='$img'";
			$result = $this->conn->query($sql);
			if (!($result->num_rows>1) && $img!='default_user.png') {
				if(!unlink('images/'.$img))
					$num=6; // errore eliminazione immagine
			}
			$sql = "DELETE FROM webproject.impiegati WHERE id='$imp'";
			$result = $this->conn->query($sql);
			return $num;
		}
		
		public function modify_impiegato() {
			$id=$_POST['modify_imp'];
			$sql = "DELETE FROM webproject.impiegati WHERE id='$id'";
			$result = $this->conn->query($sql);
			return $this->insert_impiegato();
		}

		public function insert_impiegato() {
			$num=0;
			$fn=$_POST['firstname'];
			$ln=$_POST['lastname'];
			$ro=$_POST['role'];
			$bi=$_POST['birth'];
			$ag=$_POST['age'];
			$ma=$_POST['mail'];
			$br=$_POST['branch'];
			$be=$_POST['begin'];
			$im="";
			$gia_pres=false;
			if($_FILES['image']['name']=="") { // IMMAGINE NON SELEZIONATA
				if(isset($_POST['old_image'])) // se sta avvenendo modifica
					$im=$_POST['old_image'];
				else // se sta avvenendo nuovo inserimento
					$im='default_user.png';
				$gia_pres=true;
			}
			else // IMMAGINE SELEZIONATA
				$im=basename($_FILES['image']['name']);
			if(isset($_POST['old_image']) && !($im==$_POST['old_image'])) { // MODIFICA && IMAGE DIVERSA
				$old=$_POST['old_image'];
				$sql = "SELECT * FROM webproject.impiegati WHERE image='$old'";
				$result = $this->conn->query($sql);
				if (!($result->num_rows > 0) && $old!='default_user.png') {
					if(!unlink('images/'.$old))
						$num=6; // errore eliminazione immagine vecchia
				}
			}
			$target_dir = 'images/';
			$target_file = $target_dir.$im;
			if (file_exists($target_file)) {
				$gia_pres=true;
			}
			else if(!$gia_pres) { // caricamento nuova immagine
				$uploaded=move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
				if(!$uploaded)
					$num=5; // errore caricamento
				chmod($target_file, 0777);
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
			return $num;
		}

		// ARTICOLI ADMIN
		public function get_articoli_admin() {
			$sql = "SELECT DISTINCT * FROM webproject.articoli";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count=1;
				while($row = $result->fetch_assoc()) {
					echo "<div class='article_div'>
							<div class='article_image'><img src='images/".$row['image']."'/></div>
							<div class='article_info_div'>
								<div class='article_info'>Data:<div>".$row['date']."</div></div>
								<div class='article_info'>Autore:<div>".$row['author']."</div></div>
								<div class='article_info'>Stampa:<div>".$row['house']."</div></div>
								<div class='article_info'>Titolo:<div>".$row['title']."</div></div>
								<div class='article_info'>Sottotitolo:<div>".$row['subtitle']."</div></div>
							</div>
							<input id='mod_art_checkbox".$count."' class='mod_art_control' type='checkbox'/>
							<label for='mod_art_checkbox".$count."' class='modify_article_btn' title='Apri o chiudi il form di modifica'></label>
							<form id='mod_a".$count."' class='mod_art_form' action='form_control.php' method='post'>
								<div class='article_image'>
									<img src='images/".$row['image']."'/>
									<div class='change_art_img'>Cambia: <input type='file' name='image' accept='.jpg, .jpeg, .png' title='Inserisci una nuova immagine per l&#39articolo'/></div>
								</div>
								<div class='article_info_div'>
									<div class='article_info'>Data:<input type='date' min='1900-01-01' max='".date('Y-m-d')."' name='date' value='".$row['date']."' title='Inserisci la data di pubblicazione dell&#39articolo' required/></div>
									<div class='article_info'>Autore:<input type='text' name='author' value='".$row['author']."' placeholder='Autore' pattern='.{1,30}' title='Autore dell&#39articolo: massimo 30 caratteri' required/></div>
									<div class='article_info'>Stampa:<input type='text' name='house' value='".$row['house']."' placeholder='Ente di stampa' pattern='.{1,30}' title='Ente di stampa: massimo 30 caratteri' required/></div>
									<div class='article_info'>Titolo:<input type='text' name='title' value='".$row['title']."' placeholder='Titolo' maxlength='50' title='Inserisci un titolo per l&#39articolo' required/></div>
									<div class='article_info'>Sottotitolo:<input type='text' name='subtitle' placeholder='Sottotitolo' value='".$row['subtitle']."' placeholder='Sottotitolo' maxlength='100' title='Inserisci un sottotitolo per l&#39articolo' required/></div>
								</div>
								<input class='identity' type='text' name='modify_article' value='".$row['id']."'/>
								<input class='identity' type='text' name='old_image' value='".$row['image']."'/>
								<input class='save_mod_art' type='submit' value='Salva' title='Salva i dati dell&#39articolo'/>
								<input class='reset_mod_art' type='reset' value='Reset' title='Resetta i dati inseriti'/>
								<textarea class='article_text' name='text' form='mod_a".$count."' placeholder='Inserisci il testo' maxlength='2000' title='Inserisci il testo dell&#39articolo'>".$row['text']."</textarea>
							</form>
							<input id='rem_art_checkbox".$count."' class='rem_art_control' type='checkbox'/>
							<label for='rem_art_checkbox".$count."' class='remove_article_btn' title='Apri o chiudi il form di rimozione'></label>
							<form class='rem_art_form' action='form_control.php' method='post'>
								<div>Vuoi eliminare definitivamente questo articolo e tutte le informazioni in esso contenute?</div>
								<input class='identity' type='text' name='remove_article' value='".$row['id']."'/>
								<input type='submit' class='rem_art_form_btn' value='Elimina' title='Elimina l&#39articolo'/>
							</form>
							<div class='article_text'>".$row['text']."</div>
						</div>";
					$count++;
				}
			} else
				echo "<p>Nessun articolo disponibile</p>";
		}

		public function remove_articolo($art) {
			$num=0;
			$sql = "SELECT * FROM webproject.articoli WHERE id='$art'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			$img = $row['image'];
			$sql = "SELECT * FROM webproject.articoli WHERE image='$img'";
			$result = $this->conn->query($sql);
			if (!($result->num_rows>1)) {
				if(!unlink('images/'.$img))
					$num=6; // errore eliminazione immagine
			}
			$sql = "DELETE FROM webproject.articoli WHERE id='$art'";
			$result = $this->conn->query($sql);
			return $num;
		}
		
		public function modify_articolo() {
			$id=$_POST['modify_article'];
			$sql = "DELETE FROM webproject.articoli WHERE id='$id'";
			$result = $this->conn->query($sql);
			return $this->insert_articolo();
		}

		public function insert_articolo() {
			$num=0;
			$da=$_POST['date'];
			$au=htmlentities($_POST['author'], ENT_QUOTES);
			$ho=htmlentities($_POST['house'], ENT_QUOTES);
			$ti=htmlentities($_POST['title'], ENT_QUOTES);
			$su=htmlentities($_POST['subtitle'], ENT_QUOTES);
			$te=htmlentities($_POST['text'], ENT_QUOTES);
			$im="";
			$gia_pres=false;
			if($_FILES['image']['name']=="") { // IMMAGINE NON SELEZIONATA
				$im=$_POST['old_image']; // sta avvenendo modifica
				$gia_pres=true;
			}
			else // IMMAGINE SELEZIONATA
				$im=basename($_FILES['image']['name']);
			if(isset($_POST['old_image']) && !($im==$_POST['old_image'])) { // MODIFICA && IMAGE DIVERSA
				$old=$_POST['old_image'];
				$sql = "SELECT * FROM webproject.articoli WHERE image='$old'";
				$result = $this->conn->query($sql);
				if (!($result->num_rows > 0)) {
					if(!unlink('images/'.$old))
						$num=6; // errore eliminazione immagine vecchia
				}
			}
			$target_dir = 'images/';
			$target_file = $target_dir.$im;
			if (file_exists($target_file)) {
				$gia_pres=true;
			}
			else if(!$gia_pres) { // caricamento nuova immagine
				$uploaded=move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
				if(!$uploaded)
					$num=5; // errore caricamento
				chmod($target_file, 0777);
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
			return $num;
		}

		// OFFERTE ADMIN
		public function get_offerte_admin() {
			$sql = "SELECT DISTINCT * FROM webproject.offerte";
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
				$count=1;
				$roles=array('Presidente','Vicepresidente','Segretario','Ingegnere','Architetto','Geometra','Progettista','Muratore','Carpentiere','Magazziniere');
				while($row = $result->fetch_assoc()) {
					echo "<div class='offer_div'>
							<input id='rem_off_checkbox".$count."' class='rem_off_control' type='checkbox'/>
							<label for='rem_off_checkbox".$count."' class='rem_off_btn' title='Apri o chiudi il form di rimozione'><div>Elimina</div></label>
							<form class='rem_off_form' action='form_control.php' method='post'>
								<div>Vuoi eliminare definitivamente questa offerta, i colloqui e le relative prenotazioni degli utenti?</div>
								<input class='identity' type='text' name='remove_offer' value='".$row['id']."'/>
								<input type='submit' class='rem_off_form_btn' value='Elimina'/>
							</form>
							<input id='cand_off_checkbox".$count."' class='cand_off_control' type='checkbox'/>
							<label for='cand_off_checkbox".$count."' class='cand_off_btn' title='Apri o chiudi l&#39elenco delle prenotazioni'><div>Candidature</div></label>
							<div class='cand_off_div'>";
					$idOffer=$row['id'];
					$sql2 = "SELECT * FROM webproject.form_offerte WHERE idOffer='$idOffer'";
					$result2 = $this->conn->query($sql2);
					if ($result2->num_rows > 0) {
						while($row2 = $result2->fetch_assoc()) {
							//$birthStr = date("d-m-Y", strtotime($row2['birth']));
							//$dateStr = date("d-m-Y", strtotime($row2['date']));
							echo "<div class='cand_div'>
									<div class='cand_personal_info'>
										".$row2['firstname']." ".$row2['lastname']."<br/><br/>
										".$row2['genre']."<br/><br/>
										".$row2['birth']."<br/><br/>
										".$row2['mail']."
									</div>
									<div class='cand_general_info'>
										Prenotazione colloquio in data:<br/><br/>".$row2['date']."<br/><br/>
										'".$row2['message']."'
									</div>
								</div>";
						}
					}
					else
						echo "<p>Nessuna candidatura a questa offerta</p>";
					echo	"</div>
							<form id='mod_off_form".$count."' class='mod_off_form' action='form_control.php' method='post'>
								<input class='identity' type='text' name='modify_offer' value='".$row['id']."'/>
								<fieldset class='mod_off_info'>
									<div class='mod_off_data'>Settore di impiego:<input type='text' name='branch' placeholder='Settore di impiego' value='".$row['branch']."' pattern='[a-zA-Z0-9\s]{1,30}' title='Settore di impiego: massimo 30 caratteri alfanumerici' required/></div>
									<div class='mod_off_data'>Ruolo professionale:
									<select form='mod_off_form".$count."' name='role' title='Seleziona il ruolo professionale' required/>";
					for($i=0; $i<count($roles); $i++) {
						if($row['role']==$roles[$i])
							echo "<option value='".$roles[$i]."' title='".$roles[$i]."' selected/> ".$roles[$i]."</option>";
						else
							echo "<option value='".$roles[$i]."' title='".$roles[$i]."'/> ".$roles[$i]."</option>";
					}
					echo 			"</select>
									</div>
									<div class='mod_off_data'>Tipo di contratto:<input type='text' name='contract' placeholder='Tipo di contratto' value='".$row['contract']."' pattern='.{1,30}' title='Tipo di contratto: massimo 30 caratteri' required/></div>
								</fieldset>
								<fieldset class='mod_off_dates'>
									<legend>Date colloqui:</legend>";
					$sql1 = "SELECT * FROM webproject.date_offerte WHERE idOffer='$idOffer'";
					$result1 = $this->conn->query($sql1);
					$dateCount=1;
					if ($result1->num_rows > 0) {
						while($row1 = $result1->fetch_assoc()) {
							echo "<div>".$dateCount."°:<input class='mod_off_date' type='date' name='date".$dateCount."' min='".date('Y-m-d')."' max='2100-01-01' value='".$row1['date']."' title='Seleziona la data del ".$dateCount."° colloquio'/></div>";
							$dateCount++;
						}
					}
					while($dateCount<5) {
						echo "<div>".$dateCount."°:<input class='mod_off_date' type='date' name='date".$dateCount."' min='".date('Y-m-d')."' max='2100-01-01' title='Seleziona la data del ".$dateCount."° colloquio'/></div>";
						$dateCount++;
					}
					echo 		"</fieldset>
								<div class='mod_off_mex'>
									Descrizione:<textarea class='mod_off_text' form='mod_off_form".$count."' name='message' placeholder='Inserisci il messaggio' maxlength='1000' title='Inserisci il messaggio'>".$row['message']."</textarea>
								</div>
								<input class='mod_off_btn' type='submit' value='Salva' title='Salva i dati dell&#39offerta'/>
								<input class='mod_off_btn' type='reset' value='Annulla' title='Resetta i dati inseriti'/>
							</form>
						</div>";
					$count++;
				}
			} else
				echo "<p>Nessuna offerta disponibile</p>";
		}

		public function remove_offerta($off) {
			$sql = "DELETE FROM webproject.offerte WHERE id='$off'";
			$result = $this->conn->query($sql);
			$sql = "DELETE FROM webproject.date_offerte WHERE idOffer='$off'";
			$result = $this->conn->query($sql);
			if(!isset($_POST['modify_offer'])) {
				$sql = "SELECT * FROM webproject.form_offerte WHERE idOffer='$off'";
				$result = $this->conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$user=$row['user'];
						$date=$row['date'];

						$sql1="SELECT MAX(id) FROM webproject.messaggi";
						$result1 = $this->conn->query($sql1);
						$row1 = $result1->fetch_assoc();
						$newid=$row1['MAX(id)']+1;

						$mex='Attenzione: la prenotazione per il colloquio in data '.$date.' è stata rimossa';
						$sql1 = "INSERT INTO webproject.messaggi VALUES ('$newid','$user','$off','$mex')";
						$result1 = $this->conn->query($sql1);
					}
				}
				$sql = "DELETE FROM webproject.form_offerte WHERE idOffer='$off'";
				$result = $this->conn->query($sql);
			}
		}
		
		private $old_br;
		private $old_ro;
		private $old_co;
		private $old_me;

		public function modify_offerta() {
			$id=$_POST['modify_offer'];

			// salvo i vecchi valori per leggerli in insert_offerta
			$sql = "SELECT * FROM webproject.offerte WHERE id='$id'";
			$result = $this->conn->query($sql);
			$row = $result->fetch_assoc();
			global $old_br; global $old_ro; global $old_co; global $old_me;
			$old_br=$row['branch'];
			$old_ro=$row['role'];
			$old_co=html_entity_decode($row['contract'], ENT_QUOTES);
			$old_me=html_entity_decode($row['message'], ENT_QUOTES);

			$this->remove_offerta($id);
			$this->insert_offerta();
		}

		public function insert_offerta() {
			$br=$_POST['branch'];
			$ro=$_POST['role'];
			$co=htmlentities($_POST['contract'], ENT_QUOTES);
			$me=htmlentities($_POST['message'], ENT_QUOTES);
			$d1=$_POST['date1'];
			$d2=$_POST['date2'];
			$d3=$_POST['date3'];
			$d4=$_POST['date4'];
			if(isset($_POST['modify_offer'])) { // quando avviene una modifica di un'offerta esistente
				$id=$_POST['modify_offer'];				

				$sql = "SELECT * FROM webproject.form_offerte WHERE idOffer='$id'";
				$result = $this->conn->query($sql);
				// per ogni prenotazione che ha subito delle modifiche
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$user=$row['user'];
						$date=$row['date'];
						// messaggio al rispettivo utente

						$sql1="SELECT MAX(id) FROM webproject.messaggi";
						$result1 = $this->conn->query($sql1);
						$row1 = $result1->fetch_assoc();
						$newid=$row1['MAX(id)'];

						global $old_br; global $old_ro; global $old_co; global $old_me;
						if($br!=$old_br || $ro!=$old_ro || $co!=$old_co || $me!=$old_me) {
							$newid=$newid+1;
							$mex='Attenzione: la prenotazione per il colloquio in data '.$date.' ha subito delle modifiche';
							$sql1 = "INSERT INTO webproject.messaggi VALUES ('$newid','$user','$id','$mex')";
							$result1 = $this->conn->query($sql1);
						}
						// prenotazione che ha una data non più valida
						if($date!=$d1 && $date!=$d2 && $date!=$d3 && $date!=$d4) {
							// messaggio al rispettivo utente
							$newid=$newid+1;
							$mex='Attenzione: la prenotazione per il colloquio in data '.$date.' è stata rimossa';
							$sql1 = "INSERT INTO webproject.messaggi VALUES ('$newid','$user','$id','$mex')";
							$result1 = $this->conn->query($sql1);
							// elimino tale prenotazione
							$sql1 = "DELETE FROM webproject.form_offerte WHERE user='$user' and idOffer='$id'";
							$result1 = $this->conn->query($sql1);
						}
					}
				}
			}
			else { // quando avviene l'inserimento di una nuova offerta
				$i=1;
				$found=false;
				while(!$found) {
					$sql = "SELECT id FROM webproject.offerte WHERE id='$i'";
					$result = $this->conn->query($sql);
					if($result->num_rows > 0)
						$i++;
					else {
						$id=$i;
						$found=true;
					}
				}
			}
			$sql = "INSERT INTO webproject.offerte VALUES ('$id','$br','$ro','$co','$me')";
			$result = $this->conn->query($sql);
			for($i=1; $i<5; $i++) {
				$d='date'.$i;
				$di=$_POST[$d];
				if($di!='') {
					$sql = "INSERT INTO webproject.date_offerte VALUES ('$id','$di','2')";
					$result = $this->conn->query($sql);
				}
			}
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
					<label class='data_input'>Username: <input type='text' name='username' placeholder='username' value='".$row['username']."' autofocus maxlength='30' pattern='([a-zA-Z])[a-zA-Z0-9._%@#+-]{5,}' title='Username: deve iniziare con una lettera e contenere almeno 6 caratteri. Sono accettati i simboli . + - _ % @ e #' required/></label>
					<input id='change_password_checkbox' type='checkbox' name='change_password'/>
					<label tabindex='0'class='data_input' id='change_password_label' for='change_password_checkbox' title='Modifica la password corrente'>Cambia password</label>
					<div id='change_div'>
						<label class='data_input'>Vecchia password: <input type='password' name='old_password' placeholder='corrente' title='Inserisci la password corrente'/></label>
						<label class='data_input'>Nuova password: <input type='password' name='new_password' placeholder='nuova' maxlength='30' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9._%@#+-]{8,}' title='Nuova password: deve contenere almeno un numero, una lettera maiuscola ed una minuscola, e deve avere complessivamente almeno 8 caratteri. Sono accettati i simboli . + - _ % @ e #'/></label>
						<label class='data_input'>Conferma password: <input type='password' name='rep_new_password' placeholder='nuova' title='Inserisci nuovamente la nuova password'/></label>
					</div>
					<label class='data_input'>E-mail: <input type='email' name='mail' placeholder='e-mail' value='".$row['mail']."' maxlength='50' pattern='[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,3}$' title='E-mail: il formato è quello standard. Sono accettati i simboli . + - _ e %' required/></label>
				</fieldset>
				<div id='div_buttons'>
					<input class='btns' name='modify_user' type='submit' value='Salva modifiche' title='Salva i dati dell&#39utente'/>
					<input class='btns' type='reset' id='cancel_btn' value='Annulla modifiche' title='Resetta i dati inseriti'/>
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
							<a class='user_data' href='mailto:".$row['mail']."' title='Invia una mail a ".$row['username']."'>".$row['mail']."</a>
							<input id='mod_u_checkbox".$count."' class='mod_u_control' type='checkbox'/>
							<label for='mod_u_checkbox".$count."' class='mod_u_label' title='Apri o chiudi il form di modifica'></label>
							<form class='mod_u_form' action='form_control.php' method='post'>
								<input type='text' class='identity' name='old_user' value='".$row['username']."'/>
								<input type='text' class='identity' name='old_accesses' value='".$row['accesses']."'/>
								<input type='text' class='mod_u_form_data' name='admin_mod_user' placeholder='Username' value='".$row['username']."' maxlength='30' pattern='([a-zA-Z])[a-zA-Z0-9._%@#+-]{5,}' title='Username: deve iniziare con una lettera e contenere almeno 6 caratteri. Sono accettati i simboli . + - _ % @ e #' required/>
								<input type='text' class='mod_u_form_data' name='admin_mod_u_pass' placeholder='Password' value='".$row['password']."' maxlength='30' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9._%@#+-]{8,}' title='Password: deve contenere almeno un numero, una lettera maiuscola ed una minuscola, e deve avere complessivamente almeno 8 caratteri. Sono accettati i simboli . + - _ % @ e #' required/>
								<input type='email' class='mod_u_form_data' name='admin_mod_u_mail' placeholder='E-mail' value='".$row['mail']."' maxlength='50' pattern='[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,3}$' title='E-mail: il formato è quello standard. Sono accettati i simboli . + - _ e %' required/>
								<input type='submit' class='mod_u_form_btn' value='Salva' title='Salva i dati dell&#39utente'/>
								<input type='reset' class='mod_u_form_btn' value='Annulla' title='Resetta i dati inseriti'/>
							</form>
							<input id='rem_u_checkbox".$count."' class='rem_u_control' type='checkbox'/>
							<label for='rem_u_checkbox".$count."' class='rem_u_label' title='Apri o chiudi il form di rimozione'></label>
							<form class='rem_u_form' action='form_control.php' method='post'>
								<div>Vuoi eliminare definitivamente questo account?</div>
								<input type='text' class='identity' name='admin_rem_user' value='".$row['username']."'/>
								<input type='submit' class='mod_u_form_btn' value='Elimina' title='Elimina l&#39utente'/>
							</form>
						</div>";
					$count++;
				}
			} else
				echo "<p>Nessun utente disponibile</p>";
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