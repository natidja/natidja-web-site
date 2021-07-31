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
                <div class="header__logo">
                    <a href="labo_home.php">
                        <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                    </a>
                </div>

                <div class="header__tool">

                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="image">
                                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#" style="text-decoration: none;">john doe</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#" style="text-decoration: none;">john doe</a>
                                        </h5>
                                        <span class="email">johndoe@example.com</span>
                                    </div>
                                </div>

                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__footer">
                                        <a href='labo_home.php' Broken Link style="text-decoration: none;">
                                            <i class="zmdi zmdi-home"></i>Home</a>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href='login_labo.php ' Broken Link style="text-decoration: none;">
                                            <i class="zmdi zmdi-power"></i>Déconnecter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    <!-- END HEADER DESKTOP-->


    <div class="cards">
        <div class="card card-1">
            <center><h1 class="title">Votre informations</h1></center><br>
            <div>
                <h3 style="text-align:center;">www.natidja.com<br></h3>
                <?php
                    try{
                    include("Auth_pub.php");
                    $req_sql = "SELECT * FROM patient WHERE id_test= (SELECT MAX(id_test) FROM test)";
                    $result = $conn->query($req_sql);
                    while($tuple = $result->fetch(PDO::FETCH_ASSOC)){
                        $nom_p = $tuple['nom_p'];
                        $prenom_p = $tuple['prenom_p'];
                        $pseudo= $tuple['pseudo'];
                        $mdp= $tuple['mdp'];
                    }
                    echo "Nom: &nbsp;" . $nom_p . "<br/> Prenom: &nbsp;" . $prenom_p . "<br/>";
                    echo "Pseudo: &nbsp;" . $pseudo . "<br/> Mots De Passe: &nbsp;" . $mdp . "<br/>";
                    $conn = null;

                            } catch (PDOException $e) {
                                echo "Erreur ! " . $e->getMessage() . "<br/>";
                            }
                ?>
    </div>

    <div style="text-align:center; margin-top:25px ">
          <button class="btn btn-primary hidden-print" onclick="window.print()" ><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
          <a href="labo_home.php" style="margin-left:25px ;">
              <button class="btn btn-primary hidden-print" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
          </a>
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
            margin: 20px;
        }
        @media (max-width: 425px) {
        .title{
        font-size: 25px;
        }
    
  </style>
</body>
</html>