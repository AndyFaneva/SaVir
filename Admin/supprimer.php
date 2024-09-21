<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
if (isset($_POST['changer'])) {
    $user_id = $_POST['changer'];
    $con->exec("DELETE FROM stand WHERE id=$user_id");
header("location:Gstand.php");
}
?>
