<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $donnees = json_decode(file_get_contents("php://input"));

        if(!empty($donnees->code)){

            $code = $donnees->code;

            include 'includes/database.php';

            $q = $db->prepare("SELECT * FROM utilisateur WHERE code = :code");
            $q->execute(['code' => $code]);
            $result = $q->fetch();			 

            if($result == true) {

                $_SESSION = array();
                session_destroy();
                
                $id = $result['id'];
                $identifiant = $result['identifiant'];
                $prenom = $result['prenom'];
                $nom = $result['nom'];
                $email = $result['email'];
                $immatriculation = $result['immatriculation'];
                $code = $result['code'];
                $mdp = $result['mdp'];
                $typecompte = $result['typecompte'];

                $q = $db->prepare("SELECT * FROM siv WHERE immatriculation = :immatriculation");
                $q->execute(['immatriculation' => $immatriculation]);
                $result_critair = $q->fetch();			 

                if($result_critair == true) {

                    $critair = $result_critair['critair'];

                }

                http_response_code(201);
                echo json_encode(["Message" => "Requete envoyer"]);
                
            } else {
                http_response_code(503);
                echo json_encode(["Message" => "Error : Utilisateur inexistant"]);
            }

        } else {
            http_response_code(503);
            echo json_encode(["Message" => "Error : Code vide"]);
        }

    } else {
        http_response_code(405);
        echo json_encode(["Message" => "Error : La methode n'est pas autorisee"]);
    }

?>