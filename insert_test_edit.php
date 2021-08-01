<?php
	header('content-type: text/html; charset=utf-8');
	date_default_timezone_set('Africa/Algiers');
	
	$nom_bdd = "natidja";
	$server = "localhost";
	$user = "root";
	$password = "";


	$nom_p = $_POST["nom_p"];
	$prenom_p = $_POST["prenom_p"];
	$date_naissance = $_POST["date_naissance"];
	$sexe = $_POST["sexe"];
	$type = $_POST["subject"];
	$resultat = $_POST["resultat"];
	$mdp = $_POST["mdp"];
	
	if($type == "antigénique"){
		$type = "antigénique";
	}
	elseif($type == "virologique"){
		$type = "virologique";
	} 
	else{
		$type = "sérologique";
	}

	if($resultat == "en attente"){
		$resultat = "en attente";
	} 
	elseif($resultat == "negatif"){
		$resultat = "negatif";
	}

	else{
		$resultat = "positif";
	}
	
	if($sexe == "H"){
		$sexe = "homme";
	} else{
		$sexe = "femme";
	}
	
	try {
		//Création d'une connexion avec le SGBD
		$connexion = new PDO("mysql:host=$server;dbname=$nom_bdd", $user, $password);
		
		
				//Insertion d'un nouvel étudiant
				$requete_sql = "INSERT INTO test (nom_p, prenom_p, date_naissance, type, resultat, sexe) VALUES (:nom_p, :prenom_p, :date_naissance, :type, :resultat, :sexe)";

				$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$p = $connexion->prepare($requete_sql);
				$p->bindParam(":nom_p", $nom_p);
				$p->bindParam(":prenom_p", $prenom_p);
				$p->bindParam(":date_naissance", $date_naissance);
				$p->bindParam(":type", $type);
				$p->bindParam(":resultat", $resultat);
				$p->bindParam(":sexe", $sexe);
				$p->execute();

				$pseudo= $nom_p ."_". $prenom_p."";
				

				
				$req_sql="insert into patient(nom_p, prenom_p, date_naissance, resultat, id_test, sexe) SELECT nom_p, prenom_p, date_naissance, resultat, id_test, sexe FROM test where nom_p='$nom_p'and prenom_p='$prenom_p' and date_naissance='$date_naissance' and type='$type' and resultat='$resultat'";
                $connexion->exec($req_sql);
				
				$requete_sql2 ="UPDATE patient SET pseudo = '$pseudo', mdp='$mdp' WHERE nom_p='$nom_p'and prenom_p='$prenom_p'";
				$connexion->exec($requete_sql2);

				

				$req_sql3 = "SELECT count(*) as 'nbr' from test where resultat = 'positive'";
				$res = $connexion->query($req_sql3);

				while($tup = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
					$positif = $tup['nbr'];
				}
				echo '<script language="Javascript">
	                    document.location.replace("labo_home.php");
	                    </script>';
		//Clôture de la connexion
		$connexion = null;
	} catch (PDOException $e) {
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>
