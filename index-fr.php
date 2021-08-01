<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div style="margin: auto;">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/logo_login.png" alt="IMG">
                    </div>
                </div>
                <form class="login100-form validate-form" style="margin: auto;" action="result.php" method="POST">
                    <div style="height:50%;">
                        <span class="login100-form-title">
                            <b>Résultat De Votre Test </b>
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="un identifiant Valide est requis">
                            <input class="input100" type="text" name="user" placeholder="identifiant" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100" style="text-align:right">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="mot de passe est requis">
                            <input class="input100" type="password" name="pass" placeholder="Mot de passe" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                <b>DECOUVRIR VOTRE RESULTAT</b>
                                </button>
                        </div>

                        <div class="text-center " style="padding-top:60px">
                            <a class="txt2" href="login_labo.php" style="font-size:17px">
                                Je suis un laboratoire
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
                <div class="logo_trad">
                    <a href="index.php"><img src="images/fr-language.png" alt="langue" width="30" height="30"></a>
                </div>
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