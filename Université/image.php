<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
session_start();
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    $sql = "SELECT photo, photo_type FROM universiter WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Afficher la photo
        header("Content-type: " . $row['photo_type']);
        echo $row['photo'];
    } else {
        echo "Aucune photo trouvée pour cet utilisateur.";
    }
} else {
    echo "ID utilisateur non spécifié.";
}
?>
