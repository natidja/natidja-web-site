<?php include("Auth_pub.php"); ?>
<?php  

                  $pseudo = $_POST["pseudo"];
                  $mdp = $_POST["pwd"];
                  try {
                    
            
                    //Récupération de tous les utilisateurs
                    $requete_sql = "select * from labo where nom_labo ='$pseudo' and pwd ='$mdp'";

                    $result = $conn->query($requete_sql); 
                    if($result->rowCount() == 0){
                    //Authentification échouée !!!
                    header("Location: login_labo.php");
                        die("Erreur de nom d'utilisateur ou de mot de passe !!");
                    } else {
                        $requete_sql = "select * from labo where nom_labo ='$pseudo' and pwd ='$mdp'";
                        $result = $conn->query($requete_sql);

                        while($tuple = $result->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                            $nom = $tuple['nom_labo'];
                            $wilaya = $tuple['wilaya'];
                            
                        }

                        $req_sql3 = "SELECT count(*) as 'nbr' from test where resultat = 'positif'";
                $res = $conn->query($req_sql3);

                while($tup = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                    $positif = $tup['nbr'];
                }



                $req_sql4 = "SELECT count(*) as 'nbr' from test where resultat = 'negatif'";
                $res = $conn->query($req_sql4);

                while($tup = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                    $negatif = $tup['nbr'];
                }


                $req_sql5 = "SELECT count(*) as 'nbr' from test where resultat = 'attente'";
                $res = $conn->query($req_sql5);

                while($tup = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                    $attente = $tup['nbr'];
                }
                    
                      /* $query_r = mysqli_query($conn," SELECT * FROM test ");

                        $row = mysqli_num_rows($query_r);
                        echo '<h1>'.$row.'</h1>';

                        $requete1 = "select * from test where resultat = 'positif' ";
                        $positif = $conn->query($requete1);
                        $$arrLength = count($positif);
                        echo $number;*/


                        $requete_l= "select * from patient ";
                                    $result_l = $conn->query($requete_l);
                        
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

    <!-- Main CSS-->
    <link href="css/labo_home_style.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo" style="margin-left:25px;">
                        <a href="#">
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
                                    <a class="js-acc-btn" href="#" style="text-decoration: none;"> 
                                        </a>
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
                                            <a href='login_labo.html' alt='Broken Link' style="text-decoration: none;">
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

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" />
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
                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">john doe</a>
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
                                        <a href="#">john doe</a>
                                    </h5>
                                    <span class="email">johndoe@example.com</span>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="#">
                                    <i class="zmdi zmdi-power"></i>Déconnecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><?php
                             echo $negatif; 
                
                             ?></h2>
                                <span class="desc">CAS NÉGATIVE</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><?php
                             echo $attente; 
                
                             ?></h2>
                                <span class="desc">EN ATTENTE</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">
                                <?php
                             echo $positif; 
                
                             ?>
                             </h2>
                             
                                <span class="desc">CAS POSITIVE</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-data__tool">
                                <form class="au-form-icon--sm" action="" method="post">
                                    <input class="au-input--w300 au-input--style2" type="text" placeholder="Chercher un malade">
                                    <button class="au-btn--submit2" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                </form>
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small ">
                                    <i class="zmdi zmdi-plus"></i><a href="creat.php" alt='Broken Link ' style="color: white;">Ajouter</a></button>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>nom</th>
                                            <th>prenom</th>
                                            <th>sexe</th>
                                            <th>date de naissance</th>
                                            <th>resultat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    

                        while($tuple = $result_l->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                            $nom_p = $tuple['nom_p'];
                            $prenom_p = $tuple['prenom_p'];
                            $sexe = $tuple['sexe'];
                            $date_naissance = $tuple['date_naissance'];
                            $resultat_p = $tuple['resultat'];

                            echo '<tr class="tr-shadow">
                            <td>'.$nom_p.'</td><td>'
                                .$prenom_p.
                            '</td>
                            <td class="desc">'.$sexe.'</td>
                            <td>'.$date_naissance.'</td>
                            <td>
                                <span class="status--waiting">'.$resultat_p.'</span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Ajouter le résultat">
                                        <i class="zmdi zmdi-plus-circle"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Éditer">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                        <i class="zmdi zmdi-delete"></i>
                                        
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>';
                            
                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->


        </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
message.txt
17 KB