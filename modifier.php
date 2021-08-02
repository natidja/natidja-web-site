<?php session_start(); ?>
<?php 
           include("Auth_pub.php");
            try {
                $requete_sql = "select * from labo where adresse_email ='$_SESSION[pseudo_labo]' and pwd ='$_SESSION[mdp_labo]'";

                        $result = $conn->query($requete_sql);

                        while($tuple = $result->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                            $id_labo= $tuple['id_labo'];
                            $nom = $tuple['nom_labo'];
                            $wilaya = $tuple['wilaya'];
                            $email = $tuple['adresse_email'];
                        }
                        $conn = null;
                    } catch (PDOException $e) {
                        echo "Erreur ! " . $e->getMessage() . "<br/>";
                    }
?>
<?php
include("Auth_pub.php");
//récuperation id test de la ligne

$id_test = $_POST['edit_id'];

//récuperation password client avant suppression
$requete_p= "select * from patient where id_test='$id_test' ";
$result_p = $conn->query($requete_p);
while($tuple = $result_p->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
    $mdp = $tuple['mdp'];
    
}

//récuperation données patient 
$requete_m= "select * from test where id_test='$id_test' ";
$result_m = $conn->query($requete_m);
    
while($tuple = $result_m->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
    $nom_p = $tuple['nom_p'];
    $prenom_p = $tuple['prenom_p'];
    $sexe = $tuple['sexe'];
    $date_naissance = $tuple['date_naissance'];
    $resultat_p = $tuple['resultat'];
    $type_t=$tuple['type'];
}


//suppression des deux tables 
$requete_sql = "DELETE FROM patient where id_test = '$id_test'";

        $result = $conn->query($requete_sql);

    $requete_sql2 = "DELETE FROM test where id_test = '$id_test'";

    $result2 = $conn->query($requete_sql2);

    
?>

<!DOCTYPE html>
<html lang="en">

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
                    <a href="labo_home.php">
                        <img src="images/icon/logo-white.png" alt="CoolAdmin"  height="90%" width="180px"/>
                    </a>
                </div>

                <div class="header__tool">

                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="image">
                                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#" style="text-decoration: none;"><?php echo$nom;?></a>
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
                                            <a href="#" style="text-decoration: none;"><?php echo$nom;?></a>
                                        </h5>
                                        <span class="email"><?php echo $_SESSION["pseudo_labo"];?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__footer">
                                        <a href='labo_home.html' Broken Link  style="text-decoration: none;">
                                            <i class="zmdi zmdi-home"></i>Home</a>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href='login_labo.html ' Broken Link  style="text-decoration: none;">
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
                    <form method="POST" action="insert_test_edit.php">
                     
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NOM</label>
                                    <input class="input--style-4" type="text" name="nom_p" value="<?php echo $nom_p; ?>"  >
                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">PRENOM</label>
                                    <input class="input--style-4" type="text" name="prenom_p"value="<?php echo $prenom_p; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">DATE DE NAISSANCE</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="date" name="date_naissance"value="<?php echo $date_naissance; ?>">
                                        
                                    </div>
                                </div>
                            </div>

                            <?php if($sexe =='homme'){
                                        echo'<div class="col-2">
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
                                        </div>';
                                }else{
                                       echo' <div class="col-2">
                                            <div class="input-group">
                                                <label class="label">sexe</label>
                                                <div class="p-t-10">
                                                <label class="radio-container m-r-45">H
                                                        <input type="radio" checked="checked" value="H" name="sexe">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio-container">F
                                                        <input type="radio" checked="checked" value="F"name="sexe">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>';
                                }?>
                        </div>
                        <?php if($type_t == 'antigénique')
                        {
                            echo('<div class="input-group">
                            <label class="label">Type de test</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    
                                    <option id="antigénique" selected="selected" >antigénique</option>
                                    <option id="virologique">virologique</option>
                                    <option id="sérologique">sérologique</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>');
                        }
                        elseif($type_t == 'virologique')
                        {
                            echo('<div class="input-group">
                            <label class="label">Type de test</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    
                                    <option id="antigénique"  >antigénique</option>
                                    <option id="virologique" selected="selected" >virologique</option>
                                    <option id="sérologique">sérologique</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>');
                        }
                        else
                        {
                            echo('<div class="input-group">
                            <label class="label">Type de test</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    
                                    <option id="antigénique"  >antigénique</option>
                                    <option id="virologique"  >virologique</option>
                                    <option id="sérologique"selected="selected">sérologique</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>');
                        }
                        ?>
                        <?php if($resultat_p =='en attente'){
                        echo'
                        <div class="input-group">
                            <label class="label">résultat de test</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="resultat">
                                    <option id="en attente" selected="selected">en attente</option>
                                    <option id="negatif">negatif</option>
                                    <option id="positif">positif</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>';}
                        elseif($resultat_p =='negatif'){
                        echo'
                        <div class="input-group">
                            <label class="label">résultat de test</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="resultat">
                                    <option id="en attente">en attente</option>
                                    <option id="negatif" selected="selected">negatif</option>
                                    <option id="positif">positif</option>
                                </select>
                                <div class="select-dropdown"></div>';}
                        else{
                            echo'<div class="input-group">
                        <label class="label">résultat de test</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="resultat">
                                <option id="en attente">en attente</option>
                                <option id="negatif">negatif</option>
                                <option id="positif" selected="selected">positif</option>
                            </select>
                            <div class="select-dropdown"></div>'; }?>
                        </div><br><br>
                        <label class="custom-file-upload" style=" font-family: calibri;
                                        padding-right:30.6px;
                                        padding-left:30.6px;
                                        padding-top:17px;
                                        padding-bottom:17px;
                                        -webkit-border-radius: 25px;
                                        -moz-border-radius: 5px;
                                        border: 1px  #BBB; 
                                        text-align: center;
                                        background-color: #DDD;
                                        cursor:pointer;
                                        color:white">
                                 <input type="file" name="avatar" id="avatar" style=" display: none;">
                                      importer le resultat
                            </label>
                        </div>

                        <div class="p-t-15">

                        <?php echo '<form action="insert_test_edit.php" method="POST">
                                    <input type="hidden" name="mdp" value="'.$mdp.'  ">
                                    <button class="btn btn--radius-2 btn--blue" type="submit">
                                Modifier
                            </button>
                                    </form>'; ?>
                        
                        
                                    
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
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