<?php
include("Auth_pub.php"); 


    $id_test = $_POST['delete_nomp'];
    $requete_sql = "DELETE FROM patient where id_test = '$id_test'";

        $result = $conn->query($requete_sql);

    $requete_sql2 = "DELETE FROM test where id_test = '$id_test'";

    $result2 = $conn->query($requete_sql2);
   

    header("Location: labo_home.php");
?>