<?php session_start(); ?>
<?php include 'includes/cookie_id.php' ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Inscription | Descartes park</title>
	<meta name="description" content="Simple et rapide, trouvez en quelques clics une place de stationnement pour votre voiture dans le parking Descartes">
	<link rel="apple-touch-icon" href="IMG/favicon.png">
	<link rel="icon" href="IMG/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">	
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta charset="utf-8">
</head>

<body>

	<header>

		<div id="tete-site">

			<div class="titre-site" valign="middle">
				<a href="index.php" class="nosoulignes">
                    <p class="text9 blanc gras maj titre-site">
						Descartes Park
					</p>
				</a>
			</div>

			<div class="menu" align="right" valign="middle">
				<nav class="menu-nav" valign="middle">
					<ul>
						<li class="btn">
							<a href="index.php">Accueil</a>
						</li>		
                        <li class="btn">
                            <a href="index.php#info">Info parking</a>
                        </li>			
                        <li class="btn">
                            <a href="index.php#contact">Contact</a>
                        </li>	
                        <li class="btn-profil-active">
                            <a href="profil.php">Mon compte</a>
                        </li>
					</ul>
				</nav>
			</div>	
			
		</div>		
	
	</header>

	<div id="contenu-site">

        <?php

            if (isset($_SESSION['identifiant']) AND isset($_SESSION['mdp'])) {
                
                ?>
                        
                    <script type="text/javascript">
                        window.location.replace("profil.php");                   
                    </script>

                <?php
                
            } else {

                ?>

                    <section class="form-sign-in" id="form-sign-in">
                        <div class="form-sign-incontent" align="center">
                            <h2 class="text4 gras">Inscription</h2>
                            <br>
                            <form class="form-ins" method="post">
                                <p>
                                    <label for="prenom">Prenom&nbsp;&nbsp;</label>
                                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php if (isset($_POST['prenom'])) {echo $_POST['prenom'];} else {echo '';} ?>">
                                </p>
                                <p>
                                    <label for="nom">Nom&nbsp;&nbsp;</label>
                                    <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php if (isset($_POST['nom'])) {echo $_POST['nom'];} else {echo '';} ?>">
                                </p>
                                <p>
                                    <label for="email">Email&nbsp;&nbsp;</label>
                                    <input type="email" name="email" id="email" placeholder="Email" value="<?php if (isset($_POST['email'])) {echo $_POST['email'];} else {echo '';} ?>">
                                </p>
                                <p>
                                    <label for="immatriculation">Immatriculation&nbsp;&nbsp;</label>
                                    <input type="text" name="immatriculation" id="immatriculation" placeholder="AA-123-AA" value="<?php if (isset($_POST['immatriculation'])) {echo $_POST['immatriculation'];} else {echo '';} ?>">
                                </p>
                                <p>
                                    <label for="mdp">Mot de passe&nbsp;&nbsp;</label>
                                    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" autocomplete="on">
                                </p>
                                <p>
                                    <label for="cmdp">Confirmer Mot de passe&nbsp;&nbsp;</label>
                                    <input type="password" name="cmdp" id="cmdp" placeholder="Confrimer Mot de passe" autocomplete="off">
                                </p>
                                <br>
                                <p>
                                    <input type="submit" name="btn-valider" id="btn-valider" value="S'inscrire">
                                </p>
                            </form>
                            <br>
                            <?php include 'includes/signin.php'; ?>
                            <br>
                            <p class="text1" align="center">Vous avez déjà un compte ? <span><a href="connexion.php" class="bleu nosoulignes">Se connecter</a></span></p>
                        </div>                        
                    </section>  

                <?php
            
            }

        ?>
                    
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
    <script src="JS/app.js"></script>	  
    <script src="JS/autotext.js"></script>	
    <script src="JS/scroll-animation.js"></script>	
	
</body>

</html>