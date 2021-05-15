<?php 

	$msg = '';

	if (isset($_POST['btn-valider'])) {

		$email = htmlspecialchars(strtolower($_POST['email']));
		$mdp = htmlspecialchars($_POST['mdp']);

		include 'includes/database.php';

		extract($_POST);

		if (!empty($email) && !empty($mdp)) {

			$q = $db->prepare("SELECT * FROM utilisateur WHERE email = :email");
			$q->execute(['email' => $email]);
			$result = $q->fetch();			 

			if($result == true) {
				
				if (password_verify($mdp, $result['mdp'])) {

					$_SESSION['id'] = $result['id'];
					$_SESSION['identifiant'] = $result['identifiant'];
					$_SESSION['prenom'] = $result['prenom'];
					$_SESSION['nom'] = $result['nom'];
					$_SESSION['email'] = $result['email'];
					$_SESSION['immatriculation'] = $result['immatriculation'];
					$_SESSION['code'] = $result['code'];
					$_SESSION['mdp'] = $result['mdp'];
					$_SESSION['typecompte'] = $result['typecompte'];
					
					$q = $db->prepare("SELECT * FROM siv WHERE immatriculation = :immatriculation");
					$q->execute(['immatriculation' => $_SESSION['immatriculation']]);
					$result_critair = $q->fetch();			 

					if($result_critair == true) {

						$_SESSION['critair'] = $result_critair['critair'];

					}

					if (isset($_POST['remember'])) {

						setcookie('id', $_SESSION['id'], time() + 365*24*3600, "/");
						setcookie('identifiant', $_SESSION['identifiant'], time() + 365*24*3600, "/");

					}

					?>
					
						<script type="text/javascript">
							window.location.replace("profil.php");					
						</script>

					<?php

				} else {

					$msg = 'le mot de passe n\'est pas correcte';

				}

			} else {

					$msg = 'le compte portant l\'email '.$email.' n\'existe pas';

			}

		} else {

			$msg = 'Veuillez completer l\'ensemble des champ';

		}

	}

?>