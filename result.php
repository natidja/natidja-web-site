<?php include("Auth_pub.php"); ?>
<?php  

                  $pseudo = $_POST["user"];
                  $mdp = $_POST["pass"];
                  try {
                    
            
                    //Récupération de tous les utilisateurs
                    $requete_sql = "select * from patient where pseudo ='$pseudo' and mdp ='$mdp'";
            
                    $result = $conn->query($requete_sql);
            
                    if($result->rowCount() == 0){
                    //Authentification échouée !!!
                    header("Location: index.php");
                        die("Erreur de nom d'utilisateur ou de mot de passe !!");
                    } else {
                        $requete_sql = "select * from patient where pseudo ='$pseudo' and mdp ='$mdp'";
                        $result = $conn->query($requete_sql);

                        while($tuple = $result->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                            $nom = $tuple['nom_p'];
                            $prenom = $tuple['prenom_p'];
                            $date_n = $tuple['date_naissance'];
                            $resultat_t = $tuple['resultat'];}
                            
                    }
                      //Clôture de la connexion
                      $conn = null;
                    } catch (PDOException $e) {
                        echo "Erreur ! " . $e->getMessage() . "<br/>";
                    }
                ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    
     <!-- Required meta tags-->
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Créer</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/creat_style.css" rel="stylesheet" media="all">

<link rel="stylesheet" type="text/css" href="css/result.css">
    <!--===============================================================================================-->
    

</head>

<body>
     <!-- HEADER DESKTOP-->
     <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header3-wrap">
                <div class="header__logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="CoolAdmin" class="logol" style="height:52px; weight:250px"/>
                    </a>
                </div>

            </div>
    </header>
    <!-- END HEADER DESKTOP-->

<div class="card card-4">
<div class="card-body">
                <center><h1 class="title">Résultat de votre test covid</h1><hr class="hr"></center><br>
                <?php
                    echo "<br><br><br><h2> NOM:  ".$nom."</h2><br>";
                    echo "<h2> PRENOM:  ".$prenom."</h2><br>";
                    echo "<h2> DATE NAISSANCE:  ".$date_n."</h2><br>";
                    echo "<h2> Résultat du test:".$resultat_t."</h2><br><br>";
                ?>
                <style type="text/css">
                    .title{
                      font-size: 40px;
                      line-height: 3;
                      margin: 20px;
                    }
                    .hr{
                      border: 2px solid grey;
                      border: 4px solid #BBBBBB;
                      border-radius: 5px;
                    }
                </style>


                <button class="btn btn-primary hidden-print" onclick="window.print()">
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                </div>
</body>

</html>