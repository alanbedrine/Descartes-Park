<?php

	include 'includes/database.php';

	if (isset($_COOKIE['email'] && $_COOKIE['identifiant'] && $_COOKIE['mdp'])) {

		$db->row("SELECT * FROM utilisateur WHERE email = :email");
		$q->execute(['email' => $email]);
		$result = $q->fetch();

	}

?>