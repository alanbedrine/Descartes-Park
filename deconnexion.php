<?php 

session_start();

setcookie('id', '', time() - 3600, '/');
setcookie('identifiant', '', time() - 3600, '/');

$_SESSION = array();
session_destroy();

?>
<?php include 'includes/cookie_id.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Déconnexon | Descartes Park</title>
    <link rel="apple-touch-icon" href="IMG/favicon.png">
    <link rel="icon" href="IMG/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">   
    <link rel="stylesheet" type="text/css" href="CSS/style.css">    
    <meta charset="utf-8">
</head>

<body>
    <script type="text/javascript">
        window.location.replace("index.php");                   
    </script>
</body>

</html>