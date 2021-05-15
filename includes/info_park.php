<?php 

    include 'includes/database.php';

    $heure = strtotime(date("H:i"));
    $heure_ouverture = strtotime("08:00");
    $heure_fermeture = strtotime("20:00");

    if ($heure >= $heure_ouverture && $heure <= $heure_fermeture) {
        $statut_horaires = '<span class="vert">ouvert</span>';
    } else {
        $statut_horaires = '<span class="rouge">fermer</span>';
    }

    $select=$db->prepare("SELECT COUNT(*) AS nb FROM place WHERE libre=1");
    $select->execute();
    $nb_place=$select->fetch(PDO::FETCH_OBJ);

    if ($nb_place > "0") {
        $nb_place_dispo = $nb_place->nb;
        $nb_place_color = 'vert';
    } else {
        $nb_place_dispo = 'Plus de place';
        $nb_place_color = 'rouge';
    }

?>