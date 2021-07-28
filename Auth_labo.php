<?php
    header('content-type: text/html; charset=utf-8');
    date_default_timezone_set('Africa/Algiers');

    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["pwd"];

    $nom_bdd = "natidja";
    $server = "localhost";
    $user = "root";
    $password = "";

    try {
        //Création d'une connexion avec le SGBD
        $connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);

        //Récupération de tous les utilisateurs
        $requete_sql = "select * from labo where nom_labo ='$pseudo' and pwd ='$mdp'";

        $result = $connexion->query($requete_sql);

        if($result->rowCount() == 0){//Authentification échouée !!!
            die("Erreur de nom d'utilisateur ou de mot de passe !!");
        } else {
            header("Location: .php");
        }
        //Clôture de la connexion
        $connexion = null;
    } catch (PDOException $e) {
        echo "Erreur ! " . $e->getMessage() . "<br/>";
    }
?>