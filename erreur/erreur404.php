<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Erreur 404 | Descartes park</title>
	<meta name="description" content="Simple et rapide, trouvez en quelques clics une place de stationnement pour votre voiture dans le parking Descartes">
	<link rel="apple-touch-icon" href="../IMG/favicon.png">
	<link rel="icon" href="../IMG/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">	
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<meta charset="utf-8">
</head>

<body>

	<header>

		<div id="tete-site">

			<div class="titre-site" valign="middle">
				<a href="../index.php" class="nosoulignes">
					<p class="text9 blanc gras maj titre-site">
						Descartes Park
					</p>
				</a>
			</div>

			<div class="menu" align="right" valign="middle">
				<nav class="menu-nav" valign="middle">
					<ul>
						<li class="btn">
							<a href="../index.php">Accueil</a>
						</li>		
                        <li class="btn">
                            <a href="../index.php#info">Info parking</a>
                        </li>			
                        <li class="btn">
                            <a href="../index.php#contact">Contact</a>
                        </li>	
                        <li class="btn-profil-active">
                            <a href="../profil.php">Mon compte</a>
                        </li>
					</ul>
				</nav>
			</div>		
			
		</div>		

	</header>

	<div id="contenu-site">

		<br>
		<br>
		<br>

		<section class="error404">
			<div class="error404" align="center">
				<p class="texterror4041" align="center"><img src="../IMG/erreur/erreur404.png" class="imgerror4041" alt="erreur404" width="40" height="40">&nbsp;&nbsp;&nbsp;&nbsp;Erreur 404&nbsp;&nbsp;&nbsp;&nbsp;<img src="../IMG/erreur/erreur404.png" class="imgerror4041" alt="erreur404" width="40" height="40"></p>
				<br>
				<p class="texterror4042" align="center">La page que vous vouliez consulter n'est pas disponible ou n'existe pas.</p>
			</div>
		</section>

		<br>
		<br>
		<br>

	</div>	

	<footer>

		<div id="pied-site">
			<div class="copyright blanc" align="center">
				<p>
                    Copyright © Descartes Park <?php echo date("Y"); ?>
				</p>
            </div>
			<br>
		</div>	

    </footer>
    
    <script data-ad-client="ca-pub-4567390623458899" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="../JS/app.js"></script>	  
    <script src="../JS/autotext.js"></script>		
    <script src="../JS/scroll-animation.js"></script>
	
</body>

</html>