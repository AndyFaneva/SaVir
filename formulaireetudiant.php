<?php
    include "Connexion/connexion.php";
    if(isset($_POST['inscrire'])){
        $nom=$_POST['mail'];
        $pseudo=$_POST['nom'];
        $requete=$con->prepare("INSERT into VISITEUR (mail,pseudo) VALUES (?,?)");
        $requete->execute(array($nom,$pseudo));
        if(!empty($_POST['mail'])){
            $message = "Vous pouvez maintenant visité le salon";
        }else{
            
        }
        
    }
?>
<html lang="en">
<script>
        function ouvrirFenetre() {
          // Spécifiez les dimensions de la nouvelle fenêtre
          var largeur = 400;
          var hauteur = 350;
          // Calculez la position centrale de la fenêtre
          var left = (screen.width - largeur) / 2;
          var top = (screen.height - hauteur) / 2;
          // Options de la nouvelle fenêtre
          var options = 'width=' + largeur + ',height=' + hauteur + ',top=' + top + ',left=' + left;
          // Ouvrir une nouvelle fenêtre avec le formulaire
          var nouvelleFenetre = window.open('formulaireetudiant.php', '_blank', options);
          // Focus sur la nouvelle fenêtre
          if (window.focus) {
            nouvelleFenetre.focus();
          }
        }
      </script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace étudiant</title>
    <link rel="icon" href="Image/logo.png">
</head>
<body>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/Styles.css">
    <title>Espace administrateur</title>
</head>
<body>
        <div  style="background-color:black;color:white;text-align:center;height:100%">
            <form action="formulaireetudiant.php" method="post" class="login" style="border:solid 1px white;padding-top:10%;padding-bottom:50%">
                <h1>Espace étudiant</h1>
                <label for="mail">Mail:</label>
                <input type="email" name="mail" placeholder="mail@gmail.com"><br>
                <label for="nom">Pseudo:</label>
                <input type="text" name="nom" placeholder="Votre pseudo">
                <input type="submit" value="S'inscrire" class="submit" name="inscrire"><br>
                <i style="color:green">
                <?php
                    if(isset($message)){
                        echo $message;
                    }
                ?>
                </i><br>
                <g>Inscrivez vous pour visité le salon des étudiants</g>
            </form>
            <footer style="float:right;font-size: 9;">
                <a>Faneva_ANDRIANAINA &copy;</a>
            </footer>
        </div>
</body>
</html>
</body>
</html>