<?php
// Connexion à la base de données
include("../Connexion/connexion.php");

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    $sql = "SELECT image1, image1type FROM standmention WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Afficher la photo
        header("Content-type: " . $row['image1type']);
        echo $row['image1'];
    } else {
        echo "Aucune photo trouvée pour cet utilisateur.";
    }
} else {
    echo "ID utilisateur non spécifié.";
}
?>
