<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
if (isset($_POST['changer'])) {
    $user_id = $_POST['changer'];
    $sql = "UPDATE stand SET valider=:val WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute([
        ':val'=>"oui",
        ':id'=>$user_id
    ]);
    header("location:Gstand.php");
}
if (isset($_POST['changer1'])) {
    $user_id = $_POST['changer1'];
    $sql = "UPDATE universitercon SET validation=:val WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute([
        ':val'=>"oui",
        ':id'=>$user_id
    ]);
    header("location:Guser.php");
}
?>
