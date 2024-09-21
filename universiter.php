<?php
    session_start();

    include("Connexion/connexion.php");
    if(isset($_POST['connecter'])){
        $mail=$_POST['mailuniv'];
        $mdp=$_POST['passworduniv'];
        $req2=$con->prepare("SELECT * FROM universitercon WHERE mailuniv=? AND passworduniv=?");
        $req2->execute(Array($mail,$mdp)); 
            if ($req2->rowCount()>0){
                $_SESSION['validation']=$req2->fetch()['validation'];
                if($_SESSION['validation']=="oui"){
                    $req=$con->prepare("SELECT * FROM universitercon WHERE mailuniv=? AND passworduniv=?");
                    $req->execute(Array($mail,$mdp)); 
                        if ($req->rowCount()>0) {
                            $_SESSION['lier'] = $req->fetch()['lier'];
                            $_SESSION['mailuniv'] = $mail;
                            $_SESSION['passworduniv'] = $mdp;
                            if (empty($_SESSION['lier'])){
                                $vide=true;
                            } else {
                                $vide=false;
                            }
                            if($req->rowCOUNT()>0 && $vide==true && $_SESSION['validation']=="oui"){
                                header("location:Université/personnaliserprofil.php");                                     
                            }else{
                                header("location:Université/accueil.php"); 
            
                            }
            }else{
                        $message="Mail ou mot de passe incorrecte";
                    }
                }else{
                    $me="Ce compte n'est pas approuver";
                }
            }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/Styles.css">
    <link rel="icon" href="Image/logo.png">
    <title>Université</title>

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
          var nouvelleFenetre = window.open('formulaire.php', '_blank', options);
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

            <form action="universiter.php" method="post" class="login">
                <h1>Se connecter en tant qu'université</h1>
                <label for="mailuniv">Mail:</label><br>
                <input type="text" name="mailuniv"><br>
                <label for="passworduniv">Mot de passe:</label><br>
                <input type="password" name="passworduniv"><br>
                <input type="submit" value="Connecter" class="submit" name="connecter"><br>
                <i style="color:red">
                <?php
                    if(isset($message)){
                        echo "$message";
                    }
                    if(isset($me)){
                        echo $me;
                    }
                ?>
                </i><br>
                <a href="" class="lien" onclick="ouvrirFenetre()">Je n'ai pas un compte</a>
            </form>
        </div>
    </section>
</body>
</html>