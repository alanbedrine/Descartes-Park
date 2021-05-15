<?php 		

	if (isset($_SESSION['identifiant'])) {
		$identifiant = $_SESSION['identifiant'];
	} else {
		$identifiant = "#";
	}		

	/*?>
		<script type="text/javascript">
			function Geo() {
				alert('Geo');
			}

			if(navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(Geo);
			} else {
				localisation = "#";
			}
		</script>
	<?php*/
	
	date_default_timezone_set('Europe/Paris');

	$page = $_SERVER['PHP_SELF']; 
	$ip = $_SERVER['REMOTE_ADDR'];
	$info = $_SERVER['HTTP_USER_AGENT'];
	$localisation = "#";
	$dateconsult = date("d-m-Y H:i");

	include 'includes/database.php';

	if (stristr($info, 'sqlmap') === FALSE) {
	
		$q = $db->prepare("INSERT INTO statistique(page,ip,info,localisation,identifiant,dateconsult) VALUES(:page,:ip,:info,:localisation,:identifiant,:dateconsult)");
		$q->execute([
			'page' => $page,
			'ip' => $ip,
			'info' => $info,
			'localisation' => $localisation,
			'identifiant' => $identifiant,
			'dateconsult' => $dateconsult
		]);

	}

	?>
	
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77769338-4"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-77769338-4');
		</script>

	<?php

?>