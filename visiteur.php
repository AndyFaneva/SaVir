<?php
session_start();
    include "Connexion/connexion.php";
    if(isset($_POST['connecter'])){
        if(!empty($_POST['pseudoentrez'])){
        $pseudoentrer=$_POST['pseudoentrez'];
        $requete=$con->prepare("SELECT *  FROM visiteur WHERE pseudo=?");
        $requete->execute(Array($pseudoentrer));
        $user=$requete->fetch();
        if($requete->rowCOUNT()>0){
            $_SESSION['pseudo']=$pseudoentrer;
            header("location:Visiteur/accueil.php");
        }}elseif(empty($_POST['pseudoentrez'])){
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
    <style>
           @media only screen and (max-width: 500px){
                .setion-admin{
                    width:100%;
                    display:flex;
                    border-radius:0;
                }
                .form{
                    padding-left:10%;
                    padding-right:100%;
                    width:100%;
                }  
                .div-1-admin{
                    display:none;
                }
                .login{
                    margin-top:20%;
                    display:flex;
                    flex-direction:column;
                    padding:10% 10% 10% 10%;
                    width:200%;
                }
           }
    </style>
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
    <section class="section-admin">
        <div class="div-1-admin">
            <h1  class="logo1">SaVir.</h1>
        </div>
        <div class="form">
                <a href="Index.html"><img src="Image/back.png" style="width: 30;"></a>
            <form action="visiteur.php" method="post" class="login">
                <h1>Espace étudiant</h1>
                <?php
                    if(isset($_POST['connecter'])){
                        echo "<input type='text' placeholder='Votre pseudo' name='pseudoentrez'>";
                    }else{
                        echo "";
                    }
                ?>
                <input type="submit" value="Se connecter" class="submit" name="connecter">
                <input type="submit" value="S'inscrire" class="submit" name="inscrire" onclick="ouvrirFenetre()"><br>
                <g>Inscrivez vous pour visité le salon des étudiants</g>
            </form>

            </div>
    </section>
</body>
</html>
</body>
</html>