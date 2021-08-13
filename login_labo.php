<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Labo | Natidja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/login_labo_style.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/logo_login_labo.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="Auth_labo.php">
                    <span class="login100-form-title">
						S'IDENTIFIER
					</span>

                    <div class="wrap-input100 validate-input" data-validate="un Nom d'utilisateur Valide est requis">
                        <input class="input100" type="email" name="email" placeholder="Email" id="name" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="mot de passe est requis">
                        <input class="input100" type="password" name="pwd" placeholder="Mot de passe" id="pass" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    <p id="erreur"></p>

                    <div class="container-login100-form-btn">
                            <button class="login100-form-btn" style="color:white; font-family: Poppins-Bold;" type="submit"  >
                            CONNEXION</button>
                    </div>
                    <center>
                      <div style="margin-top:50px;">
                        <a href="https://www.facebook.com/Natidja-705496370304851" target="_blank">
                          <img src="images/icons/facebook.png" alt="Facebook" style="margin:0px 7.5px 0px 7.5px; height:40px; width:40px;">
                        </a>

                        <a href="https://www.instagram.com/natidja.dz/" target="_blank">
                          <img src="images/icons/instagram.png" alt="Instagram" style="margin:0px 7.5px 0px 7.5px; height:40px; width:40px;">
                        </a>

                        <a href="mailto: natidjadz@gmail.com" target="_blank">
                          <img src="images/icons/gmail.png" alt="Google" style="margin:0px 7.5px 0px 7.5px; height:40px; width:40px;">
                        </a>

                        <a href="https://twitter.com/dja_nati" target="_blank">
                          <img src="images/icons/twitter.png" alt="Twitter" style="margin:0px 7.5px 0px 7.5px; height:40px; width:40px;">
                        </a>

                        <a href="https://www.linkedin.com/company/natidja" target="_blank">
                          <img src="images/icons/linkedin.png" alt="linkedin" style="margin:0px 7.5px 0px 7.5px; height:40px; width:40px;">
                        </a>
                      </div>
                    </center>

                    <center>
                      <div style="margin-top:75px;">
                          <a class="txt2" href="index.php">
                              <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i> Je suis un identifiant
                          </a>
                      </div>
                    </center>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>
