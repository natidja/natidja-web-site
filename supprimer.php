<?php
include("Auth_pub.php");


    $id_test = $_POST['delete_nomp'];

    $requete_m= "select * from test where id_test='$id_test' ";
    $result_m = $conn->query($requete_m);

    while($tuple = $result_m->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
        $nom_p = $tuple['nom_p'];
        $prenom_p = $tuple['prenom_p'];
        $date_naissance = $tuple['date_naissance'];
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

                $requete_sql2 = "DELETE FROM test where id_test = '$id_test'";
                $conn->query($requete_sql2);
            }
            else{
                $requete_sql3 = "UPDATE patient SET nbr_test= nbr_test-1 where id_p= '$id_p'";
                $conn->exec($requete_sql3);

                $requete_sql4 = "DELETE FROM test where id_test = '$id_test'";
                $conn->query($requete_sql4);
            }

    header("Location: labo_home.php");
?>
