<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Labo-Home</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/insert_test.css" rel="stylesheet">
    </head>
<body>
    <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo" style="margin-left:25px;">
                        <a href="index.php">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" height="90%" width="180px" />
                        </a>
                    </div>
                </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div>
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" height="60px" width="170px" style="margin-top: 7px;"  />
                        </a>
                        </button>
                    </div>
                </div>
            </div>

        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->


    <div class="cards">
        <div class="card card-1">
            <center><h1 class="title">Votre résultats</h1></center><br>
            <div>
                 <!-- <h3 style="text-align:center;">www.natidja.com<br></h3> -->
                <?php
                    include("Auth_pub.php");
                    $_SESSION["pseudo_pat"] = $_POST["user"];
                    $_SESSION["mdp_pat"] = $_POST["pass"];
                     try{
                     
                     $req_sql = "SELECT * FROM patient WHERE pseudo='$_SESSION[pseudo_pat]' and mdp='$_SESSION[mdp_pat]'";
                     $res = $conn->query($req_sql);
                     if($res->rowCount() == 0){
                        //Authentification échouée !!!
                        header("Location: index.php");
                        die("Erreur de nom d'utilisateur ou de mot de passe !!");
                    } 
                    else {
                     while($tuple = $res->fetch(PDO::FETCH_ASSOC)){
                         $nom_p = $tuple['nom_p'];
                         $prenom_p = $tuple['prenom_p'];
                         }
                        echo "<br/><center>Nom: &nbsp;" . $nom_p . "<br/> Prenom: &nbsp;" . $prenom_p . "</center>";
                        $req_sql2 = "SELECT * FROM test where nom_p='$nom_p' and prenom_p='$prenom_p' order by id_test desc";
                        $res2 = $conn->query($req_sql2);
                        while($tuple2 = $res2->fetch(PDO::FETCH_ASSOC)){
                            $resultat= $tuple2['resultat'];
                            $avatar= $tuple2['avatar'];
                            $date_test = $tuple2['date_test'];
                            if($resultat!="en attente"){
                                ?> 
                                <center style="margin-top:30px">
                                <p>test :<?= $date_test ?> :<?= $resultat ?>
                                <br>pour plus d'information<a href="resultat/<?=$avatar?>"> click ici</a></p> 
                                </center>
                                <?php
                            }
                            else{
                                ?> 
                                <center style="margin-top:30px">
                                <p>test :<?= $date_test ?> :<?= $resultat ?></p> 
                                </center>
                                <?php
                            }
                
             } }$conn = null;

                     } catch (PDOException $e) {
                         echo "Erreur ! " . $e->getMessage() . "<br/>";
                     }?>
            </div>

    </div>
</div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js"></script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
        <style type="text/css">  
        body{
        background-color:#e5e5e5;
        }
      .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        }
      
      .card {
        margin: 20px;
        padding: 20px 60px 20px 60px;
        min-height: 200px;
        display: grid;
        grid-template-rows: 20px 50px 1fr 50px;
        border-radius: 10px;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
        transition: all 0.2s;
        justify-content: center;
        }
      
      .card:hover {
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
        transform: scale(1.01);
        }
      
      .card__link,
      .card__exit,
      .card__icon {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
        }
      
      .card__link::after {
        position: absolute;
        top: 25px;
        left: 0;
        content: "";
        width: 0%;
        height: 3px;
        background-color: rgba(255, 255, 255, 0.6);
        transition: all 0.5s;
        }
      
      .card__link:hover::after {
        width: 100%;
        }
      
      .card__exit {
        grid-row: 1/2;
        justify-self: end;
        }
      
      
      .card__title {
        grid-row: 3/4;
        font-weight: 400;
        color: #ffffff;
        }
      
      
      
      /* CARD BACKGROUNDS */
      
      .card-1 {
        background: #ffffff;
        }
      
      
      /* RESPONSIVE */
      
        .cards {
          justify-content: center;
        }
        .title{
            font-size: 40px;
        }

        @media (max-width: 425px) {
        .title{
        font-size: 25px;
        }
}
    
  </style>
</body>
</html>