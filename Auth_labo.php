<?php session_start() ?>
<?php
$config=array(
'DB_HOST'=>'localhost',
'DB_USERNAME'=>'root',
'DB_PASSWORD'=>'',
'DB_DATABASE'=>'natija'
);

try
{
    $host=$config['DB_HOST'];
    $dbname=$config['DB_DATABASE'];
    $conn= new PDO("mysql:host=$host;dbname=$dbname",$config['DB_USERNAME'],$config['DB_PASSWORD']);
    $_SESSION["pseudo_labo"] = $_POST["email"];
    $_SESSION["mdp_labo"] = $_POST["pwd"];

    $req_sql = "select nom_labo from labo where adresse_email='$_SESSION[pseudo_labo]'";
    $resultat = $conn->query($req_sql);
    $tuple = $resultat->fetch(PDO::FETCH_ASSOC);
        $nom = $tuple['nom_labo'];
        $_SESSION["nom_labo"] = $nom;
    header("Location: labo_home.php");  
}

catch(PDOException $e)
{
    echo "Error:".$e->getMessage();
}
?>