<?php session_start(); ?>
<?php include 'includes/cookie_id.php' ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Profil | Descartes park</title>
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

            if (isset($_SESSION['id']) && isset($_SESSION['identifiant'])) {                          

                if(isset($_GET['supprimeid']) && !empty($_GET['supprimeid'])) {

                    $supprimeid = (int) $_GET['supprimeid'];
                    if ($_SESSION['typecompte'] = "admin") {
                        $req = $db->prepare("DELETE FROM utilisateur WHERE id = ?");
                        $req->execute(array($supprimeid));
                        ?>
            
                            <script type="text/javascript">
                                window.location.replace("profil.php");					
                            </script>

                        <?php
                    } else {                                                
                        ?>
            
                            <script type="text/javascript">
                                window.location.replace("profil.php");					
                            </script>

                        <?php
                    }

                } else {

                    if ($_SESSION['typecompte'] == "admin") {
                    
                        ?>

                            <section class="profil" id="info">
                                <div class="profilcontent" align="center">
                                    <h1 class="text3 gras"><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></h1>
                                    <br>
                                    <p class="text2">Prénom : <?php echo $_SESSION['prenom']; ?></p>
                                    <p class="text2">Nom : <?php echo $_SESSION['nom']; ?></p>
                                    <p class="text2">Email : <?php echo $_SESSION['email']; ?></p>
                                    <p class="text2">Immatriculation : <?php echo $_SESSION['immatriculation']; ?></p>
                                    <p class="text2">Code d'accès application : <?php echo $_SESSION['code']; ?></p>
                                    <p class="text2">Crit'air : <?php echo $_SESSION['critair']; ?></p>
                                    <br>
                                    <img class="critair-img" src="IMG/critair<?php echo $_SESSION['critair']; ?>.jpg" width="150">
                                    <br>
                                    <br>
                                    <br>
                                    <a class="menu-acc" href="deconnexion.php">Déconnexion</a>
                                </div>
                            </section>
                            
                            <section class="admin" id="info">
                                <div class="admincontent" align="center">
                                    <h1 class="text3 gras">Administration</h1>
                                    <br>                                
                                    <br>
                                    <h2 class="text2 blanc gras">Liste client</h2>
                                    <br>
                                    <table class="table-client">
                                        <tr class="ligne-table first-ligne">
                                            <td class="case-table">identifiant</td>
                                            <td class="case-table">email</td>
                                            <td class="case-table">prénom</td>
                                            <td class="case-table">nom</td>
                                            <td class="case-table">immatriculation</td>
                                            <td class="case-table">code</td>
                                            <td class="case-table">action</td>
                                        </tr>
                                        <?php

                                            include 'includes/database.php';
                                            global $db;

                                            $q = $db->prepare("SELECT * FROM utilisateur ORDER BY identifiant ASC");
                                            $q->execute();
                                            while ($item = $q->fetch())

                                            {	

                                                ?>

                                                    <tr class="ligne-table" style="background-color: <?php echo $stylescore; ?>;">
                                                        <td class="case-table"><?php echo $item['identifiant']; ?></td>
                                                        <td class="case-table"><?php echo $item['email']; ?></td>
                                                        <td class="case-table"><?php echo $item['prenom']; ?></td>
                                                        <td class="case-table"><?php echo $item['nom']; ?></td>
                                                        <td class="case-table"><?php echo $item['immatriculation']; ?></td>
                                                        <td class="case-table"><?php echo $item['code']; ?></td>
                                                        <td class="case-table"><a class="btn-acc" href="profil.php?supprimeid=<?= $item['id'] ?>">Supprimer</a></td>
                                                    </tr>

                                                <?php

                                            }

                                        ?>
                                    </table>
                                </div>
                            </section>

                        <?php

                    } else {
    
                        ?>

                            <section class="profil" id="info">
                                <div class="profilcontent" align="center">
                                    <h1 class="text3 gras"><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></h1>
                                    <br>
                                    <p class="text2">Prénom : <?php echo $_SESSION['prenom']; ?></p>
                                    <p class="text2">Nom : <?php echo $_SESSION['nom']; ?></p>
                                    <p class="text2">Email : <?php echo $_SESSION['email']; ?></p>
                                    <p class="text2">Immatriculation : <?php echo $_SESSION['immatriculation']; ?></p>  
                                    <p class="text2">Code d'accès application : <?php echo $_SESSION['code']; ?></p>                              
                                    <p class="text2">Crit'air : <?php echo $_SESSION['critair']; ?></p>
                                    <br>
                                    <img class="critair-img" src="IMG/critair<?php echo $_SESSION['critair']; ?>.jpg" width="150">
                                    <br>
                                    <br>
                                    <br>
                                    <a class="menu-acc" href="deconnexion.php">Déconnexion</a>
                                </div>
                            </section>

                        <?php

                    }  
                
                }
            
            } else {

                ?>
						
					<script type="text/javascript">
						window.location.replace("connexion.php");                   
					</script>
		
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