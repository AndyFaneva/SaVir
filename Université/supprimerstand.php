<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
if (isset($_POST['action'])) {
    $user_id = $_POST['action'];
    $con->exec("DELETE FROM stand WHERE id=$user_id");
header("location:accueil.php");
}else{
    echo "non";
}
?>
