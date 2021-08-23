<?php session_start() ?>
<?php
$config=array(
'DB_HOST'=>'localhost',
'DB_USERNAME'=>'root',
'DB_PASSWORD'=>'',
'DB_DATABASE'=>'natija'
);

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        try
            {

                $host=$config['DB_HOST'];
                $dbname=$config['DB_DATABASE'];
                $conn= new PDO("mysql:host=$host;dbname=$dbname",$config['DB_USERNAME'],$config['DB_PASSWORD']);
                //new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
                $_SESSION["pseudo_labo"] = $_POST["email"];
                $_SESSION["mdp_labo"] = $_POST["pwd"];
                header("Location: labo_home.php");
            }

            catch(PDOException $e)
            {
                echo "Error:".$e->getMessage();
            }
    }
    else{
        header("Location: login_labo.php");
    }

?>
