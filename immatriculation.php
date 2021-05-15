<?php 			

    $alphabet = "";
    $number = "";
    $immatriculation = "";

    $critair = "";
		    
    include 'includes/database.php';
    global $db;

	for ($i=1; $i<=10000; $i++) {

        $alphabet = "";
        $number = "";
        $immatriculation = "";
    
        $critair = "";

        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $number = "0123456789";
        $immatriculation = $alphabet[rand(0,25)].$alphabet[rand(0,25)].'-'.$number[rand(0,9)].$number[rand(0,9)].$number[rand(0,9)].'-'.$alphabet[rand(0,25)].$alphabet[rand(0,25)];

        $critair = rand(0,5);

        $q = $db->prepare("SELECT * FROM siv WHERE immatriculation = :immatriculation");
        $q->execute(['immatriculation' => $immatriculation]);
        $result = $q->fetch();			 

        if($result != true) {

            $q = $db->prepare("INSERT INTO siv(immatriculation, critair) VALUES(:immatriculation, :critair)");
            $q->execute([
                'immatriculation' => $immatriculation,
                'critair' => $critair
            ]);

        }

	} 

    echo 'fini !';
?>