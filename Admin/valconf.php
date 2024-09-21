<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
if (isset($_POST['changer'])) {
    $user_id = $_POST['changer'];
    $sql = "UPDATE conference SET validation=:val WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute([
        ':val'=>"oui",
        ':id'=>$user_id
    ]);
    header("location:Gprojet.php");
}
if (isset($_POST['changer1'])) {
    $user_id = $_POST['changer1'];
    $sql = "UPDATE admin SET validation=:val WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute([
        ':val'=>"oui",
        ':id'=>$user_id
    ]);
    header("location:Guser.php");
}
?>
