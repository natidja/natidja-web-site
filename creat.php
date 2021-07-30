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

</head>

<body>
    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header3-wrap">
                <div class="header__logo">
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

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Nouveau patient</h2>
                    <?php
                        if(array_key_exists('creat-btn', $_POST)) {
                            creat();
                        }else{ }

                        function creat() {
                            date_default_timezone_set('Africa/Algiers');

                            $nom_bdd = "natidja";
                            $server = "localhost";
                            $user = "root";
                            $password = "";

                            $nom_p = $_POST["nom_p"];
                            $prenom_p = $_POST["prenom_p"];
                            $date_naissance = $_POST["date_naissance"];
                            $sexe = $_POST["sexe"];

                                if(!empty($_POST['subject'])) {
                                    $type = $_POST['subject'];
                                    if($type == "antigénique"){
                                    $type = "antigénique";
                                    }
                                    elseif($type == "virologique"){
                                        $type = "virologique";
                                    }
                                    else{
                                        $type = "sérologique";
                                    }
                                } else {
                                    $type="";
                                    }

                                if(!empty($_POST['resultat'])) {
                                    $resultat = $_POST['resultat'];
                                    if($resultat == "en attente"){
                                    $resultat = "en attente";
                                    }

                                    elseif($resultat == "negatif"){
                                        $resultat = "negatif";
                                    }

                                    else{
                                        $resultat = "positif";
                                    }
                                } else {
                                    $resultat="";
                                }


                                if($sexe == "H"){
                                    $sexe = "homme";
                                } else{
                                    $sexe = "femme";
                                }
                                
                                if($nom_p==''||$prenom_p==''||$date_naissance==''
                                ||$sexe==''||$type==''||$resultat==''){
                                    echo'<h4 style="color:red; margin-bottom: 15px;">veuillez remplir le formulaire correctement svp!</h4>';
                                }

                                else{
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


                                    $req_sql3 = "SELECT count(*) as 'nbr' from test where resultat = 'positive'";
                                    $res = $connexion->query($req_sql3);

                                    while($tup = $res->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                                        $positif = $tup['nbr'];
                                    }
                                    //Clôture de la connexion
                                    echo '<script language="Javascript">
                                    document.location.replace("insert_test.php");
                                    </script>';
                                    $connexion = null;

                                    } catch (PDOException $e) {
                                        echo "Erreur ! " . $e->getMessage() . "<br/>";
                                    }
                                }
                        }
                    ?>
                    <form method="POST" name="formSaisie" >
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NOM</label>
                                    <input class="input--style-4" type="text" name="nom_p" id="nom_p">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">PRENOM</label>
                                    <input class="input--style-4" type="text" name="prenom_p" id="prenom_p">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">DATE DE NAISSANCE</label>
                                        <input class="input--style-4 " type="date" name="date_naissance" id="date_naissance">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">sexe</label>
                                    <div class="p-t-10">
                                    <label class="radio-container m-r-45">H
                                            <input type="radio" checked="checked" value="H" name="sexe">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">F
                                            <input type="radio" value="F"name="sexe">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Type de test</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject" id="subject">
                                    <option disabled="disabled" selected="selected"  >Choisir une option</option>
                                    <option id="antigénique" >antigénique</option>
                                    <option id="virologique" >virologique</option>
                                    <option id="sérologique" >sérologique</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">résultat de test</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="resultat"  id="resultat">
                                <option disabled="disabled" selected="selected" >Choisir une option</option>
                                    <option id="attente">en attente</option>
                                    <option id="negatif">negatif</option>
                                    <option id="positif">positif</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <p id="error_msg" style="color:red;"></p>
                        <div class="p-t-15">
                        <button class="btn btn--radius-2 btn--blue" type="submit" name="creat-btn" value="creat-btn">
                                Créer
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="form-popup" id="myForm" style="display:none";>
        <form  class="form-container">
            <h2>formulaire remplit avec succes</h2><br><br>
            <button type="submit" class="btn" onclick="window.print()">imprimer l'identifiant et le mot de passe du patient</button>
            <button type="button" class="btn cancel" onclick="closeForm()">fermer</button>
        </form>
    </div>
                            

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
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
    <script src="js/global.js"></script>
    <script src="js/main.js"></script>

    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->