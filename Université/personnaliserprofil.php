<?php
    session_start();
    include("../Connexion/connexion.php");
        $email=$_SESSION['mailuniv'];
        $mdp=$_SESSION['passworduniv'];
    include("../Connexion/connexion.php");
    if (isset($_POST['creer'])) {
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $mail=$_SESSION['mailuniv'];
            $mdp=$_SESSION['passworduniv'];
            $contact=$_POST['contactuniv'];
            $imageType = $_FILES['photo']['type'];
            $imageData = file_get_contents($_FILES['photo']['tmp_name']);
            $nom = $_POST['nomuniv'];
            $adresse = $_POST['adresseuniv'];
            $descri=$_POST['descriptionuniv'];
            $inserer1=$con->prepare("INSERT INTO universiter(mailuniv,passworduniv,contactuniv,nomuniv,adresseuniv,descriptionuniv,photo,photo_type) VALUE(?,?,?,?,?,?,?,?)");
            $inserer1->execute(Array($mail,$mdp,$contact,$nom,$adresse,$descri,$imageData,$imageType));
           
            $req1=$con->prepare("UPDATE universitercon SET lier=:li WHERE mailuniv=:ma");
            $req1->execute([
                    ':li'=>"oui",
                    ':ma'=>$email
            ]);
            $req1=$con->prepare("UPDATE universiter SET validation=:li WHERE mailuniv=:ma");
            $req1->execute([
                    ':li'=>"Non",
                    ':ma'=>$email
            ]);
            $req=$con->prepare("SELECT * FROM universiter WHERE mailuniv=? AND passworduniv=?");
            $req->execute(Array($mail,$mdp)); 
                if ($req->rowCount()>0) {
                    $_SESSION['id'] = $req->fetch()['id'];
                    $_SESSION['mailuniv'] = $mail;
                    $_SESSION['passworduniv'] = $mdp;
                if($req->rowCOUNT() >0 && $vide==true){
                        header("location:Université/personnaliserprofil.php");
                    }else{
                        header("location:Université/accueil.php");
                    }
    }
           header("location:accueil.php");
            }
        }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="../Image/logo.png">
    <title>Créer un Profil d'Université</title>
</head>
<body>

<h2>Créer un Profil d'Université</h2>

<form action="personnaliserprofil.php" method="post"  enctype="multipart/form-data">
    <label for="nomuniv">Nom de l'Université</label>
    <input type="text" id="nom_universite" name="nomuniv" required>

    <label for="contacuni">Contact</label>
    <textarea id="adresse" name="contactuniv" required></textarea>

    <label for="adresseuniv">Localisation</label>
    <textarea id="adresse" name="adresseuniv" required></textarea>

    <label for="descriptionuniv">Description</label>
    <textarea id="description" name="descriptionuniv" required></textarea>

    <label for="photo">Logo de l'Université</label>
    <input type="file" id="logo" name="photo" accept="image/*" required>

    <input type="submit" value="Créer Profil" name="creer">
</form>
<footer >
        <a>Faneva_ANDRIANAINA &copy;</a>
    </footer>
</body>
</html>
