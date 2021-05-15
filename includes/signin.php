<?php 				 

	if (isset($_POST['btn-valider'])) {

		$prenom = htmlspecialchars(ucwords(strtolower($_POST['prenom']))); 
		$nom = htmlspecialchars(ucwords(strtolower($_POST['nom']))); 
		$email = htmlspecialchars(strtolower($_POST['email'])); 
		$immatriculation = htmlspecialchars(strtoupper($_POST['immatriculation'])); 
		$mdp = htmlspecialchars($_POST['mdp']);  
		$cmdp = htmlspecialchars($_POST['cmdp']); 
		$typecompte = "client";

		extract($_POST);

		if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($immatriculation) && !empty($mdp) && !empty($cmdp)) {

			if (strlen($mdp) >= 6) {
				
				if ($mdp == $cmdp) {

					$options = [
					'cost' => 12,
					];

					$hashpass =  password_hash($mdp, PASSWORD_BCRYPT, $options); 

					include 'database.php';
					global $db;

	    			$c = $db->prepare("SELECT email FROM utilisateur WHERE email = :email");
					$c->execute([
						'email' => $email
					]);

					$result = $c->rowCount();

					if ($result == 0) {

						$date = date("dmy");
						$alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
						$identifiant = $date.$alphabet[rand(0,34)].$alphabet[rand(0,34)].$alphabet[rand(0,34)].$alphabet[rand(0,34)].$alphabet[rand(0,34)];
						
						$result_code = 1;

						while ($result_code == 1) {
							$code = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

							$q = $db->prepare("SELECT * FROM utilisateur WHERE code = :code");
							$q->execute(['code' => $code]);
							$result_code = $q->fetch();			 

							if($result_code == true) {
								$result_code = 1;
							} else {
								$result_code = 0;
							}						
						}

						$q = $db->prepare("INSERT INTO utilisateur(identifiant, email, prenom, nom, immatriculation, code, mdp, typecompte) VALUES(:identifiant, :email, :prenom, :nom, :immatriculation, :code, :mdp, :typecompte)");
						$q->execute([
							'identifiant' => $identifiant,
							'email' => $email,
							'prenom' => $prenom,
							'nom' => $nom,
							'immatriculation' => $immatriculation,
							'code' => $code,
							'mdp' => $hashpass,
							'typecompte' => $typecompte
						]);

						?>

							<div>
								<p align="center" style="color: green; font-size: 14px;">le compte a été créée</p>
							</div>

						<?php

						$q = $db->prepare("SELECT * FROM utilisateur WHERE email = :email");
						$q->execute(['email' => $email]);
						$result = $q->fetch();		

						$_SESSION['id'] = $result['id'];
						$_SESSION['identifiant'] = $result['identifiant'];
						$_SESSION['prenom'] = $result['prenom'];
						$_SESSION['nom'] = $result['nom'];
						$_SESSION['email'] = $result['email'];
						$_SESSION['immatriculation'] = $result['immatriculation'];
						$_SESSION['code'] = $result['code'];
						$_SESSION['mdp'] = $result['mdp'];
						$_SESSION['typecompte'] = $result['typecompte'];

						?>
						
							<script type="text/javascript">
								window.location.replace("profil.php");					
							</script>

						<?php

					} else {

						?>

							<div>
								<p align="center" style="color: red; font-size: 14px;">l'email <?php echo $email; ?> est déja utiliser!</p>
							</div>

						<?php

					}

				} else {

					?>
	
						<div>
							<p align="center" style="color: red; font-size: 14px;">Vous n'avez pas rentrer le même mot de passe</p>
						</div>
	
					<?php
					
				}

			} else {

				?>

					<div>
						<p align="center" style="color: red; font-size: 14px;">le mot de passe doit avoir au minimum 6 charachteres</p>
					</div>

				<?php
				
			}			

		} else {

			?>

				<div>
					<p align="center" style="color: red; font-size: 14px;">les champs ne sont pas tous remplies</p>
				</div>

			<?php
			
		}				

	} 

?>