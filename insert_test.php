<!DOCTYPE html>
<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
<body>
<?php 
    echo "Pseudo: " . $pseudo . "<br/> Mots De Passe: " . $mdp . "<br/>";
?>

<button class="btn btn-primary hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
<form action="labo_home.php" >
<button class="btn btn-primary hidden-print" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> terminé</button>
</form>

</body>
</html>
