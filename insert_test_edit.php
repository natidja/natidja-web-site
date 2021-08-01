<?php session_start() ?>
<?php
	header('content-type: text/html; charset=utf-8');
	date_default_timezone_set('Africa/Algiers');
	
	include("Auth_pub.php");
	$nom_p = $_POST["nom_p"];
	$prenom_p = $_POST["prenom_p"];
	$date_naissance = $_POST["date_naissance"];
	$sexe = $_POST["sexe"];
	$type = $_POST["subject"];
	$resultat = $_POST["resultat"];
	$avatar= $_POST['avatar'];
	$mdp = $_POST["mdp"];
	$date_test = date('Y-m-j h:i:s');

	//$target_dir = "images/";
		
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
		
				$req = "select id_labo from labo where adresse_email ='$_SESSION[pseudo_labo]' and pwd ='$_SESSION[mdp_labo]'";

                        $res = $conn->query($req);

                        while($tu = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                            $id_labo= $tu['id_labo'];
                        }
				//Insertion d'un nouvel étudiant
				$requete_sql = "INSERT INTO test (nom_p, prenom_p, date_naissance, type, resultat, sexe, avatar, date_test, id_labo) VALUES (:nom_p, :prenom_p, :date_naissance, :type, :resultat, :sexe, :avatar,:date_test, :id_labo)";

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$p = $conn->prepare($requete_sql);
				$p->bindParam(":nom_p", $nom_p);
				$p->bindParam(":prenom_p", $prenom_p);
				$p->bindParam(":date_naissance", $date_naissance);
				$p->bindParam(":type", $type);
				$p->bindParam(":resultat", $resultat);
				$p->bindParam(":sexe", $sexe);
				$p->bindParam(":avatar", $avatar); 
				$p->bindParam(":date_test", $date_test);
                $p->bindParam(":id_labo", $id_labo);

				$p->execute();

				$pseudo= $nom_p ."_". $prenom_p."";
				

				
				$req_sql="insert into patient(nom_p, prenom_p, date_naissance, resultat, id_test, sexe, avatar) SELECT nom_p, prenom_p, date_naissance, resultat, id_test, sexe, avatar FROM test where nom_p='$nom_p'and prenom_p='$prenom_p' and date_naissance='$date_naissance' and type='$type' and resultat='$resultat'";
                $conn->exec($req_sql);
				
				$requete_sql2 ="UPDATE patient SET pseudo = '$pseudo', mdp='$mdp' WHERE nom_p='$nom_p'and prenom_p='$prenom_p'";
				$conn->exec($requete_sql2);

				

				$req_sql3 = "SELECT count(*) as 'nbr' from test where resultat = 'positive'";
				$res = $conn->query($req_sql3);

				while($tup = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
					$positif = $tup['nbr'];
				}
				
		//Clôture de la connexion
		$conn = null;
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
    echo 'www.natidja.com <br/>';
    echo "Pseudo: " . $pseudo . "<br/> Mots De Passe: " . $mdp . "<br/>";
?>

<button class="btn btn-primary hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
<a href="labo_home.php"><button class="btn btn-primary hidden-print"> Close</button>
</a>
</body>
</html>