<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
if (isset($_POST['changer'])) {
    $user_id = $_POST['changer'];
    $sql = "UPDATE universiter SET validation=:val WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->execute([
        ':val'=>"oui",
        ':id'=>$user_id
    ]);
    header("location:Guniv.php");
}
?>
