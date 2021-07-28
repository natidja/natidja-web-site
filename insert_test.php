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
	
	if($type == "antigénique"){
		$type = "antigénique";
	}
	elseif($type == "virologique"){
		$type = "virologique";
	} 
	else{
		$type = "sérologique";
	}

	if($resultat == "attente"){
		$resultat = "attente";
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
				function passgen1($nbChar) {
				    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
				    srand((double)microtime()*1000000);
				    $pass = '';
				    for($i=0; $i<$nbChar; $i++){
				        $pass .= $chaine[rand()%strlen($chaine)];
				        }
				    return $pass;
				}

				$mdp= passgen1(8);
				$req_sql="insert into patient(nom_p, prenom_p, date_naissance, resultat, id_test,sexe) SELECT nom_p, prenom_p, date_naissance, resultat, id_test, sexe FROM test where nom_p='$nom_p'and prenom_p='$prenom_p' ";
				$connexion->exec($req_sql);
				$requete_sql2 ="UPDATE patient SET pseudo = '$pseudo', mdp='$mdp' WHERE nom_p='$nom_p'and prenom_p='$prenom_p'";
				$connexion->exec($requete_sql2);

				echo "Pseudo: " . $pseudo . "<br/> Mots De Passe: " . $mdp . "<br/>";

				$req_sql3 = "SELECT count(*) as 'nbr' from test where resultat = 'positive'";
				$res = $connexion->query($req_sql3);

				while($tup = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
					$positif = $tup['nbr'];
				}
				echo "le nbr de cas : ".$positif. " ";
		//Clôture de la connexion
		$connexion = null;
	} catch (PDOException $e) {
		echo "Erreur ! " . $e->getMessage() . "<br/>";
	}
?>

<!DOCTYPE html>
<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
<body>
<?php 
    echo "Pseudo: " . $pseudo . "<br/> Mots De Passe: " . $mdp . "<br/>";
?>

<button class="btn btn-primary hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
<form action="labo_home.php" >
<button class="btn btn-primary hidden-print" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> terminé</button>
</form>

</body>
</html>
