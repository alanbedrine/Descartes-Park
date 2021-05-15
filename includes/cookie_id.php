<?php 

	if (isset($_COOKIE['id']) && isset($_COOKIE['identifiant'])) {
		
		$id = $_COOKIE['id'];
		$identifiant = $_COOKIE['identifiant'];

		include 'includes/database.php';

		$q = $db->prepare("SELECT * FROM utilisateur WHERE identifiant = :identifiant AND id = :id");
		$q->execute(['identifiant' => $identifiant, 'id' => $id]);
		$result = $q->fetch();			 

		if($result == true) {

			$_SESSION = array();
			session_destroy();
			
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
			
		} else {

			?>
						
				<script type="text/javascript">
					window.location.replace("deconnexion.php");					
				</script>

			<?php
		
		}

	} else {

		if (isset($_COOKIE['id']) or isset($_COOKIE['identifiant'])) {

			?>
						
				<script type="text/javascript">
					window.location.replace("deconnexion.php");					
				</script>

			<?php

		}

	}

?>