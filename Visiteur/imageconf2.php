<?php
// Connexion à la base de données
include("../Connexion/connexion.php");

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    $sql = "SELECT mentionlogo1, mentionlogotype1 FROM conference WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Afficher la photo
        header("Content-type: " . $row['mentionlogotype1']);
        echo $row['mentionlogo1'];
    } else {
        echo "Aucune photo trouvée pour cet utilisateur.";
    }
} else {
    echo "ID utilisateur non spécifié.";
}
?>
