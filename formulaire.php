<?php
    include "Connexion/connexion.php";
    if(isset($_POST['valider'])){
        $mail=$_POST['mailuniv'];
        $mdp=$_POST['passworduniv'];
        $req=$con->prepare("INSERT INTO universitercon (mailuniv,passworduniv) VALUE(?,?)");
        $req->execute(array($mail,$mdp));
        $message="Ajouter avec succes";
        $req2=$con->prepare("UPDATE universitercon SET validation=:v WHERE mailuniv=:m");
        $req2->execute(
            [
                ':v' => "non",
                ':m' => $mail
            ]
            );
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="icon" href="Image/logo.png">
    <style>
        body{
            background-color:black;
            color:white;
        }
        form{
            border:solid 1px white;
            display: flex;
            flex-direction: column;
            text-align: center;
            height: 100%;
        }
        form input{
            padding-bottom: 2%;
            margin-bottom: 2%;
        }
        .btn{
    background-color: rgb(93, 77, 241);
    color:white;
    border:none;
    margin-top: 3%;
    padding-left: 10%;
    padding-right: 10%;
    cursor: pointer;
}
.btn:hover{
    background-color: rgb(25, 11, 146);
    color:white;
    border:none;
    margin-top: 3%;
    padding-left: 10%;
    padding-right: 10%;
}
    </style>
</head>
<body>
    <form action="formulaire.php" method="post">
        <h1>Ajouter votre université</h1>
        <label for="mailuniv">Mail</label>
        <input type="text" name="mailuniv">
        <label for="passworduniv">Mot de passe</label>
        <input type="password" name="passworduniv">
        <input type="submit" value="Valider" class="btn" name="valider">
        <i style="color:blue">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
        </i>
        <a  type="text" id="form" style="text-decoration: none;cursor:pointer;">Cliquer ici pour vous connecter</a>
    </form>
    
    <script>
        document.getElementById('form').addEventListener('click', function(event) {
            // Empêche le comportement par défaut du formulaire (rechargement de la page)
            event.preventDefault();
    
            // Ferme la fenêtre actuelle
            window.close();
        });
    </script>
</body>
</html>