<?php session_start(); ?>
<?php include 'includes/cookie_id.php' ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Accueil | Descartes park</title>
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
						<li class="btn-active">
							<a href="index.php">Accueil</a>
						</li>		
                        <li class="btn">
                            <a href="#info">Info parking</a>
                        </li>			
                        <li class="btn">
                            <a href="#contact">Contact</a>
                        </li>		
                        <li class="btn-profil">
                            <a href="profil.php">Mon compte</a>
                        </li>
					</ul>
				</nav>
			</div>	
			
		</div>		
	
	</header>

	<div id="contenu-site">

        <section class="accueil" id="accueil">
            <div class="accueilcontent" align="left">
                <h1 class="text9 gras">Parking de Descartes</h1>
                <p class="text3 gris">Simple et rapide, trouvez en quelques clique une place de stationnement 
                <br>pour votre voiture dans le parking de Descartes.</p>
                <br>
            </div>
        </section>

        <section class="info" id="info">
            <div class="infocontent" align="center">
                <?php include 'includes/info_park.php'; ?>
                <h2 class="text4 gras">Info parking<br>En temps réel</h2>
                <br>
                <p class="text2">Horaires : <?php echo $statut_horaires; ?></p>
                <p class="text2">Nombre de place disponible : <span class="<?php echo $nb_place_color; ?>"><?php echo $nb_place_dispo; ?></span></p>
                <p class="text2"></p>
            </div>   
            <script>
                setInterval('info_load()', 1500);
                function info_load() {
                    $('.infocontent').load('info_load.php');
                }
            </script>    
        </section>

        <section class="tarif" id="tarif">
            <div class="tarifcontent" align="center">
                <h2 class="text4 gras">Tarif</h2>
                <br>
                <br>
                <div class="grid-tarif">
                    <div class="abonnement"align="center">
                        <h3 class="text8 gras">15€/mois</h3>
                        <h4 class="text2 gras">Abonnement classique</h4>
                        <p>Sans engagement</p>
                        <p>Accès au parking</p>
                        <p>Stationement illimité de moins de 24h</p>
                    </div>
                    <div class="abonnement"align="center">
                        <h3 class="text8 gras">30€/mois</h3>
                        <h4 class="text2 gras">Abonnement prenium</h4>
                        <p>Sans engagement</p>
                        <p>Accès au parking</p>
                        <p>Stationement illimité de moins d'une semaine</p>
                    </div>
                    <div class="abonnement"align="center">
                        <h3 class="text8 gras">50€/mois</h3>
                        <h4 class="text2 gras">Abonnement VIP</h4>
                        <p>Sans engagement</p>
                        <p>Accès au parking</p>
                        <p>Accès parking VIP</p>
                        <p>Stationement illimité sans limite</p>
                    </div>
                </div>
            </div>    
        </section>

        <section class="contact" id="contact">
            <div class="contactcontent" align="center">
                <div class="contact">
                    <h2 class="text4">Adresse du Parking</h2>
                    <br>
                    <br>
                    <br>
                    <div class="grid-contact">
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2786.9643852754825!2d4.783079314959129!3d45.69168672625705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4e927d87ae7f3%3A0x3c0074e1631b2fb7!2sLyc%C3%A9e%20Ren%C3%A9%20Descartes!5e0!3m2!1sfr!2sfr!4v1615982620766!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                        
                        </div>
                        <div>
                            <h3 class="color_text gras">Contact</h3>
                            <p class="text2 gras">145 avenue de Gadagne 
                            <br>69230 St-Genis-Laval
                            <br>
                            <br>Email : contact@bedrinedev.com
                            <br>Tél : 06.95.54.03.50
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                    
	</div>	

	<footer>

		<div id="pied-site">
			<div class="copyright blanc" align="center">
				<p>
                    Copyright © Descartes Park <?php echo date("Y"); ?>
				</p>
            </div>
            <br>
			<div class="reseau-social" align="center">
                <a class="reseau-social nosoulignes" href="https://facebook.com/" target="_blank">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a class="reseau-social nosoulignes" href="https://instagram.com/" target="_blank">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
            </div>
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