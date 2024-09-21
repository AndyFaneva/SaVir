<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
if (isset($_POST['sup'])) {
    $user_id = $_POST['sup'];
    $con->exec("DELETE FROM universiter WHERE id=$user_id");
header("location:Gprojet.php");
}
?>
