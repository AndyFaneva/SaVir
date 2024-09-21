<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
if (isset($_POST['sup'])) {
    $user_id = $_POST['sup'];
    $con->exec("DELETE FROM conference WHERE id=$user_id");
header("location:Gconf.php");
}
if (isset($_POST['sup1'])) {
    $user_id = $_POST['sup1'];
    $con->exec("DELETE FROM admin WHERE id=$user_id");
header("location:Guser.php");
}
if (isset($_POST['sup2'])) {
    $user_id = $_POST['sup2'];
    $con->exec("DELETE FROM universitercon WHERE id=$user_id");
header("location:Guser.php");
}
?>
