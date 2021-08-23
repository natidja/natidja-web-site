<?php session_start();  ?>
<?php

                  include("Auth_pub.php");
                  try {

                    //Récupération de tous les utilisateurs
                     $requete_sql = "select * from labo where adresse_email='$_SESSION[pseudo_labo]' and pwd ='$_SESSION[mdp_labo]'";

                    $result = $conn->query($requete_sql);
                    if($result->rowCount() == 0){
                    //Authentification échouée !!!
                    header("Location: login_labo.php");
                        die("Erreur de nom d'utilisateur ou de mot de passe !!");
                    } else {
                        $requete_sql = "select * from labo where adresse_email ='$_SESSION[pseudo_labo]' and pwd ='$_SESSION[mdp_labo]'";

                        $result = $conn->query($requete_sql);

                        while($tuple = $result->fetch(PDO::FETCH_ASSOC)){//Retourner des tableaux associatifs
                            $id_labo= $tuple['id_labo'];
                            $nom = $tuple['nom_labo'];
                            $wilaya = $tuple['wilaya'];
                            $email = $tuple['adresse_email'];
                        }


                        $requete_l= "SELECT * from test WHERE id_labo='$id_labo' order by id_test desc ";
                        $result_l = $conn->query($requete_l);
                    }
                      //Clôture de la connexion
                      $conn = null;
                    } catch (PDOException $e) {
                        echo "Erreur ! " . $e->getMessage() . "<br/>";
                    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natidja</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/labo_home_style.css" rel="stylesheet" media="all">

    <style>
        a {
          color: #5a5c66;
          text-decoration: none;
        }

        a:hover {
          color:orange;
          background-color: transparent;
          text-decoration: none;
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              <!-- HEADER DESKTOP-->
      <header class="header-desktop3 d-none d-lg-block">
          <div class="section__content section__content--p35">
              <div class="header3-wrap">
                  <div class="header__logo" style="margin-left:25px;">
                      <a href="labo_home.php">
                          <img src="images/icon/logo-white.png" alt="CoolAdmin" height="90%" width="180px"/>
                      </a>
                  </div>

                  <div class="header__tool">

                      <div class="account-wrap">
                          <div class="account-item account-item--style2 clearfix js-item-menu">
                              <!-- <div class="image">
                                  <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                              </div> -->
                              <div class="content">
                                  <a class="js-acc-btn" href="#" style="text-decoration: none;">
                                    <?php echo$nom;?>
                                  </a>
                              </div>
                              <div class="account-dropdown js-dropdown">
                                  <div class="info clearfix">
                                      <!-- <div class="image">
                                          <a href="#">
                                              <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                          </a>
                                      </div>
                                      <div class="content"> -->
                                          <h4 class="name">
                                              <?php echo$nom;?>
                                          </h4>
                                          <span class="email"><?php echo$_SESSION["pseudo_labo"];?> </span>
                                      <!-- </div> -->
                                  </div>
                                  <div class="account-dropdown__body">
                                      <div class="account-dropdown__footer">
                                          <a href='login_labo.php' alt='Broken Link' style="text-decoration: none;">
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
                      <a class="logo" href="labo_home.php">
                          <img src="images/icon/logo-white.png" alt="CoolAdmin" height="50%" width="100px" />
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
                          <a class="js-acc-btn" href="#"><?php echo$nom;?> </a>
                      </div>
                      <div class="account-dropdown js-dropdown">
                          <div class="info clearfix">
                              <div class="image">
                                  <a href="labo_home.php">
                                      <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                  </a>
                              </div>
                              <div class="content">
                                  <h5 class="name">
                                      <a href="labo_home.php"><?php echo$nom;?> </a>
                                  </h5>
                                  <span class="email"><?php echo$_SESSION["pseudo_labo"];?> </span>
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
                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-top:30px; ">
                        <h1 class="h3 mb-0 text-gray-800"><a href="labo_home.php">Table des Patients</a></h1>
                        <a href="creat.php" alt='Broken Link ' style="color: white;">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small ">
                            <i class="zmdi zmdi-plus"></i>Ajouter</button></a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-data2" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>DATE DE TEST</th>
                                            <th>NOM</th>
                                            <th>PRENOM</th>
                                            <th>SEXE</th>
                                            <th>DATE DE NAISSANCE</th>
                                            <th>RESULTAT</th>
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
                              $date_test = $tuple['date_test'];


                              echo '<tr class="tr-shadow">
                              <td>'.$date_test.'</td>
                              <td>'.$nom_p.'</td>
                              <td>'.$prenom_p.'</td>';
                              if($sexe=="homme") echo'<td class="desc" style="color:blue">'.$sexe.'</td>';
                              else  echo'<td class="desc" style="color:#E05297">'.$sexe.'</td>';


                              echo'<td>'.$date_naissance.'</td>';

                              if($resultat_p=="pret"){
                                  echo'
                                  <td id="result">
                                      <span class="status--waiting" style="color:green" ><b>'.$resultat_p.'</b></span>
                                  </td>';
                              }else{
                                  echo'
                                  <td id="result" style="color:orange">
                                      <span class="status--waiting" ><b>'.$resultat_p.'</b></span>
                                  </td>';
                              }
                                  echo'<td>
                                  <div class="table-data-feature">
                                      <form action="modifier.php" method="POST" style="margin-right:5px;">
                                          <input type="hidden" name="edit_id" value="'.$tuple['id_test'].'">
                                          <button type="submit" name="edit_btn " class="item" data-toggle="tooltip" data-placement="top" title="editer">
                                          <i class="zmdi zmdi-edit"></i> </button>
                                      </form>

                                      <form action="supprimer.php" method="POST">
                                      <input type="hidden" name="delete_nomp" value="'.$tuple['id_test'].'">
                                      <button type="submit" name="delete_btn " class="item" data-toggle="tooltip" data-placement="top" title="supprimer">
                                      <i class="zmdi zmdi-delete"></i> </button>
                                      </form>
                                  </div>
                              </td>
                          </tr>';
                          } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

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

</body>

</html>
