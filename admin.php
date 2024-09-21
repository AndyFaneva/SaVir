<?php
    session_start();
    include("Connexion/connexion.php");
    if(isset($_POST['connecter'])){
        $mail=$_POST['mailadmin'];
        $mdp=sha1($_POST['mdpadmin']);
        $req=$con->prepare("SELECT * FROM admin WHERE mailadmin=? AND mdpadmin=?");
        $req->execute(Array($mail,$mdp)); 
            if ($req->rowCount()>0){
                $_SESSION['mailadmin'] = $mail;
                $_SESSION['mdpadmin'] = $mdp;
                if($req->fetch()['validation']=="oui"){
                header("location:Admin/acceuil.php"); }else{
                    $me="Cette administrateur n'est pas approuver";
                }
    }else{
        $message="Mot de passe ou mail incorrecte!";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/Styles.css">
    <link rel="icon" href="Image/logo.png">
    <title>Espace administrateur</title>
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
          var nouvelleFenetre = window.open('formulaire3.php', '_blank', options);
          // Focus sur la nouvelle fenêtre
          if (window.focus) {
            nouvelleFenetre.focus();
          }
        }
      </script>
</head>
<body>
    <section class="section-admin">
        <div class="div-1-admin">
            <h1  class="logo1">SaVir.</h1>
            <p> 
            </p>
        </div>
        <div class="form">
                <a href="Index.html"><img src="Image/back.png" style="width: 30;"></a>
            <form action="" method="post" class="login">
                <h1>Se connecter</h1>
                <label for="mailadmin">Identifiant:</label><br>
                <input type="text" name="mailadmin"><br>
                <label for="mdpadmin">Mot de passe:</label><br>
                <input type="password" name="mdpadmin"><br>
                <input type="submit" value="Connecter" class="submit" name="connecter"><br>
                <i style="color:red">
                    <?php
                    if(isset($message)){
                        echo $message;
                    }
                    if(isset($me)){
                        echo $me;
                    }
                    ?><br>
                </i>
                <a href="" class="lien" onclick="ouvrirFenetre()">Je n'ai pas un compte</a>
            </form>
        </div>
    </section>
</body>
</html>