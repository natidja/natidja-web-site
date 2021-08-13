<?php session_start() ?>
<?php
include("Auth_pub.php");
//récuperation de l'avatar

if(isset($_POST['valider'])){
	$avatar = $_FILES['avatar']['name'];
	if (move_uploaded_file($_FILES['avatar']['tmp_name'], "resultat/". $_FILES['avatar']['name'])) {
		chmod("resultat/". $_FILES['avatar']['name'], 0644);
	}
}



//récuperation password client avant suppression

//récuperation données patient
$requete_m= "select * from test where id_test='$_SESSION[id_test]' ";
$result_m = $conn->query($requete_m);

while($tuple = $result_m->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
    $nom_p = $tuple['nom_p'];
    $prenom_p = $tuple['prenom_p'];
    $sexe = $tuple['sexe'];
    $date_naissance = $tuple['date_naissance'];
    $resultat_p = $tuple['resultat'];
}

//suppression des deux tables
        $requete_sql0 = "SELECT * FROM patient where nom_p='$nom_p'and prenom_p='$prenom_p'and date_naissance='$date_naissance'";
        $result0 = $conn->query($requete_sql0);

        while($tuple0 = $result0->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
            $id_p = $tuple0['id_p'];
            $nbr_test = $tuple0['nbr_test'];
        }
        if($nbr_test == 1){
            $requete_sql = "DELETE FROM patient where id_p = '$id_p'";
            $conn->query($requete_sql);

            $requete_sql2 = "DELETE FROM test where id_test = '$_SESSION[id_test]'";
            $conn->query($requete_sql2);
        }
        else{
            $requete_sql3 = 'UPDATE patient SET nbr_test=(nbr_test-1) where id_p="$id_p"';
            $conn->exec($requete_sql3);

            $requete_sql4 = "DELETE FROM test where id_test = '$_SESSION[id_test]'";
            $conn->query($requete_sql4);
        }



?>
<?php
	header('content-type: text/html; charset=utf-8');
	date_default_timezone_set('Africa/Algiers');

	include("Auth_pub.php");
	$nom_p = $_POST["nom_p"];
	$prenom_p = $_POST["prenom_p"];
	$date_naissance = $_POST["date_naissance"];
	$sexe = $_POST["sexe"];
	$mdp = $_POST["mdp"];
	$date_test = date('Y-m-j h:i:s');

	//$target_dir = "images/";


	if($resultat == "en attente"){
		$resultat = "en attente";
	}

	else{
		$resultat = "pres";
	}

	if($sexe == "H"){
		$sexe = "homme";
	} else{
		$sexe = "femme";
	}
	if($avatar == '')
	{
		$search = 0;
	}
	else
		$search = 1;

	try {
		//Création d'une connexion avec le SGBD

				$req = "select id_labo from labo where adresse_email ='$_SESSION[pseudo_labo]' and pwd ='$_SESSION[mdp_labo]'";

                        $res = $conn->query($req);

                        while($tu = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                            $id_labo= $tu['id_labo'];
                        }
				//Insertion d'un nouvel étudiant
				if($search == 0){
						$requete_sql10 = "INSERT INTO test (nom_p, prenom_p, date_naissance, resultat, sexe, avatar, date_test, id_labo) VALUES (:nom_p, :prenom_p, :date_naissance, 'en attente', :sexe, :avatar,:date_test, :id_labo)";

						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$p = $conn->prepare($requete_sql10);
						$p->bindParam(":nom_p", $nom_p);
						$p->bindParam(":prenom_p", $prenom_p);
						$p->bindParam(":date_naissance", $date_naissance);
						$p->bindParam(":sexe", $sexe);
						$p->bindParam(":avatar", $avatar);
						$p->bindParam(":date_test", $date_test);
		                $p->bindParam(":id_labo", $id_labo);

						$p->execute();
				}
				else{
						$requete_sql11 = "INSERT INTO test (nom_p, prenom_p, date_naissance, resultat, sexe, avatar, date_test, id_labo) VALUES (:nom_p, :prenom_p, :date_naissance, 'pres', :sexe, :avatar,:date_test, :id_labo)";

						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$p2 = $conn->prepare($requete_sql11);
						$p2->bindParam(":nom_p", $nom_p);
						$p2->bindParam(":prenom_p", $prenom_p);
						$p2->bindParam(":date_naissance", $date_naissance);
						$p2->bindParam(":sexe", $sexe);
						$p2->bindParam(":avatar", $avatar);
						$p2->bindParam(":date_test", $date_test);
		                $p2->bindParam(":id_labo", $id_labo);

						$p2->execute();
				}

				$pseudo= $nom_p ."_". $prenom_p."";
				$requete_sql3= "SELECT * from test WHERE nom_p='$nom_p'and prenom_p='$prenom_p'and date_naissance='$date_naissance'and id_labo='$id_labo'";
                                    $res1 = $conn->query($requete_sql3);
                                    if($res1->rowCount() > 1){
                                        while($tup = $res1->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                                            $_SESSION['id_test']= $tup['id_test'];
                                            $req_sql3 = "SELECT * from patient where id_test='$_SESSION[id_test]'";
                                             $res2 = $conn->query($req_sql3);
                                             while($tup2 = $res2->fetch(PDO::FETCH_ASSOC)){
                                                $nbr_test= $tup2['nbr_test'];
                                                }
                                                $req_sql4="UPDATE patient SET nbr_test='$nbr_test' where id_test='$_SESSION[id_test]'";
                                                $conn->exec($req_sql4);
                                                break;
                                                }
                                        }
                                    else{
                                        $req_sql6="INSERT INTO patient (nom_p, prenom_p, date_naissance, id_test) SELECT nom_p, prenom_p, date_naissance, id_test FROM test where nom_p='$nom_p'and prenom_p='$prenom_p'and date_naissance='$date_naissance'and id_labo='$id_labo'";
                                            $conn->exec($req_sql6);
                                            $requete_sql6 = "SELECT id_test from test where nom_p='$nom_p'and prenom_p='$prenom_p'and date_naissance='$date_naissance'and id_labo='$id_labo'";
                                            $result4 = $conn->query($requete_sql6);
                                            while($tuple3 = $result4->fetch(PDO::FETCH_ASSOC)){
                                            $_SESSION['id_test']= $tuple3['id_test'];
                                                }
                                            $requete_sql7 ="UPDATE patient SET pseudo='$pseudo',mdp='$mdp', nbr_test='1' WHERE id_test='$_SESSION[id_test]'";
                                                $conn->exec($requete_sql7);
                                    }

				header("Location: labo_home.php");

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


<button class="btn btn-primary hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
<a href="labo_home.php"><button class="btn btn-primary hidden-print"> Close</button>
</a>
</body>
</html>
