<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Erreur</title>
</head>
<body>
	<?php 

		if(isset($_GET['erreur']) AND !empty($_GET['erreur'])) {
            if ($_GET['erreur'] == "404") {
                ?>

					<script type="text/javascript">
						window.location.replace("erreur/erreur404.php");					
					</script>

				<?php
			} elseif ($_GET['erreur'] == "500") {
				?>

					<script type="text/javascript">
						window.location.replace("erreur/erreur500.php");					
					</script>

				<?php
			} elseif ($_GET['erreur'] == "504") {
				?>

					<script type="text/javascript">
						window.location.replace("erreur/erreur504.php");					
					</script>

				<?php
			}        
		}

	?>
</body>
</html>